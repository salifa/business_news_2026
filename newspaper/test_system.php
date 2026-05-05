<?php
/**
 * System Test for Newspaper Project
 * Tests the actual database structure and system functionality
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/database.php';

class SystemTest {
    private $db;
    private $passed = 0;
    private $failed = 0;
    
    public function __construct() {
        $this->db = Database::getInstance();
        echo "╔══════════════════════════════════════════════════════════╗\n";
        echo "║          NEWSPAPER SYSTEM - SYSTEM TEST                 ║\n";
        echo "╚══════════════════════════════════════════════════════════╝\n\n";
    }
    
    public function run() {
        $this->testDatabaseConnection();
        $this->testCoreTables();
        $this->testUserSystem();
        $this->testCreditSystem();
        $this->testPlacardSystem();
        $this->testNewspaperGeneration();
        $this->testPythonEnvironment();
        $this->testWebAccess();
        $this->printSummary();
    }
    
    private function testDatabaseConnection() {
        $this->section("1. DATABASE CONNECTION");
        
        try {
            $result = $this->db->query("SELECT 1 as test");
            $this->pass("Database connection successful");
            
            $version = $this->db->query("SELECT VERSION() as version")[0]['version'];
            echo "   MySQL Version: $version\n";
            
            $dbName = $this->db->query("SELECT DATABASE() as db")[0]['db'];
            echo "   Database Name: $dbName\n";
            
            $tableCount = $this->db->query("SELECT COUNT(*) as cnt FROM information_schema.tables WHERE table_schema = '$dbName'")[0]['cnt'];
            echo "   Total Tables: $tableCount\n";
            
        } catch (Exception $e) {
            $this->fail("Database connection: " . $e->getMessage());
        }
    }
    
    private function testCoreTables() {
        $this->section("2. CORE TABLES");
        
        $tables = [
            'online_placard_users' => 'User accounts',
            'placard' => 'Advertisements/Placards',
            'placard_issues' => 'Generated PDF issues',
            'credit_packages' => 'Credit packages',
            'credit_transactions' => 'Credit transaction history',
            'newspapers' => 'Newspaper management',
        ];
        
        foreach ($tables as $table => $description) {
            try {
                $count = $this->db->query("SELECT COUNT(*) as cnt FROM $table")[0]['cnt'];
                $this->pass("Table '$table' exists ($description) - $count records");
            } catch (Exception $e) {
                $this->fail("Table '$table' missing");
            }
        }
    }
    
    private function testUserSystem() {
        $this->section("3. USER SYSTEM");
        
        try {
            // Check admin users
            $admins = $this->db->query("SELECT * FROM online_placard_users WHERE ug_id = 1");
            $this->pass("Admin users found: " . count($admins));
            
            foreach ($admins as $admin) {
                echo "   Admin: {$admin['usr_email']} (ID: {$admin['usr_id']})\n";
            }
            
            // Check total users
            $totalUsers = $this->db->query("SELECT COUNT(*) as cnt FROM online_placard_users")[0]['cnt'];
            echo "   Total users: $totalUsers\n";
            
            // Check active users
            $activeUsers = $this->db->query("SELECT COUNT(*) as cnt FROM online_placard_users WHERE usr_status = 1")[0]['cnt'];
            echo "   Active users: $activeUsers\n";
            
        } catch (Exception $e) {
            $this->fail("User system error: " . $e->getMessage());
        }
    }
    
    private function testCreditSystem() {
        $this->section("4. CREDIT SYSTEM");
        
        try {
            // Credit packages
            $packages = $this->db->query("SELECT * FROM credit_packages WHERE is_active = 1 ORDER BY credits ASC");
            $this->pass("Credit packages available: " . count($packages));
            
            foreach ($packages as $pkg) {
                echo "   Package: {$pkg['name']} - ฿{$pkg['price']} = {$pkg['credits']} credits\n";
            }
            
            // Credit transactions
            $transactions = $this->db->query("SELECT COUNT(*) as cnt FROM credit_transactions")[0]['cnt'];
            echo "   Total transactions: $transactions\n";
            
            if ($transactions > 0) {
                $totalCredits = $this->db->query("SELECT SUM(credits) as total FROM credit_transactions")[0]['total'];
                echo "   Total credits transacted: $totalCredits\n";
            }
            
        } catch (Exception $e) {
            $this->fail("Credit system error: " . $e->getMessage());
        }
    }
    
    private function testPlacardSystem() {
        $this->section("5. PLACARD/ADVERTISEMENT SYSTEM");
        
        try {
            // Total placards
            $total = $this->db->query("SELECT COUNT(*) as cnt FROM placard")[0]['cnt'];
            $this->pass("Total placards: $total");
            
            // By status
            $statuses = $this->db->query("SELECT status, COUNT(*) as cnt FROM placard GROUP BY status ORDER BY cnt DESC");
            foreach ($statuses as $status) {
                echo "   Status '{$status['status']}': {$status['cnt']}\n";
            }
            
            // Recent placards
            $recent = $this->db->query("SELECT * FROM placard ORDER BY id DESC LIMIT 5");
            echo "\n   Recent 5 placards:\n";
            foreach ($recent as $p) {
                $date = $p['placard_date'] ?? 'N/A';
                echo "   - ID: {$p['id']}, Company: {$p['companyname']}, Date: $date\n";
            }
            
            // Check for required fields
            $withDates = $this->db->query("SELECT COUNT(*) as cnt FROM placard WHERE placard_date IS NOT NULL")[0]['cnt'];
            echo "\n   Placards with dates: $withDates\n";
            
        } catch (Exception $e) {
            $this->fail("Placard system error: " . $e->getMessage());
        }
    }
    
    private function testNewspaperGeneration() {
        $this->section("6. NEWSPAPER/PDF GENERATION");
        
        try {
            // PDF Issues
            $issues = $this->db->query("SELECT * FROM placard_issues ORDER BY issue_date DESC");
            $this->pass("PDF issues generated: " . count($issues));
            
            if (count($issues) > 0) {
                echo "\n   Recent PDF issues:\n";
                foreach ($issues as $issue) {
                    echo "   - Date: {$issue['issue_date']}, Ads: {$issue['ad_count']}, Status: {$issue['status']}\n";
                    
                    // Check if PDF file exists
                    $pdfPath = GENERATED_PDF_PATH . $issue['filename'];
                    if (file_exists($pdfPath)) {
                        $sizeKB = round(filesize($pdfPath) / 1024, 2);
                        echo "     ✓ PDF exists: $sizeKB KB\n";
                    } else {
                        echo "     ✗ PDF missing: {$issue['filename']}\n";
                    }
                }
            }
            
            // Check directory permissions
            $pdfDir = GENERATED_PDF_PATH;
            if (is_writable($pdfDir)) {
                $this->pass("PDF directory writable: $pdfDir");
            } else {
                $this->fail("PDF directory NOT writable: $pdfDir");
            }
            
        } catch (Exception $e) {
            $this->fail("Newspaper generation error: " . $e->getMessage());
        }
    }
    
    private function testPythonEnvironment() {
        $this->section("7. PYTHON ENVIRONMENT");
        
        $pythonPath = PYTHON_PATH;
        
        if (file_exists($pythonPath)) {
            $this->pass("Python executable found: $pythonPath");
            
            // Get version
            $version = shell_exec("$pythonPath --version 2>&1");
            echo "   Version: " . trim($version) . "\n";
            
            // Test required packages
            $requiredPackages = ['reportlab'];
            foreach ($requiredPackages as $pkg) {
                $check = shell_exec("$pythonPath -c \"import $pkg; print($pkg.__version__)\" 2>&1");
                if (strpos($check, 'ModuleNotFoundError') === false && strpos($check, 'Error') === false) {
                    echo "   ✓ Package '$pkg': " . trim($check) . "\n";
                } else {
                    echo "   ✗ Package '$pkg': NOT INSTALLED\n";
                }
            }
            
            // Test PIL (Pillow)
            $pilCheck = shell_exec("$pythonPath -c \"from PIL import Image; print('OK')\" 2>&1");
            if (strpos($pilCheck, 'OK') !== false) {
                echo "   ✓ Package 'Pillow (PIL)': Installed\n";
            } else {
                echo "   ✗ Package 'Pillow (PIL)': " . trim($pilCheck) . "\n";
            }
            
            // Check PDF generation script
            $scriptPath = SCRIPTS_PATH . 'generate_placard_pdf.py';
            if (file_exists($scriptPath)) {
                $this->pass("PDF generation script exists");
            } else {
                $this->fail("PDF generation script missing: $scriptPath");
            }
            
        } else {
            $this->fail("Python executable not found: $pythonPath");
        }
    }
    
    private function testWebAccess() {
        $this->section("8. WEB ACCESS & FILES");
        
        // Check critical PHP files
        $files = [
            'public/index.php' => 'Landing page',
            'admin/dashboard.php' => 'Admin dashboard',
            'admin/generate-newspaper.php' => 'PDF generation page',
        ];
        
        foreach ($files as $file => $desc) {
            $path = BASE_PATH . $file;
            if (file_exists($path)) {
                $this->pass("File exists: $file ($desc)");
            } else {
                $this->fail("File missing: $file");
            }
        }
        
        // Check URL configuration
        echo "\n   Configuration:\n";
        echo "   Base URL: " . BASE_URL . "\n";
        echo "   Base Path: " . BASE_PATH . "\n";
        echo "   Generated PDF Path: " . GENERATED_PDF_PATH . "\n";
    }
    
    // Helper methods
    private function section($title) {
        echo "\n" . str_repeat("=", 60) . "\n";
        echo "$title\n";
        echo str_repeat("=", 60) . "\n";
    }
    
    private function pass($msg) {
        echo "✓ $msg\n";
        $this->passed++;
    }
    
    private function fail($msg) {
        echo "✗ $msg\n";
        $this->failed++;
    }
    
    private function printSummary() {
        $total = $this->passed + $this->failed;
        $percentage = $total > 0 ? round(($this->passed / $total) * 100, 2) : 0;
        
        echo "\n" . str_repeat("=", 60) . "\n";
        echo "TEST SUMMARY\n";
        echo str_repeat("=", 60) . "\n";
        echo "Total Tests: $total\n";
        echo "Passed: {$this->passed} ✓\n";
        echo "Failed: {$this->failed} ✗\n";
        echo "Success Rate: {$percentage}%\n";
        echo str_repeat("=", 60) . "\n";
        
        if ($this->failed === 0) {
            echo "\n🎉 ALL TESTS PASSED! SYSTEM IS READY! 🎉\n\n";
        } else {
            echo "\n⚠️  SOME TESTS FAILED - Review above for details ⚠️\n\n";
        }
        
        // System status
        echo "\nSYSTEM STATUS:\n";
        echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n";
        echo "Database: " . ($this->db ? "✓ Connected" : "✗ Not Connected") . "\n";
        echo "Python: " . (file_exists(PYTHON_PATH) ? "✓ Available" : "✗ Not Available") . "\n";
        echo "PDF Generation: " . (is_writable(GENERATED_PDF_PATH) ? "✓ Ready" : "✗ Not Ready") . "\n";
        echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n";
    }
}

// Run tests
$test = new SystemTest();
$test->run();
