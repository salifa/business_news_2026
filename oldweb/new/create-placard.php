<?php
require_once 'config/db-config.php';
requireLogin();

$user_id = $_SESSION['user_id'];
$credits = getUserCredits($user_id);

// Handle placard creation
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['create_placard'])) {
    // Validate CSRF token
    if (!isset($_POST['csrf_token']) || !validateCSRFToken($_POST['csrf_token'])) {
        $error = "คำขอไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง";
    } elseif ($credits <= 0) {
        $error = "คุณมีเครดิตไม่เพียงพอ กรุณาเติมเครดิตก่อน";
    } else {
        // Validate and sanitize input
        $subject = trim($_POST['subject']);
        $companyname = trim($_POST['companyname']);
        $placard_to = trim($_POST['placard_to']);
        $meeting_date = $_POST['meeting_date'];
        $meeting_time = $_POST['meeting_time'];
        $meeting_place = trim($_POST['meeting_place']);
        $placard_date = $_POST['placard_date'];
        $name_prefix = $_POST['name_prefix'];
        $name_last = trim($_POST['name_last']);
        $position = trim($_POST['position']);
        $content = trim($_POST['content']);
        
        // Validate required fields
        if (empty($subject) || empty($companyname) || empty($placard_to) || 
            empty($meeting_date) || empty($meeting_time) || empty($meeting_place) || empty($placard_date)) {
            $error = "กรุณากรอกข้อมูลที่จำเป็นให้ครบถ้วน";
        } else {
            $uuid = uniqid('placard_', true);
            $pdf_path = '';
            $image_path = '';
            $upload_error = false;
            
            // Handle PDF upload with validation
            if (isset($_FILES['pdf_file']) && $_FILES['pdf_file']['error'] == UPLOAD_ERR_OK) {
                $validation = validatePDFUpload($_FILES['pdf_file'], 10485760); // 10MB max
                
                if (!$validation['success']) {
                    $error = $validation['error'];
                    $upload_error = true;
                } else {
                    $upload_dir = 'uploads/pdfs/';
                    if (!file_exists($upload_dir)) {
                        mkdir($upload_dir, 0755, true);
                    }
                    
                    $file_extension = strtolower(pathinfo($_FILES['pdf_file']['name'], PATHINFO_EXTENSION));
                    $new_filename = 'pdf_' . time() . '_' . uniqid() . '.' . $file_extension;
                    $pdf_path = $upload_dir . $new_filename;
                    
                    if (!move_uploaded_file($_FILES['pdf_file']['tmp_name'], $pdf_path)) {
                        $error = "ไม่สามารถอัพโหลดไฟล์ PDF ได้";
                        $upload_error = true;
                        $pdf_path = '';
                    }
                }
            }
            
            // Handle image upload with validation
            if (!$upload_error && isset($_FILES['image_file']) && $_FILES['image_file']['error'] == UPLOAD_ERR_OK) {
                $validation = validateImageUpload($_FILES['image_file'], 5242880); // 5MB max
                
                if (!$validation['success']) {
                    $error = $validation['error'];
                    $upload_error = true;
                } else {
                    $upload_dir = 'uploads/images/';
                    if (!file_exists($upload_dir)) {
                        mkdir($upload_dir, 0755, true);
                    }
                    
                    $file_extension = strtolower(pathinfo($_FILES['image_file']['name'], PATHINFO_EXTENSION));
                    $new_filename = 'img_' . time() . '_' . uniqid() . '.' . $file_extension;
                    $image_path = $upload_dir . $new_filename;
                    
                    if (!move_uploaded_file($_FILES['image_file']['tmp_name'], $image_path)) {
                        $error = "ไม่สามารถอัพโหลดไฟล์รูปภาพได้";
                        $upload_error = true;
                        $image_path = '';
                    }
                }
            }
            
            // Insert placard if no upload errors
            if (!$upload_error) {
                $conn = getDBConnection();
                $sql = "INSERT INTO placard (owner_id, publish, subject, content, companyname, placard_to, 
                        meeting_date, meeting_time, meeting_place, placard_date, name_prefix, name_last, 
                        position, uuid, create_date, pdf_file1, image1) 
                        VALUES (?, 'On', ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), ?, ?)";
                
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sssssssssssssss", 
                    $user_id, $subject, $content, $companyname, $placard_to, 
                    $meeting_date, $meeting_time, $meeting_place, $placard_date, 
                    $name_prefix, $name_last, $position, $uuid, $pdf_path, $image_path
                );
                
                if ($stmt->execute()) {
                    // Explicitly deduct credit (note: this would require a credit_usage table)
                    // For now, credit is calculated dynamically by getUserCredits()
                    $success = "ลงประกาศสำเร็จ! ประกาศของคุณถูกเผยแพร่แล้ว";
                    $credits = getUserCredits($user_id); // Refresh credits
                } else {
                    $error = "เกิดข้อผิดพลาดในการบันทึกข้อมูล กรุณาลองใหม่อีกครั้ง";
                    error_log("Placard insert error: " . $conn->error);
                }
                
                $conn->close();
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สร้างประกาศ - VNNBIZS</title>
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
        .form-container {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }
        .credit-badge {
            background: linear-gradient(135deg, #2193b0 0%, #6dd5ed 100%);
            color: white;
            padding: 10px 20px;
            border-radius: 20px;
            display: inline-block;
            margin-bottom: 20px;
        }
        .btn-primary {
            background: linear-gradient(135deg, #2193b0 0%, #6dd5ed 100%);
            border: none;
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

    <div class="container mt-4 mb-5">
        <div class="credit-badge">
            <i class="fas fa-coins"></i> เครดิตคงเหลือ: <?php echo escape($credits); ?> เหรียญ
        </div>

        <?php if (isset($success)): ?>
            <div class="alert alert-success alert-dismissible fade show">
                <i class="fas fa-check-circle"></i> <?php echo escape($success); ?>
                <a href="dashboard.php" class="btn btn-sm btn-success ms-3">ดูประกาศของฉัน</a>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <?php if (isset($error)): ?>
            <div class="alert alert-danger alert-dismissible fade show">
                <i class="fas fa-exclamation-circle"></i> <?php echo escape($error); ?>
                <?php if ($credits <= 0): ?>
                    <a href="add-credit.php" class="btn btn-sm btn-danger ms-3">เติมเครดิต</a>
                <?php endif; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <div class="form-container">
            <h3 class="mb-4"><i class="fas fa-newspaper"></i> สร้างประกาศเชิญประชุมผู้ถือหุ้น</h3>
            
            <form method="POST" enctype="multipart/form-data">
                <input type="hidden" name="csrf_token" value="<?php echo generateCSRFToken(); ?>">
                <!-- Company Information -->
                <h5 class="mt-4 mb-3 text-primary">ข้อมูลบริษัท</h5>
                
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="companyname" class="form-label">ชื่อบริษัท <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="companyname" name="companyname" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="subject" class="form-label">หัวข้อประกาศ <span class="text-danger">*</span></label>
                        <select class="form-select" id="subject" name="subject" required>
                            <option value="">-- เลือกหัวข้อ --</option>
                            <option value="เชิญประชุมปิดงบประจำปี">เชิญประชุมปิดงบประจำปี</option>
                            <option value="เชิญประชุมเพิ่มทุน">เชิญประชุมเพิ่มทุน</option>
                            <option value="เชิญประชุมลดทุน">เชิญประชุมลดทุน</option>
                            <option value="เชิญประชุมวิสามัญผู้ถือหุ้น">เชิญประชุมวิสามัญผู้ถือหุ้น</option>
                            <option value="อื่นๆ">อื่นๆ</option>
                        </select>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label for="placard_to" class="form-label">ถึง <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="placard_to" name="placard_to" 
                               placeholder="ผู้ถือหุ้นทุกท่าน" required>
                    </div>
                </div>

                <!-- Meeting Details -->
                <h5 class="mt-4 mb-3 text-primary">รายละเอียดการประชุม</h5>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="meeting_date" class="form-label">วันที่ประชุม <span class="text-danger">*</span></label>
                        <input type="date" class="form-control" id="meeting_date" name="meeting_date" required>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label for="meeting_time" class="form-label">เวลาประชุม <span class="text-danger">*</span></label>
                        <input type="time" class="form-control" id="meeting_time" name="meeting_time" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="meeting_place" class="form-label">สถานที่ประชุม <span class="text-danger">*</span></label>
                    <textarea class="form-control" id="meeting_place" name="meeting_place" rows="2" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="placard_date" class="form-label">วันที่ประกาศ <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" id="placard_date" name="placard_date" 
                           value="<?php echo date('Y-m-d'); ?>" required>
                </div>

                <!-- Content -->
                <h5 class="mt-4 mb-3 text-primary">เนื้อหาประกาศ</h5>

                <div class="mb-3">
                    <label for="content" class="form-label">รายละเอียด</label>
                    <textarea class="form-control" id="content" name="content" rows="5" 
                              placeholder="ระบุรายละเอียดเพิ่มเติม วาระการประชุม หรือข้อมูลอื่นๆ"></textarea>
                </div>

                <!-- Authorized Person -->
                <h5 class="mt-4 mb-3 text-primary">ผู้มีอำนาจลงนาม</h5>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="name_prefix" class="form-label">คำนำหน้า</label>
                        <select class="form-select" id="name_prefix" name="name_prefix">
                            <option value="นาย">นาย</option>
                            <option value="นาง">นาง</option>
                            <option value="นางสาว">นางสาว</option>
                        </select>
                    </div>
                    
                    <div class="col-md-4 mb-3">
                        <label for="name_last" class="form-label">ชื่อ-นามสกุล</label>
                        <input type="text" class="form-control" id="name_last" name="name_last">
                    </div>
                    
                    <div class="col-md-4 mb-3">
                        <label for="position" class="form-label">ตำแหน่ง</label>
                        <input type="text" class="form-control" id="position" name="position" 
                               placeholder="กรรมการผู้จัดการ">
                    </div>
                </div>

                <!-- File Uploads -->
                <h5 class="mt-4 mb-3 text-primary">ไฟล์แนบ</h5>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="pdf_file" class="form-label">
                            <i class="fas fa-file-pdf"></i> ไฟล์ PDF (ถ้ามี)
                        </label>
                        <input type="file" class="form-control" id="pdf_file" name="pdf_file" accept=".pdf">
                        <small class="text-muted">รองรับไฟล์ PDF ขนาดไม่เกิน 10MB</small>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label for="image_file" class="form-label">
                            <i class="fas fa-image"></i> รูปภาพ (ถ้ามี)
                        </label>
                        <input type="file" class="form-control" id="image_file" name="image_file" accept="image/*">
                        <small class="text-muted">รองรับ JPG, PNG ขนาดไม่เกิน 5MB</small>
                    </div>
                </div>

                <!-- Submit Buttons -->
                <div class="d-flex justify-content-between mt-4">
                    <a href="dashboard.php" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> ยกเลิก
                    </a>
                    <button type="submit" name="create_placard" class="btn btn-primary btn-lg" 
                            <?php echo $credits <= 0 ? 'disabled' : ''; ?>>
                        <i class="fas fa-paper-plane"></i> ลงประกาศ (ใช้ 1 เหรียญ)
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
