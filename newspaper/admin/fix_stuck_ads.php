<?php
/**
 * Fix Stuck Advertisements - Manually trigger PDF generation
 */

// Database connection
$host = 'localhost';
$dbname = 'vnnsbiz';
$user = 'root';
$pass = 'vnnsbiz2026';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage() . "\n");
}

echo "=== Checking for Stuck Advertisements ===\n\n";

// Find ads with 'approved' status (waiting for PDF)
$query = "SELECT id, title, companyname, status, placard_date, created_at 
          FROM placard 
          WHERE status = 'approved' 
          ORDER BY placard_date DESC";

$stmt = $pdo->query($query);
$stuckAds = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (empty($stuckAds)) {
    echo "✅ No stuck ads found. All ads are either pending or published.\n\n";
    
    // Show status summary
    $summary = $pdo->query("SELECT status, COUNT(*) as count 
                           FROM placard 
                           GROUP BY status")->fetchAll(PDO::FETCH_ASSOC);
    
    echo "Status Summary:\n";
    foreach ($summary as $row) {
        echo "  - {$row['status']}: {$row['count']} ads\n";
    }
    exit(0);
}

echo "Found " . count($stuckAds) . " stuck ads:\n\n";

foreach ($stuckAds as $ad) {
    echo "ID: {$ad['id']}\n";
    echo "Company: {$ad['companyname']}\n";
    echo "Date: {$ad['placard_date']}\n";
    echo "Created: {$ad['created_at']}\n";
    echo "---\n";
}

echo "\n🔧 Attempting to generate PDFs via web request...\n\n";

// Get unique dates
$dates = array_unique(array_column($stuckAds, 'placard_date'));

// Trigger PDF generation via internal URL
$baseUrl = 'https://vnn.mac.in.th/newspaper/';

foreach ($dates as $date) {
    echo "Processing date: $date\n";
    
    // Call the PHP script via include to trigger PDF generation
    $_SERVER['REQUEST_METHOD'] = 'POST';
    $_POST['action'] = 'regenerate_pdf';
    $_POST['date'] = $date;
    
    // Alternative: Use curl or file_get_contents
    $url = $baseUrl . "scripts/regenerate_pdf.php?date=" . urlencode($date);
    
    // For now, let's just manually trigger using PlacardIssue class
    // We'll include the necessary files
    require_once dirname(__DIR__) . '/includes/config.php';
    
    try {
        $placardIssue = new PlacardIssue();
        $result = $placardIssue->generateIssue($date, true); // Force regenerate
        
        if ($result && isset($result['success']) && $result['success']) {
            echo "  ✅ PDF generated: {$result['filename']}\n";
            echo "  📊 Ads included: {$result['ad_count']}\n";
        } else {
            $error = isset($result['error']) ? $result['error'] : 'Unknown error';
            echo "  ❌ Error: $error\n";
            print_r($result);
        }
    } catch (Exception $e) {
        echo "  ❌ Exception: " . $e->getMessage() . "\n";
        echo "  Stack trace:\n" . $e->getTraceAsString() . "\n";
    }
    
    echo "\n";
}

// Check results
$stillStuck = $pdo->query($query)->fetchAll(PDO::FETCH_ASSOC);

if (empty($stillStuck)) {
    echo "✅ All stuck ads have been published!\n";
} else {
    echo "⚠️ Still have " . count($stillStuck) . " stuck ads.\n";
    echo "Please check PHP error logs for details.\n";
}

echo "\nDone.\n";
