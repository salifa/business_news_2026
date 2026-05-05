<?php
/**
 * Helper Functions
 * Common utility functions used throughout the application
 */

// Prevent multiple inclusions
if (!function_exists('sanitize')) {

/**
 * Sanitize input data
 */
function sanitize($data) {
    if (is_array($data)) {
        return array_map('sanitize', $data);
    }
    return htmlspecialchars(strip_tags(trim($data)), ENT_QUOTES, 'UTF-8');
}

/**
 * Sanitize input data (alias)
 */
function sanitizeInput($data) {
    return sanitize($data);
}

/**
 * Escape output data
 */
function escape($data) {
    if ($data === null) {
        return '';
    }
    return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
}

/**
 * Redirect to URL
 */
function redirect($url, $statusCode = 303) {
    header('Location: ' . $url, true, $statusCode);
    exit;
}

/**
 * Generate CSRF token
 */
function generateCsrfToken() {
    if (!isset($_SESSION['csrf_token']) || !isset($_SESSION['csrf_token_time']) || 
        (time() - $_SESSION['csrf_token_time']) > CSRF_TOKEN_LIFETIME) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        $_SESSION['csrf_token_time'] = time();
    }
    return $_SESSION['csrf_token'];
}

/**
 * Verify CSRF token
 */
function verifyCsrfToken($token) {
    if (!isset($_SESSION['csrf_token']) || !isset($_SESSION['csrf_token_time'])) {
        return false;
    }
    
    if ((time() - $_SESSION['csrf_token_time']) > CSRF_TOKEN_LIFETIME) {
        return false;
    }
    
    return hash_equals($_SESSION['csrf_token'], $token);
}

/**
 * Set flash message
 */
function setFlash($type, $message) {
    $_SESSION['flash'][] = [
        'type' => $type, // success, error, warning, info
        'message' => $message
    ];
}

/**
 * Get and clear flash messages
 */
function getFlash() {
    if (isset($_SESSION['flash'])) {
        $flash = $_SESSION['flash'];
        unset($_SESSION['flash']);
        return $flash;
    }
    return [];
}

/**
 * Check if user is logged in
 */
function isLoggedIn() {
    return isset($_SESSION['user_id']) && !empty($_SESSION['user_id']);
}

/**
 * Check if user is admin
 */
function isAdmin() {
    return isLoggedIn() && isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin';
}

/**
 * Get current user email
 */
function getCurrentUserEmail() {
    return $_SESSION['user_email'] ?? null;
}

/**
 * Get current user ID
 */
function getCurrentUserId() {
    return $_SESSION['user_id'] ?? null;
}

/**
 * Send email using PHPMailer with SMTP
 */
function sendEmail($to, $subject, $body, $isHTML = true) {
    if (!SMTP_ENABLE) {
        return false;
    }
    
    try {
        require_once __DIR__ . '/../vendor/autoload.php';
        
        $mail = new PHPMailer\PHPMailer\PHPMailer(true);
        
        // SMTP Configuration
        $mail->isSMTP();
        $mail->Host = SMTP_HOST;
        $mail->SMTPAuth = true;
        $mail->Username = SMTP_USER;
        $mail->Password = SMTP_PASS;
        $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = SMTP_PORT;
        $mail->CharSet = 'UTF-8';
        
        // Sender and recipient
        $mail->setFrom(SMTP_FROM_EMAIL, SMTP_FROM_NAME);
        $mail->addAddress($to);
        
        // Content
        $mail->isHTML($isHTML);
        $mail->Subject = $subject;
        $mail->Body = $body;
        
        if ($isHTML) {
            $mail->AltBody = strip_tags($body);
        }
        
        return $mail->send();
    } catch (Exception $e) {
        error_log("Email sending failed: " . $e->getMessage());
        return false;
    }
}

/**
 * Require login
 */
function requireLogin() {
    if (!isLoggedIn()) {
        setFlash('warning', 'กรุณาเข้าสู่ระบบก่อนใช้งาน');
        redirect(BASE_URL . 'public/login.php');
    }
}

/**
 * Require admin
 */
function requireAdmin() {
    requireLogin();
    if (!isAdmin()) {
        setFlash('error', 'คุณไม่มีสิทธิ์เข้าถึงหน้านี้');
        redirect(BASE_URL . 'user/dashboard.php');
    }
}

/**
 * Format date
 */
function formatDate($date, $format = DATE_FORMAT) {
    if (empty($date)) return '-';
    return date($format, strtotime($date));
}

/**
 * Format datetime
 */
function formatDateTime($datetime, $format = DATETIME_FORMAT) {
    if (empty($datetime)) return '-';
    return date($format, strtotime($datetime));
}

/**
 * Format Thai date
 */
function formatThaiDate($date) {
    if (empty($date)) return '-';
    
    $timestamp = strtotime($date);
    $thaiMonths = [
        1 => 'ม.ค.', 2 => 'ก.พ.', 3 => 'มี.ค.', 4 => 'เม.ย.',
        5 => 'พ.ค.', 6 => 'มิ.ย.', 7 => 'ก.ค.', 8 => 'ส.ค.',
        9 => 'ก.ย.', 10 => 'ต.ค.', 11 => 'พ.ย.', 12 => 'ธ.ค.'
    ];
    
    $day = date('j', $timestamp);
    $month = $thaiMonths[(int)date('n', $timestamp)];
    $year = date('Y', $timestamp) + 543;
    
    return "{$day} {$month} {$year}";
}

/**
 * Format currency
 */
function formatCurrency($amount) {
    return number_format($amount, 2) . ' บาท';
}

/**
 * Format number
 */
function formatNumber($number, $decimals = 0) {
    return number_format($number, $decimals);
}

/**
 * Generate random string
 */
function generateRandomString($length = 32) {
    return bin2hex(random_bytes($length / 2));
}

/**
 * Validate email
 */
function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

/**
 * Validate Thai phone number
 */
function validatePhone($phone) {
    $phone = preg_replace('/[^0-9]/', '', $phone);
    return preg_match('/^0[0-9]{9}$/', $phone);
}

/**
 * Upload file
 */
function uploadFile($file, $allowedTypes, $maxSize = MAX_UPLOAD_SIZE, $destination = UPLOAD_PATH) {
    if (!isset($file) || $file['error'] !== UPLOAD_ERR_OK) {
        return ['success' => false, 'error' => 'ไม่พบไฟล์ที่อัปโหลด'];
    }
    
    // Check file size
    if ($file['size'] > $maxSize) {
        return ['success' => false, 'error' => 'ขนาดไฟล์ใหญ่เกินไป'];
    }
    
    // Check file type
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mimeType = finfo_file($finfo, $file['tmp_name']);
    finfo_close($finfo);
    
    if (!in_array($mimeType, $allowedTypes)) {
        return ['success' => false, 'error' => 'ประเภทไฟล์ไม่ถูกต้อง'];
    }
    
    // Check file extension
    $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    if (!in_array($extension, ALLOWED_FILE_EXTENSIONS)) {
        return ['success' => false, 'error' => 'นามสกุลไฟล์ไม่ถูกต้อง'];
    }
    
    // Generate unique filename
    $newFilename = time() . '_' . bin2hex(random_bytes(8)) . '.' . $extension;
    $uploadPath = $destination . $newFilename;
    
    // Create directory if not exists
    if (!file_exists($destination)) {
        mkdir($destination, 0777, true);
    }
    
    // Move uploaded file
    if (move_uploaded_file($file['tmp_name'], $uploadPath)) {
        return [
            'success' => true,
            'filename' => $newFilename,
            'path' => $uploadPath,
            'url' => str_replace(PUBLIC_PATH, PUBLIC_URL, $uploadPath)
        ];
    }
    
    return ['success' => false, 'error' => 'ไม่สามารถอัปโหลดไฟล์ได้'];
}

/**
 * Delete file
 */
function deleteFile($filePath) {
    if (file_exists($filePath)) {
        return unlink($filePath);
    }
    return false;
}

/**
 * Get file size in human readable format
 */
function getFileSize($bytes) {
    $units = ['B', 'KB', 'MB', 'GB', 'TB'];
    $bytes = max($bytes, 0);
    $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
    $pow = min($pow, count($units) - 1);
    $bytes /= (1 << (10 * $pow));
    return round($bytes, 2) . ' ' . $units[$pow];
}

/**
 * Generate pagination
 */
function paginate($totalRecords, $currentPage = 1, $itemsPerPage = ITEMS_PER_PAGE) {
    $totalPages = ceil($totalRecords / $itemsPerPage);
    $currentPage = max(1, min($currentPage, $totalPages));
    $offset = ($currentPage - 1) * $itemsPerPage;
    
    return [
        'total_records' => $totalRecords,
        'total_pages' => $totalPages,
        'current_page' => $currentPage,
        'items_per_page' => $itemsPerPage,
        'offset' => $offset,
        'has_previous' => $currentPage > 1,
        'has_next' => $currentPage < $totalPages
    ];
}

/**
 * Log activity
 */
function logActivity($message, $type = 'info') {
    $logFile = LOGS_PATH . date('Y-m-d') . '.log';
    $timestamp = date('Y-m-d H:i:s');
    $userEmail = getCurrentUserEmail() ?? 'guest';
    $log = "[{$timestamp}] [{$type}] [{$userEmail}] {$message}" . PHP_EOL;
    file_put_contents($logFile, $log, FILE_APPEND);
}

/**
 * Generate PromptPay QR Code URL
 */
function generatePromptPayQR($amount) {
    $promptpayID = PROMPTPAY_NUMBER;
    $amount = number_format($amount, 2, '.', '');
    
    // PromptPay QR format
    $qrData = "00020101021129370016A000000677010111{$promptpayID}5802TH5303764{$amount}6304";
    
    // Generate QR code using Google Charts API
    return "https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=" . urlencode($qrData);
}

/**
 * Calculate days difference
 */
function daysDifference($date1, $date2 = null) {
    $date2 = $date2 ?? date('Y-m-d');
    $datetime1 = new DateTime($date1);
    $datetime2 = new DateTime($date2);
    $interval = $datetime1->diff($datetime2);
    return $interval->days;
}

/**
 * Get Thai day name
 */
function getThaiDayName($date) {
    $timestamp = strtotime($date);
    $dayNames = [
        'Sunday' => 'วันอาทิตย์',
        'Monday' => 'วันจันทร์',
        'Tuesday' => 'วันอังคาร',
        'Wednesday' => 'วันพุธ',
        'Thursday' => 'วันพฤหัสบดี',
        'Friday' => 'วันศุกร์',
        'Saturday' => 'วันเสาร์'
    ];
    $dayName = date('l', $timestamp);
    return $dayNames[$dayName] ?? '';
}

/**
 * Debug function
 */
function dd($data) {
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
    die();
}

/**
 * Get status badge HTML
 */
function getStatusBadge($status) {
    $badges = [
        'pending' => '<span class="badge bg-warning">รอดำเนินการ</span>',
        'approved' => '<span class="badge bg-success">อนุมัติ</span>',
        'rejected' => '<span class="badge bg-danger">ปฏิเสธ</span>',
        'published' => '<span class="badge bg-primary">เผยแพร่แล้ว</span>',
        'draft' => '<span class="badge bg-secondary">ฉบับร่าง</span>',
        'archived' => '<span class="badge bg-dark">เก็บถาวร</span>',
        'expired' => '<span class="badge bg-danger">หมดอายุ</span>',
        'cancelled' => '<span class="badge bg-secondary">ยกเลิก</span>'
    ];
    
    return $badges[$status] ?? '<span class="badge bg-secondary">' . escape($status) . '</span>';
}

} // End of if (!function_exists('sanitize'))
