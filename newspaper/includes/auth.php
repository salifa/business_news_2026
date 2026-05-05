<?php
/**
 * Authentication Functions
 * Handles user authentication and authorization
 * Note: isLoggedIn(), isAdmin(), getCurrentUserId() are in functions.php
 */

// Prevent direct access
if (!defined('APP_NAME')) {
    die('Direct access not permitted');
}

/**
 * Require user to be logged in
 */
if (!function_exists('requireLogin')) {
function requireLogin() {
    if (!isLoggedIn()) {
        $_SESSION['redirect_after_login'] = $_SERVER['REQUEST_URI'];
        redirect(BASE_URL . 'public/login.php');
    }
}
}

/**
 * Require user to be admin
 */
if (!function_exists('requireAdmin')) {
function requireAdmin() {
    if (!isLoggedIn()) {
        $_SESSION['redirect_after_login'] = $_SERVER['REQUEST_URI'];
        redirect(BASE_URL . 'public/login.php');
    }
    
    if (!isAdmin()) {
        http_response_code(403);
        die('Access denied. Admin privileges required.');
    }
}
}

/**
 * Get current user data
 */
if (!function_exists('getCurrentUser')) {
function getCurrentUser() {
    if (!isLoggedIn()) {
        return null;
    }
    
    static $user = null;
    
    if ($user === null) {
        // Return mock user for testing (users table doesn't exist yet)
        $user = [
            'id' => getCurrentUserId() ?? 1,
            'username' => 'admin',
            'email' => getCurrentUserEmail() ?? 'admin@vnn.mac.in.th',
            'fullname' => 'Administrator',
            'role' => $_SESSION['user_role'] ?? 'admin',
            'created_at' => date('Y-m-d H:i:s')
        ];
    }
    
    return $user;
}
}

/**
 * Login user
 */
if (!function_exists('loginUser')) {
function loginUser($userId, $role = 'user') {
    $_SESSION['user_id'] = $userId;
    $_SESSION['user_role'] = $role;
    $_SESSION['login_time'] = time();
    
    // Regenerate session ID to prevent session fixation
    session_regenerate_id(true);
}
}

/**
 * Logout user
 */
if (!function_exists('logoutUser')) {
function logoutUser() {
    // Unset all session variables
    $_SESSION = array();
    
    // Destroy the session cookie
    if (isset($_COOKIE[session_name()])) {
        setcookie(session_name(), '', time() - 42000, '/');
    }
    
    // Destroy the session
    session_destroy();
}
}

/**
 * Log activity
 */
if (!function_exists('logActivity')) {
function logActivity($message, $userId = null) {
    $userId = $userId ?? getCurrentUserId();
    
    try {
        $db = Database::getInstance();
        
        // Check if activity_logs table exists
        $tables = $db->query("SHOW TABLES LIKE 'activity_logs'");
        if (empty($tables)) {
            // Table doesn't exist, skip logging
            return;
        }
        
        $db->insert('activity_logs', [
            'user_id' => $userId,
            'message' => $message,
            'ip_address' => $_SERVER['REMOTE_ADDR'] ?? 'unknown',
            'user_agent' => $_SERVER['HTTP_USER_AGENT'] ?? '',
            'created_at' => date('Y-m-d H:i:s')
        ]);
    } catch (Exception $e) {
        // Silently fail if logging doesn't work
        error_log("Activity log failed: " . $e->getMessage());
    }
}
}
