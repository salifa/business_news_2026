<?php
/**
 * Advertisement Class
 * Handles advertisement creation and management
 */

require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/database.php';

class Advertisement {
    private $db;
    
    public function __construct() {
        $this->db = Database::getInstance();
    }
    
    /**
     * Create new advertisement
     */
    public function create($data) {
        // Validate required fields
        if (empty($data['user_email']) || empty($data['ad_type'])) {
            return ['success' => false, 'message' => 'ข้อมูลไม่ครบถ้วน'];
        }
        
        // Map form value 'regular' to DB ENUM value 'template'
        if ($data['ad_type'] === 'regular') {
            $data['ad_type'] = 'template';
        }
        
        // Check if user has enough credits
        $creditRequired = ($data['ad_type'] === 'fullpage') ? CREDIT_PER_FULLPAGE_AD : CREDIT_PER_AD;
        
        $credit = new Credit();
        $userCredits = $credit->getUserCredits($data['user_email']);
        
        if ($userCredits['credits'] < $creditRequired) {
            return ['success' => false, 'message' => 'เครดิตไม่เพียงพอ กรุณาซื้อเครดิตเพิ่ม'];
        }
        
        $this->db->beginTransaction();
        
        try {
            // Insert into placard table (existing table)
            $placardData = [
                'email' => $data['user_email'],
                'title' => $data['title'] ?? '',
                'content' => $data['content'] ?? '',
                'ad_type' => $data['ad_type'],
                'status' => 'approved',  // AUTO-APPROVED: User already paid for credits
                'approved_at' => date('Y-m-d H:i:s'),  // Auto-approved timestamp
                'approved_by' => 'system_auto',  // Mark as system auto-approval
                'created_at' => date('Y-m-d H:i:s'),
                // New structured fields
                'companyname' => $data['companyname'] ?? '',
                'meeting_number' => $data['meeting_number'] ?? '',
                'placard_to' => $data['placard_to'] ?? '',
                'meeting_agenda' => $data['meeting_agenda'] ?? '',
                'meeting_date' => $data['meeting_date'] ?? null,
                'meeting_time' => $data['meeting_time'] ?? null,
                'meeting_place' => $data['meeting_place'] ?? '',
                'placard_date' => $data['placard_date'] ?? date('Y-m-d')
            ];
            
            // Handle file upload - map to correct column based on file type
            if (isset($data['file_path'])) {
                $fileExt = strtolower(pathinfo($data['file_path'], PATHINFO_EXTENSION));
                if (in_array($fileExt, ['pdf'])) {
                    $placardData['pdf_file1'] = $data['file_path'];
                } else {
                    // Image files (jpg, jpeg, png, gif)
                    $placardData['image1'] = $data['file_path'];
                }
            }
            
            $placardId = $this->db->insert('placard', $placardData);
            
            if (!$placardId) {
                $dbError = $this->db->getLastError();
                // Extract a user-friendly column name from SQL error if present
                $userMsg = 'ไม่สามารถบันทึกข้อมูลประกาศได้';
                if ($dbError) {
                    if (stripos($dbError, 'companyname') !== false) {
                        $userMsg = 'เกิดข้อผิดพลาดที่ฟิลด์ "ชื่อบริษัท" กรุณาตรวจสอบข้อมูล';
                    } elseif (stripos($dbError, 'meeting_date') !== false) {
                        $userMsg = 'เกิดข้อผิดพลาดที่ฟิลด์ "วันที่จัดประชุม" กรุณาตรวจสอบรูปแบบวันที่';
                    } elseif (stripos($dbError, 'meeting_time') !== false) {
                        $userMsg = 'เกิดข้อผิดพลาดที่ฟิลด์ "เวลาจัดประชุม" กรุณาตรวจสอบรูปแบบเวลา';
                    } elseif (stripos($dbError, 'placard_date') !== false) {
                        $userMsg = 'เกิดข้อผิดพลาดที่ฟิลด์ "วันที่ลงโฆษณา" กรุณาตรวจสอบรูปแบบวันที่';
                    } elseif (stripos($dbError, 'title') !== false) {
                        $userMsg = 'เกิดข้อผิดพลาดที่ฟิลด์ "หัวข้อ" กรุณาตรวจสอบข้อมูล';
                    } elseif (stripos($dbError, 'Duplicate') !== false) {
                        $userMsg = 'ข้อมูลซ้ำกัน กรุณาตรวจสอบและลองใหม่อีกครั้ง';
                    } elseif (stripos($dbError, 'Data too long') !== false) {
                        // Extract column name from MySQL error "Data too long for column 'xxx'"
                        preg_match("/column '([^']+)'/", $dbError, $matches);
                        $col = $matches[1] ?? 'ข้อมูล';
                        $userMsg = "ข้อมูลในฟิลด์ '{$col}' ยาวเกินกำหนด กรุณากรอกให้สั้นลง";
                    } elseif (stripos($dbError, 'cannot be null') !== false || stripos($dbError, 'doesn\'t have a default') !== false) {
                        preg_match("/column '([^']+)'/i", $dbError, $matches);
                        $col = $matches[1] ?? 'บางฟิลด์';
                        $userMsg = "ฟิลด์ '{$col}' จำเป็นต้องกรอก";
                    } else {
                        $userMsg = 'ไม่สามารถบันทึกข้อมูลได้: ' . $dbError;
                    }
                }
                throw new Exception($userMsg);
            }
            
            // Deduct credits
            $deductResult = $credit->deductCredits(
                $data['user_email'],
                $creditRequired,
                "ลงประกาศ: {$data['title']}",
                $placardId
            );
            
            if (!$deductResult['success']) {
                throw new Exception($deductResult['message']);
            }
            
            $this->db->commit();
            
            logActivity("Advertisement created and auto-approved: ID {$placardId} by {$data['user_email']}");
            
            // AUTO-GENERATE PDF: Since ad is auto-approved, generate PDF immediately
            $pdfGenerated = false;
            $pdfMessage = '';
            
            if (!empty($data['placard_date'])) {
                require_once __DIR__ . '/PlacardIssue.php';
                $placardIssue = new PlacardIssue();
                
                // Generate or regenerate issue for this date
                $pdfResult = $placardIssue->generateIssue($data['placard_date'], true);
                
                if ($pdfResult['success']) {
                    $pdfGenerated = true;
                    $pdfMessage = " หนังสือพิมพ์ PDF ถูกสร้างและพร้อมดาวน์โหลดแล้ว!";
                    logActivity("Auto-generated PDF for date {$data['placard_date']} after creating ad {$placardId}");
                } else {
                    // Log error but don't fail the ad creation
                    logActivity("Failed to auto-generate PDF for date {$data['placard_date']} after creating ad {$placardId}: " . $pdfResult['message']);
                    $pdfMessage = " หนังสือพิมพ์ PDF จะถูกสร้างในภายหลัง";
                }
            }
            
            return [
                'success' => true,
                'message' => 'สร้างประกาศสำเร็จ! ประกาศของคุณได้รับการอนุมัติและเผยแพร่แล้ว' . $pdfMessage,
                'advertisement_id' => $placardId,
                'credits_deducted' => $creditRequired,
                'credits_remaining' => $deductResult['new_balance'],
                'auto_approved' => true,
                'pdf_generated' => $pdfGenerated
            ];
            
        } catch (Exception $e) {
            $this->db->rollback();
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }
    
    /**
     * Get advertisement by ID
     */
    public function getById($id) {
        $sql = "SELECT p.*, u.fullname as user_name,
                COALESCE(p.pdf_file1, p.image1) as file_path
                FROM placard p
                LEFT JOIN online_placard_users u ON p.email = u.email
                WHERE p.id = :id 
                LIMIT 1";
        return $this->db->queryOne($sql, [':id' => $id]);
    }
    
    /**
     * Get user advertisements
     */
    public function getUserAdvertisements($userEmail, $status = null, $page = 1) {
        $offset = ($page - 1) * ITEMS_PER_PAGE;
        
        $whereClause = "WHERE p.email = :email";
        $params = [':email' => $userEmail];
        
        if ($status) {
            $whereClause .= " AND p.status = :status";
            $params[':status'] = $status;
        }
        
        $sql = "SELECT p.*, 
                       COALESCE(p.pdf_file1, p.image1) as file_path,
                       COALESCE(p.issue_id, na.newspaper_id) as newspaper_id,
                       n.status as newspaper_status,
                       n.newspaper_date
                FROM placard p 
                LEFT JOIN newspaper_advertisements na ON p.id = na.placard_id
                LEFT JOIN newspapers n ON COALESCE(p.issue_id, na.newspaper_id) = n.id
                {$whereClause}
                ORDER BY p.created_at DESC
                LIMIT :limit OFFSET :offset";
        
        $this->db->prepare($sql);
        foreach ($params as $key => $value) {
            $this->db->bind($key, $value);
        }
        $this->db->bind(':limit', ITEMS_PER_PAGE, PDO::PARAM_INT);
        $this->db->bind(':offset', $offset, PDO::PARAM_INT);
        
        return $this->db->fetchAll();
    }
    
    /**
     * Count user advertisements
     */
    public function countUserAdvertisements($userEmail, $status = null) {
        $whereClause = "WHERE email = :email";
        $params = [':email' => $userEmail];
        
        if ($status) {
            $whereClause .= " AND status = :status";
            $params[':status'] = $status;
        }
        
        $result = $this->db->queryOne(
            "SELECT COUNT(*) as count FROM placard {$whereClause}",
            $params
        );
        return $result['count'] ?? 0;
    }
    
    /**
     * Get all pending advertisements (admin)
     */
    public function getPendingAdvertisements($page = 1) {
        $offset = ($page - 1) * ITEMS_PER_PAGE;
        
        $sql = "SELECT p.*, u.fullname as user_name, u.phone,
                COALESCE(p.pdf_file1, p.image1) as file_path
                FROM placard p
                LEFT JOIN online_placard_users u ON p.email = u.email
                WHERE p.status = 'pending'
                ORDER BY p.created_at ASC
                LIMIT :limit OFFSET :offset";
        
        $this->db->prepare($sql);
        $this->db->bind(':limit', ITEMS_PER_PAGE, PDO::PARAM_INT);
        $this->db->bind(':offset', $offset, PDO::PARAM_INT);
        
        return $this->db->fetchAll();
    }
    
    /**
     * Approve advertisement (admin)
     */
    public function approve($id, $adminId) {
        $ad = $this->getById($id);
        
        if (!$ad) {
            return ['success' => false, 'message' => 'ไม่พบประกาศ'];
        }
        
        if ($ad['status'] !== 'pending') {
            return ['success' => false, 'message' => 'สถานะประกาศไม่ถูกต้อง'];
        }
        
        $result = $this->db->update('placard',
            [
                'status' => 'approved',
                'approved_by' => $adminId,
                'approved_at' => date('Y-m-d H:i:s')
            ],
            'id = :id',
            [':id' => $id]
        );
        
        if ($result) {
            logActivity("Advertisement {$id} approved by admin {$adminId}");
            
            // Send email notification
            $subject = "ประกาศของคุณได้รับการอนุมัติ - " . NEWSPAPER_NAME;
            $body = "ประกาศ '{$ad['title']}' ของคุณได้รับการอนุมัติแล้ว<br>";
            $body .= "ประกาศจะปรากฏในหนังสือพิมพ์ฉบับถัดไป";
            sendEmail($ad['email'], $subject, $body);
            
            // AUTO-GENERATE PDF: Trigger PDF generation for this ad's placard_date
            if (!empty($ad['placard_date'])) {
                require_once __DIR__ . '/PlacardIssue.php';
                $placardIssue = new PlacardIssue();
                
                // Generate or regenerate issue for this date (force regenerate to include new ad)
                $pdfResult = $placardIssue->generateIssue($ad['placard_date'], true);
                
                if ($pdfResult['success']) {
                    $action = $pdfResult['regenerated'] ? 'regenerated' : 'generated';
                    logActivity("Auto-{$action} PDF for date {$ad['placard_date']} after approving ad {$id}");
                    
                    // Update success message to include PDF info
                    $pdfMessage = " หนังสือพิมพ์ PDF สำหรับวันที่ " . date('d/m/Y', strtotime($ad['placard_date'])) . " ถูกสร้างแล้ว";
                    return ['success' => true, 'message' => 'อนุมัติประกาศสำเร็จ' . $pdfMessage, 'pdf_generated' => true];
                } else {
                    // Log the error but don't fail the approval
                    logActivity("Failed to auto-generate PDF for date {$ad['placard_date']} after approving ad {$id}: " . $pdfResult['message']);
                }
            }
            
            return ['success' => true, 'message' => 'อนุมัติประกาศสำเร็จ'];
        }
        
        return ['success' => false, 'message' => 'ไม่สามารถอนุมัติประกาศได้'];
    }
    
    /**
     * Reject advertisement (admin)
     */
    public function reject($id, $adminId, $reason) {
        $ad = $this->getById($id);
        
        if (!$ad) {
            return ['success' => false, 'message' => 'ไม่พบประกาศ'];
        }
        
        $this->db->beginTransaction();
        
        try {
            // Update advertisement status
            $this->db->update('placard',
                [
                    'status' => 'rejected',
                    'approved_by' => $adminId,
                    'approved_at' => date('Y-m-d H:i:s'),
                    'reject_reason' => $reason
                ],
                'id = :id',
                [':id' => $id]
            );
            
            // Refund credits
            $creditRequired = ($ad['ad_type'] === 'fullpage') ? CREDIT_PER_FULLPAGE_AD : CREDIT_PER_AD;
            
            $credit = new Credit();
            $current = $credit->getUserCredits($ad['email']);
            $newBalance = $current['credits'] + $creditRequired;
            
            $this->db->update('user_credits',
                ['credits' => $newBalance],
                'user_email = :email',
                [':email' => $ad['email']]
            );
            
            // Log refund
            $this->db->insert('credit_usage_log', [
                'user_email' => $ad['email'],
                'advertisement_id' => $id,
                'transaction_type' => 'refund',
                'credits_change' => $creditRequired,
                'balance_before' => $current['credits'],
                'balance_after' => $newBalance,
                'description' => "คืนเครดิต: ประกาศถูกปฏิเสธ - {$reason}",
                'reference_type' => 'advertisement',
                'reference_id' => $id,
                'created_by' => 'system'
            ]);
            
            $this->db->commit();
            
            logActivity("Advertisement {$id} rejected by admin {$adminId}, credits refunded");
            
            // Send email notification
            $subject = "ประกาศไม่ผ่านการตรวจสอบ - " . NEWSPAPER_NAME;
            $body = "ประกาศ '{$ad['title']}' ของคุณไม่ผ่านการตรวจสอบ<br>";
            $body .= "เหตุผล: {$reason}<br><br>";
            $body .= "เครดิตจำนวน {$creditRequired} หน่วยได้ถูกคืนให้คุณแล้ว";
            sendEmail($ad['email'], $subject, $body);
            
            return ['success' => true, 'message' => 'ปฏิเสธประกาศและคืนเครดิตสำเร็จ'];
            
        } catch (Exception $e) {
            $this->db->rollback();
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }
    
    /**
     * Update advertisement
     */
    public function update($id, $data) {
        $ad = $this->getById($id);
        
        if (!$ad) {
            return ['success' => false, 'message' => 'ไม่พบประกาศ'];
        }
        
        // Only allow editing pending advertisements
        if ($ad['status'] !== 'pending') {
            return ['success' => false, 'message' => 'ไม่สามารถแก้ไขประกาศที่ผ่านการตรวจสอบแล้ว'];
        }
        
        $updateData = [];
        if (isset($data['title'])) $updateData['title'] = $data['title'];
        if (isset($data['content'])) $updateData['content'] = $data['content'];
        
        // Handle file upload - map to correct column
        if (isset($data['file_path'])) {
            $fileExt = strtolower(pathinfo($data['file_path'], PATHINFO_EXTENSION));
            if (in_array($fileExt, ['pdf'])) {
                $updateData['pdf_file1'] = $data['file_path'];
            } else {
                $updateData['image1'] = $data['file_path'];
            }
        }
        
        if (empty($updateData)) {
            return ['success' => false, 'message' => 'ไม่มีข้อมูลที่ต้องอัปเดต'];
        }
        
        $result = $this->db->update('placard', $updateData, 'id = :id', [':id' => $id]);
        
        if ($result) {
            logActivity("Advertisement {$id} updated");
            return ['success' => true, 'message' => 'อัปเดตประกาศสำเร็จ'];
        }
        
        return ['success' => false, 'message' => 'ไม่สามารถอัปเดตประกาศได้'];
    }
    
    /**
     * Delete advertisement
     */
    public function delete($id, $userEmail) {
        $ad = $this->getById($id);
        
        if (!$ad) {
            return ['success' => false, 'message' => 'ไม่พบประกาศ'];
        }
        
        // Check ownership
        if ($ad['email'] !== $userEmail) {
            return ['success' => false, 'message' => 'คุณไม่มีสิทธิ์ลบประกาศนี้'];
        }
        
        // Only allow deleting pending advertisements
        if ($ad['status'] !== 'pending') {
            return ['success' => false, 'message' => 'ไม่สามารถลบประกาศที่ผ่านการตรวจสอบแล้ว'];
        }
        
        $this->db->beginTransaction();
        
        try {
            // Delete files if exist
            if (!empty($ad['image1'])) {
                $filePath = UPLOAD_PATH . $ad['image1'];
                if (file_exists($filePath)) {
                    deleteFile($filePath);
                }
            }
            if (!empty($ad['pdf_file1'])) {
                $filePath = UPLOAD_PATH . $ad['pdf_file1'];
                if (file_exists($filePath)) {
                    deleteFile($filePath);
                }
            }
            
            // Delete advertisement
            $this->db->delete('placard', 'id = :id', [':id' => $id]);
            
            // Refund credits
            $creditRequired = ($ad['ad_type'] === 'fullpage') ? CREDIT_PER_FULLPAGE_AD : CREDIT_PER_AD;
            
            $credit = new Credit();
            $current = $credit->getUserCredits($userEmail);
            $newBalance = $current['credits'] + $creditRequired;
            
            $this->db->update('user_credits',
                ['credits' => $newBalance],
                'user_email = :email',
                [':email' => $userEmail]
            );
            
            // Log refund
            $this->db->insert('credit_usage_log', [
                'user_email' => $userEmail,
                'advertisement_id' => $id,
                'transaction_type' => 'refund',
                'credits_change' => $creditRequired,
                'balance_before' => $current['credits'],
                'balance_after' => $newBalance,
                'description' => "คืนเครดิต: ลบประกาศ - {$ad['title']}",
                'reference_type' => 'advertisement',
                'reference_id' => $id,
                'created_by' => $userEmail
            ]);
            
            $this->db->commit();
            
            logActivity("Advertisement {$id} deleted by user, credits refunded");
            
            return ['success' => true, 'message' => 'ลบประกาศและคืนเครดิตสำเร็จ'];
            
        } catch (Exception $e) {
            $this->db->rollback();
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }
    
    /**
     * Count pending advertisements
     */
    public function countPendingAdvertisements() {
        $result = $this->db->queryOne(
            "SELECT COUNT(*) as count FROM placard WHERE status = 'pending'"
        );
        return $result['count'] ?? 0;
    }
    
    /**
     * Get statistics
     */
    public function getStatistics($userEmail = null) {
        if ($userEmail) {
            // User statistics
            $sql = "SELECT 
                    COUNT(*) as total,
                    SUM(CASE WHEN status = 'pending' THEN 1 ELSE 0 END) as pending,
                    SUM(CASE WHEN status = 'approved' THEN 1 ELSE 0 END) as approved,
                    SUM(CASE WHEN status = 'rejected' THEN 1 ELSE 0 END) as rejected
                    FROM placard 
                    WHERE email = :email";
            return $this->db->queryOne($sql, [':email' => $userEmail]);
        } else {
            // Admin statistics
            $sql = "SELECT 
                    COUNT(*) as total,
                    SUM(CASE WHEN status = 'pending' THEN 1 ELSE 0 END) as pending,
                    SUM(CASE WHEN status = 'approved' THEN 1 ELSE 0 END) as approved,
                    SUM(CASE WHEN status = 'rejected' THEN 1 ELSE 0 END) as rejected,
                    SUM(CASE WHEN status = 'published' THEN 1 ELSE 0 END) as published
                    FROM placard";
            return $this->db->queryOne($sql);
        }
    }
    
    /**
     * Get advertisements with filtering (for admin)
     */
    public function getAdvertisements($status = 'all', $page = 1, $limit = null) {
        $limit = $limit ?? ITEMS_PER_PAGE;
        $offset = ($page - 1) * $limit;
        
        $sql = "SELECT p.*, opu.fullname,
                COALESCE(p.pdf_file1, p.image1) as file_path
                FROM placard p
                LEFT JOIN online_placard_users opu ON p.email = opu.email
                WHERE 1=1";
        
        $params = [];
        
        if ($status !== 'all') {
            $sql .= " AND p.status = :status";
            $params[':status'] = $status;
        }
        
        $sql .= " ORDER BY 
                  CASE WHEN p.status = 'pending' THEN 0 ELSE 1 END,
                  p.created_at DESC
                  LIMIT :limit OFFSET :offset";
        
        $this->db->prepare($sql);
        
        foreach ($params as $key => $value) {
            $this->db->bind($key, $value);
        }
        
        $this->db->bind(':limit', $limit, PDO::PARAM_INT);
        $this->db->bind(':offset', $offset, PDO::PARAM_INT);
        
        return $this->db->fetchAll();
    }
}

