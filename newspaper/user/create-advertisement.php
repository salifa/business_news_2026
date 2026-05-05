<?php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../classes/Advertisement.php';
require_once __DIR__ . '/../classes/Credit.php';

requireLogin();

$ad = new Advertisement();
$credit = new Credit();
$userEmail = getCurrentUserEmail();
$error = '';
$success = '';
$fieldErrors = [];
$formData = [];

// Get user credit balance
$userCredits = $credit->getUserBalance($userEmail);

// Helper: get old POST value
function old($key, $default = '') {
    return isset($_POST[$key]) ? htmlspecialchars($_POST[$key], ENT_QUOTES, 'UTF-8') : $default;
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $formData = $_POST;
    
    if (!isset($_POST['csrf_token']) || !verifyCsrfToken($_POST['csrf_token'])) {
        $error = 'Invalid request. Please try again.';
    } else {
        $adType = sanitize($_POST['ad_type'] ?? 'regular');
        $title = sanitize($_POST['title'] ?? '');
        $content = sanitize($_POST['content'] ?? '');
        
        // Field-level validation
        if (empty($title)) {
            $fieldErrors['title'] = 'กรุณาเลือกหัวข้อ หรือพิมพ์หัวข้อเอง';
        }
        if (empty($_POST['companyname'])) {
            $fieldErrors['companyname'] = 'กรุณากรอกชื่อบริษัท / หน่วยงาน';
        }
        if (empty($_POST['meeting_number'])) {
            $fieldErrors['meeting_number'] = 'กรุณากรอกครั้งที่ประชุม เช่น 1/2569';
        }
        if (empty($_POST['placard_to'])) {
            $fieldErrors['placard_to'] = 'กรุณากรอกผู้รับประกาศ';
        }
        if (empty($_POST['meeting_agenda'])) {
            $fieldErrors['meeting_agenda'] = 'กรุณากรอกวาระการประชุม';
        }
        if (empty($_POST['meeting_date'])) {
            $fieldErrors['meeting_date'] = 'กรุณาเลือกวันที่จัดประชุม';
        }
        if (empty($_POST['meeting_time'])) {
            $fieldErrors['meeting_time'] = 'กรุณาระบุเวลาจัดประชุม';
        }
        if (empty($_POST['meeting_place'])) {
            $fieldErrors['meeting_place'] = 'กรุณากรอกสถานที่จัดประชุม';
        }
        if (empty($_POST['placard_date'])) {
            $fieldErrors['placard_date'] = 'กรุณาเลือกวันที่ลงโฆษณา';
        }
        
        if (!empty($fieldErrors)) {
            $error = 'กรุณาแก้ไขข้อมูลที่ไม่ถูกต้องด้านล่างก่อนส่งประกาศ';
        } else {
            $data = [
                'user_email' => $userEmail,
                'ad_type' => $adType,
                'title' => $title,
                'content' => $content,
                'companyname' => sanitize($_POST['companyname'] ?? ''),
                'meeting_number' => sanitize($_POST['meeting_number'] ?? ''),
                'placard_to' => sanitize($_POST['placard_to'] ?? ''),
                'meeting_agenda' => sanitize($_POST['meeting_agenda'] ?? ''),
                'meeting_date' => sanitize($_POST['meeting_date'] ?? ''),
                'meeting_time' => sanitize($_POST['meeting_time'] ?? ''),
                'meeting_place' => sanitize($_POST['meeting_place'] ?? ''),
                'placard_date' => sanitize($_POST['placard_date'] ?? '')
            ];
            
            // Handle file upload
            if (isset($_FILES['ad_file']) && $_FILES['ad_file']['error'] === UPLOAD_ERR_OK) {
                $allowedTypes = array_merge(ALLOWED_IMAGE_TYPES, ALLOWED_PDF_TYPES);
                $upload = uploadFile($_FILES['ad_file'], $allowedTypes);
                
                if (!$upload['success']) {
                    $error = $upload['error'];
                } else {
                    $data['file_path'] = $upload['filename'];
                }
            }
            
            if (!$error) {
                $result = $ad->create($data);
                
                if ($result['success']) {
                    $adId = $result['advertisement_id'] ?? null;
                    setFlash('success', $result['message'] . " เครดิตคงเหลือ: {$result['credits_remaining']}");
                    // Pass the ad ID to show PDF generation progress
                    redirect(BASE_URL . 'user/my-advertisements.php' . ($adId ? '?newAdId=' . $adId : ''));
                } else {
                    $error = $result['message'];
                }
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
    <title>ลงประกาศ - <?php echo NEWSPAPER_NAME; ?></title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        * {
            font-family: 'Google Sans', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 30px 15px;
        }
        
        .main-container {
            max-width: 900px;
            margin: 0 auto;
        }
        
        .back-link {
            display: inline-block;
            color: white;
            text-decoration: none;
            font-size: 1rem;
            margin-bottom: 20px;
            padding: 10px 20px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 10px;
            transition: all 0.3s;
        }
        
        .back-link:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: translateX(-5px);
            color: white;
        }
        
        .form-wrapper {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.2);
            overflow: hidden;
        }
        
        .form-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 40px 30px;
            text-align: center;
        }
        
        .form-header h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 10px;
        }
        
        .form-header p {
            font-size: 1.2rem;
            opacity: 0.95;
            margin: 0;
        }
        
        .credit-badge {
            display: inline-block;
            background: rgba(255, 255, 255, 0.2);
            padding: 15px 30px;
            border-radius: 50px;
            margin-top: 20px;
            font-size: 1.3rem;
            font-weight: 600;
        }
        
        .credit-badge i {
            margin-right: 8px;
        }
        
        .form-body {
            padding: 50px 40px;
        }
        
        .form-section-title {
            font-size: 1.4rem;
            font-weight: 600;
            color: #667eea;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 2px solid #e9ecef;
        }
        
        .form-label {
            font-weight: 600;
            color: #495057;
            margin-bottom: 10px;
            font-size: 1.05rem;
            display: block;
        }
        
        .form-label .required {
            color: #dc3545;
            margin-left: 3px;
        }
        
        .form-control, .form-select, textarea {
            border: 2px solid #e9ecef;
            border-radius: 12px;
            padding: 14px 18px;
            font-size: 1.05rem;
            transition: all 0.3s;
            width: 100%;
        }
        
        .form-select {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23667eea' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M2 5l6 6 6-6'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 18px center;
            background-size: 18px 18px;
            padding-right: 50px;
        }
        
        .form-control:focus, .form-select:focus, textarea:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.15);
            outline: none;
        }
        
        .form-control:hover, .form-select:hover, textarea:hover {
            border-color: #667eea;
        }
        
        textarea {
            min-height: 180px;
            resize: vertical;
            font-family: 'Google Sans', sans-serif;
        }
        
        .radio-card-group {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin-bottom: 30px;
        }
        
        .radio-card {
            position: relative;
        }
        
        .radio-card input[type="radio"] {
            position: absolute;
            opacity: 0;
        }
        
        .radio-card-label {
            display: block;
            border: 2px solid #e9ecef;
            border-radius: 15px;
            padding: 25px;
            cursor: pointer;
            transition: all 0.3s;
            height: 100%;
        }
        
        .radio-card input[type="radio"]:checked + .radio-card-label {
            border-color: #667eea;
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.08) 0%, rgba(118, 75, 162, 0.08) 100%);
            box-shadow: 0 5px 20px rgba(102, 126, 234, 0.2);
        }
        
        .radio-card-label:hover {
            border-color: #667eea;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.15);
        }
        
        .radio-card-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: #667eea;
            margin-bottom: 8px;
        }
        
        .radio-card-price {
            font-size: 1.3rem;
            font-weight: 700;
            color: #28a745;
            margin-bottom: 10px;
        }
        
        .radio-card-desc {
            color: #6c757d;
            font-size: 0.95rem;
            line-height: 1.5;
        }
        
        .file-upload-zone {
            border: 3px dashed #dee2e6;
            border-radius: 15px;
            padding: 50px 30px;
            text-align: center;
            background: #f8f9fa;
            cursor: pointer;
            transition: all 0.3s;
            position: relative;
        }
        
        .file-upload-zone:hover {
            border-color: #667eea;
            background: rgba(102, 126, 234, 0.05);
        }
        
        .file-upload-zone.dragover {
            border-color: #667eea;
            background: rgba(102, 126, 234, 0.1);
        }
        
        .file-upload-icon {
            font-size: 4rem;
            color: #667eea;
            margin-bottom: 20px;
        }
        
        .file-upload-text {
            font-size: 1.1rem;
            color: #495057;
            margin-bottom: 10px;
        }
        
        .file-upload-hint {
            font-size: 0.95rem;
            color: #6c757d;
        }
        
        #ad_file {
            display: none;
        }
        
        .preview-container {
            margin-top: 25px;
            padding: 30px;
            background: #f8f9fa;
            border-radius: 15px;
            text-align: center;
            display: none;
        }
        
        .preview-container.show {
            display: block;
        }
        
        .preview-image {
            max-width: 100%;
            max-height: 400px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.15);
            margin-top: 15px;
        }
        
        .preview-pdf-icon {
            font-size: 5rem;
            color: #dc3545;
            margin: 20px 0;
        }
        
        .preview-filename {
            font-size: 1.1rem;
            font-weight: 600;
            color: #495057;
            margin-top: 15px;
        }
        
        .preview-filesize {
            color: #6c757d;
            margin-top: 5px;
        }
        
        .info-alert {
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.1) 0%, rgba(118, 75, 162, 0.1) 100%);
            border-left: 4px solid #667eea;
            border-radius: 12px;
            padding: 20px 25px;
            margin-bottom: 30px;
        }
        
        .info-alert h6 {
            color: #667eea;
            font-weight: 700;
            margin-bottom: 12px;
            font-size: 1.1rem;
        }
        
        .info-alert ul {
            margin: 0;
            padding-left: 25px;
        }
        
        .info-alert li {
            color: #495057;
            margin-bottom: 8px;
            line-height: 1.6;
        }
        
        .warning-alert {
            background: #fff3cd;
            border-left: 4px solid #ffc107;
            border-radius: 12px;
            padding: 20px 25px;
            margin-top: 30px;
        }
        
        .warning-alert strong {
            color: #856404;
        }
        
        .button-group {
            display: flex;
            gap: 15px;
            justify-content: center;
            margin-top: 40px;
            padding-top: 30px;
            border-top: 2px solid #e9ecef;
        }
        
        .btn-submit {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            color: white;
            padding: 16px 60px;
            font-size: 1.2rem;
            font-weight: 700;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 5px 20px rgba(102, 126, 234, 0.3);
        }
        
        .btn-submit:hover:not(:disabled) {
            background: linear-gradient(135deg, #764ba2 0%, #667eea 100%);
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
        }
        
        .btn-submit:disabled {
            opacity: 0.6;
            cursor: not-allowed;
        }
        
        .btn-cancel {
            background: #6c757d;
            border: none;
            color: white;
            padding: 16px 45px;
            font-size: 1.1rem;
            font-weight: 600;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
        }
        
        .btn-cancel:hover {
            background: #5a6268;
            transform: translateY(-3px);
            color: white;
        }
        
        .alert {
            border: none;
            border-radius: 15px;
            padding: 20px 25px;
            margin-bottom: 25px;
            box-shadow: 0 3px 15px rgba(0,0,0,0.1);
        }
        
        .alert-danger {
            background: #f8d7da;
            color: #721c24;
        }
        
        .alert-warning {
            background: #fff3cd;
            color: #856404;
        }
        
        /* Field error states */
        .is-invalid {
            border-color: #dc3545 !important;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 12 12' width='12' height='12' fill='none' stroke='%23dc3545'%3e%3ccircle cx='6' cy='6' r='4.5'/%3e%3cpath stroke-linejoin='round' d='M5.8 3.6h.4L6 6.5z'/%3e%3ccircle cx='6' cy='8.2' r='.6' fill='%23dc3545' stroke='none'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right calc(0.375em + 0.1875rem) center;
            background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
            box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.15) !important;
        }
        
        textarea.is-invalid {
            background-position: top calc(0.375em + 0.1875rem) right calc(0.375em + 0.1875rem);
        }
        
        .invalid-feedback {
            display: none;
            width: 100%;
            margin-top: 6px;
            font-size: 0.92rem;
            color: #dc3545;
            font-weight: 500;
        }
        
        .is-invalid ~ .invalid-feedback {
            display: block;
        }
        
        .error-summary {
            background: #f8d7da;
            border: 1.5px solid #f5c2c7;
            border-left: 5px solid #dc3545;
            border-radius: 12px;
            padding: 20px 25px;
            margin-bottom: 25px;
        }
        
        .error-summary h6 {
            color: #842029;
            font-weight: 700;
            margin-bottom: 12px;
            font-size: 1.05rem;
        }
        
        .error-summary ul {
            margin: 0;
            padding-left: 22px;
        }
        
        .error-summary li {
            color: #842029;
            margin-bottom: 5px;
            font-size: 0.97rem;
        }
        
        .radio-card.is-invalid .radio-card-label {
            border-color: #dc3545;
            box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.15);
        }
        
        .insufficient-credits {
            text-align: center;
            padding: 40px;
        }
        
        .insufficient-credits h5 {
            color: #856404;
            font-weight: 600;
            margin-bottom: 15px;
        }
        
        .insufficient-credits p {
            color: #6c757d;
            margin-bottom: 25px;
        }
        
        .insufficient-credits .btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            color: white;
            padding: 12px 40px;
            font-size: 1.1rem;
            font-weight: 600;
            border-radius: 10px;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s;
        }
        
        .insufficient-credits .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(102, 126, 234, 0.3);
            color: white;
        }
        
        @media (max-width: 768px) {
            body {
                padding: 15px 10px;
            }
            
            .form-header h1 {
                font-size: 2rem;
            }
            
            .form-body {
                padding: 30px 20px;
            }
            
            .radio-card-group {
                grid-template-columns: 1fr;
            }
            
            .button-group {
                flex-direction: column;
            }
            
            .btn-submit, .btn-cancel {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="main-container">
        <a href="dashboard.php" class="back-link">
            <i class="fas fa-arrow-left"></i> กลับหน้าแดชบอร์ด
        </a>
        
        <div class="form-wrapper">
            <div class="form-header">
                <h1><i class="fas fa-newspaper"></i> ลงประกาศ</h1>
                <p>ระบบลงประกาศหนังสือพิมพ์ออนไลน์</p>
                <div class="credit-badge">
                    <i class="fas fa-coins"></i> เครดิตคงเหลือ: <?php echo number_format($userCredits); ?> หน่วย
                </div>
            </div>
            
            <div class="form-body">
                <?php if ($error): ?>
                    <div class="error-summary" id="errorSummary">
                        <h6><i class="fas fa-exclamation-triangle"></i> พบข้อผิดพลาด กรุณาตรวจสอบข้อมูล</h6>
                        <?php if (!empty($fieldErrors)): ?>
                        <ul>
                            <?php foreach ($fieldErrors as $msg): ?>
                                <li><?php echo htmlspecialchars($msg, ENT_QUOTES, 'UTF-8'); ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <?php else: ?>
                        <p style="margin:0; color:#842029;"><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></p>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                
                <?php if ($userCredits < 1): ?>
                    <div class="insufficient-credits">
                        <i class="fas fa-exclamation-triangle" style="font-size: 4rem; color: #ffc107; margin-bottom: 20px;"></i>
                        <h5>เครดิตไม่เพียงพอ</h5>
                        <p>คุณต้องมีเครดิตอย่างน้อย 1 หน่วยเพื่อลงประกาศ</p>
                        <a href="buy-credits.php" class="btn">
                            <i class="fas fa-shopping-cart"></i> ซื้อเครดิตเลย
                        </a>
                    </div>
                <?php else: ?>
                    <form method="POST" enctype="multipart/form-data" id="adForm">
                        <input type="hidden" name="csrf_token" value="<?php echo generateCsrfToken(); ?>">
                        <input type="hidden" name="ad_type" value="regular">
                        
                        <div class="info-alert">
                            <h6><i class="fas fa-info-circle"></i> คำแนะนำการลงประกาศ</h6>
                            <ul>
                                <li><strong>ค่าใช้จ่าย:</strong> <span class="text-primary"><i class="fas fa-coins"></i> 1 เครดิตต่อประกาศ</span></li>
                                <li>กรอกข้อมูลประกาศให้ครบถ้วน ทุกช่องที่มีเครื่องหมาย <span class="text-danger">*</span> จำเป็นต้องกรอก</li>
                                <li>สามารถอัปโหลดไฟล์ PDF หรือรูปภาพประกาศเพิ่มเติมได้ (ไม่บังคับ)</li>
                                <li>ไฟล์รองรับ: PDF, JPG, PNG, GIF (ขนาดไม่เกิน 10 MB)</li>
                                <li>วาระการประชุมควรระบุชัดเจนทีละข้อ</li>
                                <li>ประกาศจะได้รับการอนุมัติอัตโนมัติและเผยแพร่ใน PDF ทันที</li>
                            </ul>
                        </div>
                        
                        <!-- Form Fields Section -->
                        <div class="form-section-title">
                            <i class="fas fa-edit"></i> ข้อมูลประกาศ
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <label for="title_select" class="form-label">หัวข้อ / เรื่อง <span class="required">*</span></label>
                                <select class="form-select <?php echo isset($fieldErrors['title']) ? 'is-invalid' : ''; ?>" 
                                        id="title_select"
                                        name="title_select"
                                        onchange="handleTitleChange(this)">
                                    <option value="">-- เลือกหัวข้อจากรายการ --</option>
                                    <option value="custom">กำหนดเอง (พิมพ์หัวข้อเอง)</option>
                                </select>
                                <input type="text" 
                                       class="form-control mt-3 <?php echo isset($fieldErrors['title']) ? 'is-invalid' : ''; ?>" 
                                       id="title" 
                                       name="title" 
                                       placeholder="พิมพ์หัวข้อเอง หรือเลือกจากรายการด้านบน" 
                                       style="display: none;"
                                       value="<?php echo isset($_POST['title']) ? escape($_POST['title']) : ''; ?>">
                                <div class="invalid-feedback"><?php echo $fieldErrors['title'] ?? ''; ?></div>
                                <small style="color: #6c757d; display: block; margin-top: 8px;">
                                    <i class="fas fa-lightbulb"></i> เลือกหัวข้อจากรายการเพื่อกรอกวาระการประชุมอัตโนมัติ
                                </small>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="companyname" class="form-label">ชื่อบริษัท / ชื่อหน่วยงาน <span class="required">*</span></label>
                                <input type="text" 
                                       class="form-control <?php echo isset($fieldErrors['companyname']) ? 'is-invalid' : ''; ?>" 
                                       id="companyname" 
                                       name="companyname" 
                                       placeholder="เช่น บริษัท ABC จำกัด" 
                                       value="<?php echo isset($_POST['companyname']) ? escape($_POST['companyname']) : ''; ?>">
                                <div class="invalid-feedback"><?php echo $fieldErrors['companyname'] ?? ''; ?></div>
                            </div>
                            
                            <div class="col-md-6 mb-4">
                                <label for="meeting_number" class="form-label">ครั้งที่ประชุม <span class="required">*</span></label>
                                <input type="text" 
                                       class="form-control <?php echo isset($fieldErrors['meeting_number']) ? 'is-invalid' : ''; ?>" 
                                       id="meeting_number" 
                                       name="meeting_number" 
                                       placeholder="เช่น 1/2569" 
                                       value="<?php echo isset($_POST['meeting_number']) ? escape($_POST['meeting_number']) : ''; ?>">
                                <div class="invalid-feedback"><?php echo $fieldErrors['meeting_number'] ?? ''; ?></div>
                                <small style="color: #6c757d; display: block; margin-top: 5px;">
                                    <i class="fas fa-info-circle"></i> รูปแบบ: ครั้งที่/พ.ศ.
                                </small>
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <label for="placard_to" class="form-label">ประกาศถึง <span class="required">*</span></label>
                            <input type="text" 
                                   class="form-control <?php echo isset($fieldErrors['placard_to']) ? 'is-invalid' : ''; ?>" 
                                   id="placard_to" 
                                   name="placard_to" 
                                   placeholder="เช่น ท่านผู้ถือหุ้นของบริษัท, เจ้าหนี้ของบริษัท" 
                                   value="<?php echo isset($_POST['placard_to']) ? escape($_POST['placard_to']) : 'ท่านผู้ถือหุ้นของบริษัท'; ?>">
                            <div class="invalid-feedback"><?php echo $fieldErrors['placard_to'] ?? ''; ?></div>
                        </div>
                        
                        <div class="mb-4">
                            <label for="meeting_agenda" class="form-label">วาระการประชุม <span class="required">*</span></label>
                            <textarea class="form-control <?php echo isset($fieldErrors['meeting_agenda']) ? 'is-invalid' : ''; ?>" 
                                      id="meeting_agenda" 
                                      name="meeting_agenda" 
                                      rows="6"
                                      placeholder="เช่น&#10;1. รับรองรายงานการประชุมครั้งที่ผ่านมา&#10;2. รายงานผลการดำเนินงานของบริษัทและรับรองงบการเงินประจำปี&#10;3. พิจารณาแต่งตั้งผู้สอบบัญชีและกำหนดค่าตอบแทนประจำปี&#10;4. พิจารณาเรื่องอื่นๆ (ถ้ามี)"><?php echo isset($_POST['meeting_agenda']) ? escape($_POST['meeting_agenda']) : ''; ?></textarea>
                            <div class="invalid-feedback"><?php echo $fieldErrors['meeting_agenda'] ?? ''; ?></div>
                            <small style="color: #6c757d; display: block; margin-top: 5px;">
                                <i class="fas fa-info-circle"></i> กรอกวาระการประชุมทีละข้อ
                            </small>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="meeting_date" class="form-label">วันที่จัดประชุม <span class="required">*</span></label>
                                <input type="date" 
                                       class="form-control <?php echo isset($fieldErrors['meeting_date']) ? 'is-invalid' : ''; ?>" 
                                       id="meeting_date" 
                                       name="meeting_date" 
                                       value="<?php echo isset($_POST['meeting_date']) ? escape($_POST['meeting_date']) : ''; ?>">
                                <div class="invalid-feedback"><?php echo $fieldErrors['meeting_date'] ?? ''; ?></div>
                            </div>
                            
                            <div class="col-md-6 mb-4">
                                <label for="meeting_time" class="form-label">เวลาจัดประชุม <span class="required">*</span></label>
                                <input type="time" 
                                       class="form-control <?php echo isset($fieldErrors['meeting_time']) ? 'is-invalid' : ''; ?>" 
                                       id="meeting_time" 
                                       name="meeting_time" 
                                       value="<?php echo isset($_POST['meeting_time']) ? escape($_POST['meeting_time']) : ''; ?>">
                                <div class="invalid-feedback"><?php echo $fieldErrors['meeting_time'] ?? ''; ?></div>
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <label for="meeting_place" class="form-label">สถานที่จัดประชุม / ที่อยู่บริษัท (กรณีเลิกบริษัท) <span class="required">*</span></label>
                            <textarea class="form-control <?php echo isset($fieldErrors['meeting_place']) ? 'is-invalid' : ''; ?>" 
                                      id="meeting_place" 
                                      name="meeting_place" 
                                      rows="3"
                                      placeholder="เช่น ห้องประชุม ชั้น 5 อาคาร ABC หรือ เลขที่ 123 ถนน... แขวง... เขต... กรุงเทพฯ"><?php echo isset($_POST['meeting_place']) ? escape($_POST['meeting_place']) : ''; ?></textarea>
                            <div class="invalid-feedback"><?php echo $fieldErrors['meeting_place'] ?? ''; ?></div>
                        </div>
                        
                        <div class="mb-4">
                            <label for="placard_date" class="form-label">วันที่ลงโฆษณา <span class="required">*</span></label>
                            <input type="date" 
                                   class="form-control <?php echo isset($fieldErrors['placard_date']) ? 'is-invalid' : ''; ?>" 
                                   id="placard_date" 
                                   name="placard_date" 
                                   value="<?php echo isset($_POST['placard_date']) ? escape($_POST['placard_date']) : date('Y-m-d'); ?>">
                            <div class="invalid-feedback"><?php echo $fieldErrors['placard_date'] ?? ''; ?></div>
                            <small style="color: #6c757d; display: block; margin-top: 5px;">
                                <i class="fas fa-info-circle"></i> วันที่ต้องการให้ประกาศปรากฏในหนังสือพิมพ์
                            </small>
                        </div>
                        
                        <div class="mb-4">
                            <label for="content" class="form-label">รายละเอียดเพิ่มเติม</label>
                            <textarea class="form-control" 
                                      id="content" 
                                      name="content" 
                                      rows="4"
                                      placeholder="ข้อมูลเพิ่มเติมอื่นๆ (ถ้ามี)"><?php echo isset($_POST['content']) ? escape($_POST['content']) : ''; ?></textarea>
                            <small style="color: #6c757d; display: block; margin-top: 5px;">
                                <i class="fas fa-info-circle"></i> ไม่บังคับ - สามารถระบุข้อมูลเพิ่มเติมหรืออัปโหลดไฟล์แทนได้
                            </small>
                        </div>
                        
                        <!-- File Upload Section -->
                        <div class="form-section-title">
                            <i class="fas fa-cloud-upload-alt"></i> อัปโหลดไฟล์ (ถ้ามี)
                        </div>
                        
                        <div class="file-upload-zone" onclick="document.getElementById('ad_file').click()">
                            <div class="file-upload-icon">
                                <i class="fas fa-cloud-upload-alt"></i>
                            </div>
                            <div class="file-upload-text">
                                <strong>คลิกเพื่ออัปโหลดไฟล์</strong> หรือลากไฟล์มาวางที่นี่
                            </div>
                            <div class="file-upload-hint">
                                รองรับ: PDF, JPG, PNG, GIF (ขนาดไม่เกิน 10 MB)
                            </div>
                            <input type="file" 
                                   id="ad_file" 
                                   name="ad_file" 
                                   accept=".pdf,.jpg,.jpeg,.png,.gif">
                        </div>
                        
                        <div class="preview-container" id="previewContainer">
                            <h6 style="color: #667eea; font-weight: 600; margin-bottom: 15px;">
                                <i class="fas fa-eye"></i> ตัวอย่างไฟล์
                            </h6>
                            <div id="previewContent"></div>
                        </div>
                        
                        <div class="warning-alert">
                            <i class="fas fa-exclamation-triangle"></i>
                            <strong>หมายเหตุ:</strong> 
                            ประกาศของคุณจะต้องผ่านการตรวจสอบโดยผู้ดูแลระบบก่อนเผยแพร่ 
                            และเครดิตจะถูกหักทันทีเมื่อส่งประกาศ
                        </div>
                        
                        <div class="button-group">
                            <a href="dashboard.php" class="btn-cancel">
                                <i class="fas fa-times"></i> ยกเลิก
                            </a>
                            <button type="submit" class="btn-submit" id="submitBtn">
                                <i class="fas fa-paper-plane"></i> ส่งประกาศ
                            </button>
                        </div>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Store choices data
        let choicesData = [];
        
        // Load choices from API
        async function loadChoices() {
            try {
                const response = await fetch('<?php echo BASE_URL; ?>api/get-choices.php');
                const result = await response.json();
                
                if (result.success && result.data) {
                    choicesData = result.data;
                    populateChoicesDropdown();
                }
            } catch (error) {
                console.error('Error loading choices:', error);
            }
        }
        
        // Populate dropdown with choices
        function populateChoicesDropdown() {
            const select = document.getElementById('title_select');
            
            choicesData.forEach(choice => {
                if (choice.title) {
                    const option = document.createElement('option');
                    option.value = choice.id;
                    option.textContent = choice.title;
                    option.dataset.agenda = choice.agenda || '';
                    select.appendChild(option);
                }
            });
            
            // Restore previously selected value after populating
            restoreSavedTitleSelect();
        }
        
        // Handle title selection change
        function handleTitleChange(select) {
            const titleInput = document.getElementById('title');
            const agendaTextarea = document.getElementById('meeting_agenda');
            const selectedOption = select.options[select.selectedIndex];
            
            if (select.value === 'custom') {
                // Show custom input
                titleInput.style.display = 'block';
                titleInput.value = '';
                titleInput.focus();
                agendaTextarea.value = '';
            } else if (select.value === '') {
                // No selection
                titleInput.style.display = 'none';
                titleInput.value = '';
                agendaTextarea.value = '';
            } else {
                // Selected from dropdown
                titleInput.style.display = 'none';
                titleInput.value = selectedOption.textContent;
                
                // Auto-populate agenda if available
                if (selectedOption.dataset.agenda) {
                    agendaTextarea.value = selectedOption.dataset.agenda;
                    
                    // Add a nice animation
                    agendaTextarea.style.background = 'rgba(102, 126, 234, 0.1)';
                    setTimeout(() => {
                        agendaTextarea.style.background = '';
                    }, 1000);
                }
            }
        }
        
        // Restore saved dropdown selection after choices are loaded
        function restoreSavedTitleSelect() {
            const savedValue = '<?php echo isset($_POST['title_select']) ? addslashes($_POST['title_select']) : ''; ?>';
            if (!savedValue) return;
            
            const select = document.getElementById('title_select');
            const titleInput = document.getElementById('title');
            select.value = savedValue;
            
            if (savedValue === 'custom') {
                titleInput.style.display = 'block';
                // Keep the existing value from PHP
            } else if (savedValue !== '') {
                titleInput.style.display = 'none';
                // Keep the title value already echoed by PHP into the input
                const savedTitle = '<?php echo isset($_POST['title']) ? addslashes($_POST['title']) : ''; ?>';
                if (savedTitle) titleInput.value = savedTitle;
            }
        }
        
        // Initialize on page load
        document.addEventListener('DOMContentLoaded', function() {
            loadChoices();
            
            // Scroll to error summary if present
            const errorSummary = document.getElementById('errorSummary');
            if (errorSummary) {
                errorSummary.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }
        });
        
        // File input handling
        const fileInput = document.getElementById('ad_file');
        const previewContainer = document.getElementById('previewContainer');
        const previewContent = document.getElementById('previewContent');
        const fileUploadZone = document.querySelector('.file-upload-zone');
        
        // File preview
        fileInput?.addEventListener('change', function(e) {
            const file = e.target.files[0];
            
            if (file) {
                showPreview(file);
            } else {
                hidePreview();
            }
        });
        
        function showPreview(file) {
            previewContainer.classList.add('show');
            
            if (file.type === 'application/pdf') {
                previewContent.innerHTML = `
                    <i class="fas fa-file-pdf preview-pdf-icon"></i>
                    <div class="preview-filename">${file.name}</div>
                    <div class="preview-filesize">${(file.size / 1024 / 1024).toFixed(2)} MB</div>
                `;
            } else if (file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewContent.innerHTML = `
                        <img src="${e.target.result}" class="preview-image" alt="Preview">
                        <div class="preview-filename">${file.name}</div>
                        <div class="preview-filesize">${(file.size / 1024 / 1024).toFixed(2)} MB</div>
                    `;
                };
                reader.readAsDataURL(file);
            }
        }
        
        function hidePreview() {
            previewContainer.classList.remove('show');
        }
        
        // Drag and drop
        fileUploadZone?.addEventListener('dragover', function(e) {
            e.preventDefault();
            this.classList.add('dragover');
        });
        
        fileUploadZone?.addEventListener('dragleave', function(e) {
            e.preventDefault();
            this.classList.remove('dragover');
        });
        
        fileUploadZone?.addEventListener('drop', function(e) {
            e.preventDefault();
            this.classList.remove('dragover');
            
            const files = e.dataTransfer.files;
            if (files.length > 0) {
                fileInput.files = files;
                showPreview(files[0]);
            }
        });
        
        // Client-side validation before submit
        document.getElementById('adForm')?.addEventListener('submit', function(e) {
            const submitBtn = document.getElementById('submitBtn');
            let hasError = false;
            
            // Validate title
            const titleSelect = document.getElementById('title_select');
            const titleInput = document.getElementById('title');
            if (titleSelect.value === '') {
                titleSelect.classList.add('is-invalid');
                const fb = titleSelect.nextElementSibling?.nextElementSibling?.nextElementSibling;
                hasError = true;
            } else if (titleSelect.value === 'custom' && !titleInput.value.trim()) {
                titleInput.classList.add('is-invalid');
                titleInput.nextElementSibling.style.display = 'block';
                titleInput.nextElementSibling.textContent = 'กรุณาพิมพ์หัวข้อ';
                hasError = true;
            }
            
            // Validate all required text fields
            ['companyname','meeting_number','placard_to','meeting_date','meeting_time','placard_date'].forEach(id => {
                const el = document.getElementById(id);
                if (el && !el.value.trim()) {
                    el.classList.add('is-invalid');
                    hasError = true;
                } else if (el) {
                    el.classList.remove('is-invalid');
                }
            });
            
            // Validate textareas
            ['meeting_agenda','meeting_place'].forEach(id => {
                const el = document.getElementById(id);
                if (el && !el.value.trim()) {
                    el.classList.add('is-invalid');
                    hasError = true;
                } else if (el) {
                    el.classList.remove('is-invalid');
                }
            });
            
            if (hasError) {
                e.preventDefault();
                // Scroll to first invalid field
                const firstInvalid = document.querySelector('.is-invalid');
                if (firstInvalid) {
                    firstInvalid.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }
                return;
            }
            
            // Show loading state
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>กำลังส่งประกาศ...';
        });
        
        // Clear error state on user input
        document.querySelectorAll('.form-control, .form-select, textarea').forEach(el => {
            el.addEventListener('input', function() {
                this.classList.remove('is-invalid');
            });
            el.addEventListener('change', function() {
                this.classList.remove('is-invalid');
            });
        });
    </script>
</body>
</html>
