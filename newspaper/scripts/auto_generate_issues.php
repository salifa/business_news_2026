#!/usr/bin/env php
<?php
/**
 * Auto-generate placard issues
 * Run daily via cron job
 */

// Set path
chdir(__DIR__ . '/..');

require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../classes/PlacardIssue.php';

echo "[" . date('Y-m-d H:i:s') . "] Starting auto-generation...\n";

try {
    $placardIssue = new PlacardIssue();
    $result = $placardIssue->autoGenerateIssues();
    
    echo "[" . date('Y-m-d H:i:s') . "] Auto-generation completed\n";
    echo "  - Generated: " . $result['total_generated'] . " issues\n";
    echo "  - Failed: " . $result['total_failed'] . " issues\n";
    
    if (!empty($result['generated'])) {
        echo "  - Dates generated: " . implode(', ', $result['generated']) . "\n";
    }
    
    if (!empty($result['failed'])) {
        echo "  - Failed dates:\n";
        foreach ($result['failed'] as $fail) {
            echo "    * " . $fail['date'] . ": " . $fail['error'] . "\n";
        }
    }
    
    echo "[" . date('Y-m-d H:i:s') . "] Done!\n\n";
    
} catch (Exception $e) {
    echo "[" . date('Y-m-d H:i:s') . "] ERROR: " . $e->getMessage() . "\n\n";
    exit(1);
}

exit(0);
