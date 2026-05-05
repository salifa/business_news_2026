<?php
/**
 * API Endpoint: Check Advertisement Status
 * Returns the current status of an advertisement (for PDF generation progress)
 */

require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../classes/Database.php';

// Set JSON response header
header('Content-Type: application/json');

// Check if user is logged in
if (!isLoggedIn()) {
    http_response_code(401);
    echo json_encode([
        'success' => false,
        'error' => 'Unauthorized'
    ]);
    exit;
}

// Get ad ID from query parameter
$adId = isset($_GET['ad_id']) ? (int)$_GET['ad_id'] : 0;

if (!$adId) {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'error' => 'Missing ad_id parameter'
    ]);
    exit;
}

try {
    $db = Database::getInstance();
    $userEmail = getCurrentUserEmail();
    
    // Get ad status (ensure it belongs to the current user)
    $sql = "SELECT id, status, issue_id, published_at, created_at 
            FROM placard 
            WHERE id = :id AND email = :email";
    
    $result = $db->query($sql, [
        ':id' => $adId,
        ':email' => $userEmail
    ]);
    
    if (empty($result)) {
        http_response_code(404);
        echo json_encode([
            'success' => false,
            'error' => 'Advertisement not found'
        ]);
        exit;
    }
    
    $ad = $result[0];
    
    // Return status information
    echo json_encode([
        'success' => true,
        'ad_id' => $ad['id'],
        'status' => $ad['status'],
        'issue_id' => $ad['issue_id'],
        'published_at' => $ad['published_at'],
        'created_at' => $ad['created_at'],
        'is_ready' => $ad['status'] === 'published' && !empty($ad['issue_id'])
    ]);
    
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'error' => 'Server error: ' . $e->getMessage()
    ]);
}
