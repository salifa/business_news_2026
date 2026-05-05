<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/database.php';

$db = Database::getInstance();

echo "=== Manually Fixing Stuck Ads ===\n\n";

// Check if PDF exists
$pdf_path = __DIR__ . '/generated_pdfs/placard_2026-04-30.pdf';
if (!file_exists($pdf_path)) {
    die("ERROR: PDF file not found at $pdf_path\n");
}

$filesize = filesize($pdf_path);
echo "✓ PDF exists: placard_2026-04-30.pdf (" . round($filesize/1024) . " KB)\n\n";

// Create or get placard_issues record
$existing = $db->query("SELECT * FROM placard_issues WHERE issue_date = '2026-04-30'");

if (!empty($existing)) {
    $issueId = $existing[0]['id'];
    echo "✓ Issue record already exists: ID $issueId\n";
    
    // Update it
    $db->update('placard_issues', 
        ['ad_count' => 2, 'file_size' => $filesize, 'status' => 'published'],
        'id = :id',
        [':id' => $issueId]
    );
    echo "✓ Updated issue record\n";
} else {
    // Create new issue record
    $issueData = [
        'issue_date' => '2026-04-30',
        'filename' => 'placard_2026-04-30.pdf',
        'ad_count' => 2,
        'file_size' => $filesize,
        'status' => 'published',
        'generated_at' => date('Y-m-d H:i:s'),
        'date_range_start' => '2026-04-23',
        'date_range_end' => '2026-04-30'
    ];
    
    $issueId = $db->insert('placard_issues', $issueData);
    echo "✓ Created new issue record: ID $issueId\n";
}

echo "\n";

// Update ads to published
$pdo = $db->getConnection();
$stmt = $pdo->prepare("UPDATE placard SET status = 'published', published_at = NOW(), issue_id = :issue_id 
                        WHERE placard_date = '2026-04-30' AND status = 'approved'");
$stmt->execute([':issue_id' => $issueId]);
$affected = $stmt->rowCount();

echo "✓ Updated $affected ads to 'published' status\n";

// Verify
echo "\n=== Verification ===\n";
$ads = $db->query("SELECT id, title, status, issue_id FROM placard WHERE placard_date = '2026-04-30' ORDER BY id");

foreach ($ads as $ad) {
    $status_icon = $ad['status'] === 'published' ? '✅' : '❌';
    echo "$status_icon ID {$ad['id']}: {$ad['title']} - {$ad['status']} (Issue: {$ad['issue_id']})\n";
}

echo "\n✅ Done!\n";
