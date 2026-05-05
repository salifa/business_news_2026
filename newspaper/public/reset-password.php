<?php
/**
 * Reset Password Page
 * Reset password with token
 */

require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/database.php';
require_once __DIR__ . '/../includes/functions.php';

// If already logged in, redirect to dashboard
if (isLoggedIn()) {
    header('Location: ' . BASE_URL . 'user/dashboard.php');
    exit;
}

$token = $_GET['token'] ?? '';
$message = '';
$messageType = '';
$validToken = false;
$user = null;

// Verify token
if (empty($token)) {
    $message = 'ลิงก์รีเซ็ตรหัสผ่านไม่ถูกต้อง';
    $messageType = 'danger';
} else {
    try {
        $db = Database::getInstance()->getConnection();
        
        $stmt = $db->prepare("
            SELECT ID, email, fullname, reset_token, reset_date 
            FROM online_placard_users 
            WHERE reset_token = ? AND active = 1
        ");
        $stmt->execute([$token]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if (!$user) {
            $message = 'ลิงก์รีเซ็ตรหัสผ่านไม่ถูกต้อง';
            $messageType = 'danger';
        } elseif (strtotime($user['reset_date']) < time()) {
            $message = 'ลิงก์รีเซ็ตรหัสผ่านหมดอายุแล้ว กรุณาขอลิงก์ใหม่';
            $messageType = 'danger';
        } else {
            $validToken = true;
        }
        
    } catch (Exception $e) {
        $message = 'เกิดข้อผิดพลาด กรุณาลองใหม่อีกครั้ง';
        $messageType = 'danger';
        error_log("Reset password verification error: " . $e->getMessage());
    }
}

// Handle password reset
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $validToken) {
    $password = $_POST['password'] ?? '';
    $confirmPassword = $_POST['confirm_password'] ?? '';
    
    if (empty($password) || empty($confirmPassword)) {
        $message = 'กรุณากรอกรหัสผ่านทั้งสองช่อง';
        $messageType = 'danger';
    } elseif ($password !== $confirmPassword) {
        $message = 'รหัสผ่านไม่ตรงกัน';
        $messageType = 'danger';
    } elseif (strlen($password) < 6) {
        $message = 'รหัสผ่านต้องมีอย่างน้อย 6 ตัวอักษร';
        $messageType = 'danger';
    } else {
        try {
            $db = Database::getInstance()->getConnection();
            
            // Hash new password
            $hashedPassword = password_hash($password, HASH_ALGO, ['cost' => HASH_COST]);
            
            // Update password and clear reset token
            $stmt = $db->prepare("
                UPDATE online_placard_users 
                SET password = ?, reset_token = NULL, reset_date = NULL 
                WHERE reset_token = ?
            ");
            $stmt->execute([$hashedPassword, $token]);
            
            if ($stmt->rowCount() > 0) {
                $message = 'รีเซ็ตรหัสผ่านสำเร็จ คุณสามารถเข้าสู่ระบบด้วยรหัสผ่านใหม่ได้แล้ว';
                $messageType = 'success';
                $validToken = false; // Prevent form from showing again
                
                // Send confirmation email
                $subject = 'รหัสผ่านของคุณถูกเปลี่ยนแล้ว - ' . NEWSPAPER_NAME;
                $emailBody = "
                <html>
                <head>
                    <style>
                        body { font-family: 'Google Sans', Arial, sans-serif; }
                        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
                        .header { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 30px; text-align: center; }
                        .content { background: #f8f9fa; padding: 30px; }
                        .footer { text-align: center; padding: 20px; color: #666; font-size: 12px; }
                    </style>
                </head>
                <body>
                    <div class='container'>
                        <div class='header'>
                            <h1>รหัสผ่านถูกเปลี่ยนแล้ว</h1>
                        </div>
                        <div class='content'>
                            <p>สวัสดีคุณ {$user['fullname']}</p>
                            <p>รหัสผ่านของคุณถูกเปลี่ยนเรียบร้อยแล้ว</p>
                            <p>หากคุณไม่ได้ทำการเปลี่ยนรหัสผ่านนี้ กรุณาติดต่อเราทันที</p>
                            <p>เวลาที่เปลี่ยน: " . date('d/m/Y H:i:s') . "</p>
                        </div>
                        <div class='footer'>
                            <p>" . NEWSPAPER_NAME . "</p>
                            <p>อีเมลนี้ถูกส่งโดยอัตโนมัติ กรุณาอย่าตอบกลับ</p>
                        </div>
                    </div>
                </body>
                </html>
                ";
                
                // Send confirmation email using PHPMailer SMTP
                sendEmail($user['email'], $subject, $emailBody);
                
            } else {
                $message = 'ไม่สามารถรีเซ็ตรหัสผ่านได้ กรุณาลองใหม่อีกครั้ง';
                $messageType = 'danger';
            }
            
        } catch (Exception $e) {
            $message = 'เกิดข้อผิดพลาด กรุณาลองใหม่อีกครั้ง';
            $messageType = 'danger';
            error_log("Reset password error: " . $e->getMessage());
        }
    }
}
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รีเซ็ตรหัสผ่าน - <?php echo NEWSPAPER_NAME; ?></title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;600;700&display=swap" rel="stylesheet">
    
    <style>
        * {
            font-family: 'Google Sans', sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .reset-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.2);
            overflow: hidden;
            max-width: 450px;
            width: 100%;
        }
        
        .reset-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 40px 30px;
            text-align: center;
        }
        
        .reset-body {
            padding: 40px 30px;
        }
        
        .btn-primary-custom {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            padding: 12px;
            border-radius: 10px;
            font-weight: 600;
        }
        
        .btn-primary-custom:hover {
            background: linear-gradient(135deg, #764ba2 0%, #667eea 100%);
        }
        
        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }
        
        .password-strength {
            height: 5px;
            margin-top: 5px;
            border-radius: 3px;
            transition: all 0.3s;
        }
        
        .back-link {
            text-align: center;
            margin-top: 20px;
        }
        
        .back-link a {
            color: #667eea;
            text-decoration: none;
        }
        
        .back-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="reset-card">
    <div class="reset-header">
        <h1 class="h3 mb-2">
            <i class="fas fa-lock"></i>
            รีเซ็ตรหัสผ่าน
        </h1>
        <p class="mb-0"><?php echo NEWSPAPER_NAME; ?></p>
    </div>
    
    <div class="reset-body">
        <?php if ($message): ?>
            <div class="alert alert-<?php echo $messageType; ?> alert-dismissible fade show" role="alert">
                <?php echo $message; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>
        
        <?php if ($validToken): ?>
            <p class="text-muted mb-4">
                <i class="fas fa-user"></i> 
                <strong><?php echo htmlspecialchars($user['fullname']); ?></strong>
                <br>
                <small><?php echo htmlspecialchars($user['email']); ?></small>
            </p>
            
            <p class="text-muted mb-4">
                <i class="fas fa-info-circle"></i>
                กรุณากรอกรหัสผ่านใหม่ของคุณ
            </p>
            
            <form method="POST" action="" id="resetForm">
                <div class="mb-3">
                    <label for="password" class="form-label">
                        <i class="fas fa-key"></i> รหัสผ่านใหม่
                    </label>
                    <input type="password" class="form-control form-control-lg" id="password" name="password" 
                           placeholder="อย่างน้อย 6 ตัวอักษร" required minlength="6">
                    <div class="password-strength" id="strength"></div>
                    <small class="text-muted" id="strengthText"></small>
                </div>
                
                <div class="mb-3">
                    <label for="confirm_password" class="form-label">
                        <i class="fas fa-check-circle"></i> ยืนยันรหัสผ่าน
                    </label>
                    <input type="password" class="form-control form-control-lg" id="confirm_password" 
                           name="confirm_password" placeholder="กรอกรหัสผ่านอีกครั้ง" required minlength="6">
                </div>
                
                <button type="submit" class="btn btn-primary-custom btn-lg w-100">
                    <i class="fas fa-save"></i> บันทึกรหัสผ่านใหม่
                </button>
            </form>
        <?php else: ?>
            <div class="text-center">
                <i class="fas fa-times-circle fa-3x text-danger mb-3"></i>
                <p>ลิงก์รีเซ็ตรหัสผ่านไม่ถูกต้องหรือหมดอายุแล้ว</p>
            </div>
        <?php endif; ?>
        
        <div class="back-link">
            <a href="login.php">
                <i class="fas fa-arrow-left"></i> กลับไปหน้าเข้าสู่ระบบ
            </a>
            <?php if (!$validToken): ?>
                |
                <a href="forgot-password.php">
                    <i class="fas fa-redo"></i> ขอลิงก์ใหม่
                </a>
            <?php endif; ?>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
// Password strength meter
document.getElementById('password')?.addEventListener('input', function(e) {
    const password = e.target.value;
    const strength = document.getElementById('strength');
    const strengthText = document.getElementById('strengthText');
    
    let score = 0;
    if (password.length >= 6) score++;
    if (password.length >= 10) score++;
    if (/[a-z]/.test(password) && /[A-Z]/.test(password)) score++;
    if (/[0-9]/.test(password)) score++;
    if (/[^a-zA-Z0-9]/.test(password)) score++;
    
    const colors = ['#dc3545', '#ffc107', '#17a2b8', '#28a745'];
    const texts = ['อ่อนมาก', 'ปานกลาง', 'ดี', 'แข็งแรง'];
    
    if (password.length === 0) {
        strength.style.width = '0%';
        strength.style.backgroundColor = '';
        strengthText.textContent = '';
    } else {
        const percent = (score / 4) * 100;
        strength.style.width = percent + '%';
        strength.style.backgroundColor = colors[Math.min(score - 1, 3)];
        strengthText.textContent = 'ความแข็งแรง: ' + texts[Math.min(score - 1, 3)];
    }
});

// Confirm password validation
document.getElementById('resetForm')?.addEventListener('submit', function(e) {
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirm_password').value;
    
    if (password !== confirmPassword) {
        e.preventDefault();
        alert('รหัสผ่านไม่ตรงกัน');
    }
});
</script>
</body>
</html>
