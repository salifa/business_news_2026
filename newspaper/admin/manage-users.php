<?php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../classes/User.php';
require_once __DIR__ . '/../classes/Credit.php';

requireAdmin();

$user = new User();
$credit = new Credit();

// Get all users
$page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
$search = isset($_GET['search']) ? sanitize($_GET['search']) : '';

// Build query
$offset = ($page - 1) * ITEMS_PER_PAGE;
$params = [];
$sql = "SELECT opu.*, uc.credits 
        FROM online_placard_users opu
        LEFT JOIN user_credits uc ON opu.email = uc.user_email
        WHERE 1=1";

if ($search) {
    $sql .= " AND (opu.email LIKE :search OR opu.fullname LIKE :search)";
    $params[':search'] = "%{$search}%";
}

$sql .= " ORDER BY opu.reset_date DESC, opu.email ASC 
          LIMIT :limit OFFSET :offset";

Database::getInstance()->prepare($sql);
foreach ($params as $key => $value) {
    Database::getInstance()->bind($key, $value);
}
Database::getInstance()->bind(':limit', ITEMS_PER_PAGE, PDO::PARAM_INT);
Database::getInstance()->bind(':offset', $offset, PDO::PARAM_INT);

$users = Database::getInstance()->fetchAll();

// Get total count
$countSql = "SELECT COUNT(*) as count FROM online_placard_users opu WHERE 1=1";
if ($search) {
    $countSql .= " AND (opu.email LIKE :search OR opu.fullname LIKE :search)";
}
$totalUsers = Database::getInstance()->queryOne($countSql, $search ? [':search' => "%{$search}%"] : [])['count'];
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>จัดการผู้ใช้ - <?php echo NEWSPAPER_NAME; ?></title>
    
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
    </style>
</head>
<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom mb-4">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="<?php echo BASE_URL; ?>admin/">
            <i class="fas fa-shield-alt"></i>
            <?php echo NEWSPAPER_NAME; ?> - Admin
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo BASE_URL; ?>user/dashboard.php">
                        <i class="fas fa-user"></i> ไปยังหน้าผู้ใช้
                    </a>
                </li>
                <li class="nav-item">
                    <span class="navbar-text text-white">
                        <i class="fas fa-user-shield"></i>
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

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-2">
            <div class="sidebar">
                <nav class="nav flex-column">
                    <a class="nav-link" href="dashboard.php">
                        <i class="fas fa-home"></i> แดชบอร์ด
                    </a>
                    <a class="nav-link" href="approve-payments.php">
                        <i class="fas fa-money-check-alt"></i> อนุมัติการชำระเงิน
                    </a>
                    <a class="nav-link" href="manage-advertisements.php">
                        <i class="fas fa-newspaper"></i> จัดการประกาศ
                    </a>
                    <a class="nav-link active" href="manage-users.php">
                        <i class="fas fa-users"></i> จัดการผู้ใช้
                    </a>
                    <a class="nav-link" href="<?php echo BASE_URL; ?>public/download.php" target="_blank">
                        <i class="fas fa-download"></i> ดูหนังสือพิมพ์ทั้งหมด
                    </a>
                </nav>
            </div>
        </div>
        
        <!-- Main Content -->
        <div class="col-md-10">
            <div class="content-card">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2>
                        <i class="fas fa-users text-primary"></i> จัดการผู้ใช้
                    </h2>
                    <span class="badge bg-primary">ผู้ใช้ทั้งหมด: <?php echo number_format($totalUsers); ?></span>
                </div>
                
                <!-- Search -->
                <form method="GET" class="mb-4">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" 
                               placeholder="ค้นหาจากอีเมลหรือชื่อ..." 
                               value="<?php echo escape($search); ?>">
                        <button class="btn btn-primary" type="submit" 
                                style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border: none;">
                            <i class="fas fa-search"></i> ค้นหา
                        </button>
                        <?php if ($search): ?>
                            <a href="manage-users.php" class="btn btn-outline-secondary">
                                <i class="fas fa-times"></i> ล้าง
                            </a>
                        <?php endif; ?>
                    </div>
                </form>
                
                <!-- Users Table -->
                <?php if (empty($users)): ?>
                    <div class="text-center py-5">
                        <i class="fas fa-inbox fa-4x text-muted mb-3"></i>
                        <p class="text-muted">ไม่พบผู้ใช้</p>
                    </div>
                <?php else: ?>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>อีเมล</th>
                                    <th>ชื่อ-นามสกุล</th>
                                    <th>เครดิต</th>
                                    <th>ระดับ</th>
                                    <th>สถานะ</th>
                                    <th>วันที่สมัคร</th>
                                    <th>การดำเนินการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($users as $userData): ?>
                                <tr>
                                    <td><?php echo escape($userData['email']); ?></td>
                                    <td><?php echo escape($userData['fullname']); ?></td>
                                    <td>
                                        <span class="badge bg-success">
                                            <?php echo number_format($userData['credits'] ?? 0); ?> เครดิต
                                        </span>
                                    </td>
                                    <td>
                                        <?php if (isset($userData['groupid']) && $userData['groupid'] === 'admin'): ?>
                                            <span class="badge bg-danger">แอดมิน</span>
                                        <?php else: ?>
                                            <span class="badge bg-secondary">ผู้ใช้</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if ($userData['active'] == 1): ?>
                                            <span class="badge bg-success">เปิดใช้งาน</span>
                                        <?php else: ?>
                                            <span class="badge bg-warning">ปิดใช้งาน</span>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo formatThaiDate($userData['reset_date'] ?? date('Y-m-d')); ?></td>
                                    <td>
                                        <a href="view-user.php?email=<?php echo urlencode($userData['email']); ?>" 
                                           class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-eye"></i> ดูรายละเอียด
                                        </a>
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
