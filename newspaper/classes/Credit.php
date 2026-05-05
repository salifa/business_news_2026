<?php
/**
 * Credit Class
 * Handles credit management and transactions
 */

require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/database.php';

class Credit {
    private $db;
    
    public function __construct() {
        $this->db = Database::getInstance();
    }
    
    /**
     * Get user credit balance
     */
    public function getUserBalance($userEmail) {
        $sql = "SELECT credits FROM user_credits WHERE user_email = :email LIMIT 1";
        $result = $this->db->queryOne($sql, [':email' => $userEmail]);
        return $result ? (int)$result['credits'] : 0;
    }
    
    /**
     * Get user credit details
     */
    public function getUserCredits($userEmail) {
        $sql = "SELECT * FROM user_credits WHERE user_email = :email LIMIT 1";
        $result = $this->db->queryOne($sql, [':email' => $userEmail]);
        
        if (!$result) {
            // Initialize if not exists
            $this->db->insert('user_credits', ['user_email' => $userEmail, 'credits' => 0]);
            return ['user_email' => $userEmail, 'credits' => 0, 'total_purchased' => 0, 'total_used' => 0];
        }
        
        return $result;
    }
    
    /**
     * Get all credit packages
     */
    public function getPackages() {
        $sql = "SELECT * FROM credit_packages WHERE is_active = 1 ORDER BY sort_order ASC, price ASC";
        return $this->db->query($sql);
    }
    
    /**
     * Get package by ID
     */
    public function getPackageById($id) {
        $sql = "SELECT * FROM credit_packages WHERE id = :id LIMIT 1";
        return $this->db->queryOne($sql, [':id' => $id]);
    }
    
    /**
     * Create payment transaction
     */
    public function createPayment($userEmail, $packageId, $customAmount = null, $customCredits = null) {
        $package = $this->getPackageById($packageId);
        
        if (!$package && !$customAmount) {
            return ['success' => false, 'message' => 'ไม่พบแพ็กเกจที่เลือก'];
        }
        
        $amount = $customAmount ?? $package['price'];
        $credits = $customCredits ?? $package['credits'];
        
        $data = [
            'user_email' => $userEmail,
            'package_id' => $packageId ?: null,
            'amount' => $amount,
            'credits' => $credits,
            'status' => 'pending',
            'reference_number' => 'PAY' . time() . rand(1000, 9999)
        ];
        
        $paymentId = $this->db->insert('payment_transactions', $data);
        
        if ($paymentId) {
            logActivity("Payment created: {$amount} baht for {$credits} credits by {$userEmail}");
            return [
                'success' => true,
                'payment_id' => $paymentId,
                'reference_number' => $data['reference_number']
            ];
        }
        
        return ['success' => false, 'message' => 'ไม่สามารถสร้างรายการชำระเงินได้'];
    }
    
    /**
     * Upload payment slip
     */
    public function uploadPaymentSlip($paymentId, $file, $transferDate, $transferTime = null, $bankName = null) {
        // Check payment exists
        $payment = $this->getPaymentById($paymentId);
        if (!$payment) {
            return ['success' => false, 'message' => 'ไม่พบรายการชำระเงิน'];
        }
        
        // Upload slip image
        $upload = uploadFile($file, array_merge(ALLOWED_IMAGE_TYPES, ALLOWED_PDF_TYPES));
        
        if (!$upload['success']) {
            return $upload;
        }
        
        // Update payment with slip information
        $updateData = [
            'slip_image' => $upload['filename'],
            'transfer_date' => $transferDate,
            'status' => 'pending'
        ];
        
        if ($transferTime) {
            $updateData['transfer_time'] = $transferTime;
        }
        
        if ($bankName) {
            $updateData['bank_name'] = $bankName;
        }
        
        $result = $this->db->update('payment_transactions', $updateData, 'id = :id', [':id' => $paymentId]);
        
        if ($result) {
            logActivity("Payment slip uploaded for payment ID: {$paymentId}");
            return ['success' => true, 'message' => 'อัปโหลดสลิปสำเร็จ รอการตรวจสอบจากแอดมิน'];
        }
        
        return ['success' => false, 'message' => 'ไม่สามารถอัปโหลดสลิปได้'];
    }
    
    /**
     * Get payment by ID
     */
    public function getPaymentById($id) {
        $sql = "SELECT * FROM payment_transactions WHERE id = :id LIMIT 1";
        return $this->db->queryOne($sql, [':id' => $id]);
    }
    
    /**
     * Get user payments
     */
    public function getUserPayments($userEmail, $status = null, $page = 1) {
        $offset = ($page - 1) * ITEMS_PER_PAGE;
        
        $whereClause = "WHERE user_email = :email";
        $params = [':email' => $userEmail];
        
        if ($status) {
            $whereClause .= " AND status = :status";
            $params[':status'] = $status;
        }
        
        $sql = "SELECT pt.*, cp.name as package_name 
                FROM payment_transactions pt
                LEFT JOIN credit_packages cp ON pt.package_id = cp.id
                {$whereClause}
                ORDER BY pt.created_at DESC
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
     * Get all pending payments (admin)
     */
    public function getPendingPayments($page = 1) {
        $offset = ($page - 1) * ITEMS_PER_PAGE;
        
        $sql = "SELECT pt.*, cp.name as package_name, u.fullname as user_name
                FROM payment_transactions pt
                LEFT JOIN credit_packages cp ON pt.package_id = cp.id
                LEFT JOIN online_placard_users u ON pt.user_email = u.email
                WHERE pt.status = 'pending'
                ORDER BY pt.created_at ASC
                LIMIT :limit OFFSET :offset";
        
        $this->db->prepare($sql);
        $this->db->bind(':limit', ITEMS_PER_PAGE, PDO::PARAM_INT);
        $this->db->bind(':offset', $offset, PDO::PARAM_INT);
        
        return $this->db->fetchAll();
    }
    
    /**
     * Approve payment (admin)
     */
    public function approvePayment($paymentId, $adminId) {
        $this->db->beginTransaction();
        
        try {
            $payment = $this->getPaymentById($paymentId);
            
            if (!$payment) {
                throw new Exception('ไม่พบรายการชำระเงิน');
            }
            
            if ($payment['status'] !== 'pending') {
                throw new Exception('สถานะรายการไม่ถูกต้อง');
            }
            
            // Update payment status
            $this->db->update('payment_transactions',
                [
                    'status' => 'approved',
                    'approved_by' => $adminId,
                    'approved_at' => date('Y-m-d H:i:s')
                ],
                'id = :id',
                [':id' => $paymentId]
            );
            
            // Add credits to user
            $this->addCredits($payment['user_email'], $payment['credits'], 'payment', $paymentId);
            
            $this->db->commit();
            
            logActivity("Payment {$paymentId} approved by admin {$adminId}");
            
            // Send email notification
            $subject = "การชำระเงินได้รับการอนุมัติ - " . NEWSPAPER_NAME;
            $body = "การชำระเงินของคุณจำนวน " . formatCurrency($payment['amount']) . " ได้รับการอนุมัติแล้ว<br>";
            $body .= "เครดิตที่ได้รับ: {$payment['credits']} เครดิต";
            sendEmail($payment['user_email'], $subject, $body);
            
            return ['success' => true, 'message' => 'อนุมัติการชำระเงินสำเร็จ'];
            
        } catch (Exception $e) {
            $this->db->rollback();
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }
    
    /**
     * Reject payment (admin)
     */
    public function rejectPayment($paymentId, $adminId, $reason) {
        $payment = $this->getPaymentById($paymentId);
        
        if (!$payment) {
            return ['success' => false, 'message' => 'ไม่พบรายการชำระเงิน'];
        }
        
        $result = $this->db->update('payment_transactions',
            [
                'status' => 'rejected',
                'approved_by' => $adminId,
                'approved_at' => date('Y-m-d H:i:s'),
                'reject_reason' => $reason
            ],
            'id = :id',
            [':id' => $paymentId]
        );
        
        if ($result) {
            logActivity("Payment {$paymentId} rejected by admin {$adminId}");
            
            // Send email notification
            $subject = "การชำระเงินไม่ผ่านการตรวจสอบ - " . NEWSPAPER_NAME;
            $body = "การชำระเงินของคุณไม่ผ่านการตรวจสอบ<br>";
            $body .= "เหตุผล: {$reason}";
            sendEmail($payment['user_email'], $subject, $body);
            
            return ['success' => true, 'message' => 'ปฏิเสธการชำระเงินสำเร็จ'];
        }
        
        return ['success' => false, 'message' => 'ไม่สามารถปฏิเสธการชำระเงินได้'];
    }
    
    /**
     * Add credits to user
     */
    private function addCredits($userEmail, $credits, $referenceType = 'purchase', $referenceId = null) {
        // Get current balance
        $current = $this->getUserCredits($userEmail);
        $currentBalance = $current['credits'];
        $newBalance = $currentBalance + $credits;
        
        // Update user credits
        $this->db->update('user_credits',
            [
                'credits' => $newBalance,
                'total_purchased' => $current['total_purchased'] + $credits,
                'last_purchase_at' => date('Y-m-d H:i:s')
            ],
            'user_email = :email',
            [':email' => $userEmail]
        );
        
        // Log transaction
        $this->db->insert('credit_usage_log', [
            'user_email' => $userEmail,
            'transaction_type' => 'purchase',
            'credits_change' => $credits,
            'balance_before' => $currentBalance,
            'balance_after' => $newBalance,
            'description' => "ซื้อเครดิต {$credits} หน่วย",
            'reference_type' => $referenceType,
            'reference_id' => $referenceId,
            'created_by' => 'system'
        ]);
        
        return true;
    }
    
    /**
     * Deduct credits from user
     */
    public function deductCredits($userEmail, $credits, $description, $advertisementId = null) {
        $current = $this->getUserCredits($userEmail);
        $currentBalance = $current['credits'];
        
        if ($currentBalance < $credits) {
            return ['success' => false, 'message' => 'เครดิตไม่เพียงพอ'];
        }
        
        $newBalance = $currentBalance - $credits;
        
        // Update user credits
        $this->db->update('user_credits',
            [
                'credits' => $newBalance,
                'total_used' => $current['total_used'] + $credits,
                'last_usage_at' => date('Y-m-d H:i:s')
            ],
            'user_email = :email',
            [':email' => $userEmail]
        );
        
        // Log transaction
        $this->db->insert('credit_usage_log', [
            'user_email' => $userEmail,
            'advertisement_id' => $advertisementId,
            'transaction_type' => 'usage',
            'credits_change' => -$credits,
            'balance_before' => $currentBalance,
            'balance_after' => $newBalance,
            'description' => $description,
            'reference_type' => 'advertisement',
            'reference_id' => $advertisementId,
            'created_by' => $userEmail
        ]);
        
        logActivity("Credits deducted: {$credits} from {$userEmail}");
        
        return ['success' => true, 'new_balance' => $newBalance];
    }
    
    /**
     * Get credit usage log
     */
    public function getCreditLog($userEmail, $page = 1) {
        $offset = ($page - 1) * ITEMS_PER_PAGE;
        
        $sql = "SELECT * FROM credit_usage_log 
                WHERE user_email = :email 
                ORDER BY created_at DESC 
                LIMIT :limit OFFSET :offset";
        
        $this->db->prepare($sql);
        $this->db->bind(':email', $userEmail);
        $this->db->bind(':limit', ITEMS_PER_PAGE, PDO::PARAM_INT);
        $this->db->bind(':offset', $offset, PDO::PARAM_INT);
        
        return $this->db->fetchAll();
    }
    
    /**
     * Count pending payments
     */
    public function countPendingPayments() {
        $result = $this->db->queryOne("SELECT COUNT(*) as count FROM payment_transactions WHERE status = 'pending'");
        return $result['count'] ?? 0;
    }
    
    /**
     * Get all payments with filtering (for admin)
     */
    public function getAllPayments($status = 'all', $page = 1) {
        $offset = ($page - 1) * ITEMS_PER_PAGE;
        
        $sql = "SELECT pt.*, opu.fullname
                FROM payment_transactions pt
                LEFT JOIN online_placard_users opu ON pt.user_email = opu.email
                WHERE 1=1";
        
        $params = [];
        
        if ($status !== 'all') {
            $sql .= " AND pt.status = :status";
            $params[':status'] = $status;
        }
        
        $sql .= " ORDER BY 
                  CASE WHEN pt.status = 'pending' THEN 0 ELSE 1 END,
                  pt.created_at DESC
                  LIMIT :limit OFFSET :offset";
        
        $this->db->prepare($sql);
        
        foreach ($params as $key => $value) {
            $this->db->bind($key, $value);
        }
        
        $this->db->bind(':limit', ITEMS_PER_PAGE, PDO::PARAM_INT);
        $this->db->bind(':offset', $offset, PDO::PARAM_INT);
        
        return $this->db->fetchAll();
    }
}
