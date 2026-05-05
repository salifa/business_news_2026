<?php
// Database configuration
// SECURITY NOTE: Move these credentials to environment variables in production
// Use: getenv('DB_HOST'), getenv('DB_USER'), etc.
define('DB_HOST', getenv('DB_HOST') ?: 'localhost');
define('DB_USER', getenv('DB_USER') ?: 'salifa');
define('DB_PASS', getenv('DB_PASS') ?: 'Araigodai@123');
define('DB_NAME', getenv('DB_NAME') ?: 'vnnsbiz');

// Create connection
function getDBConnection() {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    
    // Check connection
    if ($conn->connect_error) {
        // Log error securely instead of displaying it
        error_log("Database connection failed: " . $conn->connect_error);
        die("เกิดข้อผิดพลาดในการเชื่อมต่อฐานข้อมูล กรุณาติดต่อผู้ดูแลระบบ");
    }
    
    // Set charset to UTF-8 for Thai language support
    $conn->set_charset("utf8");
    
    return $conn;
}

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if user is logged in
function isLoggedIn() {
    return isset($_SESSION['user_id']) && !empty($_SESSION['user_id']);
}

// Check if user is admin
function isAdmin() {
    return isset($_SESSION['groupid']) && ($_SESSION['groupid'] == '1' || $_SESSION['groupid'] == 'admin');
}

// Redirect if not logged in
function requireLogin() {
    if (!isLoggedIn()) {
        header('Location: login.php');
        exit();
    }
}

// Redirect if not admin
function requireAdmin() {
    if (!isAdmin()) {
        header('Location: dashboard.php');
        exit();
    }
}

// Get user's credit balance
function getUserCredits($user_id) {
    $conn = getDBConnection();
    
    // Calculate total purchased coins
    $sql = "SELECT SUM(coin) as total_coins FROM credit_transactions 
            WHERE owner_id = ? AND approved = 'yes'";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $purchased = $result->fetch_assoc()['total_coins'] ?? 0;
    
    // Calculate used coins (published placards)
    $sql = "SELECT COUNT(*) as used_coins FROM placard 
            WHERE owner_id = ? AND publish = 'On'";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $used = $result->fetch_assoc()['used_coins'] ?? 0;
    
    $conn->close();
    
    return $purchased - $used;
}

// CSRF Protection Functions
function generateCSRFToken() {
    if (!isset($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

function validateCSRFToken($token) {
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}

// File Upload Validation Functions
function validateImageUpload($file, $max_size = 5242880) { // 5MB default
    $allowed_types = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'image/webp'];
    $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
    
    if ($file['error'] !== UPLOAD_ERR_OK) {
        return ['success' => false, 'error' => 'เกิดข้อผิดพลาดในการอัพโหลดไฟล์'];
    }
    
    if ($file['size'] > $max_size) {
        return ['success' => false, 'error' => 'ขนาดไฟล์ใหญ่เกินไป (สูงสุด ' . ($max_size / 1024 / 1024) . ' MB)'];
    }
    
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime_type = finfo_file($finfo, $file['tmp_name']);
    finfo_close($finfo);
    
    if (!in_array($mime_type, $allowed_types)) {
        return ['success' => false, 'error' => 'ประเภทไฟล์ไม่ถูกต้อง (รองรับเฉพาะไฟล์รูปภาพ)'];
    }
    
    $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    if (!in_array($extension, $allowed_extensions)) {
        return ['success' => false, 'error' => 'นามสกุลไฟล์ไม่ถูกต้อง'];
    }
    
    return ['success' => true];
}

function validatePDFUpload($file, $max_size = 10485760) { // 10MB default
    $allowed_types = ['application/pdf'];
    $allowed_extensions = ['pdf'];
    
    if ($file['error'] !== UPLOAD_ERR_OK) {
        return ['success' => false, 'error' => 'เกิดข้อผิดพลาดในการอัพโหลดไฟล์'];
    }
    
    if ($file['size'] > $max_size) {
        return ['success' => false, 'error' => 'ขนาดไฟล์ใหญ่เกินไป (สูงสุด ' . ($max_size / 1024 / 1024) . ' MB)'];
    }
    
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime_type = finfo_file($finfo, $file['tmp_name']);
    finfo_close($finfo);
    
    if (!in_array($mime_type, $allowed_types)) {
        return ['success' => false, 'error' => 'ประเภทไฟล์ไม่ถูกต้อง (รองรับเฉพาะไฟล์ PDF)'];
    }
    
    $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    if (!in_array($extension, $allowed_extensions)) {
        return ['success' => false, 'error' => 'นามสกุลไฟล์ไม่ถูกต้อง'];
    }
    
    return ['success' => true];
}

// Sanitize output to prevent XSS
function escape($string) {
    return htmlspecialchars($string ?? '', ENT_QUOTES, 'UTF-8');
}

// Deduct credit when placard is created
function deductCredit($user_id) {
    $conn = getDBConnection();
    
    // Record credit usage
    $sql = "INSERT INTO credit_usage (owner_id, coins_used, usage_date, description) 
            VALUES (?, 1, NOW(), 'สร้างประกาศ')";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $user_id);
    $result = $stmt->execute();
    
    $conn->close();
    
    return $result;
}
?>
