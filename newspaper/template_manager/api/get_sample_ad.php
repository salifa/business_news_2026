<?php
/**
 * API: Get Sample Advertisement Data
 * Returns the most recent approved advertisement for newsletter template design
 */

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');

require_once __DIR__ . '/../../includes/config.php';
require_once __DIR__ . '/../../includes/database.php';

try {
    $db = Database::getInstance();
    
    // Get the most recent approved advertisement with all fields
    $sql = "SELECT 
                id,
                email,
                title,
                content,
                ad_type,
                companyname,
                meeting_number,
                placard_to,
                meeting_agenda,
                meeting_date,
                meeting_time,
                meeting_place,
                placard_date,
                pdf_file1,
                image1,
                status,
                created_at,
                approved_at
            FROM placard 
            WHERE status = 'approved' 
            ORDER BY id DESC 
            LIMIT 1";
    
    $result = $db->query($sql);
    
    if (empty($result)) {
        // If no approved ads, get any ad
        $sql = "SELECT * FROM placard ORDER BY id DESC LIMIT 1";
        $result = $db->query($sql);
    }
    
    if (empty($result)) {
        // Create sample data if database is empty
        $result = [[
            'id' => 1,
            'email' => 'sample@company.com',
            'title' => 'การประชุมสามัญผู้ถือหุ้น',
            'content' => 'เรียน ท่านผู้ถือหุ้น\n\nบริษัทฯ ขอเชิญประชุมสามัญผู้ถือหุ้น ประจำปี 2567',
            'ad_type' => 'template',
            'companyname' => 'บริษัท ตัวอย่าง จำกัด (มหาชน)',
            'meeting_number' => '1/2567',
            'placard_to' => 'ท่านผู้ถือหุ้น',
            'meeting_agenda' => "1. รับรองรายงานการประชุม\n2. พิจารณางบการเงิน\n3. พิจารณาจ่ายเงินปันผล",
            'meeting_date' => '2026-04-28',
            'meeting_time' => '14:00:00',
            'meeting_place' => 'ห้องประชุมใหญ่ ชั้น 5 อาคารสำนักงานใหญ่',
            'placard_date' => date('Y-m-d'),
            'pdf_file1' => null,
            'image1' => null,
            'status' => 'approved',
            'created_at' => date('Y-m-d H:i:s'),
            'approved_at' => date('Y-m-d H:i:s')
        ]];
    }
    
    $ad = $result[0];
    
    // Format dates for display
    if (!empty($ad['meeting_date'])) {
        $thaiMonths = ['', 'มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 
                       'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'];
        $date = new DateTime($ad['meeting_date']);
        $day = $date->format('j');
        $month = $thaiMonths[(int)$date->format('n')];
        $year = $date->format('Y') + 543; // Convert to Buddhist year
        $ad['meeting_date_thai'] = "$day $month $year";
    }
    
    if (!empty($ad['placard_date'])) {
        $date = new DateTime($ad['placard_date']);
        $day = $date->format('j');
        $month = $thaiMonths[(int)$date->format('n')];
        $year = $date->format('Y') + 543;
        $ad['placard_date_thai'] = "$day $month $year";
    }
    
    // Format time
    if (!empty($ad['meeting_time'])) {
        $time = new DateTime($ad['meeting_time']);
        $ad['meeting_time_formatted'] = $time->format('H:i') . ' น.';
    }
    
    echo json_encode([
        'success' => true,
        'data' => $ad,
        'fields' => [
            'id' => 'รหัสประกาศ',
            'companyname' => 'ชื่อบริษัท',
            'title' => 'หัวข้อ',
            'meeting_number' => 'ครั้งที่',
            'placard_to' => 'เรียน',
            'content' => 'เนื้อหา',
            'meeting_agenda' => 'วาระการประชุม',
            'meeting_date' => 'วันที่ประชุม',
            'meeting_date_thai' => 'วันที่ประชุม (ไทย)',
            'meeting_time' => 'เวลาประชุม',
            'meeting_time_formatted' => 'เวลาประชุม (จัดรูปแบบ)',
            'meeting_place' => 'สถานที่ประชุม',
            'placard_date' => 'วันที่ลงโฆษณา',
            'placard_date_thai' => 'วันที่ลงโฆษณา (ไทย)',
            'email' => 'อีเมล',
            'ad_type' => 'ประเภท',
            'status' => 'สถานะ'
        ]
    ]);
    
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'เกิดข้อผิดพลาด: ' . $e->getMessage()
    ]);
}
