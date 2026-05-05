<?php
require_once 'config/db-config.php';
requireLogin();

$user_id = $_SESSION['user_id'];
$credits = getUserCredits($user_id);

// Get credit packages
$conn = getDBConnection();
$sql = "SELECT * FROM credit_coin ORDER BY credit_amt ASC";
$packages = $conn->query($sql);

// Handle credit purchase
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['buy_credit'])) {
    // Validate CSRF token
    if (!isset($_POST['csrf_token']) || !validateCSRFToken($_POST['csrf_token'])) {
        $error = "คำขอไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง";
    } else {
        $package_id = filter_var($_POST['package_id'], FILTER_VALIDATE_INT);
        
        if (!$package_id) {
            $error = "ข้อมูลไม่ถูกต้อง";
        } elseif (!isset($_FILES['slip_upload']) || $_FILES['slip_upload']['error'] !== UPLOAD_ERR_OK) {
            $error = "กรุณาอัพโหลดไฟล์สลิป";
        } else {
            $slip_file = $_FILES['slip_upload'];
            
            // Validate file upload (images only, max 5MB)
            $validation = validateImageUpload($slip_file, 5242880);
            
            if (!$validation['success']) {
                $error = $validation['error'];
            } else {
                // Get package details
                $sql = "SELECT * FROM credit_coin WHERE id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $package_id);
                $stmt->execute();
                $package = $stmt->get_result()->fetch_assoc();
                
                if ($package) {
                    // Handle file upload
                    $upload_dir = 'uploads/slips/';
                    if (!file_exists($upload_dir)) {
                        mkdir($upload_dir, 0755, true);
                    }
                    
                    $file_extension = strtolower(pathinfo($slip_file['name'], PATHINFO_EXTENSION));
                    $new_filename = 'slip_' . time() . '_' . uniqid() . '.' . $file_extension;
                    $upload_path = $upload_dir . $new_filename;
                    
                    if (move_uploaded_file($slip_file['tmp_name'], $upload_path)) {
                        // Insert transaction
                        $sql = "INSERT INTO credit_transactions (owner_id, package, amouth, buy_timestamp, approved, slipup_upload, coin) 
                                VALUES (?, ?, ?, NOW(), 'pending', ?, ?)";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("ssisi", $user_id, $package['pop_name'], $package['credit_amt'], $upload_path, $package['coins']);
                        
                        if ($stmt->execute()) {
                            $success = "ส่งคำขอเติมเครดิตสำเร็จ รอการอนุมัติจากแอดมิน";
                        } else {
                            $error = "เกิดข้อผิดพลาด กรุณาลองใหม่อีกครั้ง";
                        }
                    } else {
                        $error = "ไม่สามารถอัพโหลดไฟล์ได้ กรุณาลองใหม่";
                    }
                } else {
                    $error = "ไม่พบแพ็คเกจที่เลือก";
                }
            }
        }
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เติมเครดิต - VNNBIZS</title>
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
        .credit-balance {
            background: linear-gradient(135deg, #2193b0 0%, #6dd5ed 100%);
            color: white;
            border-radius: 15px;
            padding: 30px;
            margin-bottom: 30px;
            text-align: center;
        }
        .package-card {
            border: 2px solid #e0e0e0;
            border-radius: 15px;
            padding: 30px;
            margin-bottom: 20px;
            transition: all 0.3s;
            background: white;
        }
        .package-card:hover {
            border-color: #2193b0;
            box-shadow: 0 5px 20px rgba(33, 147, 176, 0.2);
            transform: translateY(-5px);
        }
        .package-card.popular {
            border-color: #2193b0;
            position: relative;
        }
        .package-card.popular::before {
            content: "แนะนำ";
            position: absolute;
            top: -15px;
            right: 20px;
            background: #2193b0;
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 14px;
        }
        .btn-select-package {
            background: linear-gradient(135deg, #2193b0 0%, #6dd5ed 100%);
            border: none;
            color: white;
        }
        .bank-info {
            background: #fff3cd;
            border: 2px solid #ffc107;
            border-radius: 10px;
            padding: 20px;
            margin: 20px 0;
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
                <a class="btn btn-outline-light btn-sm" href="logout.php">ออกจากระบบ</a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <!-- Credit Balance -->
        <div class="credit-balance">
            <h3>เครดิตคงเหลือ</h3>
            <h1 class="display-3"><i class="fas fa-coins"></i> <?php echo escape($credits); ?> เหรียญ</h1>
            <p class="mb-0">1 เหรียญ = 1 ครั้งในการลงประกาศ</p>
        </div>

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

        <!-- Bank Transfer Info -->
        <div class="bank-info">
            <h5><i class="fas fa-university"></i> ข้อมูลการโอนเงิน</h5>
            <p class="mb-1"><strong>ธนาคาร:</strong> ธนาคารกสิกรไทย</p>
            <p class="mb-1"><strong>ชื่อบัญชี:</strong> บริษัท วีเอ็นเอ็นบิซ จำกัด</p>
            <p class="mb-1"><strong>เลขที่บัญชี:</strong> 123-4-56789-0</p>
            <p class="mb-0"><small class="text-muted">โปรดโอนเงินตามแพ็คเกจที่เลือกและอัพโหลดสลิปการโอนด้านล่าง</small></p>
        </div>

        <h4 class="mb-4">เลือกแพ็คเกจ</h4>
        
        <div class="row">
            <?php 
            $packages->data_seek(0); // Reset pointer
            $count = 0;
            while($package = $packages->fetch_assoc()): 
                $count++;
                $is_popular = $count == 2; // Middle package is popular
            ?>
            <div class="col-md-4">
                <div class="package-card <?php echo $is_popular ? 'popular' : ''; ?>">
                    <h4 class="text-center"><?php echo escape($package['pop_name']); ?></h4>
                    <div class="text-center my-4">
                        <h2 class="text-primary"><?php echo escape($package['credit_amt']); ?> ฿</h2>
                        <p class="text-muted">ได้รับ <?php echo escape($package['coins']); ?> เหรียญ</p>
                    </div>
                    <button type="button" class="btn btn-select-package w-100" 
                            data-bs-toggle="modal" 
                            data-bs-target="#uploadModal"
                            data-package-id="<?php echo escape($package['id']); ?>"
                            data-package-name="<?php echo escape($package['pop_name']); ?>"
                            data-package-price="<?php echo escape($package['credit_amt']); ?>">
                        เลือกแพ็คเกจนี้
                    </button>
                </div>
            </div>
            <?php endwhile; ?>
        </div>

        <div class="text-center mt-4 mb-5">
            <a href="dashboard.php" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> กลับหน้าหลัก</a>
        </div>
    </div>

    <!-- Upload Modal -->
    <div class="modal fade" id="uploadModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">อัพโหลดสลิปการโอนเงิน</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="csrf_token" value="<?php echo generateCSRFToken(); ?>">
                    <div class="modal-body">
                        <input type="hidden" name="package_id" id="modal_package_id">
                        
                        <div class="alert alert-info">
                            <strong>แพ็คเกจ:</strong> <span id="modal_package_name"></span><br>
                            <strong>ราคา:</strong> <span id="modal_package_price"></span> บาท
                        </div>
                        
                        <div class="mb-3">
                            <label for="slip_upload" class="form-label">เลือกไฟล์สลิป (JPG, PNG สูงสุด 5MB)</label>
                            <input type="file" class="form-control" id="slip_upload" name="slip_upload" 
                                   accept="image/jpeg,image/jpg,image/png,image/gif,image/webp" required>
                        </div>
                        
                        <div class="alert alert-warning">
                            <small><i class="fas fa-info-circle"></i> เครดิตจะถูกเพิ่มเข้าบัญชีหลังจากแอดมินตรวจสอบและอนุมัติ (ภายใน 24 ชั่วโมง)</small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                        <button type="submit" name="buy_credit" class="btn btn-primary">
                            <i class="fas fa-upload"></i> อัพโหลดและส่งคำขอ
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script>
        // Fill modal with package data
        document.querySelectorAll('.btn-select-package').forEach(button => {
            button.addEventListener('click', function() {
                document.getElementById('modal_package_id').value = this.dataset.packageId;
                document.getElementById('modal_package_name').textContent = this.dataset.packageName;
                document.getElementById('modal_package_price').textContent = this.dataset.packagePrice;
            });
        });
    </script>
</body>
</html>
