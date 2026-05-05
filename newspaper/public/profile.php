<?php
/**
 * Profile Page Placeholder
 */
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/auth.php';

requireLogin();

$user = getCurrentUser();

include __DIR__ . '/../includes/header.php';
?>

<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5><i class="bi bi-person-circle"></i> โปรไฟล์</h5>
                </div>
                <div class="card-body">
                    <p><strong>User ID:</strong> <?php echo $user['id'] ?? 'Test User'; ?></p>
                    <p><strong>Role:</strong> <?php echo $_SESSION['user_role'] ?? 'admin'; ?></p>
                    <p><strong>Login Time:</strong> <?php echo date('Y-m-d H:i:s', $_SESSION['login_time'] ?? time()); ?></p>
                    
                    <hr>
                    
                    <a href="<?php echo BASE_URL; ?>public/logout.php" class="btn btn-danger">
                        <i class="bi bi-box-arrow-right"></i> ออกจากระบบ
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
