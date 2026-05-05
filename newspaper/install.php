<?php
/**
 * Web-based Database Installation Script
 * Run this file once to install the database schema
 */

// Security check - delete this file after installation
if (file_exists(__DIR__ . '/install_complete.lock')) {
    die('Installation already completed. Please delete install.php and install_complete.lock for security.');
}

$error = '';
$success = '';
$step = isset($_GET['step']) ? (int)$_GET['step'] : 1;

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dbHost = $_POST['db_host'] ?? 'localhost';
    $dbUser = $_POST['db_user'] ?? '';
    $dbPass = $_POST['db_pass'] ?? '';
    $dbName = $_POST['db_name'] ?? '';
    
    try {
        // Connect to MySQL
        $dsn = "mysql:host={$dbHost};charset=utf8mb4";
        $pdo = new PDO($dsn, $dbUser, $dbPass, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
        
        // Create database if not exists
        $pdo->exec("CREATE DATABASE IF NOT EXISTS `{$dbName}` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
        $pdo->exec("USE `{$dbName}`");
        
        // Read SQL file
        $sqlFile = __DIR__ . '/database/newspaper_schema.sql';
        if (!file_exists($sqlFile)) {
            throw new Exception('SQL file not found: database/newspaper_schema.sql');
        }
        
        $sql = file_get_contents($sqlFile);
        
        // Execute SQL statements
        $statements = array_filter(array_map('trim', explode(';', $sql)));
        
        foreach ($statements as $statement) {
            if (!empty($statement)) {
                $pdo->exec($statement);
            }
        }
        
        // Update config file
        $configFile = __DIR__ . '/includes/config.php';
        $configContent = file_get_contents($configFile);
        
        $configContent = preg_replace(
            "/define\('DB_HOST', '.*?'\);/",
            "define('DB_HOST', '{$dbHost}');",
            $configContent
        );
        
        $configContent = preg_replace(
            "/define\('DB_USER', '.*?'\);/",
            "define('DB_USER', '{$dbUser}');",
            $configContent
        );
        
        $configContent = preg_replace(
            "/define\('DB_PASS', '.*?'\);/",
            "define('DB_PASS', '{$dbPass}');",
            $configContent
        );
        
        $configContent = preg_replace(
            "/define\('DB_NAME', '.*?'\);/",
            "define('DB_NAME', '{$dbName}');",
            $configContent
        );
        
        file_put_contents($configFile, $configContent);
        
        // Create lock file
        file_put_contents(__DIR__ . '/install_complete.lock', date('Y-m-d H:i:s'));
        
        $success = 'Database installed successfully!';
        $step = 3;
        
    } catch (Exception $e) {
        $error = 'Installation failed: ' . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Installation - Newspaper System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Google Sans', sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .install-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.2);
            max-width: 600px;
            width: 100%;
            padding: 40px;
        }
        
        .install-header {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .step-indicator {
            display: flex;
            justify-content: center;
            margin-bottom: 30px;
        }
        
        .step {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #e9ecef;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 10px;
            font-weight: bold;
        }
        
        .step.active {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }
        
        .step.completed {
            background: #28a745;
            color: white;
        }
    </style>
</head>
<body>

<div class="install-card">
    <div class="install-header">
        <h1 class="h3 mb-2">
            <i class="fas fa-database text-primary"></i>
            Database Installation
        </h1>
        <p class="text-muted">Online Newspaper System</p>
    </div>
    
    <div class="step-indicator">
        <div class="step <?php echo $step >= 1 ? 'active' : ''; ?>">1</div>
        <div class="step <?php echo $step >= 2 ? 'active' : ''; ?>">2</div>
        <div class="step <?php echo $step >= 3 ? 'completed' : ''; ?>">
            <?php echo $step >= 3 ? '<i class="fas fa-check"></i>' : '3'; ?>
        </div>
    </div>
    
    <?php if ($error): ?>
        <div class="alert alert-danger">
            <i class="fas fa-exclamation-circle"></i> <?php echo htmlspecialchars($error); ?>
        </div>
    <?php endif; ?>
    
    <?php if ($success): ?>
        <div class="alert alert-success">
            <i class="fas fa-check-circle"></i> <?php echo htmlspecialchars($success); ?>
        </div>
    <?php endif; ?>
    
    <?php if ($step === 1): ?>
        <h4 class="mb-3">ขั้นตอนที่ 1: ตรวจสอบความพร้อม</h4>
        <div class="mb-3">
            <div class="alert alert-info">
                <h5 class="alert-heading">คำแนะนำ</h5>
                <ul class="mb-0">
                    <li>ตรวจสอบให้แน่ใจว่า MySQL Server ทำงานอยู่</li>
                    <li>เตรียมข้อมูลการเชื่อมต่อฐานข้อมูล</li>
                    <li>ผู้ใช้ต้องมีสิทธิ์สร้างตารางในฐานข้อมูล</li>
                </ul>
            </div>
        </div>
        <div class="d-grid">
            <a href="?step=2" class="btn btn-primary btn-lg">
                เริ่มต้นติดตั้ง <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    <?php elseif ($step === 2): ?>
        <h4 class="mb-3">ขั้นตอนที่ 2: ตั้งค่าฐานข้อมูล</h4>
        <form method="POST">
            <div class="mb-3">
                <label for="db_host" class="form-label">MySQL Host</label>
                <input type="text" class="form-control" id="db_host" name="db_host" 
                       value="localhost" required>
            </div>
            
            <div class="mb-3">
                <label for="db_user" class="form-label">MySQL Username</label>
                <input type="text" class="form-control" id="db_user" name="db_user" 
                       value="root" required>
            </div>
            
            <div class="mb-3">
                <label for="db_pass" class="form-label">MySQL Password</label>
                <input type="password" class="form-control" id="db_pass" name="db_pass">
                <small class="text-muted">ปล่อยว่างไว้หากไม่มีรหัสผ่าน</small>
            </div>
            
            <div class="mb-3">
                <label for="db_name" class="form-label">Database Name</label>
                <input type="text" class="form-control" id="db_name" name="db_name" 
                       value="vnnsbiz" required>
                <small class="text-muted">ฐานข้อมูลจะถูกสร้างอัตโนมัติหากยังไม่มี</small>
            </div>
            
            <div class="d-grid">
                <button type="submit" class="btn btn-success btn-lg">
                    <i class="fas fa-cog"></i> ติดตั้งฐานข้อมูล
                </button>
            </div>
        </form>
    <?php elseif ($step === 3): ?>
        <h4 class="mb-3">ขั้นตอนที่ 3: เสร็จสิ้น</h4>
        <div class="alert alert-success">
            <h5 class="alert-heading">
                <i class="fas fa-check-circle"></i> ติดตั้งสำเร็จ!
            </h5>
            <p class="mb-0">ฐานข้อมูลได้ถูกติดตั้งเรียบร้อยแล้ว</p>
        </div>
        
        <div class="alert alert-warning">
            <h5 class="alert-heading">
                <i class="fas fa-exclamation-triangle"></i> สำคัญ!
            </h5>
            <p class="mb-0">
                กรุณาลบไฟล์ <code>install.php</code> และ <code>install_complete.lock</code> 
                ออกจากเซิร์ฟเวอร์ เพื่อความปลอดภัย
            </p>
        </div>
        
        <h5 class="mt-4">ขั้นตอนต่อไป:</h5>
        <ol>
            <li>ลบไฟล์ install.php ออก</li>
            <li>ตั้งค่า file permissions ให้เหมาะสม</li>
            <li>เข้าสู่ระบบและเริ่มใช้งาน</li>
        </ol>
        
        <div class="d-grid gap-2">
            <a href="public/index.php" class="btn btn-primary btn-lg">
                <i class="fas fa-home"></i> ไปยังหน้าแรก
            </a>
            <a href="public/register.php" class="btn btn-outline-primary">
                <i class="fas fa-user-plus"></i> ลงทะเบียนผู้ใช้
            </a>
        </div>
    <?php endif; ?>
    
    <div class="text-center mt-4">
        <small class="text-muted">
            Online Newspaper System v1.0
        </small>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
