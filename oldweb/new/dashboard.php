<?php
require_once 'config/db-config.php';
requireLogin();

$user_id = $_SESSION['user_id'];
$is_admin = isAdmin();
$credits = getUserCredits($user_id);

// Get user's placards
$conn = getDBConnection();
$sql = "SELECT * FROM placard WHERE owner_id = ? ORDER BY create_date DESC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $user_id);
$stmt->execute();
$placards = $stmt->get_result();

// Get recent transactions
$sql = "SELECT * FROM credit_transactions WHERE owner_id = ? ORDER BY buy_timestamp DESC LIMIT 5";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $user_id);
$stmt->execute();
$transactions = $stmt->get_result();

$conn->close();
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - VNNBIZS</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Prompt&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Prompt', sans-serif;
            background-color: #f5f7fa;
        }
        .navbar {
            background: linear-gradient(135deg, #2193b0 0%, #6dd5ed 100%);
        }
        .welcome-card {
            background: linear-gradient(135deg, #2193b0 0%, #6dd5ed 100%);
            color: white;
            border-radius: 15px;
            padding: 30px;
            margin-bottom: 30px;
        }
        .action-card {
            background: white;
            border-radius: 15px;
            padding: 25px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: all 0.3s;
            height: 100%;
        }
        .action-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }
        .action-card i {
            font-size: 3rem;
            margin-bottom: 15px;
        }
        .placard-card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 15px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .stats-box {
            background: white;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            text-align: center;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .stats-box .number {
            font-size: 2.5rem;
            font-weight: bold;
            color: #2193b0;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="dashboard.php"><strong>VNNBIZS</strong></a>
            <div class="navbar-nav ms-auto">
                <span class="navbar-text text-white me-3">
                    <i class="fas fa-user"></i> <?php echo escape($_SESSION['fullname']); ?>
                </span>
                <?php if ($is_admin): ?>
                    <a class="btn btn-outline-light btn-sm me-2" href="admin-approve.php">
                        <i class="fas fa-shield-alt"></i> Admin
                    </a>
                <?php endif; ?>
                <a class="btn btn-outline-light btn-sm" href="logout.php">ออกจากระบบ</a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <!-- Welcome Section -->
        <div class="welcome-card">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h2><i class="fas fa-hand-sparkles"></i> สวัสดี, <?php echo escape($_SESSION['fullname']); ?></h2>
                    <p class="mb-0">ยินดีต้อนรับสู่ระบบลงประกาศบริษัท VNNBIZS</p>
                </div>
                <div class="col-md-4 text-end">
                    <h4><i class="fas fa-coins"></i> เครดิตคงเหลือ</h4>
                    <h1 class="display-4"><?php echo escape($credits); ?> เหรียญ</h1>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <h4 class="mb-3">เมนูหลัก</h4>
        <div class="row mb-4">
            <div class="col-md-4 mb-3">
                <a href="create-placard.php" class="text-decoration-none">
                    <div class="action-card">
                        <i class="fas fa-newspaper text-primary"></i>
                        <h5>สร้างประกาศ</h5>
                        <p class="text-muted mb-0">ลงประกาศเชิญประชุมผู้ถือหุ้น</p>
                    </div>
                </a>
            </div>
            
            <div class="col-md-4 mb-3">
                <a href="add-credit.php" class="text-decoration-none">
                    <div class="action-card">
                        <i class="fas fa-wallet text-success"></i>
                        <h5>เติมเครดิต</h5>
                        <p class="text-muted mb-0">เพิ่มเหรียญสำหรับลงประกาศ</p>
                    </div>
                </a>
            </div>
            
            <div class="col-md-4 mb-3">
                <a href="index.html" class="text-decoration-none">
                    <div class="action-card">
                        <i class="fas fa-home text-info"></i>
                        <h5>หน้าแรก</h5>
                        <p class="text-muted mb-0">กลับไปหน้าหลักเว็บไซต์</p>
                    </div>
                </a>
            </div>
        </div>

        <!-- Statistics -->
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="stats-box">
                    <i class="fas fa-newspaper fa-2x text-primary mb-2"></i>
                    <div class="number"><?php echo $placards->num_rows; ?></div>
                    <div class="text-muted">ประกาศทั้งหมด</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stats-box">
                    <i class="fas fa-check-circle fa-2x text-success mb-2"></i>
                    <div class="number">
                        <?php 
                        $placards->data_seek(0);
                        $published = 0;
                        while($p = $placards->fetch_assoc()) {
                            if ($p['publish'] == 'On') $published++;
                        }
                        echo $published;
                        ?>
                    </div>
                    <div class="text-muted">เผยแพร่แล้ว</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stats-box">
                    <i class="fas fa-coins fa-2x text-warning mb-2"></i>
                    <div class="number"><?php echo escape($credits); ?></div>
                    <div class="text-muted">เหรียญคงเหลือ</div>
                </div>
            </div>
        </div>

        <!-- Recent Placards -->
        <h4 class="mb-3"><i class="fas fa-history"></i> ประกาศของฉัน</h4>
        <?php 
        $placards->data_seek(0);
        if ($placards->num_rows > 0): 
        ?>
            <?php while($placard = $placards->fetch_assoc()): ?>
                <div class="placard-card">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h5 class="mb-2">
                                <?php echo escape($placard['subject']); ?>
                                <?php if ($placard['publish'] == 'On'): ?>
                                    <span class="badge bg-success">เผยแพร่</span>
                                <?php else: ?>
                                    <span class="badge bg-secondary">ปิดการเผยแพร่</span>
                                <?php endif; ?>
                            </h5>
                            <p class="mb-1"><strong>บริษัท:</strong> <?php echo escape($placard['companyname']); ?></p>
                            <p class="mb-1">
                                <i class="fas fa-calendar"></i> ประชุม: <?php echo date('d/m/Y', strtotime($placard['meeting_date'])); ?>
                                <?php echo date('H:i', strtotime($placard['meeting_time'])); ?> น.
                            </p>
                            <small class="text-muted">
                                <i class="fas fa-clock"></i> สร้างเมื่อ: <?php echo date('d/m/Y H:i', strtotime($placard['create_date'])); ?>
                            </small>
                        </div>
                        <div class="col-md-4 text-end">
                            <?php if (!empty($placard['pdf_file1'])): ?>
                                <a href="<?php echo escape($placard['pdf_file1']); ?>" target="_blank" class="btn btn-sm btn-outline-primary mb-1">
                                    <i class="fas fa-file-pdf"></i> ดู PDF
                                </a>
                            <?php endif; ?>
                            <?php if (!empty($placard['image1'])): ?>
                                <a href="<?php echo escape($placard['image1']); ?>" target="_blank" class="btn btn-sm btn-outline-info mb-1">
                                    <i class="fas fa-image"></i> ดูรูป
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <div class="alert alert-info text-center">
                <i class="fas fa-info-circle"></i> คุณยังไม่มีประกาศ 
                <a href="create-placard.php" class="alert-link">สร้างประกาศแรกของคุณ</a>
            </div>
        <?php endif; ?>

        <!-- Recent Transactions -->
        <h4 class="mb-3 mt-5"><i class="fas fa-receipt"></i> ประวัติการเติมเครดิต</h4>
        <?php if ($transactions->num_rows > 0): ?>
            <div class="table-responsive">
                <table class="table table-hover bg-white rounded">
                    <thead class="table-light">
                        <tr>
                            <th>วันที่</th>
                            <th>แพ็คเกจ</th>
                            <th>จำนวนเงิน</th>
                            <th>เหรียญ</th>
                            <th>สถานะ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($trans = $transactions->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo date('d/m/Y H:i', strtotime($trans['buy_timestamp'])); ?></td>
                            <td><?php echo escape($trans['package']); ?></td>
                            <td><?php echo number_format($trans['amouth']); ?> บาท</td>
                            <td><span class="badge bg-info"><?php echo escape($trans['coin']); ?> เหรียญ</span></td>
                            <td>
                                <?php if ($trans['approved'] == 'yes'): ?>
                                    <span class="badge bg-success">อนุมัติแล้ว</span>
                                <?php elseif ($trans['approved'] == 'pending'): ?>
                                    <span class="badge bg-warning">รอการอนุมัติ</span>
                                <?php else: ?>
                                    <span class="badge bg-danger">ปฏิเสธ</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <div class="alert alert-info text-center">
                <i class="fas fa-info-circle"></i> ยังไม่มีประวัติการเติมเครดิต
                <a href="add-credit.php" class="alert-link">เติมเครดิตเลย</a>
            </div>
        <?php endif; ?>
    </div>

    <div class="mb-5"></div>

    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
