<?php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../classes/Advertisement.php';

requireLogin();

$ad = new Advertisement();
$userEmail = getCurrentUserEmail();

// Get statistics
$stats = $ad->getStatistics($userEmail);

// Get page number
$page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;

// Get filter
$statusFilter = isset($_GET['status']) ? sanitize($_GET['status']) : null;

// Get advertisements
$advertisements = $ad->getUserAdvertisements($userEmail, $statusFilter, $page);
$totalAds = $ad->countUserAdvertisements($userEmail, $statusFilter);
$pagination = paginate($totalAds, $page);
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ประกาศของฉัน - <?php echo NEWSPAPER_NAME; ?></title>
    
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
            border-radius: 10px;
            background: #f8f9fa;
        }
        
        .ad-card {
            border: 1px solid #dee2e6;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 15px;
            transition: all 0.2s;
        }
        
        .ad-card:hover {
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            transform: translateY(-2px);
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
                    <a class="nav-link active" href="my-advertisements.php">
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
            
            <div class="content-card">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2>
                        <i class="fas fa-newspaper text-primary"></i> ประกาศของฉัน
                    </h2>
                    <a href="create-advertisement.php" class="btn btn-primary" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border: none;">
                        <i class="fas fa-plus-circle"></i> ลงประกาศใหม่
                    </a>
                </div>
                
                <!-- Statistics -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="stat-box">
                            <h5><?php echo number_format($stats['total']); ?></h5>
                            <small class="text-muted">ทั้งหมด</small>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="stat-box">
                            <h5 class="text-warning"><?php echo number_format($stats['pending']); ?></h5>
                            <small class="text-muted">รอตรวจสอบ</small>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="stat-box">
                            <h5 class="text-success"><?php echo number_format($stats['approved']); ?></h5>
                            <small class="text-muted">อนุมัติแล้ว</small>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="stat-box">
                            <h5 class="text-danger"><?php echo number_format($stats['rejected']); ?></h5>
                            <small class="text-muted">ปฏิเสธ</small>
                        </div>
                    </div>
                </div>
                
                <!-- Filters -->
                <div class="mb-3">
                    <div class="btn-group" role="group">
                        <a href="?status=" class="btn btn-outline-secondary <?php echo !$statusFilter ? 'active' : ''; ?>">
                            ทั้งหมด
                        </a>
                        <a href="?status=pending" class="btn btn-outline-warning <?php echo $statusFilter === 'pending' ? 'active' : ''; ?>">
                            รอตรวจสอบ
                        </a>
                        <a href="?status=approved" class="btn btn-outline-success <?php echo $statusFilter === 'approved' ? 'active' : ''; ?>">
                            อนุมัติแล้ว
                        </a>
                        <a href="?status=published" class="btn btn-outline-info <?php echo $statusFilter === 'published' ? 'active' : ''; ?>">
                            เผยแพร่แล้ว (มี PDF)
                        </a>
                        <a href="?status=rejected" class="btn btn-outline-danger <?php echo $statusFilter === 'rejected' ? 'active' : ''; ?>">
                            ปฏิเสธ
                        </a>
                    </div>
                </div>
                
                <!-- Advertisements List -->
                <?php if (empty($advertisements)): ?>
                    <div class="text-center py-5">
                        <i class="fas fa-inbox fa-4x text-muted mb-3"></i>
                        <p class="text-muted">ยังไม่มีประกาศ</p>
                        <a href="create-advertisement.php" class="btn btn-primary">
                            <i class="fas fa-plus-circle"></i> ลงประกาศเลย
                        </a>
                    </div>
                <?php else: ?>
                    <?php foreach ($advertisements as $advertisement): ?>
                    <div class="ad-card">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <h5 class="mb-2">
                                    <?php echo escape($advertisement['title']); ?>
                                    <?php if ($advertisement['ad_type'] === 'fullpage'): ?>
                                        <span class="badge bg-primary">เต็มหน้า</span>
                                    <?php endif; ?>
                                </h5>
                                <p class="text-muted mb-2">
                                    <?php echo mb_substr(strip_tags($advertisement['content']), 0, 150); ?>
                                    <?php if (mb_strlen($advertisement['content']) > 150) echo '...'; ?>
                                </p>
                                <small class="text-muted">
                                    <i class="fas fa-clock"></i> 
                                    <?php echo formatThaiDate($advertisement['created_at']); ?>
                                </small>
                            </div>
                            <div class="col-md-4 text-end">
                                <div class="mb-2">
                                    <?php echo getStatusBadge($advertisement['status']); ?>
                                </div>
                                
                                <?php if ($advertisement['status'] === 'published' && !empty($advertisement['issue_id'])): ?>
                                    <!-- Show PDF download link for published ads -->
                                    <div class="alert alert-success p-2 mb-2">
                                        <small><i class="fas fa-check-circle"></i> ประกาศของคุณถูกเผยแพร่แล้ว</small>
                                    </div>
                                    <a href="<?php echo BASE_URL; ?>public/download.php" 
                                       class="btn btn-sm btn-success" target="_blank">
                                        <i class="fas fa-download"></i> ดาวน์โหลด PDF
                                    </a>
                                <?php endif; ?>
                                
                                <?php if ($advertisement['status'] === 'approved'): ?>
                                    <!-- Show message for approved but not yet published -->
                                    <div class="alert alert-info p-2 mb-2">
                                        <small><i class="fas fa-clock"></i> กำลังรอสร้าง PDF</small>
                                    </div>
                                <?php endif; ?>
                                
                                <?php if ($advertisement['status'] === 'pending'): ?>
                                    <div class="btn-group btn-group-sm">
                                        <button class="btn btn-outline-danger" 
                                                onclick="deleteAd(<?php echo $advertisement['id']; ?>)">
                                            <i class="fas fa-trash"></i> ลบ
                                        </button>
                                    </div>
                                <?php endif; ?>
                                <?php if (!empty($advertisement['file_path'])): ?>
                                    <div class="mt-2">
                                        <a href="<?php echo UPLOAD_URL . $advertisement['file_path']; ?>" 
                                           target="_blank" class="btn btn-sm btn-outline-secondary">
                                            <i class="fas fa-file"></i> ดูไฟล์
                                        </a>
                                    </div>
                                <?php endif; ?>
                                <?php if ($advertisement['status'] === 'rejected' && !empty($advertisement['reject_reason'])): ?>
                                    <div class="mt-2">
                                        <small class="text-danger">
                                            <strong>เหตุผล:</strong> <?php echo escape($advertisement['reject_reason']); ?>
                                        </small>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    
                    <!-- Pagination -->
                    <?php if ($pagination['total_pages'] > 1): ?>
                    <nav aria-label="Page navigation" class="mt-4">
                        <ul class="pagination justify-content-center">
                            <?php if ($pagination['has_previous']): ?>
                            <li class="page-item">
                                <a class="page-link" href="?page=<?php echo $page - 1; ?><?php echo $statusFilter ? '&status=' . $statusFilter : ''; ?>">
                                    ก่อนหน้า
                                </a>
                            </li>
                            <?php endif; ?>
                            
                            <?php for ($i = 1; $i <= $pagination['total_pages']; $i++): ?>
                            <li class="page-item <?php echo $i === $page ? 'active' : ''; ?>">
                                <a class="page-link" href="?page=<?php echo $i; ?><?php echo $statusFilter ? '&status=' . $statusFilter : ''; ?>">
                                    <?php echo $i; ?>
                                </a>
                            </li>
                            <?php endfor; ?>
                            
                            <?php if ($pagination['has_next']): ?>
                            <li class="page-item">
                                <a class="page-link" href="?page=<?php echo $page + 1; ?><?php echo $statusFilter ? '&status=' . $statusFilter : ''; ?>">
                                    ถัดไป
                                </a>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </nav>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<!-- PDF Generation Progress Modal -->
<div class="modal fade" id="pdfProgressModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">
                    <i class="fas fa-file-pdf"></i> กำลังสร้าง PDF
                </h5>
            </div>
            <div class="modal-body text-center py-4">
                <div class="mb-3">
                    <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
                <h5 class="mb-3">กรุณารอสักครู่...</h5>
                <p class="text-muted mb-3" id="progressMessage">
                    <i class="fas fa-cog fa-spin"></i> ระบบกำลังประมวลผลประกาศของคุณ<br>
                    และสร้างไฟล์ PDF ด้วยความละเอียด 300 DPI
                </p>
                <div class="progress" style="height: 25px;">
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" 
                         role="progressbar" 
                         style="width: 0%;" 
                         id="progressBar">
                        <span id="progressPercent">0%</span>
                    </div>
                </div>
                <small class="text-muted mt-2 d-block" id="elapsedTime">เวลาผ่านไป: 0 วินาที</small>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
function deleteAd(id) {
    if (confirm('คุณต้องการลบประกาศนี้? เครดิตจะถูกคืนให้คุณ')) {
        // Create form and submit
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = 'delete-advertisement.php';
        
        const idInput = document.createElement('input');
        idInput.type = 'hidden';
        idInput.name = 'ad_id';
        idInput.value = id;
        
        const tokenInput = document.createElement('input');
        tokenInput.type = 'hidden';
        tokenInput.name = 'csrf_token';
        tokenInput.value = '<?php echo generateCsrfToken(); ?>';
        
        form.appendChild(idInput);
        form.appendChild(tokenInput);
        document.body.appendChild(form);
        form.submit();
    }
}

// PDF Generation Progress Tracker
(function() {
    // Check if we have a new ad ID in the URL
    const urlParams = new URLSearchParams(window.location.search);
    const newAdId = urlParams.get('newAdId');
    
    if (!newAdId) return; // No new ad, nothing to track
    
    // Show progress modal
    const progressModal = new bootstrap.Modal(document.getElementById('pdfProgressModal'));
    progressModal.show();
    
    const progressBar = document.getElementById('progressBar');
    const progressPercent = document.getElementById('progressPercent');
    const progressMessage = document.getElementById('progressMessage');
    const elapsedTimeEl = document.getElementById('elapsedTime');
    
    let checkCount = 0;
    let startTime = Date.now();
    let timerInterval;
    
    // Update elapsed time
    timerInterval = setInterval(() => {
        const elapsed = Math.floor((Date.now() - startTime) / 1000);
        elapsedTimeEl.textContent = `เวลาผ่านไป: ${elapsed} วินาที`;
    }, 1000);
    
    // Check ad status via AJAX
    function checkAdStatus() {
        checkCount++;
        
        // Update progress bar (simulated progress)
        const simulatedProgress = Math.min(checkCount * 15, 90);
        progressBar.style.width = simulatedProgress + '%';
        progressPercent.textContent = simulatedProgress + '%';
        
        // Update messages based on time
        if (checkCount === 1) {
            progressMessage.innerHTML = '<i class="fas fa-check"></i> ประกาศได้รับการอนุมัติอัตโนมัติ<br>กำลังเตรียมข้อมูล...';
        } else if (checkCount === 2) {
            progressMessage.innerHTML = '<i class="fas fa-font"></i> กำลังเรนเดอร์ตัวอักษรภาษาไทย<br>พร้อม OpenType features...';
        } else if (checkCount === 3) {
            progressMessage.innerHTML = '<i class="fas fa-file-pdf"></i> กำลังสร้างไฟล์ PDF<br>ความละเอียด 300 DPI...';
        } else if (checkCount >= 4) {
            progressMessage.innerHTML = '<i class="fas fa-cog fa-spin"></i> กำลังเสร็จสิ้น<br>กรุณารอสักครู่...';
        }
        
        // Fetch ad status from server
        fetch('<?php echo BASE_URL; ?>api/check-ad-status.php?ad_id=' + newAdId)
            .then(response => response.json())
            .then(data => {
                if (data.status === 'published') {
                    // PDF is ready!
                    clearInterval(timerInterval);
                    progressBar.style.width = '100%';
                    progressPercent.textContent = '100%';
                    progressBar.classList.remove('progress-bar-animated');
                    progressBar.classList.add('bg-success');
                    
                    progressMessage.innerHTML = '<i class="fas fa-check-circle text-success"></i> <strong>สำเร็จ!</strong><br>PDF ของคุณพร้อมแล้ว';
                    
                    // Wait a moment then reload
                    setTimeout(() => {
                        // Remove newAdId from URL and reload
                        const url = new URL(window.location);
                        url.searchParams.delete('newAdId');
                        window.location.href = url.toString();
                    }, 2000);
                } else if (data.status === 'approved') {
                    // Still waiting, check again
                    if (checkCount < 20) { // Max 20 attempts (40 seconds)
                        setTimeout(checkAdStatus, 2000); // Check every 2 seconds
                    } else {
                        // Timeout - still show message
                        clearInterval(timerInterval);
                        progressBar.classList.remove('progress-bar-animated');
                        progressBar.classList.add('bg-warning');
                        progressMessage.innerHTML = '<i class="fas fa-exclamation-triangle text-warning"></i> การสร้าง PDF ใช้เวลานานกว่าปกติ<br>โปรดรีเฟรชหน้านี้ภายหลัง';
                        
                        // Add close button
                        setTimeout(() => {
                            progressModal.hide();
                            const url = new URL(window.location);
                            url.searchParams.delete('newAdId');
                            window.history.replaceState({}, '', url.toString());
                        }, 5000);
                    }
                } else if (data.status === 'rejected') {
                    // Ad was rejected
                    clearInterval(timerInterval);
                    progressBar.classList.remove('progress-bar-animated');
                    progressBar.classList.add('bg-danger');
                    progressMessage.innerHTML = '<i class="fas fa-times-circle text-danger"></i> ประกาศถูกปฏิเสธ';
                    
                    setTimeout(() => {
                        progressModal.hide();
                        window.location.reload();
                    }, 3000);
                } else {
                    // Unknown status, stop checking
                    clearInterval(timerInterval);
                    progressModal.hide();
                }
            })
            .catch(error => {
                console.error('Error checking ad status:', error);
                // Continue checking on error
                if (checkCount < 20) {
                    setTimeout(checkAdStatus, 2000);
                } else {
                    clearInterval(timerInterval);
                    progressModal.hide();
                }
            });
    }
    
    // Start checking after 1 second
    setTimeout(checkAdStatus, 1000);
})();

</script>
</body>
</html>
