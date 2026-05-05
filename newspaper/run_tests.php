<?php
/**
 * Comprehensive Test Suite for Newspaper System
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/database.php';
require_once __DIR__ . '/includes/functions.php';
require_once __DIR__ . '/classes/User.php';
require_once __DIR__ . '/classes/Credit.php';
require_once __DIR__ . '/classes/Advertisement.php';
require_once __DIR__ . '/classes/Newspaper.php';

class TestRunner {
    private $passed = 0;
    private $failed = 0;
    private $tests = [];
    private $db;
    
    public function __construct() {
        $this->db = Database::getInstance();
        echo "╔══════════════════════════════════════════════════════════╗\n";
        echo "║      NEWSPAPER SYSTEM - COMPREHENSIVE TEST SUITE        ║\n";
        echo "╚══════════════════════════════════════════════════════════╝\n\n";
    }
    
    public function run() {
        $this->testDatabaseConnection();
        $this->testDirectoryPermissions();
        $this->testDatabaseTables();
        $this->testUserClass();
        $this->testCreditClass();
        $this->testAdvertisementClass();
        $this->testNewspaperClass();
        $this->testPythonEnvironment();
        $this->testFileStructure();
        $this->testSecurity();
        
        $this->printSummary();
    }
    
    private function testDatabaseConnection() {
        $this->section("DATABASE CONNECTION");
        
        try {
            $result = $this->db->query("SELECT 1 as test");
            $this->assert($result !== false, "Database connection successful");
            
            $version = $this->db->query("SELECT VERSION() as version")[0]['version'];
            $this->info("MySQL Version: $version");
            
            $dbName = $this->db->query("SELECT DATABASE() as db")[0]['db'];
            $this->info("Database Name: $dbName");
            
        } catch (Exception $e) {
            $this->assert(false, "Database connection failed: " . $e->getMessage());
        }
    }
    
    private function testDirectoryPermissions() {
        $this->section("DIRECTORY PERMISSIONS");
        
        $directories = [
            BASE_PATH . 'logs',
            BASE_PATH . 'temp',
            BASE_PATH . 'generated_pdfs',
            BASE_PATH . 'public/assets/uploads',
            BASE_PATH . 'public/newspapers',
        ];
        
        foreach ($directories as $dir) {
            if (!file_exists($dir)) {
                mkdir($dir, 0777, true);
                $this->info("Created directory: $dir");
            }
            
            $writable = is_writable($dir);
            $this->assert($writable, "Directory writable: $dir");
            
            if ($writable) {
                $perms = substr(sprintf('%o', fileperms($dir)), -4);
                $this->info("  Permissions: $perms");
            }
        }
    }
    
    private function testDatabaseTables() {
        $this->section("DATABASE TABLES");
        
        $tables = [
            'users',
            'credits',
            'credit_packages',
            'credit_transactions',
            'advertisements',
            'placard',
            'newspapers',
            'placard_issues'
        ];
        
        foreach ($tables as $table) {
            $result = $this->db->query("SHOW TABLES LIKE '$table'");
            $exists = count($result) > 0;
            $this->assert($exists, "Table exists: $table");
            
            if ($exists) {
                $count = $this->db->query("SELECT COUNT(*) as cnt FROM $table")[0]['cnt'];
                $this->info("  Records: $count");
            }
        }
    }
    
    private function testUserClass() {
        $this->section("USER CLASS");
        
        try {
            $user = new User($this->db);
            $this->assert(true, "User class instantiated");
            
            // Test admin user exists
            $admin = $this->db->query("SELECT * FROM users WHERE email = 'admin@vnn.com' LIMIT 1");
            $this->assert(count($admin) > 0, "Admin user exists");
            
            if (count($admin) > 0) {
                $this->info("  Admin ID: " . $admin[0]['id']);
                $this->info("  Admin Email: " . $admin[0]['email']);
                $this->info("  Admin Role: " . $admin[0]['role']);
            }
            
            // Test user count
            $userCount = $this->db->query("SELECT COUNT(*) as cnt FROM users")[0]['cnt'];
            $this->info("Total users: $userCount");
            
        } catch (Exception $e) {
            $this->assert(false, "User class error: " . $e->getMessage());
        }
    }
    
    private function testCreditClass() {
        $this->section("CREDIT SYSTEM");
        
        try {
            $credit = new Credit($this->db);
            $this->assert(true, "Credit class instantiated");
            
            // Test credit packages
            $packages = $this->db->query("SELECT * FROM credit_packages WHERE is_active = 1");
            $this->assert(count($packages) > 0, "Credit packages exist");
            
            foreach ($packages as $pkg) {
                $this->info("  Package: {$pkg['name']} - ฿{$pkg['price']} ({$pkg['credits']} credits)");
            }
            
            // Test credit transactions
            $transactions = $this->db->query("SELECT COUNT(*) as cnt FROM credit_transactions")[0]['cnt'];
            $this->info("Total transactions: $transactions");
            
        } catch (Exception $e) {
            $this->assert(false, "Credit class error: " . $e->getMessage());
        }
    }
    
    private function testAdvertisementClass() {
        $this->section("ADVERTISEMENT SYSTEM");
        
        try {
            $ad = new Advertisement($this->db);
            $this->assert(true, "Advertisement class instantiated");
            
            // Test placard table
            $placards = $this->db->query("SELECT COUNT(*) as cnt FROM placard")[0]['cnt'];
            $this->info("Total placards: $placards");
            
            // Test by status
            $statuses = $this->db->query("SELECT status, COUNT(*) as cnt FROM placard GROUP BY status");
            foreach ($statuses as $status) {
                $this->info("  Status '{$status['status']}': {$status['cnt']}");
            }
            
            // Test recent approved ads
            $approved = $this->db->query("SELECT * FROM placard WHERE status = 'approved' ORDER BY id DESC LIMIT 3");
            if (count($approved) > 0) {
                $this->info("Recent approved ads:");
                foreach ($approved as $a) {
                    $this->info("  ID: {$a['id']}, Company: {$a['companyname']}, Date: {$a['placard_date']}");
                }
            }
            
        } catch (Exception $e) {
            $this->assert(false, "Advertisement class error: " . $e->getMessage());
        }
    }
    
    private function testNewspaperClass() {
        $this->section("NEWSPAPER/PDF GENERATION");
        
        try {
            $newspaper = new Newspaper($this->db);
            $this->assert(true, "Newspaper class instantiated");
            
            // Test placard_issues table
            $issues = $this->db->query("SELECT COUNT(*) as cnt FROM placard_issues")[0]['cnt'];
            $this->info("Total issues: $issues");
            
            // Test recent issues
            $recent = $this->db->query("SELECT * FROM placard_issues ORDER BY id DESC LIMIT 3");
            if (count($recent) > 0) {
                $this->info("Recent issues:");
                foreach ($recent as $issue) {
                    $this->info("  Date: {$issue['issue_date']}, Status: {$issue['status']}, Ads: {$issue['ad_count']}");
                    
                    // Check if PDF exists
                    $pdfPath = GENERATED_PDF_PATH . $issue['filename'];
                    if (file_exists($pdfPath)) {
                        $size = filesize($pdfPath);
                        $sizeKB = round($size / 1024, 2);
                        $this->info("    PDF exists: {$sizeKB} KB");
                    } else {
                        $this->info("    PDF missing: {$issue['filename']}");
                    }
                }
            }
            
        } catch (Exception $e) {
            $this->assert(false, "Newspaper class error: " . $e->getMessage());
        }
    }
    
    private function testPythonEnvironment() {
        $this->section("PYTHON ENVIRONMENT");
        
        // Test Python executable
        $pythonPath = PYTHON_PATH;
        $exists = file_exists($pythonPath);
        $this->assert($exists, "Python executable exists: $pythonPath");
        
        if ($exists) {
            // Get Python version
            $output = shell_exec("$pythonPath --version 2>&1");
            $this->info("  Version: " . trim($output));
            
            // Test required packages
            $packages = ['reportlab', 'pillow'];
            foreach ($packages as $pkg) {
                $check = shell_exec("$pythonPath -c 'import $pkg; print($pkg.__version__)' 2>&1");
                if (strpos($check, 'ModuleNotFoundError') === false) {
                    $this->assert(true, "Python package '$pkg' installed: " . trim($check));
                } else {
                    $this->assert(false, "Python package '$pkg' NOT installed");
                }
            }
        }
        
        // Test PDF generation script
        $scriptPath = SCRIPTS_PATH . 'generate_placard_pdf.py';
        $scriptExists = file_exists($scriptPath);
        $this->assert($scriptExists, "PDF generation script exists");
    }
    
    private function testFileStructure() {
        $this->section("FILE STRUCTURE");
        
        $criticalFiles = [
            'includes/config.php',
            'includes/database.php',
            'includes/functions.php',
            'classes/User.php',
            'classes/Credit.php',
            'classes/Advertisement.php',
            'classes/Newspaper.php',
            'public/index.php',
            'user/dashboard.php',
            'admin/dashboard.php',
        ];
        
        foreach ($criticalFiles as $file) {
            $path = BASE_PATH . $file;
            $exists = file_exists($path);
            $this->assert($exists, "File exists: $file");
            
            if ($exists) {
                $size = filesize($path);
                $this->info("  Size: " . round($size / 1024, 2) . " KB");
            }
        }
    }
    
    private function testSecurity() {
        $this->section("SECURITY CHECKS");
        
        // Test session configuration
        $this->info("Session name: " . SESSION_NAME);
        $this->info("Session lifetime: " . SESSION_LIFETIME . " seconds");
        
        // Test password hashing
        $testPassword = "test123";
        $hash = password_hash($testPassword, PASSWORD_DEFAULT);
        $verified = password_verify($testPassword, $hash);
        $this->assert($verified, "Password hashing works correctly");
        
        // Check .htaccess files
        $htaccessFiles = [
            BASE_PATH . '.htaccess',
            BASE_PATH . 'includes/.htaccess',
            BASE_PATH . 'classes/.htaccess',
        ];
        
        foreach ($htaccessFiles as $file) {
            if (file_exists($file)) {
                $this->assert(true, ".htaccess exists: " . basename(dirname($file)));
            }
        }
    }
    
    // Helper methods
    private function section($title) {
        echo "\n" . str_repeat("=", 60) . "\n";
        echo "  $title\n";
        echo str_repeat("=", 60) . "\n";
    }
    
    private function assert($condition, $message) {
        if ($condition) {
            echo "✓ PASS: $message\n";
            $this->passed++;
        } else {
            echo "✗ FAIL: $message\n";
            $this->failed++;
        }
        $this->tests[] = ['message' => $message, 'passed' => $condition];
    }
    
    private function info($message) {
        echo "  ℹ $message\n";
    }
    
    private function printSummary() {
        $total = $this->passed + $this->failed;
        $percentage = $total > 0 ? round(($this->passed / $total) * 100, 2) : 0;
        
        echo "\n" . str_repeat("=", 60) . "\n";
        echo "  TEST SUMMARY\n";
        echo str_repeat("=", 60) . "\n";
        echo "Total Tests: $total\n";
        echo "Passed: {$this->passed} ✓\n";
        echo "Failed: {$this->failed} ✗\n";
        echo "Success Rate: {$percentage}%\n";
        echo str_repeat("=", 60) . "\n";
        
        if ($this->failed === 0) {
            echo "\n🎉 ALL TESTS PASSED! 🎉\n\n";
        } else {
            echo "\n⚠️  SOME TESTS FAILED - Review the output above ⚠️\n\n";
        }
    }
}

// Run the test suite
$runner = new TestRunner();
$runner->run();
