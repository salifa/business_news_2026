<?php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../classes/Credit.php';

requireLogin();

$credit = new Credit();
$userEmail = getCurrentUserEmail();
$userCredits = $credit->getUserCredits($userEmail);

// Get recent payments
$recentPayments = $credit->getUserPayments($userEmail, null, 1);

// Get pending payment count
$pendingPayments = $credit->getUserPayments($userEmail, 'pending', 1);
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แดชบอร์ด - <?php echo NEWSPAPER_NAME; ?></title>
    
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
        
        .stat-card {
            background: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            margin-bottom: 20px;
            transition: transform 0.2s;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
        }
        
        .stat-icon {
            font-size: 2.5rem;
            margin-bottom: 10px;
        }
        
        .credit-balance {
            font-size: 3rem;
            font-weight: 700;
            color: #667eea;
        }
        
        .btn-primary-custom {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            padding: 10px 20px;
            border-radius: 10px;
            font-weight: 600;
        }
        
        .sidebar {
            background: white;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            margin-bottom: 20px;
        }
        
        .sidebar .nav-link {
            color: #333;
            padding: 12px 15px;
            border-radius: 8px;
            margin-bottom: 5px;
            transition: all 0.2s;
        }
        
        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }
        
        .sidebar .nav-link i {
            width: 20px;
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
            <div class="sidebar">
                <nav class="nav flex-column">
                    <a class="nav-link active" href="dashboard.php">
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
                    <a class="nav-link" href="profile.php">
                        <i class="fas fa-user-cog"></i> ตั้งค่าบัญชี
                    </a>
                    <a class="nav-link" href="<?php echo BASE_URL; ?>public/download.php" target="_blank">
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
            <!-- Flash Messages -->
            <?php foreach (getFlash() as $flash): ?>
                <div class="alert alert-<?php echo $flash['type']; ?> alert-dismissible fade show" role="alert">
                    <?php echo $flash['message']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endforeach; ?>
            
            <h2 class="mb-4">แดชบอร์ด</h2>
            
            <!-- Statistics -->
            <div class="row">
                <div class="col-md-4">
                    <div class="stat-card text-center">
                        <div class="stat-icon text-primary">
                            <i class="fas fa-coins"></i>
                        </div>
                        <h3>เครดิตคงเหลือ</h3>
                        <div class="credit-balance"><?php echo number_format($userCredits['credits']); ?></div>
                        <a href="buy-credits.php" class="btn btn-sm btn-primary-custom mt-3">
                            <i class="fas fa-plus"></i> เติมเครดิต
                        </a>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="stat-card text-center">
                        <div class="stat-icon text-success">
                            <i class="fas fa-file-alt"></i>
                        </div>
                        <h3>จำนวนประกาศ</h3>
                        <div class="credit-balance"><?php echo number_format($userCredits['total_used'] ?? 0); ?></div>
                        <a href="my-advertisements.php" class="btn btn-sm btn-outline-secondary mt-3">
                            ดูทั้งหมด
                        </a>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="stat-card text-center">
                        <div class="stat-icon text-info">
                            <i class="fas fa-shopping-bag"></i>
                        </div>
                        <h3>เครดิตที่ซื้อ</h3>
                        <div class="credit-balance"><?php echo number_format($userCredits['total_purchased'] ?? 0); ?></div>
                        <a href="transactions.php" class="btn btn-sm btn-outline-secondary mt-3">
                            ดูประวัติ
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Quick Actions -->
            <div class="stat-card mt-4">
                <h4 class="mb-3">
                    <i class="fas fa-bolt text-warning"></i> ดำเนินการด่วน
                </h4>
                <div class="row g-3">
                    <div class="col-md-6">
                        <a href="create-advertisement.php" class="btn btn-primary-custom w-100 py-3">
                            <i class="fas fa-plus-circle"></i> ลงประกาศใหม่
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="buy-credits.php" class="btn btn-outline-primary w-100 py-3">
                            <i class="fas fa-shopping-cart"></i> ซื้อเครดิต
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Recent Payments -->
            <?php if (!empty($recentPayments)): ?>
            <div class="stat-card mt-4">
                <h4 class="mb-3">
                    <i class="fas fa-history"></i> รายการชำระเงินล่าสุด
                </h4>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>วันที่</th>
                                <th>แพ็กเกจ</th>
                                <th>จำนวนเงิน</th>
                                <th>เครดิต</th>
                                <th>สถานะ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach (array_slice($recentPayments, 0, 5) as $payment): ?>
                            <tr>
                                <td><?php echo formatThaiDate($payment['created_at']); ?></td>
                                <td><?php echo escape($payment['package_name'] ?? 'แพ็กเกจพิเศษ'); ?></td>
                                <td><?php echo formatCurrency($payment['amount']); ?></td>
                                <td><?php echo number_format($payment['credits']); ?> เครดิต</td>
                                <td><?php echo getStatusBadge($payment['status']); ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="text-center mt-3">
                    <a href="transactions.php" class="btn btn-sm btn-outline-secondary">
                        ดูทั้งหมด <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
            <?php endif; ?>
            
            <!-- Pending Notifications -->
            <?php if (count($pendingPayments) > 0): ?>
            <div class="alert alert-warning mt-4">
                <h5 class="alert-heading">
                    <i class="fas fa-exclamation-triangle"></i> แจ้งเตือน
                </h5>
                <p class="mb-0">
                    คุณมีรายการชำระเงิน <?php echo count($pendingPayments); ?> รายการที่รอการตรวจสอบ
                    <a href="transactions.php" class="alert-link">ดูรายละเอียด</a>
                </p>
            </div>
            <?php endif; ?>
            
            <!-- Help Section -->
            <div class="stat-card mt-4">
                <h4 class="mb-3">
                    <i class="fas fa-question-circle text-info"></i> ต้องการความช่วยเหลือ?
                </h4>
                <p class="mb-2">
                    <i class="fas fa-phone text-success"></i> โทร: 02-9825672, 064-2412040
                </p>
                <p class="mb-0">
                    <i class="fas fa-envelope text-primary"></i> อีเมล: <?php echo ADMIN_EMAIL; ?>
                </p>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
