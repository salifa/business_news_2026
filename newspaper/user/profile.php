<?php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../classes/User.php';

requireLogin();

$user = new User();
$userEmail = getCurrentUserEmail();
$userId = getCurrentUserId();

// Get user data
$userData = $user->getUserById($userId);

$error = '';
$success = '';

// Handle profile update
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_profile'])) {
    if (!isset($_POST['csrf_token']) || !verifyCsrfToken($_POST['csrf_token'])) {
        $error = 'Invalid request';
    } else {
        $fullname = sanitize($_POST['fullname']);
        $phone = sanitize($_POST['phone']);
        
        $result = $user->updateProfile($userId, $fullname, $phone);
        
        if ($result['success']) {
            $success = $result['message'];
            $userData = $user->getUserById($userId);
        } else {
            $error = $result['message'];
        }
    }
}

// Handle password change
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['change_password'])) {
    if (!isset($_POST['csrf_token']) || !verifyCsrfToken($_POST['csrf_token'])) {
        $error = 'Invalid request';
    } else {
        $currentPassword = $_POST['current_password'];
        $newPassword = $_POST['new_password'];
        $confirmPassword = $_POST['confirm_password'];
        
        if ($newPassword !== $confirmPassword) {
            $error = 'รหัสผ่านใหม่ไม่ตรงกัน';
        } else {
            $result = $user->changePassword($userId, $currentPassword, $newPassword);
            
            if ($result['success']) {
                $success = $result['message'];
            } else {
                $error = $result['message'];
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ตั้งค่าบัญชี - <?php echo NEWSPAPER_NAME; ?></title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;600;700&display=swap" rel="stylesheet">
    
    <style>
        * {
            font-family: 'Google Sans', sans-serif;
        }
        
        body {
            background: #f8f9fa;
        }
        
        .navbar-custom {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .content-card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom mb-4">
    <div class="container">
        <a class="navbar-brand fw-bold" href="<?php echo BASE_URL; ?>">
            <i class="fas fa-newspaper"></i>
            <?php echo NEWSPAPER_NAME; ?>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <span class="navbar-text text-white">
                        <i class="fas fa-user-circle"></i>
                        <?php echo escape($_SESSION['user_fullname']); ?>
                    </span>
                </li>
                <li class="nav-item ms-3">
                    <a class="btn btn-outline-light btn-sm" href="<?php echo BASE_URL; ?>public/logout.php">
                        <i class="fas fa-sign-out-alt"></i> ออกจากระบบ
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3">
            <div class="content-card">
                <nav class="nav flex-column">
                    <a class="nav-link" href="dashboard.php">
                        <i class="fas fa-home"></i> แดชบอร์ด
                    </a>
                    <a class="nav-link" href="create-advertisement.php">
                        <i class="fas fa-plus-circle"></i> ลงประกาศ
                    </a>
                    <a class="nav-link" href="my-advertisements.php">
                        <i class="fas fa-newspaper"></i> ประกาศของฉัน
                    </a>
                    <a class="nav-link" href="buy-credits.php">
                        <i class="fas fa-shopping-cart"></i> ซื้อเครดิต
                    </a>
                    <a class="nav-link" href="transactions.php">
                        <i class="fas fa-history"></i> ประวัติการใช้งาน
                    </a>
                    <a class="nav-link active" href="profile.php">
                        <i class="fas fa-user-cog"></i> ตั้งค่าบัญชี
                    </a>                    <a class="nav-link" href="<?php echo BASE_URL; ?>public/download.php" target="_blank">
                        <i class="fas fa-file-pdf"></i> ดูหนังสือพิมพ์
                    </a>                    
                    <?php if (isAdmin()): ?>
                        <hr class="my-3">
                        <div class="alert alert-danger mb-2 py-2 px-3">
                            <div class="text-center mb-1">
                                <i class="fas fa-shield-alt"></i> 
                                <strong>ADMIN MODE</strong>
                            </div>
                            <small>คุณเป็นแอดมิน - สามารถจัดการระบบได้</small>
                        </div>
                        <a class="nav-link bg-danger bg-opacity-10" href="<?php echo BASE_URL; ?>admin/dashboard.php">
                            <i class="fas fa-tachometer-alt"></i> <strong>แดชบอร์ดแอดมิน</strong>
                        </a>
                        <a class="nav-link" href="<?php echo BASE_URL; ?>admin/approve-payments.php">
                            <i class="fas fa-credit-card"></i> อนุมัติการชำระเงิน
                        </a>
                        <a class="nav-link" href="<?php echo BASE_URL; ?>admin/manage-advertisements.php">
                            <i class="fas fa-tasks"></i> จัดการประกาศ
                        </a>
                        <a class="nav-link" href="<?php echo BASE_URL; ?>admin/manage-users.php">
                            <i class="fas fa-users"></i> จัดการผู้ใช้
                        </a>
                    <?php endif; ?>
                </nav>
            </div>
        </div>
        
        <!-- Main Content -->
        <div class="col-md-9">
            <?php if ($error): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-circle"></i> <?php echo $error; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>
            
            <?php if ($success): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle"></i> <?php echo $success; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>
            
            <!-- Profile Information -->
            <div class="content-card">
                <h3 class="mb-4">
                    <i class="fas fa-user text-primary"></i> ข้อมูลส่วนตัว
                </h3>
                
                <form method="POST">
                    <input type="hidden" name="csrf_token" value="<?php echo generateCsrfToken(); ?>">
                    <input type="hidden" name="update_profile" value="1">
                    
                    <div class="mb-3">
                        <label for="email" class="form-label fw-bold">อีเมล</label>
                        <input type="email" class="form-control" id="email" 
                               value="<?php echo escape($userData['email']); ?>" disabled>
                        <small class="text-muted">ไม่สามารถเปลี่ยนอีเมลได้</small>
                    </div>
                    
                    <div class="mb-3">
                        <label for="fullname" class="form-label fw-bold">ชื่อ-นามสกุล</label>
                        <input type="text" class="form-control" id="fullname" name="fullname" 
                               value="<?php echo escape($userData['fullname']); ?>" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="phone" class="form-label fw-bold">เบอร์โทรศัพท์</label>
                        <input type="tel" class="form-control" id="phone" name="phone" 
                               value="<?php echo escape($userData['phone'] ?? ''); ?>" 
                               placeholder="0812345678">
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold">สถานะบัญชี</label>
                        <div>
                            <?php if ($userData['active'] == 1): ?>
                                <span class="badge bg-success">เปิดใช้งาน</span>
                            <?php else: ?>
                                <span class="badge bg-warning">รอยืนยันอีเมล</span>
                            <?php endif; ?>
                            
                            <?php if (isset($userData['groupid']) && $userData['groupid'] === 'admin'): ?>
                                <span class="badge bg-primary">ผู้ดูแลระบบ</span>
                            <?php else: ?>
                                <span class="badge bg-secondary">ผู้ใช้ทั่วไป</span>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold">วันที่สมัครสมาชิก</label>
                        <div><?php echo formatThaiDate($userData['reset_date'] ?? date('Y-m-d')); ?></div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary" 
                            style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border: none;">
                        <i class="fas fa-save"></i> บันทึกการเปลี่ยนแปลง
                    </button>
                </form>
            </div>
            
            <!-- Change Password -->
            <div class="content-card">
                <h3 class="mb-4">
                    <i class="fas fa-key text-primary"></i> เปลี่ยนรหัสผ่าน
                </h3>
                
                <form method="POST" id="passwordForm">
                    <input type="hidden" name="csrf_token" value="<?php echo generateCsrfToken(); ?>">
                    <input type="hidden" name="change_password" value="1">
                    
                    <div class="mb-3">
                        <label for="current_password" class="form-label fw-bold">รหัสผ่านปัจจุบัน</label>
                        <input type="password" class="form-control" id="current_password" 
                               name="current_password" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="new_password" class="form-label fw-bold">รหัสผ่านใหม่</label>
                        <input type="password" class="form-control" id="new_password" 
                               name="new_password" required minlength="6">
                        <small class="text-muted">อย่างน้อย 6 ตัวอักษร</small>
                    </div>
                    
                    <div class="mb-3">
                        <label for="confirm_password" class="form-label fw-bold">ยืนยันรหัสผ่านใหม่</label>
                        <input type="password" class="form-control" id="confirm_password" 
                               name="confirm_password" required minlength="6">
                    </div>
                    
                    <button type="submit" class="btn btn-warning">
                        <i class="fas fa-lock"></i> เปลี่ยนรหัสผ่าน
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
// Validate password match
document.getElementById('passwordForm').addEventListener('submit', function(e) {
    const newPassword = document.getElementById('new_password').value;
    const confirmPassword = document.getElementById('confirm_password').value;
    
    if (newPassword !== confirmPassword) {
        e.preventDefault();
        alert('รหัสผ่านใหม่ไม่ตรงกัน กรุณาตรวจสอบอีกครั้ง');
        return false;
    }
});
</script>
</body>
</html>
