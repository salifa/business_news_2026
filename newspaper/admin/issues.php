<?php
/**
 * Admin - Placard Issue Management
 * Generate and manage published issues
 */

require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/auth.php';
require_once __DIR__ . '/../classes/PlacardIssue.php';

// Check admin auth
requireAdmin();

$placardIssue = new PlacardIssue();
$message = '';
$messageType = '';

// Handle actions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'generate':
                $issue_date = $_POST['issue_date'] ?? date('Y-m-d');
                $result = $placardIssue->generateIssue($issue_date);
                $message = $result['message'];
                $messageType = $result['success'] ? 'success' : 'danger';
                break;
                
            case 'auto_generate':
                $result = $placardIssue->autoGenerateIssues();
                $message = "สร้างสำเร็จ {$result['total_generated']} ฉบับ";
                if ($result['total_failed'] > 0) {
                    $message .= ", ล้มเหลว {$result['total_failed']} ฉบับ";
                }
                $messageType = 'info';
                break;
                
            case 'regenerate':
                $issue_id = $_POST['issue_id'] ?? 0;
                $result = $placardIssue->regenerateIssue($issue_id);
                $message = $result['message'];
                $messageType = $result['success'] ? 'success' : 'danger';
                break;
                
            case 'delete':
                $issue_id = $_POST['issue_id'] ?? 0;
                $result = $placardIssue->deleteIssue($issue_id);
                $message = $result['message'];
                $messageType = $result['success'] ? 'success' : 'danger';
                break;
        }
    }
}

// Get all issues
$issues = $placardIssue->getRecentIssues(100); // Get more for admin view

// Get statistics
$db = Database::getInstance();
$stats = $db->queryOne("
    SELECT 
        COUNT(*) as total_issues,
        SUM(ad_count) as total_ads,
        SUM(download_count) as total_downloads,
        SUM(file_size) as total_size
    FROM placard_issues
");

// Get pending dates (dates with approved ads but no issue)
$pendingDates = $db->query("
    SELECT DISTINCT p.placard_date, COUNT(*) as ad_count
    FROM placard p
    LEFT JOIN placard_issues pi ON p.placard_date = pi.issue_date
    WHERE p.status = 'approved' 
    AND pi.id IS NULL
    GROUP BY p.placard_date
    ORDER BY p.placard_date DESC
");

include __DIR__ . '/../includes/header.php';
?>

<div class="container-fluid py-4">
    <div class="row mb-4">
        <div class="col-md-12">
            <h2><i class="bi bi-newspaper"></i> จัดการฉบับหนังสือพิมพ์</h2>
            <p class="text-muted">สร้างและจัดการฉบับหนังสือพิมพ์ประกาศโฆษณา</p>
        </div>
    </div>
    
    <?php if ($message): ?>
        <div class="alert alert-<?php echo $messageType; ?> alert-dismissible fade show">
            <?php echo htmlspecialchars($message); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>
    
    <!-- Statistics -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h5>ฉบับทั้งหมด</h5>
                    <h2><?php echo number_format($stats['total_issues'] ?? 0); ?></h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h5>ประกาศทั้งหมด</h5>
                    <h2><?php echo number_format($stats['total_ads'] ?? 0); ?></h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <h5>ดาวน์โหลดทั้งหมด</h5>
                    <h2><?php echo number_format($stats['total_downloads'] ?? 0); ?></h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-warning text-white">
                <div class="card-body">
                    <h5>ขนาดรวม</h5>
                    <h2><?php echo formatFileSize($stats['total_size'] ?? 0); ?></h2>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Actions -->
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5><i class="bi bi-plus-circle"></i> สร้างฉบับใหม่</h5>
                </div>
                <div class="card-body">
                    <form method="POST">
                        <input type="hidden" name="action" value="generate">
                        <div class="mb-3">
                            <label class="form-label">วันที่ออกฉบับ</label>
                            <input type="date" name="issue_date" class="form-control" 
                                   value="<?php echo date('Y-m-d'); ?>" required>
                            <small class="text-muted">
                                ฉบับจะรวมประกาศตั้งแต่วันนี้ย้อนหลัง 7 วัน
                            </small>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-file-earmark-pdf"></i> สร้างฉบับ
                        </button>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5><i class="bi bi-magic"></i> สร้างอัตโนมัติ</h5>
                </div>
                <div class="card-body">
                    <p>สร้างฉบับสำหรับวันที่มีประกาศรออนุมัติทั้งหมด</p>
                    <form method="POST">
                        <input type="hidden" name="action" value="auto_generate">
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-lightning"></i> สร้างทั้งหมด
                        </button>
                    </form>
                    
                    <?php if (!empty($pendingDates)): ?>
                        <div class="mt-3">
                            <strong>วันที่รอสร้าง:</strong>
                            <ul class="list-unstyled mt-2">
                                <?php foreach ($pendingDates as $pending): ?>
                                    <li>
                                        <span class="badge bg-warning">
                                            <?php echo $pending['placard_date']; ?>
                                            (<?php echo $pending['ad_count']; ?> รายการ)
                                        </span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Issues List -->
    <div class="card">
        <div class="card-header">
            <h5><i class="bi bi-list"></i> ฉบับที่เผยแพร่แล้ว</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>วันที่ออกฉบับ</th>
                            <th>ช่วงวันที่</th>
                            <th>จำนวนประกาศ</th>
                            <th>ขนาดไฟล์</th>
                            <th>ดาวน์โหลด</th>
                            <th>สร้างเมื่อ</th>
                            <th>การจัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($issues)): ?>
                            <tr>
                                <td colspan="8" class="text-center">ยังไม่มีฉบับที่เผยแพร่</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($issues as $issue): ?>
                                <tr>
                                    <td><?php echo $issue['id']; ?></td>
                                    <td>
                                        <strong><?php echo date('d/m/Y', strtotime($issue['issue_date'])); ?></strong>
                                    </td>
                                    <td>
                                        <small>
                                            <?php echo date('d/m', strtotime($issue['date_range_start'])); ?> -
                                            <?php echo date('d/m', strtotime($issue['date_range_end'])); ?>
                                        </small>
                                    </td>
                                    <td>
                                        <span class="badge bg-info"><?php echo $issue['ad_count']; ?></span>
                                    </td>
                                    <td><?php echo formatFileSize($issue['file_size']); ?></td>
                                    <td>
                                        <span class="badge bg-success">
                                            <?php echo number_format($issue['download_count']); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <small><?php echo date('d/m/Y H:i', strtotime($issue['generated_at'])); ?></small>
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <a href="/newspaper/public/download.php?download=<?php echo $issue['id']; ?>" 
                                               class="btn btn-primary" target="_blank" title="ดาวน์โหลด">
                                                <i class="bi bi-download"></i>
                                            </a>
                                            <button type="button" class="btn btn-warning" 
                                                    onclick="regenerateIssue(<?php echo $issue['id']; ?>)" 
                                                    title="สร้างใหม่">
                                                <i class="bi bi-arrow-repeat"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger" 
                                                    onclick="deleteIssue(<?php echo $issue['id']; ?>)" 
                                                    title="ลบ">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
function regenerateIssue(issueId) {
    if (confirm('ต้องการสร้างฉบับนี้ใหม่หรือไม่?')) {
        const form = document.createElement('form');
        form.method = 'POST';
        form.innerHTML = `
            <input type="hidden" name="action" value="regenerate">
            <input type="hidden" name="issue_id" value="${issueId}">
        `;
        document.body.appendChild(form);
        form.submit();
    }
}

function deleteIssue(issueId) {
    if (confirm('ต้องการลบฉบับนี้หรือไม่? การกระทำนี้ไม่สามารถย้อนกลับได้')) {
        const form = document.createElement('form');
        form.method = 'POST';
        form.innerHTML = `
            <input type="hidden" name="action" value="delete">
            <input type="hidden" name="issue_id" value="${issueId}">
        `;
        document.body.appendChild(form);
        form.submit();
    }
}
</script>

<?php
include __DIR__ . '/../includes/footer.php';

function formatFileSize($bytes) {
    if ($bytes >= 1073741824) {
        return number_format($bytes / 1073741824, 2) . ' GB';
    } elseif ($bytes >= 1048576) {
        return number_format($bytes / 1048576, 2) . ' MB';
    } elseif ($bytes >= 1024) {
        return number_format($bytes / 1024, 2) . ' KB';
    } else {
        return $bytes . ' bytes';
    }
}
?>
