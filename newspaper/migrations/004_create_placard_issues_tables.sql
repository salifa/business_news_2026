-- Migration: Create tables for placard issue management
-- Date: 2026-04-29

-- Table for storing generated placard issues
CREATE TABLE IF NOT EXISTS `placard_issues` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `issue_date` DATE NOT NULL COMMENT 'Date of the issue',
  `filename` VARCHAR(255) NOT NULL COMMENT 'Generated PDF filename',
  `file_size` BIGINT DEFAULT 0 COMMENT 'File size in bytes',
  `ad_count` INT DEFAULT 0 COMMENT 'Number of advertisements in this issue',
  `status` ENUM('draft', 'published', 'archived') DEFAULT 'published',
  `date_range_start` DATE NULL COMMENT 'Start date of ads included (7 days before)',
  `date_range_end` DATE NULL COMMENT 'End date of ads included (issue date)',
  `download_count` INT DEFAULT 0 COMMENT 'Number of times downloaded',
  `generated_at` DATETIME NULL COMMENT 'When PDF was generated',
  `generated_by` VARCHAR(255) NULL COMMENT 'Who generated it (admin email or "system")',
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_issue_date` (`issue_date`),
  KEY `idx_status` (`status`),
  KEY `idx_issue_date` (`issue_date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Published placard newspaper issues';

-- Table for tracking downloads
CREATE TABLE IF NOT EXISTS `placard_downloads` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `issue_id` INT(11) NOT NULL,
  `ip_address` VARCHAR(45) NULL,
  `user_agent` TEXT NULL,
  `downloaded_at` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_issue_id` (`issue_id`),
  KEY `idx_downloaded_at` (`downloaded_at`),
  FOREIGN KEY (`issue_id`) REFERENCES `placard_issues`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Tracks who downloaded which issues';

-- Add new columns to existing placard table if they don't exist
ALTER TABLE `placard` 
  ADD COLUMN IF NOT EXISTS `published_at` DATETIME NULL COMMENT 'When ad was published in issue' AFTER `approved_at`,
  ADD COLUMN IF NOT EXISTS `issue_id` INT(11) NULL COMMENT 'Which issue this ad was published in' AFTER `published_at`;

-- Add foreign key for issue_id
ALTER TABLE `placard` 
  ADD CONSTRAINT `fk_placard_issue` 
  FOREIGN KEY (`issue_id`) REFERENCES `placard_issues`(`id`) 
  ON DELETE SET NULL;

-- Add index for published status
ALTER TABLE `placard` 
  ADD KEY IF NOT EXISTS `idx_status_placard_date` (`status`, `placard_date`);

-- Insert sample data (optional - for testing)
-- This would be generated automatically by the system
