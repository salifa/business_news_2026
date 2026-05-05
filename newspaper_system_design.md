# Online Newspaper System Design
## Similar to kknaudit.com

### Date: April 21, 2026
### Based on Analysis of: www.kknaudit.com

---

## 1. DATABASE SCHEMA DESIGN

### New Tables to Create:

#### `newspapers`
```sql
CREATE TABLE newspapers (
  id INT AUTO_INCREMENT PRIMARY KEY,
  newspaper_date DATE NOT NULL UNIQUE,
  pdf_file VARCHAR(255),
  generated_at DATETIME,
  page_count INT DEFAULT 0,
  status ENUM('draft', 'published', 'archived') DEFAULT 'draft',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  INDEX idx_newspaper_date (newspaper_date),
  INDEX idx_status (status)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
```

#### `newspaper_advertisements`
```sql
CREATE TABLE newspaper_advertisements (
  id INT AUTO_INCREMENT PRIMARY KEY,
  placard_id INT,
  newspaper_date DATE NOT NULL,
  page_number INT,
  position ENUM('top', 'middle', 'bottom', 'full_page') DEFAULT 'middle',
  type ENUM('template', 'image', 'pdf') DEFAULT 'template',
  status ENUM('pending', 'approved', 'published', 'rejected') DEFAULT 'pending',
  approved_by INT,
  approved_at DATETIME,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (placard_id) REFERENCES placard(id) ON DELETE SET NULL,
  INDEX idx_newspaper_date (newspaper_date),
  INDEX idx_status (status)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
```

#### `credit_packages`  
```sql
CREATE TABLE credit_packages (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  credits INT NOT NULL,
  price DECIMAL(10,2) NOT NULL,
  price_per_credit DECIMAL(10,2) NOT NULL,
  description TEXT,
  is_active TINYINT(1) DEFAULT 1,
  sort_order INT DEFAULT 0,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
```

#### `user_credits`
```sql
CREATE TABLE user_credits (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_email VARCHAR(255) NOT NULL,
  credits INT DEFAULT 0,
  total_purchased INT DEFAULT 0,
  total_used INT DEFAULT 0,
  last_updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  UNIQUE KEY unique_user_email (user_email),
  INDEX idx_user_email (user_email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
```

#### `credit_usage_log`
```sql
CREATE TABLE credit_usage_log (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_email VARCHAR(255) NOT NULL,
  advertisement_id INT,
  credits_used INT NOT NULL,
  balance_before INT,
  balance_after INT,
  description VARCHAR(255),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  INDEX idx_user_email (user_email),
  INDEX idx_created_at (created_at)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
```

#### `payment_transactions`
```sql
CREATE TABLE payment_transactions (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_email VARCHAR(255) NOT NULL,
  package_id INT,
  amount DECIMAL(10,2) NOT NULL,
  credits INT NOT NULL,
  payment_method ENUM('bank_transfer', 'promptpay', 'credit_card', 'other') DEFAULT 'bank_transfer',
  slip_image VARCHAR(255),
  status ENUM('pending', 'approved', 'rejected', 'expired') DEFAULT 'pending',
  reference_number VARCHAR(100),
  approved_by INT,
  approved_at DATETIME,
  reject_reason TEXT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  INDEX idx_user_email (user_email),
  INDEX idx_status (status),
  INDEX idx_created_at (created_at)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
```

---

## 2. SYSTEM FEATURES

### A. User Management
- Email-based registration
- Email verification
- Password reset functionality
- User profile management

### B. Credit System
- **Credit Packages** (similar to kknaudit.com):
  - Package 1: 70 baht = 1 credit
  - Package 2: 300 baht = 5 credits (60 baht/credit)
  - Package 3: 500 baht = 10 credits (50 baht/credit)
  - Custom amount option
  
- **Purchase Flow**:
  1. User selects package
  2. Upload payment slip
  3. Admin approves payment
  4. Credits added to user account
  
- **Credit Usage**:
  - 1 credit = 1 advertisement placement
  - Deduct credit when advertisement is approved for publication

### C. Advertisement Creation
- **Form-based Templates**:
  - Annual meeting invitation (7 days advance)
  - Special meeting invitation (14 days advance)
  - Director change announcement
  - Capital increase/decrease
  - Company dissolution
  - Custom agenda
  
- **Upload Options**:
  - PDF file upload
  - Image upload (JPG, PNG)
  - Form-fill template generation

- **Advertisement Fields**:
  - Company name
  - Meeting type
  - Agenda items
  - Meeting date/time/location
  - Publication date
  - Authorized signatory details

### D. Newspaper Generation (PDF)
- **Daily Newspaper**:
  - A4 size format
  - Header with newspaper name, date, ISSN
  - Advertisement layout (multiple ads per page)
  - Page numbering
  - Legal disclaimer footer
  
- **PDF Generation Process**:
  1. Collect all approved advertisements for specific date
  2. Layout ads on pages (3-4 ads per page)
  3. Add full-page ads if any
  4. Generate PDF using TCPDF or mPDF
  5. Store PDF file
  6. Make available for download

- **Search Functionality**:
  - Search by company name
  - Search by date range
  - Filter by advertisement type

### E. Admin Panel
- **Payment Approval**:
  - View pending payments
  - View payment slips
  - Approve/reject with notes
  
- **Advertisement Management**:
  - Review submitted advertisements
  - Approve/reject for publication
  - Schedule publication date
  - Edit if needed
  
- **Newspaper Management**:
  - Generate newspaper for specific date
  - Regenerate if needed
  - Archive old newspapers
  
- **User Management**:
  - View all users
  - View user credit balance
  - Manual credit adjustment
  - User activity log

### F. User Dashboard
- **Credit Balance Display**
- **Recent Transactions**
- **Submitted Advertisements**:
  - Pending approval
  - Approved (scheduled)
  - Published
  - Rejected
  
- **Quick Actions**:
  - Buy credits
  - Create new advertisement
  - Download newspapers

---

## 3. TECHNOLOGY STACK

### Backend
- **PHP 7.4+**
- **MySQL 5.7+**
- **Composer** for dependency management

### Frontend
- **Bootstrap 5.3**
- **jQuery 3.6+**
- **Font Awesome 6** for icons
- **Select2** for enhanced dropdowns
- **Flatpickr** for date pickers
- **DataTables** for table management

### PDF Generation
- **TCPDF** or **mPDF** library
- Thai font support (THSarabunNew, Loma)

### File Upload
- **Dropzone.js** for drag-and-drop uploads
- Image optimization (resize, compress)

### Payment Integration
- Bank transfer with slip verification
- PromptPay QR code generation
- Future: Payment gateway (2C2P, Omise)

---

## 4. PAGE STRUCTURE

```
/newspaper (new system root)
├── /public
│   ├── index.php (Homepage)
│   ├── login.php
│   ├── register.php
│   ├── forgot-password.php
│   ├── /assets
│   │   ├── /css
│   │   ├── /js
│   │   ├── /images
│   │   └── /fonts
│   └── /newspapers (PDF storage)
│
├── /user
│   ├── dashboard.php
│   ├── buy-credits.php
│   ├── payment.php
│   ├── create-advertisement.php
│   ├── my-advertisements.php
│   ├── newspaper-archive.php
│   ├── profile.php
│   └── transactions.php
│
├── /admin
│   ├── dashboard.php
│   ├── payments.php
│   ├── advertisements.php
│   ├── newspapers.php
│   ├── users.php
│   └── settings.php
│
├── /api
│   ├── auth.php
│   ├── credits.php
│   ├── advertisements.php
│   └── newspapers.php
│
├── /includes
│   ├── config.php
│   ├── database.php
│   ├── functions.php
│   ├── auth.php
│   └── session.php
│
├── /classes
│   ├── User.php
│   ├── Credit.php
│   ├── Advertisement.php
│   ├── Newspaper.php
│   ├── Payment.php
│   └── PDFGenerator.php
│
└── /vendor (Composer packages)
```

---

## 5. WORKFLOW DIAGRAMS

### User Journey - Create Advertisement

```
1. Login → 2. Check Credit Balance → 3. Select Advertisement Type
   ↓
4. Fill Form / Upload File → 5. Preview → 6. Submit
   ↓
7. Admin Reviews → 8a. Approved → 9. Published in Newspaper
                 → 8b. Rejected → 10. User Notified
```

### Credit Purchase Flow

```
1. Select Package → 2. View Payment Details → 3. Upload Slip
   ↓
4. Admin Receives Notification → 5. Verify Payment → 6a. Approve
   ↓                                                 → 6b. Reject
7. Credits Added to Account → 8. User Notified
```

### Newspaper Generation Flow

```
1. Cron Job (Daily at specified time) or Manual Trigger
   ↓
2. Fetch Approved Advertisements for Date
   ↓
3. Sort by Priority/Time
   ↓
4. Layout Ads on Pages (PDF)
   ↓
5. Add Headers, Footers, Page Numbers
   ↓
6. Generate Final PDF
   ↓
7. Save to Storage
   ↓
8. Update Database
   ↓
9. Notify Users (ads published)
```

---

## 6. INTEGRATION WITH EXISTING SYSTEM

### Database Integration
- Use existing `online_placard_users` table for authentication
- Link `placard` table to new `newspaper_advertisements`
- Migrate existing `credit_coin` and `credit_transactions` data to new tables

### Data Migration Script
```sql
-- Migrate credit packages
INSERT INTO credit_packages (name, credits, price, price_per_credit, is_active, sort_order)
SELECT pop_name, coins, credit_amt, (credit_amt/coins), 1, id
FROM credit_coin;

-- Initialize user credits from existing transactions
INSERT INTO user_credits (user_email, credits, total_purchased)
SELECT owner_id, 
       SUM(CASE WHEN approved='yes' THEN coin ELSE 0 END),
       SUM(CASE WHEN approved='yes' THEN coin ELSE 0 END)
FROM credit_transactions
GROUP BY owner_id;
```

---

## 7. SECURITY CONSIDERATIONS

- **Input Validation**: All user inputs sanitized
- **SQL Injection Prevention**: Prepared statements
- **XSS Protection**: Output escaping
- **CSRF Protection**: Tokens on all forms
- **File Upload Security**: 
  - Whitelist file types
  - Rename uploaded files
  - Store outside web root when possible
  - Validate file content, not just extension
- **Authentication**:
  - Password hashing (bcrypt)
  - Session management
  - Remember me functionality (secure)
- **Authorization**: Role-based access control (user, admin)

---

## 8. FUTURE ENHANCEMENTS

- Email notifications (payment approved, ad published)
- SMS notifications
- API for third-party integrations
- Mobile app
- Automatic payment verification (bank API)
- Real-time payment via payment gateways
- Multi-language support (English, Chinese)
- Advertisement analytics
- Subscription plans
- Bulk advertisement upload

---

## 9. ESTIMATED CREDIT COST PER FEATURE

Based on kknaudit.com pricing:
- **1 Advertisement Placement**: 1 credit (50-70 baht)
- **Full Page Advertisement**: 2-3 credits
- **Priority Placement**: +1 credit
- **Rush Publication (< 3 days)**: +1 credit

---

## 10. LEGAL REQUIREMENTS

- **Newspaper License**: Verify license number and ISSN
- **Data Protection**: PDPA compliance
- **Advertisement Disclaimer**: Legal disclaimers on all publications
- **Record Keeping**: 7-year retention for audit purposes

---

**End of Design Document**
