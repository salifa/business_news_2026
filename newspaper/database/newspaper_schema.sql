-- Online Newspaper System Database Schema
-- Date: April 21, 2026
-- Database: vnnsbiz (existing)

-- Enable UTF8MB4 for full Thai language support
SET NAMES utf8mb4;
SET CHARACTER SET utf8mb4;

-- =====================================================
-- 1. NEWSPAPERS TABLE
-- =====================================================
CREATE TABLE IF NOT EXISTS `newspapers` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `newspaper_date` DATE NOT NULL UNIQUE,
  `pdf_file` VARCHAR(255),
  `generated_at` DATETIME,
  `page_count` INT DEFAULT 0,
  `advertisement_count` INT DEFAULT 0,
  `status` ENUM('draft', 'published', 'archived') DEFAULT 'draft',
  `generated_by` INT,
  `notes` TEXT,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  INDEX `idx_newspaper_date` (`newspaper_date`),
  INDEX `idx_status` (`status`),
  INDEX `idx_generated_at` (`generated_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
COMMENT='Daily newspaper publications';

-- =====================================================
-- 2. NEWSPAPER ADVERTISEMENTS TABLE
-- =====================================================
CREATE TABLE IF NOT EXISTS `newspaper_advertisements` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `placard_id` INT,
  `newspaper_id` INT,
  `newspaper_date` DATE NOT NULL,
  `page_number` INT,
  `position` ENUM('top', 'middle', 'bottom', 'full_page') DEFAULT 'middle',
  `type` ENUM('template', 'image', 'pdf') DEFAULT 'template',
  `status` ENUM('pending', 'approved', 'published', 'rejected') DEFAULT 'pending',
  `credit_cost` INT DEFAULT 1,
  `approved_by` INT,
  `approved_at` DATETIME,
  `rejection_reason` TEXT,
  `notes` TEXT,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (`placard_id`) REFERENCES `placard`(`id`) ON DELETE SET NULL,
  FOREIGN KEY (`newspaper_id`) REFERENCES `newspapers`(`id`) ON DELETE SET NULL,
  INDEX `idx_newspaper_date` (`newspaper_date`),
  INDEX `idx_status` (`status`),
  INDEX `idx_placard_id` (`placard_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
COMMENT='Advertisements scheduled for newspaper publication';

-- =====================================================
-- 3. CREDIT PACKAGES TABLE
-- =====================================================
CREATE TABLE IF NOT EXISTS `credit_packages` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(100) NOT NULL,
  `credits` INT NOT NULL,
  `price` DECIMAL(10,2) NOT NULL,
  `price_per_credit` DECIMAL(10,2) NOT NULL,
  `description` TEXT,
  `is_active` TINYINT(1) DEFAULT 1,
  `is_featured` TINYINT(1) DEFAULT 0,
  `sort_order` INT DEFAULT 0,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  INDEX `idx_is_active` (`is_active`),
  INDEX `idx_sort_order` (`sort_order`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
COMMENT='Credit packages for purchase';

-- =====================================================
-- 4. USER CREDITS TABLE
-- =====================================================
CREATE TABLE IF NOT EXISTS `user_credits` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `user_email` VARCHAR(255) NOT NULL,
  `credits` INT DEFAULT 0,
  `total_purchased` INT DEFAULT 0,
  `total_used` INT DEFAULT 0,
  `total_refunded` INT DEFAULT 0,
  `last_purchase_at` DATETIME,
  `last_usage_at` DATETIME,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  UNIQUE KEY `unique_user_email` (`user_email`),
  INDEX `idx_user_email` (`user_email`),
  INDEX `idx_credits` (`credits`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
COMMENT='User credit balances';

-- =====================================================
-- 5. CREDIT USAGE LOG TABLE
-- =====================================================
CREATE TABLE IF NOT EXISTS `credit_usage_log` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `user_email` VARCHAR(255) NOT NULL,
  `advertisement_id` INT,
  `transaction_type` ENUM('purchase', 'usage', 'refund', 'adjustment') DEFAULT 'usage',
  `credits_change` INT NOT NULL COMMENT 'Positive for add, negative for deduct',
  `balance_before` INT,
  `balance_after` INT,
  `description` VARCHAR(255),
  `reference_type` VARCHAR(50) COMMENT 'payment, advertisement, admin_adjustment',
  `reference_id` INT,
  `created_by` VARCHAR(255),
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  INDEX `idx_user_email` (`user_email`),
  INDEX `idx_created_at` (`created_at`),
  INDEX `idx_transaction_type` (`transaction_type`),
  INDEX `idx_advertisement_id` (`advertisement_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
COMMENT='Credit transaction history log';

-- =====================================================
-- 6. PAYMENT TRANSACTIONS TABLE
-- =====================================================
CREATE TABLE IF NOT EXISTS `payment_transactions` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `user_email` VARCHAR(255) NOT NULL,
  `package_id` INT,
  `amount` DECIMAL(10,2) NOT NULL,
  `credits` INT NOT NULL,
  `payment_method` ENUM('bank_transfer', 'promptpay', 'credit_card', 'paypal', 'other') DEFAULT 'bank_transfer',
  `slip_image` VARCHAR(255),
  `status` ENUM('pending', 'approved', 'rejected', 'expired', 'cancelled') DEFAULT 'pending',
  `reference_number` VARCHAR(100),
  `bank_name` VARCHAR(100),
  `transfer_date` DATE,
  `transfer_time` TIME,
  `approved_by` INT,
  `approved_at` DATETIME,
  `reject_reason` TEXT,
  `admin_notes` TEXT,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (`package_id`) REFERENCES `credit_packages`(`id`) ON DELETE SET NULL,
  INDEX `idx_user_email` (`user_email`),
  INDEX `idx_status` (`status`),
  INDEX `idx_created_at` (`created_at`),
  INDEX `idx_reference_number` (`reference_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
COMMENT='Payment transactions for credit purchases';

-- =====================================================
-- 7. SYSTEM SETTINGS TABLE
-- =====================================================
CREATE TABLE IF NOT EXISTS `system_settings` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `setting_key` VARCHAR(100) NOT NULL UNIQUE,
  `setting_value` TEXT,
  `setting_type` ENUM('text', 'number', 'boolean', 'json') DEFAULT 'text',
  `description` VARCHAR(255),
  `is_editable` TINYINT(1) DEFAULT 1,
  `updated_by` INT,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  INDEX `idx_setting_key` (`setting_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
COMMENT='System configuration settings';

-- =====================================================
-- 8. EMAIL NOTIFICATIONS LOG
-- =====================================================
CREATE TABLE IF NOT EXISTS `email_notifications` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `recipient_email` VARCHAR(255) NOT NULL,
  `subject` VARCHAR(255) NOT NULL,
  `body` TEXT,
  `type` ENUM('payment_approved', 'payment_rejected', 'ad_approved', 'ad_rejected', 'ad_published', 'credit_low', 'other') DEFAULT 'other',
  `status` ENUM('pending', 'sent', 'failed') DEFAULT 'pending',
  `sent_at` DATETIME,
  `error_message` TEXT,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  INDEX `idx_recipient_email` (`recipient_email`),
  INDEX `idx_status` (`status`),
  INDEX `idx_type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
COMMENT='Email notification queue and log';

-- =====================================================
-- INSERT DEFAULT DATA
-- =====================================================

-- Insert default credit packages
INSERT INTO `credit_packages` (`name`, `credits`, `price`, `price_per_credit`, `description`, `is_active`, `is_featured`, `sort_order`) VALUES
('แพ็กเกจที่ 1', 1, 70.00, 70.00, 'ราคาต่อเครดิต 70 บาท', 1, 0, 1),
('แพ็กเกจที่ 2', 5, 300.00, 60.00, 'ราคาต่อเครดิต 60 บาท', 1, 1, 2),
('แพ็กเกจที่ 3', 10, 500.00, 50.00, 'ราคาต่อเครดิต 50 บาท (แนะนำ)', 1, 1, 3);

-- Insert system settings
INSERT INTO `system_settings` (`setting_key`, `setting_value`, `setting_type`, `description`, `is_editable`) VALUES
('newspaper_name', 'หนังสือพิมพ์ เครือข่ายบัญชี', 'text', 'ชื่อหนังสือพิมพ์', 1),
('newspaper_issn', 'ISSN 2408-2015', 'text', 'เลขที่ ISSN', 1),
('newspaper_license', 'สสช27/2558', 'text', 'เลขที่ใบอนุญาต', 1),
('credit_per_ad', '1', 'number', 'จำนวนเครดิตต่อประกาศ 1 รายการ', 1),
('newspaper_generation_time', '23:00:00', 'text', 'เวลาสร้างหนังสือพิมพ์อัตโนมัติ (HH:MM:SS)', 1),
('admin_email', 'admin@vnn.mac.in.th', 'text', 'อีเมลผู้ดูแลระบบ', 1),
('payment_bank_name', 'ธนาคารกสิกรไทย', 'text', 'ชื่อธนาคารรับชำระเงิน', 1),
('payment_bank_account', '123-4-56789-0', 'text', 'เลขที่บัญชีธนาคาร', 1),
('payment_account_name', 'บริษัท วีเอ็นเอ็น จำกัด', 'text', 'ชื่อบัญชี', 1),
('promptpay_number', '0123456789', 'text', 'เลขพร้อมเพย์', 1),
('max_ads_per_page', '4', 'number', 'จำนวนประกาศสูงสุดต่อหน้า', 1),
('auto_approve_payments', '0', 'boolean', 'อนุมัติการชำระเงินอัตโนมัติ', 1),
('require_email_verification', '1', 'boolean', 'ต้องยืนยันอีเมลก่อนใช้งาน', 1);

-- =====================================================
-- MIGRATE EXISTING DATA
-- =====================================================

-- Migrate user credits from existing credit_transactions
INSERT INTO `user_credits` (`user_email`, `credits`, `total_purchased`, `total_used`)
SELECT 
  owner_id as user_email,
  COALESCE(SUM(CASE WHEN approved = 'yes' THEN coin ELSE 0 END), 0) as credits,
  COALESCE(SUM(CASE WHEN approved = 'yes' THEN coin ELSE 0 END), 0) as total_purchased,
  0 as total_used
FROM `credit_transactions`
WHERE owner_id IS NOT NULL AND owner_id != ''
GROUP BY owner_id
ON DUPLICATE KEY UPDATE
  credits = VALUES(credits),
  total_purchased = VALUES(total_purchased);

-- =====================================================
-- CREATE VIEWS FOR REPORTING
-- =====================================================

-- View: User credit summary
CREATE OR REPLACE VIEW `v_user_credit_summary` AS
SELECT 
  uc.user_email,
  u.fullname as user_name,
  uc.credits as current_balance,
  uc.total_purchased,
  uc.total_used,
  uc.last_purchase_at,
  uc.last_usage_at,
  COUNT(DISTINCT pt.id) as total_transactions,
  COALESCE(SUM(CASE WHEN pt.status = 'pending' THEN pt.amount ELSE 0 END), 0) as pending_amount
FROM `user_credits` uc
LEFT JOIN `online_placard_users` u ON uc.user_email = u.email
LEFT JOIN `payment_transactions` pt ON uc.user_email = pt.user_email
GROUP BY uc.user_email, u.fullname, uc.credits, uc.total_purchased, uc.total_used, uc.last_purchase_at, uc.last_usage_at;

-- View: Daily newspaper summary
CREATE OR REPLACE VIEW `v_daily_newspaper_summary` AS
SELECT 
  n.newspaper_date,
  n.status as newspaper_status,
  n.page_count,
  n.advertisement_count,
  COUNT(DISTINCT na.id) as total_ads,
  COUNT(DISTINCT CASE WHEN na.status = 'published' THEN na.id END) as published_ads,
  COUNT(DISTINCT CASE WHEN na.status = 'pending' THEN na.id END) as pending_ads,
  n.generated_at,
  n.pdf_file
FROM `newspapers` n
LEFT JOIN `newspaper_advertisements` na ON n.id = na.newspaper_id
GROUP BY n.newspaper_date, n.status, n.page_count, n.advertisement_count, n.generated_at, n.pdf_file
ORDER BY n.newspaper_date DESC;

-- =====================================================
-- CREATE STORED PROCEDURES
-- =====================================================

DELIMITER //

-- Procedure: Deduct credit for advertisement
CREATE PROCEDURE `sp_deduct_credit_for_ad`(
  IN p_user_email VARCHAR(255),
  IN p_advertisement_id INT,
  IN p_credits INT,
  OUT p_success BOOLEAN,
  OUT p_message VARCHAR(255)
)
BEGIN
  DECLARE v_current_balance INT;
  DECLARE v_new_balance INT;
  
  -- Start transaction
  START TRANSACTION;
  
  -- Get current balance
  SELECT credits INTO v_current_balance
  FROM user_credits
  WHERE user_email = p_user_email
  FOR UPDATE;
  
  -- Check if user exists
  IF v_current_balance IS NULL THEN
    SET p_success = FALSE;
    SET p_message = 'User not found';
    ROLLBACK;
  -- Check if sufficient credits
  ELSEIF v_current_balance < p_credits THEN
    SET p_success = FALSE;
    SET p_message = CONCAT('Insufficient credits. Current balance: ', v_current_balance);
    ROLLBACK;
  ELSE
    -- Calculate new balance
    SET v_new_balance = v_current_balance - p_credits;
    
    -- Update user credits
    UPDATE user_credits
    SET credits = v_new_balance,
        total_used = total_used + p_credits,
        last_usage_at = NOW()
    WHERE user_email = p_user_email;
    
    -- Log the transaction
    INSERT INTO credit_usage_log (
      user_email, 
      advertisement_id, 
      transaction_type, 
      credits_change, 
      balance_before, 
      balance_after, 
      description,
      reference_type,
      reference_id,
      created_by
    ) VALUES (
      p_user_email,
      p_advertisement_id,
      'usage',
      -p_credits,
      v_current_balance,
      v_new_balance,
      CONCAT('Used ', p_credits, ' credit(s) for advertisement'),
      'advertisement',
      p_advertisement_id,
      p_user_email
    );
    
    SET p_success = TRUE;
    SET p_message = CONCAT('Successfully deducted ', p_credits, ' credit(s). New balance: ', v_new_balance);
    COMMIT;
  END IF;
END //

-- Procedure: Add credits from payment
CREATE PROCEDURE `sp_add_credits_from_payment`(
  IN p_payment_id INT,
  OUT p_success BOOLEAN,
  OUT p_message VARCHAR(255)
)
BEGIN
  DECLARE v_user_email VARCHAR(255);
  DECLARE v_credits INT;
  DECLARE v_current_balance INT;
  DECLARE v_new_balance INT;
  DECLARE v_payment_status VARCHAR(50);
  
  START TRANSACTION;
  
  -- Get payment details
  SELECT user_email, credits, status
  INTO v_user_email, v_credits, v_payment_status
  FROM payment_transactions
  WHERE id = p_payment_id;
  
  -- Check if payment exists and is approved
  IF v_user_email IS NULL THEN
    SET p_success = FALSE;
    SET p_message = 'Payment not found';
    ROLLBACK;
  ELSEIF v_payment_status != 'approved' THEN
    SET p_success = FALSE;
    SET p_message = CONCAT('Payment status is: ', v_payment_status);
    ROLLBACK;
  ELSE
    -- Get or create user credit record
    INSERT INTO user_credits (user_email, credits, total_purchased)
    VALUES (v_user_email, 0, 0)
    ON DUPLICATE KEY UPDATE user_email = user_email;
    
    -- Get current balance
    SELECT credits INTO v_current_balance
    FROM user_credits
    WHERE user_email = v_user_email
    FOR UPDATE;
    
    -- Calculate new balance
    SET v_new_balance = v_current_balance + v_credits;
    
    -- Update user credits
    UPDATE user_credits
    SET credits = v_new_balance,
        total_purchased = total_purchased + v_credits,
        last_purchase_at = NOW()
    WHERE user_email = v_user_email;
    
    -- Log the transaction
    INSERT INTO credit_usage_log (
      user_email,
      transaction_type,
      credits_change,
      balance_before,
      balance_after,
      description,
      reference_type,
      reference_id,
      created_by
    ) VALUES (
      v_user_email,
      'purchase',
      v_credits,
      v_current_balance,
      v_new_balance,
      CONCAT('Purchased ', v_credits, ' credit(s)'),
      'payment',
      p_payment_id,
      'system'
    );
    
    SET p_success = TRUE;
    SET p_message = CONCAT('Successfully added ', v_credits, ' credit(s). New balance: ', v_new_balance);
    COMMIT;
  END IF;
END //

DELIMITER ;

-- =====================================================
-- CREATE TRIGGERS
-- =====================================================

DELIMITER //

-- Trigger: Update newspaper advertisement count
CREATE TRIGGER `tr_update_newspaper_ad_count_insert`
AFTER INSERT ON `newspaper_advertisements`
FOR EACH ROW
BEGIN
  UPDATE newspapers
  SET advertisement_count = (
    SELECT COUNT(*) 
    FROM newspaper_advertisements 
    WHERE newspaper_id = NEW.newspaper_id AND status = 'published'
  )
  WHERE id = NEW.newspaper_id;
END //

CREATE TRIGGER `tr_update_newspaper_ad_count_update`
AFTER UPDATE ON `newspaper_advertisements`
FOR EACH ROW
BEGIN
  UPDATE newspapers
  SET advertisement_count = (
    SELECT COUNT(*) 
    FROM newspaper_advertisements 
    WHERE newspaper_id = NEW.newspaper_id AND status = 'published'
  )
  WHERE id = NEW.newspaper_id;
END //

DELIMITER ;

-- =====================================================
-- GRANT PERMISSIONS (if needed)
-- =====================================================
-- GRANT SELECT, INSERT, UPDATE, DELETE ON vnnsbiz.* TO 'your_user'@'localhost';
-- FLUSH PRIVILEGES;

-- =====================================================
-- END OF SCHEMA
-- =====================================================

-- Verify tables created
SHOW TABLES LIKE 'newspapers';
SHOW TABLES LIKE 'newspaper_advertisements';
SHOW TABLES LIKE 'credit_packages';
SHOW TABLES LIKE 'user_credits';
SHOW TABLES LIKE 'credit_usage_log';
SHOW TABLES LIKE 'payment_transactions';
SHOW TABLES LIKE 'system_settings';
SHOW TABLES LIKE 'email_notifications';

SELECT 'Database schema created successfully!' as Status;
