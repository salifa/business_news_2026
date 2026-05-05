<?php
/**
 * PlacardIssue Class
 * Handles placard issue generation and download management
 */

require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/database.php';

class PlacardIssue {
    private $db;
    
    public function __construct() {
        $this->db = Database::getInstance();
    }
    
    /**
     * Generate placard issue PDF for a specific date
     * Includes ads from that date + 7 days prior
     */
    public function generateIssue($issue_date, $forceRegenerate = false) {
        // Check if already generated
        $existing = $this->getIssueByDate($issue_date);
        if ($existing && file_exists(GENERATED_PDF_PATH . $existing['filename'])) {
            if (!$forceRegenerate) {
                return [
                    'success' => true,
                    'message' => 'Issue already exists',
                    'issue_id' => $existing['id'],
                    'filename' => $existing['filename'],
                    'regenerated' => false
                ];
            } else {
                // Delete old file before regenerating
                @unlink(GENERATED_PDF_PATH . $existing['filename']);
                // Delete old issue record
                $this->db->delete('placard_issues', 'id = :id', [':id' => $existing['id']]);
            }
        }
        
        // Calculate date range (issue date and 7 days before)
        $end_date = $issue_date;
        $start_date = date('Y-m-d', strtotime($issue_date . ' -7 days'));
        
        // Get approved advertisements in date range
        $sql = "SELECT * FROM placard 
                WHERE status = 'approved' 
                AND placard_date >= :start_date 
                AND placard_date <= :end_date
                ORDER BY placard_date ASC, id ASC";
        
        $ads = $this->db->query($sql, [
            ':start_date' => $start_date,
            ':end_date' => $end_date
        ]);
        
        if (empty($ads)) {
            return [
                'success' => false,
                'message' => 'No approved advertisements found for this date range'
            ];
        }
        
        // Prepare ads data for Python script
        $ads_json = json_encode($ads, JSON_UNESCAPED_UNICODE);
        
        // Call Python script to generate PDF
        $python_script = __DIR__ . '/../scripts/generate_placard_pdf.py';
        $python_path = defined('PYTHON_PATH') ? PYTHON_PATH : '/websites/vnn.mac.in.th/.venv/bin/python';
        $command = sprintf(
            '%s %s %s %s 2>&1',
            escapeshellarg($python_path),
            escapeshellarg($python_script),
            escapeshellarg($issue_date),
            escapeshellarg($ads_json)
        );
        
        $output = shell_exec($command);
        $result = json_decode($output, true);
        
        if (!$result || !$result['success']) {
            if (function_exists('logActivity')) {
                logActivity("PDF generation failed for {$issue_date}: " . ($result['error'] ?? 'Unknown error'));
            }
            return [
                'success' => false,
                'message' => 'PDF generation failed: ' . ($result['error'] ?? 'Unknown error')
            ];
        }
        
        // Save issue to database
        $issueData = [
            'issue_date' => $issue_date,
            'filename' => $result['filename'],
            'ad_count' => count($ads),
            'file_size' => file_exists($result['path']) ? filesize($result['path']) : 0,
            'status' => 'published',
            'generated_at' => date('Y-m-d H:i:s'),
            'date_range_start' => $start_date,
            'date_range_end' => $end_date
        ];
        
        $issueId = $this->db->insert('placard_issues', $issueData);
        
        // Update advertisement status to 'published'
        $ad_ids = array_column($ads, 'id');
        if (!empty($ad_ids)) {
            $placeholders = implode(',', array_fill(0, count($ad_ids), '?'));
            $sql = "UPDATE placard SET status = 'published', published_at = NOW(), issue_id = ? 
                    WHERE id IN ($placeholders)";
            
            $stmt = $this->db->getConnection()->prepare($sql);
            $params = array_merge([$issueId], $ad_ids);
            $stmt->execute($params);
        }
        
        if (function_exists('logActivity')) {
            logActivity("Placard issue generated for {$issue_date}: {$issueId}");
        }
        
        return [
            'success' => true,
            'message' => 'PDF generated successfully',
            'issue_id' => $issueId,
            'filename' => $result['filename'],
            'ad_count' => count($ads),
            'regenerated' => $forceRegenerate
        ];
    }
    
    /**
     * Auto-generate issues for pending dates
     * Called by cron job daily
     */
    public function autoGenerateIssues() {
        $generated = [];
        $failed = [];
        
        // Get dates that have approved ads but no issue generated
        $sql = "SELECT DISTINCT p.placard_date 
                FROM placard p
                LEFT JOIN placard_issues pi ON p.placard_date = pi.issue_date
                WHERE p.status = 'approved' 
                AND pi.id IS NULL
                AND p.placard_date <= CURDATE()
                ORDER BY p.placard_date ASC";
        
        $dates = $this->db->query($sql);
        
        foreach ($dates as $row) {
            $result = $this->generateIssue($row['placard_date']);
            
            if ($result['success']) {
                $generated[] = $row['placard_date'];
            } else {
                $failed[] = [
                    'date' => $row['placard_date'],
                    'error' => $result['message']
                ];
            }
        }
        
        return [
            'success' => true,
            'generated' => $generated,
            'failed' => $failed,
            'total_generated' => count($generated),
            'total_failed' => count($failed)
        ];
    }
    
    /**
     * Get recent published issues for download page
     */
    public function getRecentIssues($limit = 25) {
        $sql = "SELECT * FROM placard_issues 
                WHERE status = 'published'
                ORDER BY issue_date DESC 
                LIMIT :limit";
        
        $this->db->prepare($sql);
        $this->db->bind(':limit', $limit, PDO::PARAM_INT);
        
        return $this->db->fetchAll();
    }
    
    /**
     * Get issue by ID
     */
    public function getIssueById($id) {
        return $this->db->queryOne(
            "SELECT * FROM placard_issues WHERE id = :id",
            [':id' => $id]
        );
    }
    
    /**
     * Get issue by date
     */
    public function getIssueByDate($date) {
        return $this->db->queryOne(
            "SELECT * FROM placard_issues WHERE issue_date = :date",
            [':date' => $date]
        );
    }
    
    /**
     * Track download
     */
    public function trackDownload($issueId, $ip = null) {
        $ip = $ip ?? $_SERVER['REMOTE_ADDR'] ?? 'unknown';
        
        // Update download count - use raw SQL since we need increment
        $sql = "UPDATE placard_issues SET download_count = download_count + 1 WHERE id = ?";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->execute([$issueId]);
        
        // Log download
        $this->db->insert('placard_downloads', [
            'issue_id' => $issueId,
            'ip_address' => $ip,
            'user_agent' => $_SERVER['HTTP_USER_AGENT'] ?? '',
            'downloaded_at' => date('Y-m-d H:i:s')
        ]);
    }
    
    /**
     * Download issue PDF
     */
    public function downloadIssue($issueId) {
        $issue = $this->getIssueById($issueId);
        
        if (!$issue) {
            return ['success' => false, 'message' => 'ไม่พบฉบับที่ต้องการ'];
        }
        
        $filepath = GENERATED_PDF_PATH . $issue['filename'];
        
        if (!file_exists($filepath)) {
            return ['success' => false, 'message' => 'ไม่พบไฟล์ PDF'];
        }
        
        // Track download
        $this->trackDownload($issueId);
        
        // Send file
        header('Content-Type: application/pdf');
        header('Content-Disposition: inline; filename="' . $issue['filename'] . '"');
        header('Content-Length: ' . filesize($filepath));
        header('Cache-Control: public, max-age=86400');
        
        readfile($filepath);
        exit;
    }
    
    /**
     * Get download statistics
     */
    public function getDownloadStats($issueId = null) {
        if ($issueId) {
            // Stats for specific issue
            $sql = "SELECT 
                    COUNT(*) as total_downloads,
                    COUNT(DISTINCT ip_address) as unique_ips,
                    MIN(downloaded_at) as first_download,
                    MAX(downloaded_at) as last_download
                    FROM placard_downloads 
                    WHERE issue_id = :id";
            return $this->db->queryOne($sql, [':id' => $issueId]);
        } else {
            // Overall stats
            $sql = "SELECT 
                    COUNT(*) as total_downloads,
                    COUNT(DISTINCT ip_address) as unique_ips,
                    COUNT(DISTINCT issue_id) as total_issues
                    FROM placard_downloads";
            return $this->db->queryOne($sql);
        }
    }
    
    /**
     * Get issues by date range
     */
    public function getIssuesByDateRange($start_date, $end_date) {
        $sql = "SELECT * FROM placard_issues 
                WHERE issue_date BETWEEN :start AND :end
                AND status = 'published'
                ORDER BY issue_date DESC";
        
        return $this->db->query($sql, [
            ':start' => $start_date,
            ':end' => $end_date
        ]);
    }
    
    /**
     * Regenerate issue (admin only)
     */
    public function regenerateIssue($issueId) {
        $issue = $this->getIssueById($issueId);
        
        if (!$issue) {
            return ['success' => false, 'message' => 'ไม่พบฉบับที่ต้องการ'];
        }
        
        // Delete old file
        $oldFile = GENERATED_PDF_PATH . $issue['filename'];
        if (file_exists($oldFile)) {
            unlink($oldFile);
        }
        
        // Delete database record
        $this->db->delete('placard_issues', 'id = :id', [':id' => $issueId]);
        
        // Generate new
        return $this->generateIssue($issue['issue_date']);
    }
    
    /**
     * Delete issue (admin only)
     */
    public function deleteIssue($issueId) {
        $issue = $this->getIssueById($issueId);
        
        if (!$issue) {
            return ['success' => false, 'message' => 'ไม่พบฉบับที่ต้องการ'];
        }
        
        // Delete file
        $filepath = GENERATED_PDF_PATH . $issue['filename'];
        if (file_exists($filepath)) {
            unlink($filepath);
        }
        
        // Delete database record
        $this->db->delete('placard_issues', 'id = :id', [':id' => $issueId]);
        
        if (function_exists('logActivity')) {
            logActivity("Placard issue {$issueId} deleted");
        }
        
        return ['success' => true, 'message' => 'ลบฉบับสำเร็จ'];
    }
}
