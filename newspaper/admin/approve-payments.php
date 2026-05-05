<?php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../classes/Credit.php';

requireAdmin();

$credit = new Credit();

// Handle actions
$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['csrf_token']) || !verifyCsrfToken($_POST['csrf_token'])) {
        $error = 'Invalid request';
    } else {
        $paymentId = (int)$_POST['payment_id'];
        $action = $_POST['action'];
        
        if ($action === 'approve') {
            // Use user ID instead of email for admin ID
            $adminId = getCurrentUserId() ?? 1;
            $result = $credit->approvePayment($paymentId, $adminId);
            
            if ($result['success']) {
                setFlash('success', $result['message']);
            } else {
                setFlash('error', $result['message']);
            }
        } elseif ($action === 'reject') {
            $reason = sanitize($_POST['reason']);
            $adminId = getCurrentUserId() ?? 1;
            $result = $credit->rejectPayment($paymentId, $adminId, $reason);
            
            if ($result['success']) {
                setFlash('success', $result['message']);
            } else {
                setFlash('error', $result['message']);
            }
        }
        
        redirect(BASE_URL . 'admin/approve-payments.php');
    }
}

// Get all payments
$filter = isset($_GET['filter']) ? sanitize($_GET['filter']) : 'pending';
$page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
$payments = $credit->getAllPayments($filter, $page);
$pendingCount = $credit->countPendingPayments();
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>อนุมัติการชำระเงิน - <?php echo NEWSPAPER_NAME; ?></title>
    
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
        
        .slip-preview {
            max-width: 100%;
            max-height: 400px;
            cursor: pointer;
            border-radius: 10px;
        }
        
        .payment-card {
            border: 2px solid #e9ecef;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            transition: all 0.2s;
        }
        
        .payment-card:hover {
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
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
                    <a class="nav-link active" href="approve-payments.php">
                        <i class="fas fa-money-check-alt"></i> อนุมัติการชำระเงิน
                        <?php if ($pendingCount > 0): ?>
                            <span class="badge bg-danger"><?php echo $pendingCount; ?></span>
                        <?php endif; ?>
                    </a>
                    <a class="nav-link" href="manage-advertisements.php">
                        <i class="fas fa-newspaper"></i> จัดการประกาศ
                    </a>
                    <a class="nav-link" href="manage-users.php">
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
            <!-- Flash Messages -->
            <?php foreach (getFlash() as $flash): ?>
                <div class="alert alert-<?php echo $flash['type']; ?> alert-dismissible fade show" role="alert">
                    <?php echo $flash['message']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endforeach; ?>
            
            <div class="content-card">
                <h2 class="mb-4">
                    <i class="fas fa-money-check-alt text-primary"></i> อนุมัติการชำระเงิน
                </h2>
                
                <!-- Filters -->
                <div class="mb-4">
                    <div class="btn-group" role="group">
                        <a href="?filter=pending" class="btn btn-outline-warning <?php echo $filter === 'pending' ? 'active' : ''; ?>">
                            รอตรวจสอบ (<?php echo $pendingCount; ?>)
                        </a>
                        <a href="?filter=approved" class="btn btn-outline-success <?php echo $filter === 'approved' ? 'active' : ''; ?>">
                            อนุมัติแล้ว
                        </a>
                        <a href="?filter=rejected" class="btn btn-outline-danger <?php echo $filter === 'rejected' ? 'active' : ''; ?>">
                            ปฏิเสธแล้ว
                        </a>
                        <a href="?filter=all" class="btn btn-outline-secondary <?php echo $filter === 'all' ? 'active' : ''; ?>">
                            ทั้งหมด
                        </a>
                    </div>
                </div>
                
                <!-- Payments List -->
                <?php if (empty($payments)): ?>
                    <div class="text-center py-5">
                        <i class="fas fa-inbox fa-4x text-muted mb-3"></i>
                        <p class="text-muted">ไม่มีรายการชำระเงิน</p>
                    </div>
                <?php else: ?>
                    <?php foreach ($payments as $payment): ?>
                        <div class="payment-card">
                            <div class="row">
                                <div class="col-md-8">
                                    <h5>
                                        <i class="fas fa-receipt"></i> 
                                        <?php echo escape($payment['reference_number']); ?>
                                        <?php echo getStatusBadge($payment['status']); ?>
                                    </h5>
                                    
                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <p class="mb-1">
                                                <strong><i class="fas fa-user"></i> ลูกค้า:</strong>
                                                <?php echo escape($payment['fullname']); ?>
                                            </p>
                                            <p class="mb-1">
                                                <strong><i class="fas fa-envelope"></i> อีเมล:</strong>
                                                <?php echo escape($payment['user_email']); ?>
                                            </p>
                                            <p class="mb-1">
                                                <strong><i class="fas fa-calendar"></i> วันที่สั่งซื้อ:</strong>
                                                <?php echo formatDateTime($payment['created_at']); ?>
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="mb-1">
                                                <strong><i class="fas fa-coins"></i> เครดิต:</strong>
                                                <span class="text-success"><?php echo number_format($payment['credits']); ?> เครดิต</span>
                                            </p>
                                            <p class="mb-1">
                                                <strong><i class="fas fa-money-bill-wave"></i> ยอดเงิน:</strong>
                                                <span class="text-danger"><?php echo formatCurrency($payment['amount']); ?></span>
                                            </p>
                                            <?php if (!empty($payment['transfer_date'])): ?>
                                                <p class="mb-1">
                                                    <strong><i class="fas fa-calendar-check"></i> วันที่โอน:</strong>
                                                    <?php echo formatThaiDate($payment['transfer_date']); ?>
                                                    <?php if (!empty($payment['transfer_time'])): ?>
                                                        <?php echo date('H:i น.', strtotime($payment['transfer_time'])); ?>
                                                    <?php endif; ?>
                                                </p>
                                            <?php endif; ?>
                                            <?php if (!empty($payment['bank_name'])): ?>
                                                <p class="mb-1">
                                                    <strong><i class="fas fa-university"></i> ธนาคาร:</strong>
                                                    <?php echo escape($payment['bank_name']); ?>
                                                </p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    
                                    <?php if (!empty($payment['rejection_reason'])): ?>
                                        <div class="alert alert-danger mt-3 mb-0">
                                            <strong><i class="fas fa-times-circle"></i> เหตุผลที่ปฏิเสธ:</strong><br>
                                            <?php echo escape($payment['rejection_reason']); ?>
                                        </div>
                                    <?php endif; ?>
                                    
                                    <?php if ($payment['status'] === 'pending'): ?>
                                        <div class="mt-3">
                                            <form method="POST" class="d-inline">
                                                <input type="hidden" name="csrf_token" value="<?php echo generateCsrfToken(); ?>">
                                                <input type="hidden" name="payment_id" value="<?php echo $payment['id']; ?>">
                                                <input type="hidden" name="action" value="approve">
                                                <button type="submit" class="btn btn-success" 
                                                        onclick="return confirm('ยืนยันการอนุมัติ?')">
                                                    <i class="fas fa-check"></i> อนุมัติ
                                                </button>
                                            </form>
                                            
                                            <button type="button" class="btn btn-danger" 
                                                    onclick="showRejectModal(<?php echo $payment['id']; ?>)">
                                                <i class="fas fa-times"></i> ปฏิเสธ
                                            </button>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                
                                <div class="col-md-4 text-center">
                                    <?php if (!empty($payment['slip_image'])): ?>
                                        <label class="form-label fw-bold">สลิปการโอนเงิน</label>
                                        <?php 
                                        $slipPath = UPLOAD_URL . $payment['slip_image'];
                                        $fileExtension = strtolower(pathinfo($payment['slip_image'], PATHINFO_EXTENSION));
                                        ?>
                                        
                                        <?php if ($fileExtension === 'pdf'): ?>
                                            <div>
                                                <a href="<?php echo $slipPath; ?>" target="_blank" class="btn btn-outline-primary">
                                                    <i class="fas fa-file-pdf fa-3x"></i><br>
                                                    ดูไฟล์ PDF
                                                </a>
                                            </div>
                                        <?php else: ?>
                                            <a href="<?php echo $slipPath; ?>" target="_blank">
                                                <img src="<?php echo $slipPath; ?>" 
                                                     alt="Payment Slip" class="slip-preview">
                                            </a>
                                            <div class="mt-2">
                                                <a href="<?php echo $slipPath; ?>" target="_blank" 
                                                   class="btn btn-sm btn-outline-secondary">
                                                    <i class="fas fa-search-plus"></i> ขยายรูป
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <div class="alert alert-warning">
                                            <i class="fas fa-exclamation-triangle"></i><br>
                                            ยังไม่ได้อัปโหลดสลิป
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<!-- Reject Modal -->
<div class="modal fade" id="rejectModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST">
                <div class="modal-header">
                    <h5 class="modal-title">ปฏิเสธการชำระเงิน</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="csrf_token" value="<?php echo generateCsrfToken(); ?>">
                    <input type="hidden" name="payment_id" id="reject_payment_id">
                    <input type="hidden" name="action" value="reject">
                    
                    <div class="mb-3">
                        <label for="reason" class="form-label fw-bold">เหตุผลที่ปฏิเสธ</label>
                        <textarea class="form-control" id="reason" name="reason" rows="4" required
                                  placeholder="เช่น: สลิปไม่ชัดเจน, จำนวนเงินไม่ถูกต้อง"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-times"></i> ปฏิเสธ
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
const rejectModal = new bootstrap.Modal(document.getElementById('rejectModal'));

function showRejectModal(paymentId) {
    document.getElementById('reject_payment_id').value = paymentId;
    rejectModal.show();
}
</script>
</body>
</html>
