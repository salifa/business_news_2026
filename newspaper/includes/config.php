<?php
/**
 * Configuration File
 * Online Newspaper System
 */

// Prevent direct access
if (!defined('APP_NAME')) {
    define('APP_NAME', 'Online Newspaper System');
}

// Environment
define('ENVIRONMENT', 'development'); // development, production

// Database Configuration
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'vnnsbiz2026');
define('DB_NAME', 'vnnsbiz');
define('DB_CHARSET', 'utf8mb4');

// Application Settings
define('BASE_URL', 'https://vnn.mac.in.th/newspaper/');
define('BASE_PATH', '/websites/vnn.mac.in.th/newspaper/');

// Paths
define('PUBLIC_PATH', BASE_PATH . 'public/');
define('ASSETS_PATH', PUBLIC_PATH . 'assets/');
define('UPLOAD_PATH', ASSETS_PATH . 'uploads/');
define('NEWSPAPER_PATH', PUBLIC_PATH . 'newspapers/');
define('TEMP_PATH', BASE_PATH . 'temp/');
define('LOGS_PATH', BASE_PATH . 'logs/');

// PDF Generation paths
define('GENERATED_PDF_PATH', BASE_PATH . 'generated_pdfs/');
define('FONTS_PATH', BASE_PATH . 'fonts/');
define('PYTHON_PATH', '/websites/vnn.mac.in.th/.venv/bin/python');
define('SCRIPTS_PATH', BASE_PATH . 'scripts/');

// URLs
define('PUBLIC_URL', BASE_URL . 'public/');
define('ASSETS_URL', PUBLIC_URL . 'assets/');
define('UPLOAD_URL', ASSETS_URL . 'uploads/');
define('NEWSPAPER_URL', PUBLIC_URL . 'newspapers/pdf/');

// Session Settings
define('SESSION_NAME', 'NEWSPAPER_SESSION');
define('SESSION_LIFETIME', 7776000); // 3 months (90 days) in seconds
define('REMEMBER_ME_LIFETIME', 2592000); // 30 days in seconds

// Security Settings
define('HASH_ALGO', PASSWORD_BCRYPT);
define('HASH_COST', 12);
define('CSRF_TOKEN_NAME', 'csrf_token');
define('CSRF_TOKEN_LIFETIME', 3600); // 1 hour

// File Upload Settings
define('MAX_UPLOAD_SIZE', 10485760); // 10MB in bytes
define('ALLOWED_IMAGE_TYPES', ['image/jpeg', 'image/jpg', 'image/png', 'image/gif']);
define('ALLOWED_PDF_TYPES', ['application/pdf']);
define('ALLOWED_FILE_EXTENSIONS', ['jpg', 'jpeg', 'png', 'gif', 'pdf']);

// Newspaper Settings
define('NEWSPAPER_NAME', 'หนังสือพิมพ์ เครือข่ายบัญชี');
define('NEWSPAPER_ISSN', 'ISSN 2408-2015');
define('NEWSPAPER_LICENSE', 'เลขที่ใบอนุญาต สสช27/2558');
define('NEWSPAPER_PAGE_SIZE', 'A4'); // A4, Letter
define('MAX_ADS_PER_PAGE', 4);
define('NEWSPAPER_GENERATION_TIME', '23:00:00');

// Credit Settings
define('CREDIT_PER_AD', 1);
define('CREDIT_PER_FULLPAGE_AD', 2);

// Payment Settings
define('PAYMENT_BANK_NAME', 'ธนาคารกสิกรไทย');
define('PAYMENT_BANK_ACCOUNT', '123-4-56789-0');
define('PAYMENT_ACCOUNT_NAME', 'บริษัท วีเอ็นเอ็น จำกัด');
define('PROMPTPAY_NUMBER', '0123456789');
define('PAYMENT_SLIP_EXPIRE_DAYS', 7);

// Email Settings
define('SMTP_ENABLE', true);
define('SMTP_HOST', 'smtp.gmail.com');
define('SMTP_PORT', 587);
define('SMTP_USER', 'salifa@gmail.com');
define('SMTP_PASS', 'ehhcixtxrsitxvhr');
define('SMTP_FROM_EMAIL', 'salifa@gmail.com');
define('SMTP_FROM_NAME', NEWSPAPER_NAME);

// Admin Settings
define('ADMIN_EMAIL', 'admin@vnn.mac.in.th');
define('ITEMS_PER_PAGE', 20);

// Date & Time Settings
define('TIMEZONE', 'Asia/Bangkok');
define('DATE_FORMAT', 'd/m/Y');
define('TIME_FORMAT', 'H:i:s');
define('DATETIME_FORMAT', 'd/m/Y H:i:s');

// Error Reporting
if (ENVIRONMENT === 'development') {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
} else {
    error_reporting(0);
    ini_set('display_errors', 0);
    ini_set('log_errors', 1);
    ini_set('error_log', LOGS_PATH . 'error.log');
}

// Set timezone
date_default_timezone_set(TIMEZONE);

// Set default charset
ini_set('default_charset', 'UTF-8');
mb_internal_encoding('UTF-8');

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    // Set session cookie parameters for 3 months
    ini_set('session.cookie_lifetime', SESSION_LIFETIME);
    ini_set('session.gc_maxlifetime', SESSION_LIFETIME);
    
    session_name(SESSION_NAME);
    session_start();
}

// Autoload classes
spl_autoload_register(function ($class) {
    $file = BASE_PATH . 'classes/' . $class . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
});

// Include helper functions
require_once BASE_PATH . 'includes/functions.php';
