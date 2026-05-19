<?php
/**
 * Newsletter Class
 * Manages newsletter content for the newspaper system
 */

require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/database.php';

class Newsletter {
    private $db;
    
    public function __construct() {
        $this->db = Database::getInstance();
    }
    
    /**
     * Save newsletter content to newspaper record
     */
    public function saveNewsletterContent($newspaper_id, $content) {
        try {
            // Validate content structure
            if (!$this->validateContent($content)) {
                return ['success' => false, 'message' => 'รูปแบบข้อมูลไม่ถูกต้อง'];
            }
            
            // Encode content as JSON
            $jsonContent = json_encode($content, JSON_UNESCAPED_UNICODE);
            
            // Update newspaper notes field
            $stmt = $this->db->prepare("
                UPDATE newspapers 
                SET notes = ? 
                WHERE id = ?
            ");
            
            if ($stmt->execute([$jsonContent, $newspaper_id])) {
                return ['success' => true, 'message' => 'บันทึกข้อมูลจดหมายข่าวสำเร็จ'];
            } else {
                return ['success' => false, 'message' => 'ไม่สามารถบันทึกข้อมูลได้'];
            }
            
        } catch (Exception $e) {
            error_log("Newsletter save error: " . $e->getMessage());
            return ['success' => false, 'message' => 'เกิดข้อผิดพลาด: ' . $e->getMessage()];
        }
    }
    
    /**
     * Get newsletter content from newspaper record
     */
    public function getNewsletterContent($newspaper_id) {
        try {
            $stmt = $this->db->prepare("SELECT notes FROM newspapers WHERE id = ?");
            $stmt->execute([$newspaper_id]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($result && !empty($result['notes'])) {
                $content = json_decode($result['notes'], true);
                if (json_last_error() === JSON_ERROR_NONE) {
                    return ['success' => true, 'content' => $content];
                }
            }
            
            return ['success' => false, 'message' => 'ไม่พบข้อมูลจดหมายข่าว'];
            
        } catch (Exception $e) {
            error_log("Newsletter get error: " . $e->getMessage());
            return ['success' => false, 'message' => 'เกิดข้อผิดพลาด'];
        }
    }
    
    /**
     * Validate newsletter content structure
     */
    private function validateContent($content) {
        // Basic validation - ensure it's an array
        if (!is_array($content)) {
            return false;
        }
        
        // Optional: Add more specific validation
        return true;
    }
    
    /**
     * Get all published newsletters
     */
    public function getPublishedNewsletters($limit = 10, $offset = 0) {
        try {
            $stmt = $this->db->prepare("
                SELECT id, newspaper_date, page_count, advertisement_count, generated_at
                FROM newspapers 
                WHERE status = 'published'
                ORDER BY newspaper_date DESC
                LIMIT ? OFFSET ?
            ");
            $stmt->execute([$limit, $offset]);
            $newsletters = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            return ['success' => true, 'newsletters' => $newsletters];
            
        } catch (Exception $e) {
            error_log("Newsletter list error: " . $e->getMessage());
            return ['success' => false, 'message' => 'เกิดข้อผิดพลาด'];
        }
    }
    
    /**
     * Generate default newsletter content for a newspaper
     */
    public function generateDefaultContent($newspaper_id) {
        try {
            // Get newspaper data
            $stmt = $this->db->prepare("SELECT * FROM newspapers WHERE id = ?");
            $stmt->execute([$newspaper_id]);
            $newspaper = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if (!$newspaper) {
                return ['success' => false, 'message' => 'ไม่พบข้อมูลหนังสือพิมพ์'];
            }
            
            // Get system settings
            $settings = $this->getSystemSettings();
            
            // Create default content
            $content = [
                'coverPage' => [
                    'headline' => 'ฉบับที่ ' . str_pad($newspaper['id'], 3, '0', STR_PAD_LEFT),
                    'subHeadline' => $settings['newspaper_name'] ?? 'หนังสือพิมพ์',
                    'coverImage' => '',
                    'stories' => [
                        'ประกาศจากผู้ใช้งานในระบบ',
                        'ข่าวสารและข้อมูลสำคัญ'
                    ],
                    'highlights' => []
                ],
                'letterPages' => [
                    [
                        'companyName' => $settings['newspaper_name'] ?? 'หนังสือพิมพ์',
                        'companyAddress' => '',
                        'showLetterhead' => true,
                        'content' => [
                            'greeting' => 'เรียน ผู้อ่านที่เคารพ',
                            'paragraphs' => [
                                'ยินดีต้อนรับสู่ฉบับนี้'
                            ],
                            'closing' => 'ขอแสดงความนับถือ',
                            'signature' => [
                                'name' => 'บรรณาธิการ',
                                'title' => 'หนังสือพิมพ์'
                            ]
                        ]
                    ]
                ],
                'pdfAttachments' => [],
                'pdfAdvertisements' => []
            ];
            
            // Save the content
            return $this->saveNewsletterContent($newspaper_id, $content);
            
        } catch (Exception $e) {
            error_log("Generate default content error: " . $e->getMessage());
            return ['success' => false, 'message' => 'เกิดข้อผิดพลาด'];
        }
    }
    
    /**
     * Get system settings
     */
    private function getSystemSettings() {
        $stmt = $this->db->prepare("SELECT setting_key, setting_value FROM system_settings");
        $stmt->execute();
        $settings = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $settings[$row['setting_key']] = $row['setting_value'];
        }
        return $settings;
    }
}
