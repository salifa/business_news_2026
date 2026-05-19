<?php
/**
 * Newsletter Data API
 * Fetches newsletter content from database for the newsletter viewer
 */

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

// Handle preflight requests
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/database.php';

class NewsletterAPI {
    private $db;
    
    public function __construct() {
        $this->db = Database::getInstance();
    }
    
    /**
     * Get newsletter data by newspaper ID or date
     */
    public function getNewsletterData($newspaper_id = null, $date = null) {
        try {
            // Get newspaper record
            if ($newspaper_id) {
                $stmt = $this->db->prepare("
                    SELECT * FROM newspapers 
                    WHERE id = ? AND status = 'published'
                    LIMIT 1
                ");
                $stmt->execute([$newspaper_id]);
            } elseif ($date) {
                $stmt = $this->db->prepare("
                    SELECT * FROM newspapers 
                    WHERE newspaper_date = ? AND status = 'published'
                    LIMIT 1
                ");
                $stmt->execute([$date]);
            } else {
                // Get latest published newspaper
                $stmt = $this->db->prepare("
                    SELECT * FROM newspapers 
                    WHERE status = 'published'
                    ORDER BY newspaper_date DESC 
                    LIMIT 1
                ");
                $stmt->execute();
            }
            
            $newspaper = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if (!$newspaper) {
                return $this->errorResponse('ไม่พบข้อมูลจดหมายข่าว', 404);
            }
            
            // Get newsletter content from notes field (stored as JSON)
            $newsletterContent = $this->parseNewsletterContent($newspaper);
            
            // Get approved advertisements for this newspaper
            $advertisements = $this->getAdvertisements($newspaper['id'], $newspaper['newspaper_date']);
            
            // Build newsletter data structure
            $data = [
                'issueNumber' => str_pad($newspaper['id'], 3, '0', STR_PAD_LEFT),
                'issueDate' => $this->formatThaiDate($newspaper['newspaper_date']),
                'coverPage' => $newsletterContent['coverPage'] ?? $this->getDefaultCoverPage($newspaper),
                'letterPages' => $newsletterContent['letterPages'] ?? $this->getDefaultLetterPages($newspaper),
                'pdfAttachments' => $newsletterContent['pdfAttachments'] ?? [],
                'pdfAdvertisements' => $this->getPdfAdvertisements($advertisements),
                'metadata' => [
                    'newspaper_id' => $newspaper['id'],
                    'newspaper_date' => $newspaper['newspaper_date'],
                    'page_count' => $newspaper['page_count'],
                    'advertisement_count' => $newspaper['advertisement_count'],
                    'generated_at' => $newspaper['generated_at']
                ]
            ];
            
            return $this->successResponse($data);
            
        } catch (Exception $e) {
            error_log("Newsletter API Error: " . $e->getMessage());
            return $this->errorResponse('เกิดข้อผิดพลาดในการโหลดข้อมูล: ' . $e->getMessage(), 500);
        }
    }
    
    /**
     * Parse newsletter content from notes field
     */
    private function parseNewsletterContent($newspaper) {
        if (empty($newspaper['notes'])) {
            return [];
        }
        
        // Try to parse as JSON
        $content = json_decode($newspaper['notes'], true);
        if (json_last_error() === JSON_ERROR_NONE && is_array($content)) {
            return $content;
        }
        
        return [];
    }
    
    /**
     * Get advertisements for the newsletter
     */
    private function getAdvertisements($newspaper_id, $date) {
        $stmt = $this->db->prepare("
            SELECT na.*, p.* 
            FROM newspaper_advertisements na
            LEFT JOIN placard p ON na.placard_id = p.id
            WHERE na.newspaper_id = ? 
            AND na.status = 'published'
            ORDER BY na.page_number, na.position
        ");
        $stmt->execute([$newspaper_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    /**
     * Get PDF advertisements
     */
    private function getPdfAdvertisements($advertisements) {
        $pdfAds = [];
        
        foreach ($advertisements as $ad) {
            if ($ad['type'] === 'pdf' && !empty($ad['pdf_path'])) {
                $pdfAds[] = [
                    'title' => $ad['title'] ?? 'โฆษณา',
                    'url' => '/newspaper/uploads/' . basename($ad['pdf_path']),
                    'description' => $ad['description'] ?? ''
                ];
            }
        }
        
        return $pdfAds;
    }
    
    /**
     * Get default cover page content
     */
    private function getDefaultCoverPage($newspaper) {
        $settings = $this->getSystemSettings();
        
        return [
            'headline' => 'ฉบับที่ ' . $newspaper['id'],
            'subHeadline' => 'หนังสือพิมพ์ ' . ($settings['newspaper_name'] ?? 'วารสารบัญชีไทย'),
            'coverImage' => 'https://via.placeholder.com/800x400/1a472a/ffffff?text=ฉบับที่+' . $newspaper['id'],
            'stories' => [
                'ประกาศจากผู้ใช้งานในระบบ',
                'ข้อมูลสำคัญและข่าวสารล่าสุด',
                'บริการประกาศออนไลน์ที่รวดเร็ว',
                'ระบบจัดการที่มีประสิทธิภาพ'
            ],
            'highlights' => [
                [
                    'title' => 'ประกาศทั้งหมด ' . $newspaper['advertisement_count'] . ' รายการ',
                    'description' => 'ประกาศที่ได้รับการอนุมัติและเผยแพร่',
                    'image' => 'https://via.placeholder.com/300x150/2c5f2d/ffffff?text=ประกาศ'
                ],
                [
                    'title' => 'ระบบอัตโนมัติ',
                    'description' => 'จัดการและเผยแพร่อย่างมีประสิทธิภาพ',
                    'image' => 'https://via.placeholder.com/300x150/2c5f2d/ffffff?text=อัตโนมัติ'
                ],
                [
                    'title' => 'ดาวน์โหลด PDF',
                    'description' => 'สามารถดาวน์โหลดเป็นไฟล์ PDF ได้',
                    'image' => 'https://via.placeholder.com/300x150/2c5f2d/ffffff?text=PDF'
                ]
            ]
        ];
    }
    
    /**
     * Get default letter pages
     */
    private function getDefaultLetterPages($newspaper) {
        $settings = $this->getSystemSettings();
        $thaiDate = $this->formatThaiDate($newspaper['newspaper_date']);
        
        return [
            [
                'companyName' => $settings['newspaper_name'] ?? 'หนังสือพิมพ์ เครือข่ายบัญชี',
                'companyAddress' => 'ระบบประกาศออนไลน์',
                'showLetterhead' => true,
                'content' => [
                    'greeting' => 'เรียน ผู้อ่านที่เคารพทุกท่าน',
                    'paragraphs' => [
                        'ยินดีต้อนรับสู่ฉบับวันที่ ' . $thaiDate . ' ของหนังสือพิมพ์ของเรา',
                        [
                            'type' => 'heading',
                            'text' => 'เกี่ยวกับฉบับนี้'
                        ],
                        'ฉบับนี้ประกอบด้วยประกาศทั้งหมด ' . $newspaper['advertisement_count'] . ' รายการ ที่ได้รับการอนุมัติและพร้อมเผยแพร่',
                        [
                            'type' => 'subheading',
                            'text' => 'รายละเอียด:'
                        ],
                        [
                            'type' => 'list',
                            'items' => [
                                'ฉบับที่: ' . $newspaper['id'],
                                'วันที่เผยแพร่: ' . $thaiDate,
                                'จำนวนประกาศ: ' . $newspaper['advertisement_count'] . ' รายการ',
                                'จำนวนหน้า: ' . $newspaper['page_count'] . ' หน้า'
                            ]
                        ],
                        'ขอบคุณที่ใช้บริการของเรา'
                    ],
                    'closing' => 'ขอแสดงความนับถือ',
                    'signature' => [
                        'name' => 'ทีมงาน ' . ($settings['newspaper_name'] ?? 'หนังสือพิมพ์'),
                        'title' => 'ฝ่ายบรรณาธิการ'
                    ]
                ]
            ]
        ];
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
    
    /**
     * Format date to Thai format with Buddhist Era
     */
    private function formatThaiDate($date) {
        $timestamp = strtotime($date);
        $thaiMonths = [
            1 => 'มกราคม', 2 => 'กุมภาพันธ์', 3 => 'มีนาคม',
            4 => 'เมษายน', 5 => 'พฤษภาคม', 6 => 'มิถุนายน',
            7 => 'กรกฎาคม', 8 => 'สิงหาคม', 9 => 'กันยายน',
            10 => 'ตุลาคม', 11 => 'พฤศจิกายน', 12 => 'ธันวาคม'
        ];
        
        $day = date('j', $timestamp);
        $month = $thaiMonths[(int)date('n', $timestamp)];
        $year = date('Y', $timestamp) + 543;
        
        return "$day $month $year";
    }
    
    /**
     * Success response
     */
    private function successResponse($data) {
        return [
            'success' => true,
            'data' => $data
        ];
    }
    
    /**
     * Error response
     */
    private function errorResponse($message, $code = 400) {
        http_response_code($code);
        return [
            'success' => false,
            'error' => $message
        ];
    }
}

// Main execution
try {
    $api = new NewsletterAPI();
    
    $newspaper_id = $_GET['id'] ?? $_GET['newspaper_id'] ?? null;
    $date = $_GET['date'] ?? null;
    
    $result = $api->getNewsletterData($newspaper_id, $date);
    
    echo json_encode($result, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'error' => 'เกิดข้อผิดพลาดในระบบ'
    ], JSON_UNESCAPED_UNICODE);
    error_log("Newsletter API Exception: " . $e->getMessage());
}
