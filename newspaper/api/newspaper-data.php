<?php
header('Content-Type: application/json; charset=utf-8');

require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/database.php';
require_once __DIR__ . '/../includes/functions.php';

try {
    $date = $_GET['date'] ?? date('Y-m-d');
    $newspaperId = isset($_GET['newspaper_id']) ? (int)$_GET['newspaper_id'] : null;
    $token = $_GET['token'] ?? '';

    // Lightweight token for server-to-server usage.
    $expectedToken = hash('sha256', DB_NAME . '|' . DB_USER . '|' . DB_HOST);
    if (!hash_equals($expectedToken, $token)) {
        http_response_code(403);
        echo json_encode([
            'success' => false,
            'message' => 'Unauthorized token'
        ], JSON_UNESCAPED_UNICODE);
        exit;
    }

    $db = Database::getInstance();

    $sql = "SELECT p.*,
                   opu.fullname AS owner_name
            FROM placard p
            LEFT JOIN online_placard_users opu ON opu.email = p.email
            WHERE p.status = 'approved'
              AND DATE(COALESCE(p.placard_date, p.created_at)) = :date
              AND p.id NOT IN (
                  SELECT placard_id
                  FROM newspaper_advertisements
                  WHERE placard_id IS NOT NULL
              )
            ORDER BY p.approved_at ASC, p.id ASC";

    $ads = $db->query($sql, [':date' => $date]);

    $response = [
        'success' => true,
        'meta' => [
            'newspaper_id' => $newspaperId,
            'date' => $date,
            'generated_at' => date('c'),
            'newspaper_name' => NEWSPAPER_NAME,
            'ad_count' => count($ads)
        ],
        'ads' => $ads
    ];

    echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
} catch (Throwable $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'API error: ' . $e->getMessage()
    ], JSON_UNESCAPED_UNICODE);
}
