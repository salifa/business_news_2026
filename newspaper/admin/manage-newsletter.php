<?php
/**
 * Newsletter Management Admin Panel
 * Allows admins to edit newsletter content for published newspapers
 */

require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/database.php';
require_once __DIR__ . '/../includes/auth.php';
require_once __DIR__ . '/../classes/Newsletter.php';

// Check if user is logged in as admin
requireAdmin();

$db = Database::getInstance();
$newsletter = new Newsletter();

$message = '';
$messageType = '';

// Get newspaper ID from URL
$newspaper_id = $_GET['id'] ?? null;
$newspaperData = null;
$newsletterContent = null;

if ($newspaper_id) {
    // Fetch newspaper data
    $stmt = $db->prepare("SELECT * FROM newspapers WHERE id = ?");
    $stmt->execute([$newspaper_id]);
    $newspaperData = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($newspaperData) {
        // Get newsletter content
        $result = $newsletter->getNewsletterContent($newspaper_id);
        if ($result['success']) {
            $newsletterContent = $result['content'];
        }
    }
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $newspaper_id) {
    $action = $_POST['action'] ?? '';
    
    if ($action === 'save_content') {
        $content = [
            'coverPage' => [
                'headline' => $_POST['cover_headline'] ?? '',
                'subHeadline' => $_POST['cover_subheadline'] ?? '',
                'coverImage' => $_POST['cover_image'] ?? '',
                'stories' => array_filter(explode("\n", $_POST['cover_stories'] ?? '')),
                'highlights' => []
            ],
            'letterPages' => [
                [
                    'companyName' => $_POST['letter_company_name'] ?? '',
                    'companyAddress' => $_POST['letter_company_address'] ?? '',
                    'showLetterhead' => isset($_POST['show_letterhead']),
                    'content' => [
                        'greeting' => $_POST['letter_greeting'] ?? '',
                        'paragraphs' => array_filter(explode("\n\n", $_POST['letter_body'] ?? '')),
                        'closing' => $_POST['letter_closing'] ?? '',
                        'signature' => [
                            'name' => $_POST['signature_name'] ?? '',
                            'title' => $_POST['signature_title'] ?? ''
                        ]
                    ]
                ]
            ],
            'pdfAttachments' => [],
            'pdfAdvertisements' => []
        ];
        
        $result = $newsletter->saveNewsletterContent($newspaper_id, $content);
        if ($result['success']) {
            $message = 'บันทึกข้อมูลจดหมายข่าวสำเร็จ';
            $messageType = 'success';
            $newsletterContent = $content;
        } else {
            $message = 'เกิดข้อผิดพลาด: ' . $result['message'];
            $messageType = 'error';
        }
    } elseif ($action === 'generate_default') {
        $result = $newsletter->generateDefaultContent($newspaper_id);
        if ($result['success']) {
            $message = 'สร้างเนื้อหาเริ่มต้นสำเร็จ';
            $messageType = 'success';
            // Reload content
            $result = $newsletter->getNewsletterContent($newspaper_id);
            if ($result['success']) {
                $newsletterContent = $result['content'];
            }
        } else {
            $message = 'เกิดข้อผิดพลาด: ' . $result['message'];
            $messageType = 'error';
        }
    }
}

// Get list of all newspapers for selection
$stmt = $db->prepare("
    SELECT id, newspaper_date, status, page_count, advertisement_count 
    FROM newspapers 
    ORDER BY newspaper_date DESC 
    LIMIT 50
");
$stmt->execute();
$newspapers = $stmt->fetchAll(PDO::FETCH_ASSOC);

include __DIR__ . '/../includes/header.php';
?>

<style>
.newsletter-form {
    background: white;
    padding: 2rem;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    margin-bottom: 2rem;
}

.form-group {
    margin-bottom: 1.5rem;
}

.form-group label {
    display: block;
    font-weight: 600;
    margin-bottom: 0.5rem;
    color: #333;
}

.form-group input[type="text"],
.form-group textarea {
    width: 100%;
    padding: 0.75rem;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 14px;
    font-family: inherit;
}

.form-group textarea {
    min-height: 100px;
    resize: vertical;
}

.form-group .help-text {
    font-size: 12px;
    color: #666;
    margin-top: 0.25rem;
}

.form-actions {
    display: flex;
    gap: 1rem;
    margin-top: 2rem;
}

.btn-preview {
    background: #2196F3;
    color: white;
}

.btn-preview:hover {
    background: #1976D2;
}

.newspaper-selector {
    background: white;
    padding: 1.5rem;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    margin-bottom: 2rem;
}

.newspaper-list {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 1rem;
    margin-top: 1rem;
}

.newspaper-card {
    border: 1px solid #ddd;
    padding: 1rem;
    border-radius: 4px;
    transition: all 0.3s;
    cursor: pointer;
}

.newspaper-card:hover {
    border-color: #1a472a;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}

.newspaper-card.active {
    border-color: #1a472a;
    background: #f0f8f0;
}

.newspaper-card h4 {
    margin: 0 0 0.5rem 0;
    color: #1a472a;
}

.newspaper-card .meta {
    font-size: 12px;
    color: #666;
}

.status-badge {
    display: inline-block;
    padding: 2px 8px;
    border-radius: 3px;
    font-size: 11px;
    font-weight: 600;
    margin-top: 0.5rem;
}

.status-published {
    background: #4CAF50;
    color: white;
}

.status-draft {
    background: #FFC107;
    color: #333;
}

.section-divider {
    border-top: 2px solid #1a472a;
    margin: 2rem 0;
    padding-top: 1rem;
}

.section-title {
    color: #1a472a;
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 1rem;
}
</style>

<div class="container">
    <div class="page-header">
        <h1>จัดการเนื้อหาจดหมายข่าว</h1>
        <p>แก้ไขเนื้อหาจดหมายข่าวสำหรับหนังสือพิมพ์ที่เผยแพร่แล้ว</p>
    </div>

    <?php if ($message): ?>
    <div class="alert alert-<?php echo $messageType; ?>">
        <?php echo htmlspecialchars($message); ?>
    </div>
    <?php endif; ?>

    <?php if (!$newspaper_id): ?>
    <!-- Newspaper Selector -->
    <div class="newspaper-selector">
        <h3>เลือกฉบับที่ต้องการแก้ไข</h3>
        <div class="newspaper-list">
            <?php foreach ($newspapers as $np): ?>
            <a href="?id=<?php echo $np['id']; ?>" class="newspaper-card">
                <h4>ฉบับที่ <?php echo $np['id']; ?></h4>
                <div class="meta">
                    วันที่: <?php echo date('d/m/Y', strtotime($np['newspaper_date'])); ?><br>
                    ประกาศ: <?php echo $np['advertisement_count']; ?> รายการ<br>
                    หน้า: <?php echo $np['page_count']; ?> หน้า
                </div>
                <span class="status-badge status-<?php echo $np['status']; ?>">
                    <?php echo $np['status']; ?>
                </span>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
    <?php else: ?>
    
    <!-- Edit Form -->
    <div class="newsletter-form">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
            <div>
                <h2>แก้ไขฉบับที่ <?php echo $newspaperData['id']; ?></h2>
                <p style="color: #666; margin: 0;">วันที่: <?php echo date('d/m/Y', strtotime($newspaperData['newspaper_date'])); ?></p>
            </div>
            <div>
                <a href="manage-newsletter.php" class="btn btn-secondary">กลับ</a>
                <a href="/news_letter2/index.html?id=<?php echo $newspaper_id; ?>" target="_blank" class="btn btn-preview">
                    👁️ ดูตัวอย่าง
                </a>
            </div>
        </div>

        <?php if (!$newsletterContent): ?>
        <div class="alert alert-info">
            <p>ยังไม่มีเนื้อหาจดหมายข่าวสำหรับฉบับนี้</p>
            <form method="POST" style="margin-top: 1rem;">
                <input type="hidden" name="action" value="generate_default">
                <button type="submit" class="btn btn-primary">สร้างเนื้อหาเริ่มต้น</button>
            </form>
        </div>
        <?php else: ?>
        
        <form method="POST">
            <input type="hidden" name="action" value="save_content">
            
            <!-- Cover Page Section -->
            <div class="section-title">📰 หน้าปก</div>
            
            <div class="form-group">
                <label>หัวข้อหลัก</label>
                <input type="text" name="cover_headline" value="<?php echo htmlspecialchars($newsletterContent['coverPage']['headline'] ?? ''); ?>" required>
            </div>
            
            <div class="form-group">
                <label>หัวข้อรอง</label>
                <input type="text" name="cover_subheadline" value="<?php echo htmlspecialchars($newsletterContent['coverPage']['subHeadline'] ?? ''); ?>">
            </div>
            
            <div class="form-group">
                <label>URL รูปภาพปก</label>
                <input type="text" name="cover_image" value="<?php echo htmlspecialchars($newsletterContent['coverPage']['coverImage'] ?? ''); ?>">
                <div class="help-text">URL ของรูปภาพ (800x400 pixels แนะนำ)</div>
            </div>
            
            <div class="form-group">
                <label>รายการเนื้อหาในฉบับ</label>
                <textarea name="cover_stories" rows="5"><?php echo htmlspecialchars(implode("\n", $newsletterContent['coverPage']['stories'] ?? [])); ?></textarea>
                <div class="help-text">แยกแต่ละรายการด้วยการขึ้นบรรทัดใหม่</div>
            </div>
            
            <div class="section-divider"></div>
            
            <!-- Letter Page Section -->
            <div class="section-title">✉️ เนื้อหาจดหมาย</div>
            
            <div class="form-group">
                <label>ชื่อบริษัท/องค์กร</label>
                <input type="text" name="letter_company_name" value="<?php echo htmlspecialchars($newsletterContent['letterPages'][0]['companyName'] ?? ''); ?>">
            </div>
            
            <div class="form-group">
                <label>ที่อยู่บริษัท</label>
                <input type="text" name="letter_company_address" value="<?php echo htmlspecialchars($newsletterContent['letterPages'][0]['companyAddress'] ?? ''); ?>">
            </div>
            
            <div class="form-group">
                <label>
                    <input type="checkbox" name="show_letterhead" <?php echo ($newsletterContent['letterPages'][0]['showLetterhead'] ?? true) ? 'checked' : ''; ?>>
                    แสดงหัวจดหมาย
                </label>
            </div>
            
            <div class="form-group">
                <label>คำทักทาย</label>
                <input type="text" name="letter_greeting" value="<?php echo htmlspecialchars($newsletterContent['letterPages'][0]['content']['greeting'] ?? ''); ?>">
            </div>
            
            <div class="form-group">
                <label>เนื้อหาจดหมาย</label>
                <textarea name="letter_body" rows="10"><?php 
                    $paragraphs = $newsletterContent['letterPages'][0]['content']['paragraphs'] ?? [];
                    $textParagraphs = array_filter($paragraphs, 'is_string');
                    echo htmlspecialchars(implode("\n\n", $textParagraphs)); 
                ?></textarea>
                <div class="help-text">แยกแต่ละย่อหน้าด้วยบรรทัดว่าง (Enter 2 ครั้ง)</div>
            </div>
            
            <div class="form-group">
                <label>คำปิดท้าย</label>
                <input type="text" name="letter_closing" value="<?php echo htmlspecialchars($newsletterContent['letterPages'][0]['content']['closing'] ?? ''); ?>">
            </div>
            
            <div class="form-group">
                <label>ชื่อผู้ลงนาม</label>
                <input type="text" name="signature_name" value="<?php echo htmlspecialchars($newsletterContent['letterPages'][0]['content']['signature']['name'] ?? ''); ?>">
            </div>
            
            <div class="form-group">
                <label>ตำแหน่งผู้ลงนาม</label>
                <input type="text" name="signature_title" value="<?php echo htmlspecialchars($newsletterContent['letterPages'][0]['content']['signature']['title'] ?? ''); ?>">
            </div>
            
            <div class="form-actions">
                <button type="submit" class="btn btn-primary">💾 บันทึกการเปลี่ยนแปลง</button>
                <a href="/news_letter2/index.html?id=<?php echo $newspaper_id; ?>" target="_blank" class="btn btn-preview">
                    👁️ ดูตัวอย่าง
                </a>
            </div>
        </form>
        
        <?php endif; ?>
    </div>
    
    <?php endif; ?>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
