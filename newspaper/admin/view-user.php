<?php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../classes/User.php';
require_once __DIR__ . '/../classes/Credit.php';
require_once __DIR__ . '/../classes/Advertisement.php';

requireAdmin();

$userClass = new User();
$credit = new Credit();
$ad = new Advertisement();

// Get user email from query string
$userEmail = isset($_GET['email']) ? sanitize($_GET['email']) : '';

if (!$userEmail) {
    setFlash('error', 'ไม่พบข้อมูลผู้ใช้');
    redirect(BASE_URL . 'admin/manage-users.php');
}

// Get user data
$userData = $userClass->getUserByEmail($userEmail);

if (!$userData) {
    setFlash('error', 'ไม่พบข้อมูลผู้ใช้');
    redirect(BASE_URL . 'admin/manage-users.php');
}

// Get user credits
$userCredits = $credit->getUserCredits($userEmail);

// Get user advertisements
$userAds = Database::getInstance()->query(
    "SELECT * FROM placard WHERE email = :email ORDER BY created_at DESC LIMIT 10",
    [':email' => $userEmail]
);

// Get user payment history
$userPayments = Database::getInstance()->query(
    "SELECT * FROM credit_transactions WHERE owner_id = :email ORDER BY buy_timestamp DESC LIMIT 10",
    [':email' => $userEmail]
);

// Get statistics
$adStats = Database::getInstance()->queryOne(
    "SELECT 
        COUNT(*) as total,
        SUM(CASE WHEN status = 'pending' THEN 1 ELSE 0 END) as pending,
        SUM(CASE WHEN status = 'approved' THEN 1 ELSE 0 END) as approved,
        SUM(CASE WHEN status = 'published' THEN 1 ELSE 0 END) as published,
        SUM(CASE WHEN status = 'rejected' THEN 1 ELSE 0 END) as rejected
    FROM placard 
    WHERE email = :email",
    [':email' => $userEmail]
);

$creditStats = Database::getInstance()->queryOne(
    "SELECT 
        COALESCE(SUM(CASE WHEN approved = 'yes' THEN coin ELSE 0 END), 0) as total_purchased,
        COUNT(CASE WHEN approved = 'pending' OR approved IS NULL THEN 1 END) as pending_purchases
    FROM credit_transactions 
    WHERE owner_id = :email",
    [':email' => $userEmail]
);
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายละเอียดผู้ใช้ - <?php echo NEWSPAPER_NAME; ?></title>
    
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
            text-align: center;
            padding: 20px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-radius: 10px;
            margin-bottom: 15px;
        }
        
        .stat-box h3 {
            font-size: 2rem;
            margin-bottom: 5px;
        }
        
        .stat-box p {
            margin: 0;
            opacity: 0.9;
        }
        
        .info-label {
            font-weight: 600;
            color: #666;
            margin-bottom: 5px;
        }
        
        .info-value {
            font-size: 1.1rem;
            margin-bottom: 15px;
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
                    <a class="nav-link" href="dashboard.php">
                        <i class="fas fa-tachometer-alt"></i> แดชบอร์ด
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="manage-users.php">
                        <i class="fas fa-users"></i> จัดการผู้ใช้
                    </a>
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
    <div class="row mb-3">
        <div class="col">
            <a href="manage-users.php" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left"></i> กลับไปหน้าจัดการผู้ใช้
            </a>
        </div>
    </div>

    <div class="row">
        <!-- User Information -->
        <div class="col-md-4">
            <div class="content-card">
                <h4 class="mb-4">
                    <i class="fas fa-user-circle text-primary"></i> ข้อมูลผู้ใช้
                </h4>
                
                <div class="info-label">ชื่อ-นามสกุล</div>
                <div class="info-value"><?php echo escape($userData['fullname']) ?: '-'; ?></div>
                
                <div class="info-label">อีเมล</div>
                <div class="info-value"><?php echo escape($userData['email']); ?></div>
                
                <div class="info-label">สถานะบัญชี</div>
                <div class="info-value">
                    <?php if ($userData['active'] == 1): ?>
                        <span class="badge bg-success">เปิดใช้งาน</span>
                    <?php else: ?>
                        <span class="badge bg-warning">ปิดใช้งาน</span>
                    <?php endif; ?>
                </div>
                
                <div class="info-label">ระดับผู้ใช้</div>
                <div class="info-value">
                    <?php if (isset($userData['groupid']) && in_array($userData['groupid'], ['admin', '1'])): ?>
                        <span class="badge bg-danger">ผู้ดูแลระบบ</span>
                    <?php else: ?>
                        <span class="badge bg-secondary">ผู้ใช้ทั่วไป</span>
                    <?php endif; ?>
                </div>
                
                <div class="info-label">เข้าสู่ระบบล่าสุด</div>
                <div class="info-value">
                    <?php echo $userData['reset_date'] ? formatThaiDate($userData['reset_date']) : '-'; ?>
                </div>
                
                <hr>
                
                <div class="stat-box">
                    <h3><?php echo number_format($userCredits['credits'] ?? 0); ?></h3>
                    <p>เครดิตคงเหลือ</p>
                </div>
            </div>
        </div>
        
        <!-- Statistics -->
        <div class="col-md-8">
            <div class="content-card">
                <h4 class="mb-4">
                    <i class="fas fa-chart-bar text-primary"></i> สถิติการใช้งาน
                </h4>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="border rounded p-3">
                            <h5 class="text-muted mb-2">
                                <i class="fas fa-newspaper"></i> ประกาศทั้งหมด
                            </h5>
                            <h2 class="mb-0"><?php echo number_format($adStats['total']); ?></h2>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="border rounded p-3">
                            <h5 class="text-muted mb-2">
                                <i class="fas fa-clock"></i> รอตรวจสอบ
                            </h5>
                            <h2 class="mb-0 text-warning"><?php echo number_format($adStats['pending']); ?></h2>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="border rounded p-3">
                            <h5 class="text-muted mb-2">
                                <i class="fas fa-check-circle"></i> อนุมัติแล้ว
                            </h5>
                            <h2 class="mb-0 text-success"><?php echo number_format($adStats['approved']); ?></h2>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="border rounded p-3">
                            <h5 class="text-muted mb-2">
                                <i class="fas fa-print"></i> เผยแพร่แล้ว
                            </h5>
                            <h2 class="mb-0 text-info"><?php echo number_format($adStats['published']); ?></h2>
                        </div>
                    </div>
                </div>
                
                <hr class="my-4">
                
                <h5 class="mb-3">
                    <i class="fas fa-coins text-warning"></i> สรุปเครดิต
                </h5>
                
                <div class="row">
                    <div class="col-md-6">
                        <p class="mb-2">
                            <strong>เครดิตที่ซื้อทั้งหมด:</strong>
                            <span class="text-success"><?php echo number_format($creditStats['total_purchased']); ?> เครดิต</span>
                        </p>
                    </div>
                    <div class="col-md-6">
                        <p class="mb-2">
                            <strong>รอการอนุมัติ:</strong>
                            <span class="text-warning"><?php echo number_format($creditStats['pending_purchases']); ?> รายการ</span>
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Recent Advertisements -->
            <div class="content-card">
                <h4 class="mb-4">
                    <i class="fas fa-newspaper text-primary"></i> ประกาศล่าสุด
                </h4>
                
                <?php if (empty($userAds)): ?>
                    <p class="text-muted text-center py-3">ยังไม่มีประกาศ</p>
                <?php else: ?>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>หัวข้อ</th>
                                    <th>สถานะ</th>
                                    <th>วันที่</th>
                                    <th>จัดการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($userAds as $advertisement): ?>
                                    <tr>
                                        <td><?php echo escape(substr($advertisement['title'], 0, 50)) . (strlen($advertisement['title']) > 50 ? '...' : ''); ?></td>
                                        <td><?php echo getStatusBadge($advertisement['status']); ?></td>
                                        <td><?php echo formatThaiDate($advertisement['created_at']); ?></td>
                                        <td>
                                            <a href="manage-advertisements.php?filter=all&highlight=<?php echo $advertisement['id']; ?>" 
                                               class="btn btn-sm btn-outline-primary">
                                                <i class="fas fa-eye"></i> ดู
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
            
            <!-- Recent Payments -->
            <div class="content-card">
                <h4 class="mb-4">
                    <i class="fas fa-credit-card text-primary"></i> ประวัติการชำระเงินล่าสุด
                </h4>
                
                <?php if (empty($userPayments)): ?>
                    <p class="text-muted text-center py-3">ยังไม่มีประวัติการชำระเงิน</p>
                <?php else: ?>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>แพ็คเกจ</th>
                                    <th>จำนวนเครดิต</th>
                                    <th>ราคา</th>
                                    <th>สถานะ</th>
                                    <th>วันที่</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($userPayments as $payment): ?>
                                    <tr>
                                        <td><?php echo escape($payment['package']); ?></td>
                                        <td><?php echo number_format($payment['coin'] ?? 0); ?> เครดิต</td>
                                        <td>฿<?php echo number_format($payment['amouth'] ?? 0, 2); ?></td>
                                        <td>
                                            <?php if ($payment['approved'] === 'yes'): ?>
                                                <span class="badge bg-success">อนุมัติแล้ว</span>
                                            <?php elseif ($payment['approved'] === 'pending' || $payment['approved'] === null): ?>
                                                <span class="badge bg-warning">รอตรวจสอบ</span>
                                            <?php else: ?>
                                                <span class="badge bg-danger">ปฏิเสธ</span>
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo formatThaiDate($payment['buy_timestamp']); ?></td>
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
