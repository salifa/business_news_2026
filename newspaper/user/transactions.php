<?php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../classes/Credit.php';

requireLogin();

$credit = new Credit();
$userEmail = getCurrentUserEmail();

// Get filter
$filter = isset($_GET['filter']) ? sanitize($_GET['filter']) : 'all';
$page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;

// Get data based on filter
if ($filter === 'payments') {
    $data = $credit->getUserPayments($userEmail, null, $page);
    $pageTitle = 'รายการชำระเงิน';
} elseif ($filter === 'usage') {
    $data = $credit->getCreditLog($userEmail, $page);
    $pageTitle = 'ประวัติการใช้เครดิต';
} else {
    // Show both - payments first
    $payments = $credit->getUserPayments($userEmail, null, $page);
    $usage = $credit->getCreditLog($userEmail, 1);
    $data = array_merge($payments, array_slice($usage, 0, 5));
    $pageTitle = 'ประวัติการใช้งานทั้งหมด';
}

// Get user credits
$userCredits = $credit->getUserCredits($userEmail);
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ประวัติการใช้งาน - <?php echo NEWSPAPER_NAME; ?></title>
    
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
        
        .stat-box {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
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
                    <a class="nav-link active" href="transactions.php">
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
            
            <!-- Credit Summary -->
            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="stat-box">
                        <h6 class="mb-2">เครดิตคงเหลือ</h6>
                        <h2 class="mb-0"><?php echo number_format($userCredits['credits']); ?></h2>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stat-box">
                        <h6 class="mb-2">เครดิตที่ซื้อทั้งหมด</h6>
                        <h2 class="mb-0"><?php echo number_format($userCredits['total_purchased']); ?></h2>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stat-box">
                        <h6 class="mb-2">เครดิตที่ใช้ไป</h6>
                        <h2 class="mb-0"><?php echo number_format($userCredits['total_used']); ?></h2>
                    </div>
                </div>
            </div>
            
            <div class="content-card">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2>
                        <i class="fas fa-history text-primary"></i> <?php echo $pageTitle; ?>
                    </h2>
                </div>
                
                <!-- Filters -->
                <div class="mb-3">
                    <div class="btn-group" role="group">
                        <a href="?filter=all" class="btn btn-outline-secondary <?php echo $filter === 'all' ? 'active' : ''; ?>">
                            ทั้งหมด
                        </a>
                        <a href="?filter=payments" class="btn btn-outline-primary <?php echo $filter === 'payments' ? 'active' : ''; ?>">
                            การชำระเงิน
                        </a>
                        <a href="?filter=usage" class="btn btn-outline-info <?php echo $filter === 'usage' ? 'active' : ''; ?>">
                            การใช้เครดิต
                        </a>
                    </div>
                </div>
                
                <!-- Transactions Table -->
                <?php if (empty($data)): ?>
                    <div class="text-center py-5">
                        <i class="fas fa-inbox fa-4x text-muted mb-3"></i>
                        <p class="text-muted">ยังไม่มีรายการ</p>
                    </div>
                <?php else: ?>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>วันที่</th>
                                    <th>รายการ</th>
                                    <th>เครดิต</th>
                                    <th>ยอดคงเหลือ</th>
                                    <th>สถานะ</th>
                                    <th>การดำเนินการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $item): ?>
                                <tr>
                                    <td><?php echo formatDateTime($item['created_at']); ?></td>
                                    <td>
                                        <?php if (isset($item['amount'])): ?>
                                            <!-- Payment transaction -->
                                            <strong>ซื้อเครดิต</strong><br>
                                            <small class="text-muted">
                                                <?php echo formatCurrency($item['amount']); ?>
                                                <?php if (!empty($item['reference_number'])): ?>
                                                    (<?php echo escape($item['reference_number']); ?>)
                                                <?php endif; ?>
                                            </small>
                                        <?php else: ?>
                                            <!-- Credit usage -->
                                            <strong><?php echo escape($item['description']); ?></strong><br>
                                            <small class="text-muted">
                                                <?php echo ucfirst($item['transaction_type']); ?>
                                            </small>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if (isset($item['amount'])): ?>
                                            <span class="text-success">+<?php echo number_format($item['credits']); ?></span>
                                        <?php else: ?>
                                            <?php if ($item['credits_change'] > 0): ?>
                                                <span class="text-success">+<?php echo number_format($item['credits_change']); ?></span>
                                            <?php else: ?>
                                                <span class="text-danger"><?php echo number_format($item['credits_change']); ?></span>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php 
                                        if (isset($item['balance_after'])) {
                                            echo number_format($item['balance_after']);
                                        } else {
                                            echo '-';
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php if (isset($item['status'])): ?>
                                            <?php echo getStatusBadge($item['status']); ?>
                                        <?php else: ?>
                                            <span class="badge bg-success">เสร็จสิ้น</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if (isset($item['status']) && $item['status'] === 'pending' && empty($item['slip_image'])): ?>
                                            <a href="upload-slip.php?payment_id=<?php echo $item['id']; ?>" 
                                               class="btn btn-sm btn-outline-primary">
                                                <i class="fas fa-upload"></i> อัปโหลดสลิป
                                            </a>
                                        <?php elseif (isset($item['slip_image']) && !empty($item['slip_image'])): ?>
                                            <a href="<?php echo UPLOAD_URL . $item['slip_image']; ?>" 
                                               target="_blank" class="btn btn-sm btn-outline-secondary">
                                                <i class="fas fa-file"></i> ดูสลิป
                                            </a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
