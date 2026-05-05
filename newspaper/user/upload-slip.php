<?php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../classes/Credit.php';

requireLogin();

$credit = new Credit();
$userEmail = getCurrentUserEmail();

// Get payment ID from URL
$paymentId = isset($_GET['payment_id']) ? (int)$_GET['payment_id'] : 0;

if (!$paymentId) {
    setFlash('error', 'ไม่พบรายการชำระเงิน');
    redirect(BASE_URL . 'user/transactions.php');
}

// Get payment details
$payment = $credit->getPaymentById($paymentId);

if (!$payment || $payment['user_email'] !== $userEmail) {
    setFlash('error', 'ไม่พบรายการชำระเงินหรือคุณไม่มีสิทธิ์เข้าถึง');
    redirect(BASE_URL . 'user/transactions.php');
}

// Handle form submission
$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['csrf_token']) || !verifyCsrfToken($_POST['csrf_token'])) {
        $error = 'Invalid request. Please try again.';
    } else {
        $transferDate = sanitize($_POST['transfer_date']);
        $transferTime = sanitize($_POST['transfer_time'] ?? null);
        $bankName = sanitize($_POST['bank_name'] ?? null);
        
        if (!isset($_FILES['slip_image']) || $_FILES['slip_image']['error'] !== UPLOAD_ERR_OK) {
            $error = 'กรุณาอัปโหลดสลิปการโอนเงิน';
        } else {
            $result = $credit->uploadPaymentSlip(
                $paymentId,
                $_FILES['slip_image'],
                $transferDate,
                $transferTime,
                $bankName
            );
            
            if ($result['success']) {
                setFlash('success', $result['message']);
                redirect(BASE_URL . 'user/transactions.php');
            } else {
                $error = $result['message'];
            }
        }
    }
}

// Generate PromptPay QR
$qrCodeUrl = generatePromptPayQR($payment['amount']);
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>อัปโหลดสลิป - <?php echo NEWSPAPER_NAME; ?></title>
    
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
        
        .qr-box {
            text-align: center;
            padding: 30px;
            background: #f8f9fa;
            border-radius: 10px;
        }
        
        .qr-image {
            max-width: 300px;
            border: 3px solid #667eea;
            border-radius: 10px;
            padding: 10px;
            background: white;
        }
        
        .preview-slip {
            max-width: 100%;
            max-height: 400px;
            border-radius: 10px;
            margin-top: 15px;
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
    <div class="row justify-content-center">
        <div class="col-md-10">
            <?php if ($error): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-circle"></i> <?php echo $error; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>
            
            <div class="content-card">
                <h2 class="mb-4">
                    <i class="fas fa-file-upload text-primary"></i> อัปโหลดสลิปการโอนเงิน
                </h2>
                
                <!-- Payment Details -->
                <div class="alert alert-info">
                    <h5 class="alert-heading">รายละเอียดการชำระเงิน</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <p class="mb-1">
                                <strong>เลขที่อ้างอิง:</strong> <?php echo escape($payment['reference_number']); ?>
                            </p>
                            <p class="mb-1">
                                <strong>จำนวนเงิน:</strong> 
                                <span class="h5 text-danger"><?php echo formatCurrency($payment['amount']); ?></span>
                            </p>
                        </div>
                        <div class="col-md-6">
                            <p class="mb-1">
                                <strong>เครดิตที่จะได้รับ:</strong> 
                                <span class="h5 text-success"><?php echo number_format($payment['credits']); ?> เครดิต</span>
                            </p>
                            <p class="mb-0">
                                <strong>สถานะ:</strong> <?php echo getStatusBadge($payment['status']); ?>
                            </p>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <!-- QR Code Section -->
                    <div class="col-md-6">
                        <div class="content-card">
                            <h5 class="mb-3">
                                <i class="fas fa-qrcode text-primary"></i> ชำระเงินผ่าน PromptPay
                            </h5>
                            <div class="qr-box">
                                <!-- Static QR Code Image (Recommended) -->
                                <div class="mb-3">
                                    <img src="https://vnn.mac.in.th/qr_promptpay2.png" 
                                         alt="QR Code สำหรับชำระเงิน" 
                                         class="qr-image">
                                    <p class="mt-2 mb-0">
                                        <small class="text-primary">
                                            <i class="fas fa-mobile-alt"></i> สแกน QR Code เพื่อชำระเงิน
                                        </small>
                                    </p>
                                </div>
                                
                                <!-- Dynamic QR Code (Fallback) - TEMPORARILY DISABLED -->
                                <?php /* 
                                // Will be enabled in the future when dynamic QR code is supported
                                if (!empty($qrCodeUrl)): ?>
                                <div class="mt-3 pt-3 border-top">
                                    <p class="mb-2"><small class="text-muted">หรือใช้ QR Code แบบไดนามิก:</small></p>
                                    <img src="<?php echo $qrCodeUrl; ?>" alt="PromptPay QR Code Dynamic" 
                                         class="qr-image" style="max-width: 200px;">
                                </div>
                                <?php endif; 
                                */ ?>
                                
                                <p class="mt-3 mb-0">
                                    <strong>เลขพร้อมเพย์:</strong><br>
                                    <span class="h5"><?php echo PROMPTPAY_NUMBER; ?></span>
                                </p>
                                <p class="mt-2 text-danger">
                                    <strong>จำนวนเงิน: <?php echo formatCurrency($payment['amount']); ?></strong>
                                </p>
                            </div>
                        </div>
                        
                        <div class="content-card mt-3">
                            <h6 class="mb-2">
                                <i class="fas fa-university text-success"></i> โอนเงินผ่านธนาคาร
                            </h6>
                            <p class="mb-1"><strong><?php echo PAYMENT_BANK_NAME; ?></strong></p>
                            <p class="mb-1">เลขที่บัญชี: <strong><?php echo PAYMENT_BANK_ACCOUNT; ?></strong></p>
                            <p class="mb-0">ชื่อบัญชี: <strong><?php echo PAYMENT_ACCOUNT_NAME; ?></strong></p>
                        </div>
                    </div>
                    
                    <!-- Upload Form -->
                    <div class="col-md-6">
                        <h5 class="mb-3">
                            <i class="fas fa-upload text-primary"></i> อัปโหลดสลิป
                        </h5>
                        
                        <form method="POST" enctype="multipart/form-data" id="uploadForm">
                            <input type="hidden" name="csrf_token" value="<?php echo generateCsrfToken(); ?>">
                            
                            <div class="mb-3">
                                <label for="slip_image" class="form-label fw-bold">
                                    สลิปการโอนเงิน <span class="text-danger">*</span>
                                </label>
                                <input type="file" class="form-control" id="slip_image" name="slip_image" 
                                       accept="image/*,.pdf" required>
                                <small class="text-muted">รูปภาพหรือ PDF (ไม่เกิน 10 MB)</small>
                                <div id="previewContainer"></div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="transfer_date" class="form-label fw-bold">
                                    วันที่โอนเงิน <span class="text-danger">*</span>
                                </label>
                                <input type="date" class="form-control" id="transfer_date" name="transfer_date" 
                                       max="<?php echo date('Y-m-d'); ?>" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="transfer_time" class="form-label fw-bold">เวลาที่โอนเงิน</label>
                                <input type="time" class="form-control" id="transfer_time" name="transfer_time">
                            </div>
                            
                            <div class="mb-3">
                                <label for="bank_name" class="form-label fw-bold">ธนาคารที่โอนจาก</label>
                                <select class="form-select" id="bank_name" name="bank_name">
                                    <option value="">-- เลือกธนาคาร --</option>
                                    <option value="ธนาคารกสิกรไทย">ธนาคารกสิกรไทย</option>
                                    <option value="ธนาคารกรุงเทพ">ธนาคารกรุงเทพ</option>
                                    <option value="ธนาคารไทยพาณิชย์">ธนาคารไทยพาณิชย์</option>
                                    <option value="ธนาคารกรุงไทย">ธนาคารกรุงไทย</option>
                                    <option value="ธนาคารกรุงศรีอยุธยา">ธนาคารกรุงศรีอยุธยา</option>
                                    <option value="ธนาคารทหารไทยธนชาต">ธนาคารทหารไทยธนชาต</option>
                                    <option value="PromptPay">PromptPay</option>
                                </select>
                            </div>
                            
                            <div class="alert alert-warning">
                                <i class="fas fa-info-circle"></i>
                                <small>
                                    หลังจากอัปโหลดสลิป แอดมินจะตรวจสอบภายใน 24 ชั่วโมง
                                    เครดิตจะถูกเพิ่มอัตโนมัติหลังอนุมัติ
                                </small>
                            </div>
                            
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary btn-lg" 
                                        style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border: none;">
                                    <i class="fas fa-cloud-upload-alt"></i> อัปโหลดสลิป
                                </button>
                                <a href="transactions.php" class="btn btn-outline-secondary">
                                    <i class="fas fa-arrow-left"></i> ดูรายการทั้งหมด
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
// Preview uploaded slip
document.getElementById('slip_image').addEventListener('change', function(e) {
    const file = e.target.files[0];
    const previewContainer = document.getElementById('previewContainer');
    
    if (file) {
        if (file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewContainer.innerHTML = `
                    <img src="${e.target.result}" class="preview-slip" alt="Preview">
                `;
            };
            reader.readAsDataURL(file);
        } else if (file.type === 'application/pdf') {
            previewContainer.innerHTML = `
                <div class="alert alert-info mt-3">
                    <i class="fas fa-file-pdf"></i> ${file.name}
                </div>
            `;
        }
    } else {
        previewContainer.innerHTML = '';
    }
});

// Set default date to today
document.getElementById('transfer_date').value = new Date().toISOString().split('T')[0];
</script>
</body>
</html>
