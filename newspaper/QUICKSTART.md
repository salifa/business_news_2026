# Newspaper System - Quick Start Guide

## สถานะการพัฒนา
**Phase**: Foundation Complete ✅

## ที่ทำเสร็จแล้ว (Completed)

### 1. โครงสร้างโปรเจค ✅
- สร้างโครงสร้างไดเร็กทอรี
- ตั้งค่า permissions

### 2. Core System ✅
- ไฟล์ config.php (Database, URLs, Security settings)
- Database class (PDO wrapper)
- Helper functions (60+ utilities)

### 3. User Authentication ✅
- User class (Login, Register, Password reset)
- Login page
- Register page  
- Logout page
- Session management
- Remember me functionality

### 4. Credit System ✅
- Credit class
- Package management
- Payment processing
- Credit balance tracking
- Transaction logging

### 5. Frontend ✅
- Homepage (responsive, Bootstrap 5)
- User dashboard
- Sidebar navigation
- Thai language support

### 6. Database Schema ✅
- 8 tables created
- 2 views
- 2 stored procedures
- Triggers
- Sample data

### 7. Installation ✅
- Web-based installer (install.php)
- CLI installer (install.sh)

## ขั้นตอนการติดตั้ง (Installation Steps)

### Option 1: Web Installation (แนะนำ)
```
1. เข้า http://vnn.mac.in.th/newspaper/install.php
2. กรอกข้อมูล MySQL
3. คลิก "ติดตั้ง"
4. ลบไฟล์ install.php
5. เข้าสู่ระบบ!
```

### Option 2: Command Line
```bash
cd /websites/vnn.mac.in.th/newspaper
./install.sh
# กรอก: username, password, database name
```

## การทดสอบ (Testing)

### 1. ทดสอบ Homepage
```
http://vnn.mac.in.th/newspaper/public/
```

### 2. ทดสอบ Register
```
http://vnn.mac.in.th/newspaper/public/register.php
- กรอก: ชื่อ, อีเมล, รหัสผ่าน
- ลงทะเบียน
```

### 3. ทดสอบ Login
```
http://vnn.mac.in.th/newspaper/public/login.php
- ใช้อีเมลและรหัสผ่านที่สมัคร
```

### 4. ทดสอบ Dashboard
```
http://vnn.mac.in.th/newspaper/user/dashboard.php
- ดูยอดเครดิต
- ดูสถิติ
```

## ที่ต้องทำต่อ (TODO)

### Phase 2: Advertisement System
- [ ] create-advertisement.php (ฟอร์มลงประกาศ)
- [ ] my-advertisements.php (รายการประกาศ)
- [ ] Advertisement class
- [ ] File upload handler

### Phase 3: Credit Purchase
- [ ] buy-credits.php (หน้าซื้อเครดิต)
- [ ] payment.php (อัปโหลดสลิป)
- [ ] PromptPay QR code
- [ ] transactions.php (ประวัติ)

### Phase 4: Admin Panel
- [ ] admin/dashboard.php
- [ ] admin/approve-payments.php
- [ ] admin/manage-advertisements.php
- [ ] admin/manage-users.php

### Phase 5: PDF Generation
- [ ] ติดตั้ง TCPDF/mPDF
- [ ] PDFGenerator class
- [ ] Layout engine
- [ ] Thai font support
- [ ] admin/generate-newspaper.php

### Phase 6: Advanced Features
- [ ] Email notifications (PHPMailer)
- [ ] Payment gateway integration
- [ ] Cron jobs
- [ ] API endpoints

## Default Login Credentials

หลังติดตั้ง ให้ลงทะเบียนผู้ใช้ใหม่ผ่านหน้า register.php

สำหรับ Admin: ต้อง UPDATE ฐานข้อมูลให้ userlevel = 1
```sql
UPDATE online_placard_users 
SET userlevel = 1 
WHERE email = 'your-admin@email.com';
```

## File Structure Summary
```
newspaper/
├── public/          # 4 files (index, login, register, logout)
├── user/            # 1 file (dashboard)
├── admin/           # 0 files (TODO)
├── includes/        # 3 files (config, database, functions)
├── classes/         # 2 files (User, Credit)
├── database/        # 1 file (schema.sql)
├── install.php      # Web installer
├── install.sh       # CLI installer
└── README.md        # Full documentation
```

## คำสั่งที่มีประโยชน์

```bash
# ตรวจสอบ permissions
ls -la newspaper/public/assets/uploads
ls -la newspaper/logs

# แก้ไข permissions
chmod -R 777 newspaper/public/assets/uploads
chmod -R 777 newspaper/logs

# ดู error logs
tail -f newspaper/logs/error.log
tail -f newspaper/logs/database_error.log

# ดูไฟล์ config
cat newspaper/includes/config.php

# ทดสอบ database connection
mysql -u root -p vnnsbiz -e "SHOW TABLES;"
```

## Common Issues

### Database Connection Error
```bash
# ตรวจสอบ MySQL
service mysql status
# แก้ไข includes/config.php
```

### Permission Denied
```bash
chmod -R 755 newspaper/
chmod -R 777 newspaper/public/assets/uploads
chmod -R 777 newspaper/logs
```

### Session Issues
```bash
# Clear sessions
rm -rf /tmp/sess_*
# หรือ restart web server
service apache2 restart
```

---

**Status**: Foundation Complete ✅  
**Next**: Build Advertisement System  
**Updated**: 2024
