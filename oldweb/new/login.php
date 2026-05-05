<?php
require_once 'config/db-config.php';

// Handle login
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    // Validate CSRF token
    if (!isset($_POST['csrf_token']) || !validateCSRFToken($_POST['csrf_token'])) {
        $error = "คำขอไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง";
    } else {
        // Validate and sanitize input
        $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
        $password = $_POST['password'];
        
        if (!$email) {
            $error = "รูปแบบอีเมลไม่ถูกต้อง";
        } elseif (empty($password)) {
            $error = "กรุณากรอกรหัสผ่าน";
        } else {
            $conn = getDBConnection();
            $sql = "SELECT * FROM online_placard_users WHERE email = ? AND active = 1";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($result->num_rows > 0) {
                $user = $result->fetch_assoc();
                
                // Verify password - support both bcrypt and legacy MD5
                $password_valid = false;
                if (password_verify($password, $user['password'])) {
                    // bcrypt password
                    $password_valid = true;
                } elseif (md5($password) == $user['password']) {
                    // Legacy MD5 password - upgrade to bcrypt
                    $password_valid = true;
                    $new_hash = password_hash($password, PASSWORD_BCRYPT);
                    $update_sql = "UPDATE online_placard_users SET password = ? WHERE email = ?";
                    $update_stmt = $conn->prepare($update_sql);
                    $update_stmt->bind_param("ss", $new_hash, $email);
                    $update_stmt->execute();
                }
                
                if ($password_valid) {
                    session_regenerate_id(true); // Prevent session fixation
                    $_SESSION['user_id'] = $user['email'];
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['fullname'] = $user['fullname'];
                    $_SESSION['groupid'] = $user['groupid'];
                    
                    header('Location: dashboard.php');
                    exit();
                } else {
                    $error = "รหัสผ่านไม่ถูกต้อง";
                }
            } else {
                $error = "ไม่พบบัญชีผู้ใช้นี้";
            }
            $conn->close();
        }
    }
}

// Handle registration
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
    // Validate CSRF token
    if (!isset($_POST['csrf_token']) || !validateCSRFToken($_POST['csrf_token'])) {
        $error = "คำขอไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง";
    } else {
        // Validate and sanitize input
        $username = trim($_POST['reg_username']);
        $email = filter_var(trim($_POST['reg_email']), FILTER_VALIDATE_EMAIL);
        $password = $_POST['reg_password'];
        $fullname = trim($_POST['reg_fullname']);
        
        // Validation
        if (empty($username) || strlen($username) < 3) {
            $error = "ชื่อผู้ใช้ต้องมีอย่างน้อย 3 ตัวอักษร";
        } elseif (!$email) {
            $error = "รูปแบบอีเมลไม่ถูกต้อง";
        } elseif (empty($password) || strlen($password) < 6) {
            $error = "รหัสผ่านต้องมีอย่างน้อย 6 ตัวอักษร";
        } elseif (empty($fullname)) {
            $error = "กรุณากรอกชื่อ-นามสกุล";
        } else {
            $conn = getDBConnection();
            
            // Check if email already exists
            $sql = "SELECT email FROM online_placard_users WHERE email = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($result->num_rows > 0) {
                $error = "อีเมลนี้ถูกใช้งานแล้ว";
            } else {
                // Hash password with bcrypt
                $password_hash = password_hash($password, PASSWORD_BCRYPT);
                
                // Insert new user
                $sql = "INSERT INTO online_placard_users (username, email, password, fullname, groupid, active) 
                        VALUES (?, ?, ?, ?, '2', 1)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ssss", $username, $email, $password_hash, $fullname);
                
                if ($stmt->execute()) {
                    $success = "สมัครสมาชิกสำเร็จ กรุณาเข้าสู่ระบบ";
                } else {
                    $error = "เกิดข้อผิดพลาด กรุณาลองใหม่อีกครั้ง";
                }
            }
            $conn->close();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าสู่ระบบ - VNNBIZS</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Prompt&display=swap">
    <style>
        body {
            font-family: 'Prompt', sans-serif;
            background: linear-gradient(135deg, #2193b0 0%, #6dd5ed 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.1);
            overflow: hidden;
            max-width: 900px;
            width: 100%;
        }
        .login-header {
            background: linear-gradient(135deg, #2193b0 0%, #6dd5ed 100%);
            color: white;
            padding: 30px;
            text-align: center;
        }
        .form-section {
            padding: 40px;
        }
        .nav-tabs .nav-link {
            color: #2193b0;
            font-weight: 500;
        }
        .nav-tabs .nav-link.active {
            background-color: #2193b0;
            color: white;
        }
        .btn-primary {
            background: linear-gradient(135deg, #2193b0 0%, #6dd5ed 100%);
            border: none;
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(33, 147, 176, 0.4);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="login-container">
            <div class="login-header">
                <h2><strong>VNNBIZS</strong></h2>
                <p class="mb-0">ระบบลงประกาศบริษัท</p>
            </div>
            
            <div class="form-section">
                <?php if (isset($error)): ?>
                    <div class="alert alert-danger"><?php echo escape($error); ?></div>
                <?php endif; ?>
                
                <?php if (isset($success)): ?>
                    <div class="alert alert-success"><?php echo escape($success); ?></div>
                <?php endif; ?>
                
                <ul class="nav nav-tabs mb-4" id="loginTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="login-tab" data-bs-toggle="tab" data-bs-target="#login" type="button">เข้าสู่ระบบ</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="register-tab" data-bs-toggle="tab" data-bs-target="#register" type="button">สมัครสมาชิก</button>
                    </li>
                </ul>
                
                <div class="tab-content" id="loginTabContent">
                    <!-- Login Form -->
                    <div class="tab-pane fade show active" id="login" role="tabpanel">
                        <form method="POST" action="">
                            <input type="hidden" name="csrf_token" value="<?php echo generateCSRFToken(); ?>">
                            <div class="mb-3">
                                <label for="email" class="form-label">อีเมล</label>
                                <input type="email" class="form-control" id="email" name="email" required maxlength="100">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">รหัสผ่าน</label>
                                <input type="password" class="form-control" id="password" name="password" required minlength="6" maxlength="100">
                            </div>
                            <button type="submit" name="login" class="btn btn-primary w-100">เข้าสู่ระบบ</button>
                        </form>
                        <div class="text-center mt-3">
                            <a href="index.html" class="text-decoration-none">← กลับหน้าแรก</a>
                        </div>
                    </div>
                    
                    <!-- Register Form -->
                    <div class="tab-pane fade" id="register" role="tabpanel">
                        <form method="POST" action="">
                            <input type="hidden" name="csrf_token" value="<?php echo generateCSRFToken(); ?>">
                            <div class="mb-3">
                                <label for="reg_fullname" class="form-label">ชื่อ-นามสกุล</label>
                                <input type="text" class="form-control" id="reg_fullname" name="reg_fullname" required maxlength="100">
                            </div>
                            <div class="mb-3">
                                <label for="reg_username" class="form-label">ชื่อผู้ใช้</label>
                                <input type="text" class="form-control" id="reg_username" name="reg_username" required minlength="3" maxlength="50">
                            </div>
                            <div class="mb-3">
                                <label for="reg_email" class="form-label">อีเมล</label>
                                <input type="email" class="form-control" id="reg_email" name="reg_email" required maxlength="100">
                            </div>
                            <div class="mb-3">
                                <label for="reg_password" class="form-label">รหัสผ่าน (อย่างน้อย 6 ตัวอักษร)</label>
                                <input type="password" class="form-control" id="reg_password" name="reg_password" required minlength="6" maxlength="100">
                            </div>
                            <button type="submit" name="register" class="btn btn-primary w-100">สมัครสมาชิก</button>
                        </form>
                        <div class="text-center mt-3">
                            <a href="index.html" class="text-decoration-none">← กลับหน้าแรก</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
