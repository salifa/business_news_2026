<?php
/**
 * Public Download Page - No authentication required
 */
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../classes/PlacardIssue.php';

$placardIssue = new PlacardIssue();

// Get recent issues
$issues = $placardIssue->getRecentIssues(25);

// Handle download request
if (isset($_GET['download']) && is_numeric($_GET['download'])) {
    $placardIssue->downloadIssue($_GET['download']);
    exit;
}

// Format file size (if not already defined)
if (!function_exists('formatFileSize')) {
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
}
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ดาวน์โหลดหนังสือพิมพ์ประกาศโฆษณา - <?php echo NEWSPAPER_NAME; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        :root {
            --primary-color: #1E40AF;
            --secondary-color: #3B82F6;
        }
        
        body {
            font-family: 'Google Sans', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 2rem 0;
        }
        
        .download-container {
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .header-section {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            text-align: center;
        }
        
        .header-section h1 {
            color: var(--primary-color);
            font-weight: bold;
            margin-bottom: 0.5rem;
        }
        
        .header-section .subtitle {
            color: #6B7280;
            font-size: 1.1rem;
        }
        
        .issue-card {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 1rem;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            border-left: 4px solid var(--primary-color);
        }
        
        .issue-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 15px rgba(0,0,0,0.15);
        }
        
        .issue-date {
            font-size: 1.3rem;
            font-weight: bold;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }
        
        .issue-info {
            color: #6B7280;
            font-size: 0.9rem;
        }
        
        .download-btn {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            border: none;
            padding: 0.6rem 1.5rem;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .download-btn:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 12px rgba(30, 64, 175, 0.4);
        }
        
        .stats-badge {
            background: #EEF2FF;
            color: var(--primary-color);
            padding: 0.3rem 0.8rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
        }
        
        .legal-notice {
            background: #FEF3C7;
            border-left: 4px solid #F59E0B;
            padding: 1rem;
            border-radius: 8px;
            margin-top: 2rem;
        }
        
        .empty-state {
            text-align: center;
            padding: 3rem;
            color: #6B7280;
        }
        
        .empty-state i {
            font-size: 4rem;
            color: #D1D5DB;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <div class="download-container">
        <!-- Header -->
        <div class="header-section">
            <h1><i class="bi bi-newspaper"></i> หนังสือพิมพ์ข่าวสารนักบัญชี</h1>
            <p class="subtitle">ดาวน์โหลดประกาศโฆษณาบริษัท - เอกสารทางกฎหมายสำหรับการบัญชี</p>
            <div class="mt-3">
                <span class="stats-badge me-2">
                    <i class="bi bi-file-pdf"></i> มีทั้งหมด <?php echo count($issues); ?> ฉบับ
                </span>
                <span class="stats-badge">
                    <i class="bi bi-shield-check"></i> เอกสารมีผลทางกฎหมาย
                </span>
            </div>
        </div>
        
        <!-- Legal Notice -->
        <div class="legal-notice">
            <strong><i class="bi bi-info-circle"></i> ข้อมูลสำคัญ:</strong> 
            เอกสารเหล่านี้เป็นหนังสือพิมพ์ประกาศโฆษณาที่มีผลทางกฎหมาย 
            สำหรับใช้แนบเป็นหลักฐานการประชุมผู้ถือหุ้นและการทำบัญชี 
            แต่ละฉบับรวมประกาศที่มีวันที่ลงประกาศตรงกับวันที่ออกฉบับ 
            และย้อนหลัง 7 วันก่อนหน้านั้น
        </div>
        
        <!-- Issues List -->
        <div class="mt-4">
            <?php if (empty($issues)): ?>
                <div class="issue-card">
                    <div class="empty-state">
                        <i class="bi bi-inbox"></i>
                        <h4>ยังไม่มีฉบับที่เผยแพร่</h4>
                        <p>กรุณาตรวจสอบอีกครั้งในภายหลัง</p>
                    </div>
                </div>
            <?php else: ?>
                <?php foreach ($issues as $issue): ?>
                    <div class="issue-card">
                        <div class="row align-items-center">
                            <div class="col-md-7">
                                <div class="issue-date">
                                    <i class="bi bi-calendar3"></i>
                                    ฉบับวันที่ <?php echo formatThaiDate($issue['issue_date']); ?>
                                </div>
                                <div class="issue-info">
                                    <span class="me-3">
                                        <i class="bi bi-megaphone"></i> 
                                        <?php echo $issue['ad_count']; ?> รายการ
                                    </span>
                                    <span class="me-3">
                                        <i class="bi bi-hdd"></i> 
                                        <?php echo formatFileSize($issue['file_size']); ?>
                                    </span>
                                    <span class="me-3">
                                        <i class="bi bi-download"></i> 
                                        <?php echo number_format($issue['download_count']); ?> ครั้ง
                                    </span>
                                </div>
                                <div class="issue-info mt-1">
                                    <small class="text-muted">
                                        <i class="bi bi-calendar-range"></i>
                                        รวมประกาศตั้งแต่ <?php echo formatThaiDate($issue['date_range_start']); ?> 
                                        ถึง <?php echo formatThaiDate($issue['date_range_end']); ?>
                                    </small>
                                </div>
                            </div>
                            <div class="col-md-5 text-end">
                                <a href="?download=<?php echo $issue['id']; ?>" 
                                   class="download-btn"
                                   target="_blank">
                                    <i class="bi bi-file-pdf"></i> ดาวน์โหลด PDF
                                </a>
                                <div class="mt-2">
                                    <small class="text-muted">
                                        เผยแพร่เมื่อ: <?php echo formatThaiDate(date('Y-m-d', strtotime($issue['generated_at']))); ?>
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        
        <!-- Footer -->
        <div class="text-center mt-4">
            <p class="text-white">
                <i class="bi bi-building"></i> 
                หนังสือพิมพ์ข่าวสารนักบัญชี | VNNBIZS.COM<br>
                <small>โทร: 02-XXX-XXXX | Email: info@vnn.mac.in.th</small>
            </p>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
