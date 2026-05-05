<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/database.php';

$db = Database::getInstance();

// Check recent ads
echo "=== RECENT ADS ===\n";
$ads = $db->query("SELECT id, title, companyname, status, placard_date, issue_id, approved_at, created_at FROM placard ORDER BY id DESC LIMIT 5");

foreach ($ads as $ad) {
    echo "ID: {$ad['id']}\n";
    echo "Title: {$ad['title']}\n";
    echo "Company: {$ad['companyname']}\n";
    echo "Status: {$ad['status']}\n";
    echo "Placard Date: {$ad['placard_date']}\n";
    echo "Issue ID: {$ad['issue_id']}\n";
    echo "Approved At: {$ad['approved_at']}\n";
    echo "Created At: {$ad['created_at']}\n";
    echo "---\n";
}

// Check placard_issues
echo "\n=== RECENT PDF ISSUES ===\n";
$issues = $db->query("SELECT * FROM placard_issues ORDER BY id DESC LIMIT 3");

foreach ($issues as $issue) {
    echo "Issue ID: {$issue['id']}\n";
    echo "Date: {$issue['issue_date']}\n";
    echo "Filename: {$issue['filename']}\n";
    echo "Status: {$issue['status']}\n";
    echo "Ad Count: {$issue['ad_count']}\n";
    echo "Created At: {$issue['created_at']}\n";
    echo "---\n";
}

// Check logs
echo "\n=== RECENT PDF GENERATION LOGS ===\n";
$logFile = __DIR__ . '/logs/pdf_generation.log';
if (file_exists($logFile)) {
    $logs = file($logFile);
    $recentLogs = array_slice($logs, -20);
    echo implode('', $recentLogs);
} else {
    echo "No log file found at: $logFile\n";
}
