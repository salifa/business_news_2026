<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/database.php';

$db = Database::getInstance();

// Get ads for 2026-04-30
$issue_date = '2026-04-30';
$start_date = date('Y-m-d', strtotime($issue_date . ' -7 days'));
$end_date = $issue_date;

$sql = "SELECT * FROM placard 
        WHERE status = 'approved' 
        AND placard_date >= :start_date 
        AND placard_date <= :end_date
        ORDER BY placard_date ASC, id ASC";

$ads = $db->query($sql, [
    ':start_date' => $start_date,
    ':end_date' => $end_date
]);

echo "Found " . count($ads) . " ads\n\n";
foreach ($ads as $ad) {
    echo "ID: {$ad['id']}, Company: {$ad['companyname']}, Date: {$ad['placard_date']}\n";
}

echo "\n=== Testing Python Script ===\n";

$ads_json = json_encode($ads, JSON_UNESCAPED_UNICODE);
$python_script = __DIR__ . '/scripts/generate_placard_pdf.py';
$python_path = '/websites/vnn.mac.in.th/.venv/bin/python';

$command = sprintf(
    '%s %s %s %s 2>&1',
    escapeshellarg($python_path),
    escapeshellarg($python_script),
    escapeshellarg($issue_date),
    escapeshellarg($ads_json)
);

echo "Running command:\n";
echo "$command\n\n";

echo "Output:\n";
$output = shell_exec($command);
echo $output . "\n";

echo "\n=== Decoded Result ===\n";
$result = json_decode($output, true);
print_r($result);
