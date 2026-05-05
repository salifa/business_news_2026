<?php
require_once 'config/db-config.php';
requireLogin();
requireAdmin();

// Handle approval/rejection
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate CSRF token
    if (!isset($_POST['csrf_token']) || !validateCSRFToken($_POST['csrf_token'])) {
        $error = "คำขอไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง";
    } else {
        $transaction_id = filter_var($_POST['transaction_id'], FILTER_VALIDATE_INT);
        $action = $_POST['action'];
        
        if (!$transaction_id) {
            $error = "ข้อมูลไม่ถูกต้อง";
        } elseif (!in_array($action, ['approve', 'reject'])) {
            $error = "การดำเนินการไม่ถูกต้อง";
        } else {
            $conn = getDBConnection();
            
            if ($action == 'approve') {
                $sql = "UPDATE credit_transactions SET approved = 'yes', approved_timestamp = NOW() WHERE id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $transaction_id);
                
                if ($stmt->execute()) {
                    $success = "อนุมัติการเติมเครดิตสำเร็จ";
                } else {
                    $error = "เกิดข้อผิดพลาดในการอนุมัติ";
                }
            } elseif ($action == 'reject') {
                $sql = "UPDATE credit_transactions SET approved = 'no', approved_timestamp = NOW() WHERE id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $transaction_id);
                
                if ($stmt->execute()) {
                    $success = "ปฏิเสธการเติมเครดิตสำเร็จ";
                } else {
                    $error = "เกิดข้อผิดพลาดในการปฏิเสธ";
                }
            }
            
            $conn->close();
        }
    }
}

// Get pending transactions
$conn = getDBConnection();
$sql = "SELECT ct.*, u.fullname, u.email 
        FROM credit_transactions ct
        LEFT JOIN online_placard_users u ON ct.owner_id = u.email
        ORDER BY 
            CASE WHEN ct.approved = 'pending' THEN 0 ELSE 1 END,
            ct.buy_timestamp DESC";
$transactions = $conn->query($sql);

// Get statistics
$sql = "SELECT 
        COUNT(*) as total_transactions,
        SUM(CASE WHEN approved = 'pending' THEN 1 ELSE 0 END) as pending_count,
        SUM(CASE WHEN approved = 'yes' THEN 1 ELSE 0 END) as approved_count,
        SUM(CASE WHEN approved = 'yes' THEN amouth ELSE 0 END) as total_revenue
        FROM credit_transactions";
$stats = $conn->query($sql)->fetch_assoc();

$conn->close();
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>อนุมัติเครดิต - Admin</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Prompt&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Prompt', sans-serif;
            background-color: #f5f7fa;
        }
        .navbar {
            background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
        }
        .stats-card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        .stats-card .number {
            font-size: 2rem;
            font-weight: bold;
            color: #667eea;
        }
        .transaction-card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 15px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .transaction-card.pending {
            border-left: 5px solid #ffc107;
        }
        .transaction-card.approved {
            border-left: 5px solid #28a745;
        }
        .transaction-card.rejected {
            border-left: 5px solid #dc3545;
        }
        .slip-preview {
            max-width: 200px;
            max-height: 200px;
            cursor: pointer;
            border: 2px solid #ddd;
            border-radius: 5px;
        }
        .badge-pending {
            background-color: #ffc107;
        }
        .badge-approved {
            background-color: #28a745;
        }
        .badge-rejected {
            background-color: #dc3545;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="dashboard.php">
                <i class="fas fa-shield-alt"></i> <strong>ADMIN PANEL</strong>
            </a>
            <div class="navbar-nav ms-auto">
                <span class="navbar-text text-white me-3">
                    <i class="fas fa-user-shield"></i> <?php echo escape($_SESSION['fullname']); ?>
                </span>
                <a class="btn btn-outline-light btn-sm" href="dashboard.php">Dashboard</a>
                <a class="btn btn-outline-light btn-sm ms-2" href="logout.php">ออกจากระบบ</a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <h3 class="mb-4"><i class="fas fa-tasks"></i> จัดการคำขอเติมเครดิต</h3>

        <?php if (isset($success)): ?>
            <div class="alert alert-success alert-dismissible fade show">
                <i class="fas fa-check-circle"></i> <?php echo escape($success); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>
        
        <?php if (isset($error)): ?>
            <div class="alert alert-danger alert-dismissible fade show">
                <i class="fas fa-exclamation-circle"></i> <?php echo escape($error); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <!-- Statistics -->
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="stats-card text-center">
                    <i class="fas fa-clock fa-2x text-warning mb-2"></i>
                    <div class="number"><?php echo $stats['pending_count']; ?></div>
                    <div class="text-muted">รออนุมัติ</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card text-center">
                    <i class="fas fa-check-circle fa-2x text-success mb-2"></i>
                    <div class="number"><?php echo $stats['approved_count']; ?></div>
                    <div class="text-muted">อนุมัติแล้ว</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card text-center">
                    <i class="fas fa-receipt fa-2x text-primary mb-2"></i>
                    <div class="number"><?php echo $stats['total_transactions']; ?></div>
                    <div class="text-muted">รายการทั้งหมด</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card text-center">
                    <i class="fas fa-money-bill-wave fa-2x text-info mb-2"></i>
                    <div class="number"><?php echo number_format($stats['total_revenue']); ?></div>
                    <div class="text-muted">รายได้ (บาท)</div>
                </div>
            </div>
        </div>

        <!-- Transactions List -->
        <div class="row">
            <div class="col-12">
                <?php if ($transactions->num_rows > 0): ?>
                    <?php while($trans = $transactions->fetch_assoc()): ?>
                        <div class="transaction-card <?php echo strtolower($trans['approved']); ?>">
                            <div class="row align-items-center">
                                <div class="col-md-2">
                                    <strong>รหัส: #<?php echo $trans['id']; ?></strong><br>
                                    <small class="text-muted">
                                        <?php echo date('d/m/Y H:i', strtotime($trans['buy_timestamp'])); ?>
                                    </small>
                                </div>
                                
                                <div class="col-md-3">
                                    <i class="fas fa-user"></i> <?php echo $trans['fullname']; ?><br>
                                    <small class="text-muted"><?php echo $trans['email']; ?></small>
                                </div>
                                
                                <div class="col-md-2">
                                    <strong><?php echo $trans['package']; ?></strong><br>
                                    <span class="text-primary"><?php echo number_format($trans['amouth']); ?> บาท</span><br>
                                    <span class="badge bg-info"><?php echo $trans['coin']; ?> เหรียญ</span>
                                </div>
                                
                                <div class="col-md-2 text-center">
                                    <?php if (!empty($trans['slipup_upload'])): ?>
                                        <a href="<?php echo escape($trans['slipup_upload']); ?>" target="_blank">
                                            <img src="<?php echo escape($trans['slipup_upload']); ?>" 
                                                 class="slip-preview img-thumbnail" 
                                                 alt="Payment Slip"
                                                 onerror="this.src='data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 width=%22200%22 height=%22200%22><rect width=%22200%22 height=%22200%22 fill=%22%23ddd%22/><text x=%2250%25%22 y=%2250%25%22 text-anchor=%22middle%22 dy=%22.3em%22 fill=%22%23999%22>PDF</text></svg>'">
                                        </a>
                                        <br><small><i class="fas fa-eye"></i> คลิกดูสลิป</small>
                                    <?php else: ?>
                                        <span class="text-muted">ไม่มีสลิป</span>
                                    <?php endif; ?>
                                </div>
                                
                                <div class="col-md-2 text-center">
                                    <?php if ($trans['approved'] == 'pending'): ?>
                                        <span class="badge badge-pending mb-2">รออนุมัติ</span><br>
                                        <form method="POST" style="display: inline;">
                                            <input type="hidden" name="csrf_token" value="<?php echo generateCSRFToken(); ?>">
                                            <input type="hidden" name="transaction_id" value="<?php echo escape($trans['id']); ?>">
                                            <button type="submit" name="action" value="approve" 
                                                    class="btn btn-success btn-sm mb-1"
                                                    onclick="return confirm('ยืนยันการอนุมัติ?')">
                                                <i class="fas fa-check"></i> อนุมัติ
                                            </button>
                                        </form>
                                        <form method="POST" style="display: inline;">
                                            <input type="hidden" name="csrf_token" value="<?php echo generateCSRFToken(); ?>">
                                            <input type="hidden" name="transaction_id" value="<?php echo escape($trans['id']); ?>">
                                            <button type="submit" name="action" value="reject" 
                                                    class="btn btn-danger btn-sm"
                                                    onclick="return confirm('ยืนยันการปฏิเสธ?')">
                                                <i class="fas fa-times"></i> ปฏิเสธ
                                            </button>
                                        </form>
                                    <?php elseif ($trans['approved'] == 'yes'): ?>
                                        <span class="badge badge-approved">
                                            <i class="fas fa-check-circle"></i> อนุมัติแล้ว
                                        </span><br>
                                        <small class="text-muted">
                                            <?php echo date('d/m/Y H:i', strtotime($trans['approved_timestamp'])); ?>
                                        </small>
                                    <?php else: ?>
                                        <span class="badge badge-rejected">
                                            <i class="fas fa-times-circle"></i> ปฏิเสธแล้ว
                                        </span><br>
                                        <small class="text-muted">
                                            <?php echo date('d/m/Y H:i', strtotime($trans['approved_timestamp'])); ?>
                                        </small>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <div class="alert alert-info text-center">
                        <i class="fas fa-info-circle"></i> ไม่มีรายการเติมเครดิต
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
