# Online Newspaper System (ระบบหนังสือพิมพ์ออนไลน์)

ระบบลงประกาศหนังสือพิมพ์ออนไลน์แบบครบวงจร พร้อมระบบเครดิต ชำระเงิน และสร้าง PDF

## คุณสมบัติหลัก (Features)

### ✨ สำหรับผู้ใช้งาน
- 📝 ลงประกาศหนังสือพิมพ์ออนไลน์
- 💳 ระบบเครดิต - ซื้อเครดิตตามแพ็กเกจ
- 💰 ชำระเงินผ่านการอัปโหลดสลิป (PromptPay / โอนเงิน)
- 📄 รับ PDF หนังสือพิมพ์ทันทีหลังอนุมัติ
- 📊 ติดตามสถานะประกาศและเครดิต
- 🔐 ระบบ Login/Register ที่ปลอดภัย

### 🛠 สำหรับผู้ดูแลระบบ (Admin)
- ✅ อนุมัติ/ปฏิเสธการชำระเงิน
- 📰 จัดการประกาศหนังสือพิมพ์
- 👥 จัดการผู้ใช้งาน
- 📊 รายงานและสถิติ
- 🗄 สร้างหนังสือพิมพ์รายวัน (PDF)

## เทคโนโลยีที่ใช้ (Tech Stack)

- **Backend**: PHP 7.4+ with PDO
- **Database**: MySQL 5.7+ / MariaDB 10.3+
- **Frontend**: Bootstrap 5.3, jQuery, Font Awesome
- **PDF Generation**: TCPDF / mPDF (ติดตั้งภายหลัง)
- **Security**: Password hashing (bcrypt), CSRF protection, Session management

## โครงสร้างโปรเจค (Project Structure)

```
newspaper/
├── public/              # เว็บสาธารณะ
│   ├── index.php       # หน้าแรก
│   ├── login.php       # เข้าสู่ระบบ
│   ├── register.php    # ลงทะเบียน
│   ├── logout.php      # ออกจากระบบ
│   ├── assets/         # ไฟล์ CSS, JS, รูปภาพ
│   │   ├── css/
│   │   ├── js/
│   │   ├── images/
│   │   └── uploads/    # ไฟล์อัปโหลด
│   └── newspapers/     # PDF หนังสือพิมพ์
├── user/               # หน้าสำหรับผู้ใช้ทั่วไป
│   ├── dashboard.php
│   ├── create-advertisement.php
│   ├── my-advertisements.php
│   ├── buy-credits.php
│   ├── transactions.php
│   └── profile.php
├── admin/              # หน้าสำหรับ Admin
│   ├── dashboard.php
│   ├── approve-payments.php
│   ├── manage-advertisements.php
│   ├── generate-newspaper.php
│   └── manage-users.php
├── api/                # REST API Endpoints
├── includes/           # ไฟล์ Config
│   ├── config.php      # การตั้งค่าหลัก
│   ├── database.php    # Database class
│   └── functions.php   # Helper functions
├── classes/            # PHP Classes
│   ├── User.php
│   ├── Credit.php
│   ├── Advertisement.php
│   └── PDFGenerator.php
├── database/           # SQL Files
│   └── newspaper_schema.sql
├── vendor/             # Composer packages
├── temp/               # ไฟล์ชั่วคราว
└── logs/               # Log files
```

## การติดตั้ง (Installation)

### ความต้องการของระบบ (Requirements)

- PHP 7.4 หรือสูงกว่า
- MySQL 5.7+ หรือ MariaDB 10.3+
- Apache/Nginx Web Server
- Extensions: PDO, mysqli, mbstring, gd, zip

### ขั้นตอนการติดตั้ง

#### วิธีที่ 1: ติดตั้งผ่านเว็บ (แนะนำ)

1. **อัปโหลดไฟล์ไปยังเซิร์ฟเวอร์**
   ```bash
   # ย้ายไฟล์ทั้งหมดไปที่ public_html หรือ www
   ```

2. **ตั้งค่า Permissions**
   ```bash
   chmod -R 755 newspaper/
   chmod -R 777 newspaper/public/assets/uploads
   chmod -R 777 newspaper/public/newspapers
   chmod -R 777 newspaper/temp
   chmod -R 777 newspaper/logs
   ```

3. **เข้าถึง install.php**
   ```
   http://your-domain.com/newspaper/install.php
   ```

4. **กรอกข้อมูลฐานข้อมูล**
   - MySQL Host: `localhost`
   - MySQL Username: `your_username`
   - MySQL Password: `your_password`
   - Database Name: `vnnsbiz`

5. **ติดตั้งอัตโนมัติ**
   - ระบบจะสร้างตารางและข้อมูลเริ่มต้นให้

6. **ลบไฟล์ install.php** (สำคัญ!)
   ```bash
   rm install.php install_complete.lock
   ```

#### วิธีที่ 2: ติดตั้งผ่าน Command Line

1. **Clone หรือ Download โปรเจค**
   ```bash
   cd /websites/vnn.mac.in.th
   ```

2. **ตั้งค่า Permissions**
   ```bash
   chmod -R 755 newspaper/
   chmod -R 777 newspaper/public/assets/uploads
   chmod -R 777 newspaper/public/newspapers
   chmod -R 777 newspaper/temp
   chmod -R 777 newspaper/logs
   ```

3. **รันสคริปต์ติดตั้ง**
   ```bash
   cd newspaper
   ./install.sh
   ```

4. **กรอกข้อมูลเมื่อถูกถาม**
   ```
   Enter MySQL username: root
   Enter MySQL password: ********
   Enter database name: vnnsbiz
   ```

5. **แก้ไขไฟล์ config.php** (หากจำเป็น)
   ```bash
   nano includes/config.php
   ```

## การตั้งค่า (Configuration)

### ไฟล์ includes/config.php

แก้ไขการตั้งค่าตามความต้องการ:

```php
// Database
define('DB_HOST', 'localhost');
define('DB_USER', 'your_username');
define('DB_PASS', 'your_password');
define('DB_NAME', 'vnnsbiz');

// Base URL
define('BASE_URL', 'http://your-domain.com/newspaper/');

// Email Settings
define('SMTP_ENABLE', false);  // เปลี่ยนเป็น true เมื่อต้องการใช้ SMTP
define('SMTP_HOST', 'smtp.gmail.com');
define('SMTP_USER', 'your-email@gmail.com');

// Payment Settings
define('PAYMENT_BANK_NAME', 'ธนาคารกสิกรไทย');
define('PAYMENT_BANK_ACCOUNT', '123-4-56789-0');
define('PROMPTPAY_NUMBER', '0123456789');
```

## การใช้งาน (Usage)

### สำหรับผู้ใช้ทั่วไป

1. **ลงทะเบียน**
   - ไปที่ `http://your-domain.com/newspaper/public/register.php`
   - กรอกข้อมูล: ชื่อ-นามสกุล, อีเมล, รหัสผ่าน
   - กดลงทะเบียน

2. **เข้าสู่ระบบ**
   - ใช้อีเมลและรหัสผ่านที่สมัครไว้

3. **ซื้อเครดิต**
   - เลือกแพ็กเกจ (1, 5, หรือ 10 เครดิต)
   - อัปโหลดสลิปการโอนเงิน
   - รอแอดมินอนุมัติ (จะได้รับอีเมลแจ้งเตือน)

4. **ลงประกาศ**
   - กรอกข้อมูลประกาศหรืออัปโหลดไฟล์
   - ระบบหักเครดิตอัตโนมัติ
   - รับ PDF หนังสือพิมพ์

### สำหรับผู้ดูแลระบบ (Admin)

1. **เข้าสู่ระบบ Admin**
   - ต้องมี userlevel = 1 ในฐานข้อมูล

2. **อนุมัติการชำระเงิน**
   - ตรวจสอบสลิปการโอนเงิน
   - อนุมัติ/ปฏิเสธ
   - ระบบเพิ่มเครดิตให้ผู้ใช้อัตโนมัติเมื่ออนุมัติ

3. **จัดการประกาศ**
   - ตรวจสอบประกาศก่อนเผยแพร่
   - อนุมัติ/ปฏิเสธประกาศ

4. **สร้างหนังสือพิมพ์**
   - เลือกประกาศที่อนุมัติแล้ว
   - สร้าง PDF หนังสือพิมพ์
   - ระบบจัดเรียง layout อัตโนมัติ

## ฐานข้อมูล (Database Schema)

### ตารางหลัก

1. **newspapers** - หนังสือพิมพ์แต่ละฉบับ
2. **newspaper_advertisements** - ประกาศในหนังสือพิมพ์
3. **credit_packages** - แพ็กเกจเครดิต (70฿, 300฿, 500฿)
4. **user_credits** - เครดิตคงเหลือของผู้ใช้
5. **credit_usage_log** - บันทึกการใช้เครดิต
6. **payment_transactions** - รายการชำระเงิน
7. **online_placard_users** - ผู้ใช้งาน (ใช้ตารางเดิม)
8. **placard** - ประกาศ (ใช้ตารางเดิม)

### View

- **v_user_credit_summary** - สรุปเครดิตของผู้ใช้
- **v_daily_newspaper_summary** - สรุปหนังสือพิมพ์รายวัน

### Stored Procedures

- **sp_deduct_credit_for_ad** - หักเครดิตเมื่อลงประกาศ
- **sp_add_credits_from_payment** - เพิ่มเครดิตจากการชำระเงิน

## แพ็กเกจเครดิต (Credit Packages)

| แพ็กเกจ | ราคา | เครดิต | ราคาต่อเครดิต | ประหยัด |
|--------|------|--------|---------------|---------|
| 1      | 70฿  | 1      | 70฿           | -       |
| 2      | 300฿ | 5      | 60฿           | 14%     |
| 3      | 500฿ | 10     | 50฿           | 29%     |

## ความปลอดภัย (Security Features)

- ✅ Password hashing (bcrypt cost 12)
- ✅ CSRF token protection
- ✅ SQL injection prevention (PDO prepared statements)
- ✅ XSS protection (output escaping)
- ✅ Session management with timeout
- ✅ File upload validation
- ✅ Remember me cookie (secure, httponly)

## การแก้ไขปัญหา (Troubleshooting)

### ไม่สามารถเชื่อมต่อฐานข้อมูล

```bash
# ตรวจสอบว่า MySQL ทำงานอยู่
service mysql status

# ตรวจสอบ credentials ใน config.php
nano includes/config.php
```

### ไม่สามารถอัปโหลดไฟล์

```bash
# ตรวจสอบ permissions
ls -la public/assets/uploads/
chmod 777 public/assets/uploads/
```

### Session error

```bash
# ตรวจสอบว่าไดเร็กทอรี temp มีสิทธิ์เขียน
chmod 777 temp/
```

### PDF ไม่แสดง

```bash
# ติดตั้ง TCPDF/mPDF ผ่าน Composer
cd newspaper
composer require tecnickcom/tcpdf
```

## TODO / ฟีเจอร์ที่จะพัฒนาต่อ

- [ ] ติดตั้ง PDF library (TCPDF/mPDF)
- [ ] สร้างระบบ Advertisement submission (ลงประกาศ)
- [ ] สร้าง PDF Generator สำหรับหนังสือพิมพ์
- [ ] ระบบอัปโหลดโลโก้/รูปภาพประกาศ
- [ ] Admin panel - อนุมัติการชำระเงิน
- [ ] Admin panel - จัดการประกาศ
- [ ] Email notifications (PHPMailer)
- [ ] Payment gateway integration (2C2P, Omise)
- [ ] API endpoints สำหรับ mobile app
- [ ] Cron job สำหรับสร้างหนังสือพิมพ์อัตโนมัติ

## การสนับสนุน (Support)

- 📞 โทร: 02-9825672, 064-2412040
- 📧 Email: admin@vnn.mac.in.th
- 🌐 Website: http://vnn.mac.in.th

## License

Copyright © 2024 VNN Online Newspaper System. All rights reserved.

---

## ไฟล์ที่สร้างแล้ว

### ✅ Core System
- [x] includes/config.php - การตั้งค่าหลัก
- [x] includes/database.php - Database class
- [x] includes/functions.php - Helper functions

### ✅ Classes
- [x] classes/User.php - การจัดการผู้ใช้
- [x] classes/Credit.php - การจัดการเครดิต

### ✅ Public Pages
- [x] public/index.php - หน้าแรก
- [x] public/login.php - เข้าสู่ระบบ
- [x] public/register.php - ลงทะเบียน
- [x] public/logout.php - ออกจากระบบ

### ✅ User Pages
- [x] user/dashboard.php - แดชบอร์ดผู้ใช้

### ✅ Database
- [x] database/newspaper_schema.sql - โครงสร้างฐานข้อมูล

### ✅ Installation
- [x] install.php - ติดตั้งผ่านเว็บ
- [x] install.sh - ติดตั้งผ่าน CLI

---

**เริ่มต้นใช้งาน**: เข้าไปที่ `http://your-domain.com/newspaper/install.php`
