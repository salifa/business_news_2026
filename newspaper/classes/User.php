<?php
/**
 * User Class
 * Handles user authentication and management
 */

require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/database.php';

class User {
    private $db;
    
    public function __construct() {
        $this->db = Database::getInstance();
    }
    
    /**
     * Register new user
     */
    public function register($email, $password, $fullname) {
        // Validate email
        if (!validateEmail($email)) {
            return ['success' => false, 'message' => 'รูปแบบอีเมลไม่ถูกต้อง'];
        }
        
        // Check if email already exists
        if ($this->emailExists($email)) {
            return ['success' => false, 'message' => 'อีเมลนี้มีผู้ใช้งานแล้ว'];
        }
        
        // Validate password
        if (strlen($password) < 6) {
            return ['success' => false, 'message' => 'รหัสผ่านต้องมีอย่างน้อย 6 ตัวอักษร'];
        }
        
        // Hash password
        $hashedPassword = password_hash($password, HASH_ALGO, ['cost' => HASH_COST]);
        
        // Generate verification token
        $verificationToken = bin2hex(random_bytes(32));
        
        // Insert user
        $data = [
            'email' => $email,
            'password' => $hashedPassword,
            'fullname' => $fullname,
            'groupid' => NULL,
            'active' => 0,
            'reset_token' => $verificationToken,
            'reset_date' => date('Y-m-d H:i:s')
        ];
        
        $userId = $this->db->insert('online_placard_users', $data);
        
        if ($userId) {
            // Initialize user credits
            $this->db->insert('user_credits', [
                'user_email' => $email,
                'credits' => 0
            ]);
            
            // Add to user group
            $this->db->insert('online_placard_ugmembers', [
                'username' => $email,
                'groupid' => -2
            ]);
            
            logActivity("New user registered: {$email}");
            
            return [
                'success' => true,
                'message' => 'ลงทะเบียนสำเร็จ',
                'user_id' => $userId,
                'verification_token' => $verificationToken
            ];
        }
        
        return ['success' => false, 'message' => 'ไม่สามารถลงทะเบียนได้ กรุณาลองใหม่อีกครั้ง'];
    }
    
    /**
     * Login user
     */
    public function login($email, $password, $remember = false) {
        // Get user by email
        $user = $this->getUserByEmail($email);
        
        if (!$user) {
            return ['success' => false, 'message' => 'อีเมลหรือรหัสผ่านไม่ถูกต้อง'];
        }
        
        // Verify password
        if (!password_verify($password, $user['password'])) {
            return ['success' => false, 'message' => 'อีเมลหรือรหัสผ่านไม่ถูกต้อง'];
        }
        
        // Check if account is active
        if ($user['active'] == 0 && ENVIRONMENT === 'production') {
            return ['success' => false, 'message' => 'กรุณายืนยันอีเมลก่อนเข้าสู่ระบบ'];
        }
        
        // Create session
        $_SESSION['user_id'] = $user['ID'];
        $_SESSION['user_email'] = $user['email'];
        $_SESSION['user_fullname'] = $user['fullname'];
        $_SESSION['user_type'] = (in_array($user['groupid'], ['1', 'admin'], true)) ? 'admin' : 'user';
        $_SESSION['last_activity'] = time();
        
        // Handle remember me
        if ($remember) {
            $token = bin2hex(random_bytes(32));
            setcookie('remember_token', $token, time() + REMEMBER_ME_LIFETIME, '/', '', true, true);
            
            $this->db->update('online_placard_users', 
                ['reset_token' => $token],
                'ID = :id',
                [':id' => $user['ID']]
            );
        }
        
        // Update last login (using reset_date as last_login timestamp)
        $this->db->update('online_placard_users',
            ['reset_date' => date('Y-m-d H:i:s')],
            'ID = :id',
            [':id' => $user['ID']]
        );
        
        logActivity("User logged in: {$email}");
        
        return ['success' => true, 'message' => 'เข้าสู่ระบบสำเร็จ'];
    }
    
    /**
     * Logout user
     */
    public function logout() {
        $email = getCurrentUserEmail();
        
        // Clear session
        $_SESSION = [];
        session_destroy();
        
        // Clear remember me cookie
        if (isset($_COOKIE['remember_token'])) {
            setcookie('remember_token', '', time() - 3600, '/', '', true, true);
        }
        
        logActivity("User logged out: {$email}");
    }
    
    /**
     * Get user by email
     */
    public function getUserByEmail($email) {
        $sql = "SELECT * FROM online_placard_users WHERE email = :email LIMIT 1";
        return $this->db->queryOne($sql, [':email' => $email]);
    }
    
    /**
     * Get user by ID
     */
    public function getUserById($id) {
        $sql = "SELECT * FROM online_placard_users WHERE ID = :id LIMIT 1";
        return $this->db->queryOne($sql, [':id' => $id]);
    }
    
    /**
     * Check if email exists
     */
    public function emailExists($email) {
        return $this->db->exists('online_placard_users', 'email = :email', [':email' => $email]);
    }
    
    /**
     * Update profile
     */
    public function updateProfile($userId, $fullname, $phone = null) {
        $data = ['fullname' => $fullname];
        
        if ($phone !== null) {
            $data['phone'] = $phone;
        }
        
        $result = $this->db->update('online_placard_users', $data, 'id = :id', [':id' => $userId]);
        
        if ($result) {
            $_SESSION['user_fullname'] = $fullname;
            logActivity("Profile updated for user ID: {$userId}");
            return ['success' => true, 'message' => 'อัปเดตข้อมูลสำเร็จ'];
        }
        
        return ['success' => false, 'message' => 'ไม่สามารถอัปเดตข้อมูลได้'];
    }
    
    /**
     * Change password
     */
    public function changePassword($userId, $currentPassword, $newPassword) {
        $user = $this->getUserById($userId);
        
        if (!$user) {
            return ['success' => false, 'message' => 'ไม่พบผู้ใช้งาน'];
        }
        
        // Verify current password
        if (!password_verify($currentPassword, $user['password'])) {
            return ['success' => false, 'message' => 'รหัสผ่านปัจจุบันไม่ถูกต้อง'];
        }
        
        // Validate new password
        if (strlen($newPassword) < 6) {
            return ['success' => false, 'message' => 'รหัสผ่านใหม่ต้องมีอย่างน้อย 6 ตัวอักษร'];
        }
        
        // Hash new password
        $hashedPassword = password_hash($newPassword, HASH_ALGO, ['cost' => HASH_COST]);
        
        $result = $this->db->update('online_placard_users',
            ['password' => $hashedPassword],
            'id = :id',
            [':id' => $userId]
        );
        
        if ($result) {
            logActivity("Password changed for user ID: {$userId}");
            return ['success' => true, 'message' => 'เปลี่ยนรหัสผ่านสำเร็จ'];
        }
        
        return ['success' => false, 'message' => 'ไม่สามารถเปลี่ยนรหัสผ่านได้'];
    }
    
    /**
     * Request password reset
     */
    public function requestPasswordReset($email) {
        $user = $this->getUserByEmail($email);
        
        if (!$user) {
            // Don't reveal if email exists
            return ['success' => true, 'message' => 'หากอีเมลนี้มีในระบบ คุณจะได้รับลิงก์รีเซ็ตรหัสผ่าน'];
        }
        
        $resetToken = bin2hex(random_bytes(32));
        $resetExpiry = date('Y-m-d H:i:s', strtotime('+1 hour'));
        
        $this->db->update('online_placard_users',
            [
                'reset_token' => $resetToken,
                'reset_date' => $resetExpiry
            ],
            'ID = :id',
            [':id' => $user['ID']]
        );
        
        // Send reset email
        $resetLink = BASE_URL . "public/reset-password.php?token={$resetToken}";
        $subject = "รีเซ็ตรหัสผ่าน - " . NEWSPAPER_NAME;
        $body = "คลิกลิงก์ด้านล่างเพื่อรีเซ็ตรหัสผ่าน:<br><br>";
        $body .= "<a href='{$resetLink}'>{$resetLink}</a><br><br>";
        $body .= "ลิงก์นี้จะหมดอายุใน 1 ชั่วโมง";
        
        sendEmail($email, $subject, $body);
        
        logActivity("Password reset requested for: {$email}");
        
        return ['success' => true, 'message' => 'หากอีเมลนี้มีในระบบ คุณจะได้รับลิงก์รีเซ็ตรหัสผ่าน'];
    }
    
    /**
     * Reset password
     */
    public function resetPassword($token, $newPassword) {
        $sql = "SELECT * FROM online_placard_users 
                WHERE reset_token = :token 
                AND reset_date > :now 
                LIMIT 1";
        
        $user = $this->db->queryOne($sql, [
            ':token' => $token,
            ':now' => date('Y-m-d H:i:s')
        ]);
        
        if (!$user) {
            return ['success' => false, 'message' => 'ลิงก์รีเซ็ตรหัสผ่านไม่ถูกต้องหรือหมดอายุแล้ว'];
        }
        
        // Validate new password
        if (strlen($newPassword) < 6) {
            return ['success' => false, 'message' => 'รหัสผ่านต้องมีอย่างน้อย 6 ตัวอักษร'];
        }
        
        // Hash new password
        $hashedPassword = password_hash($newPassword, HASH_ALGO, ['cost' => HASH_COST]);
        
        $this->db->update('online_placard_users',
            [
                'password' => $hashedPassword,
                'reset_token' => null,
                'reset_date' => null
            ],
            'ID = :id',
            [':id' => $user['ID']]
        );
        
        logActivity("Password reset completed for: {$user['email']}");
        
        return ['success' => true, 'message' => 'รีเซ็ตรหัสผ่านสำเร็จ'];
    }
    
    /**
     * Verify email
     */
    public function verifyEmail($token) {
        $user = $this->db->queryOne(
            "SELECT * FROM online_placard_users WHERE reset_token = :token LIMIT 1",
            [':token' => $token]
        );
        
        if (!$user) {
            return ['success' => false, 'message' => 'ลิงก์ยืนยันอีเมลไม่ถูกต้อง'];
        }
        
        $this->db->update('online_placard_users',
            [
                'active' => 1,
                'reset_token' => null
            ],
            'ID = :id',
            [':id' => $user['ID']]
        );
        
        logActivity("Email verified for: {$user['email']}");
        
        return ['success' => true, 'message' => 'ยืนยันอีเมลสำเร็จ'];
    }
    
    /**
     * Get all users (admin only)
     */
    public function getAllUsers($page = 1, $search = '') {
        $offset = ($page - 1) * ITEMS_PER_PAGE;
        
        $whereClause = '';
        $params = [];
        
        if (!empty($search)) {
            $whereClause = "WHERE email LIKE :search OR fullname LIKE :search";
            $params[':search'] = "%{$search}%";
        }
        
        $sql = "SELECT * FROM online_placard_users {$whereClause} 
                ORDER BY id DESC 
                LIMIT :limit OFFSET :offset";
        
        $this->db->prepare($sql);
        foreach ($params as $key => $value) {
            $this->db->bind($key, $value);
        }
        $this->db->bind(':limit', ITEMS_PER_PAGE, PDO::PARAM_INT);
        $this->db->bind(':offset', $offset, PDO::PARAM_INT);
        
        return $this->db->fetchAll();
    }
    
    /**
     * Count total users
     */
    public function countUsers($search = '') {
        $whereClause = '';
        $params = [];
        
        if (!empty($search)) {
            $whereClause = "WHERE email LIKE :search OR fullname LIKE :search";
            $params[':search'] = "%{$search}%";
        }
        
        $result = $this->db->queryOne("SELECT COUNT(*) as count FROM online_placard_users {$whereClause}", $params);
        return $result['count'] ?? 0;
    }
}
