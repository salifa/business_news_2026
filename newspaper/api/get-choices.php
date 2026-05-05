<?php
header('Content-Type: application/json');
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/database.php';

try {
    $db = Database::getInstance();
    
    // Get all choices with field_name = 'subject'
    $sql = "SELECT id, field_values as title, field_textarea as agenda, day_advance 
            FROM choices 
            WHERE field_name = 'subject' OR field_values IS NOT NULL
            ORDER BY id ASC";
    
    $choices = $db->query($sql);
    
    // Format the response
    $response = [
        'success' => true,
        'data' => $choices
    ];
    
    echo json_encode($response, JSON_UNESCAPED_UNICODE);
    
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'เกิดข้อผิดพลาดในการดึงข้อมูล'
    ], JSON_UNESCAPED_UNICODE);
}
