# 🔐 Database Access Credentials

## MariaDB Root Access

### Option 1: Direct MySQL Root Login (Recommended)
```bash
mysql -u root -p
```
**Password:** `vnnsbiz2026`

### Option 2: One-Line Command
```bash
mysql -u root -p'vnnsbiz2026'
```

### Option 3: Using System User (No Password)
```bash
sudo -u mysql mysql
```

---

## Database Information

**Database Server:** MariaDB 10.11.14  
**Database Name:** `vnnsbiz`  
**Host:** `localhost`  
**Port:** `3306` (default)

---

## Connection Examples

### Connect to vnnsbiz Database
```bash
mysql -u root -p'vnnsbiz2026' vnnsbiz
```

### Execute Query from Command Line
```bash
mysql -u root -p'vnnsbiz2026' vnnsbiz -e "SHOW TABLES;"
```

### Import SQL File
```bash
mysql -u root -p'vnnsbiz2026' vnnsbiz < backup.sql
```

### Export Database (Backup)
```bash
mysqldump -u root -p'vnnsbiz2026' vnnsbiz > vnnsbiz_backup_$(date +%Y%m%d).sql
```

---

## PHP Application Credentials

**File:** `includes/config.php`

```php
define('DB_HOST', 'localhost');
define('DB_USER', 'mysql');      // Uses Unix socket authentication
define('DB_PASS', '');           // No password needed with mysql user
define('DB_NAME', 'vnnsbiz');
```

⚠️ **Note:** The PHP application currently uses the `mysql` system user for database connections via Unix socket. This is secure for local applications.

---

## Creating Additional Database Users

### For Remote Access (phpMyAdmin, etc.)
```bash
mysql -u root -p'vnnsbiz2026' -e "
CREATE USER 'vnnsbiz_admin'@'localhost' IDENTIFIED BY 'YourSecurePassword';
GRANT ALL PRIVILEGES ON vnnsbiz.* TO 'vnnsbiz_admin'@'localhost';
FLUSH PRIVILEGES;
"
```

### For Application-Specific User (Read-Only)
```bash
mysql -u root -p'vnnsbiz2026' -e "
CREATE USER 'vnnsbiz_readonly'@'localhost' IDENTIFIED BY 'ReadOnlyPassword';
GRANT SELECT ON vnnsbiz.* TO 'vnnsbiz_readonly'@'localhost';
FLUSH PRIVILEGES;
"
```

---

## Quick Database Tasks

### Show All Databases
```bash
mysql -u root -p'vnnsbiz2026' -e "SHOW DATABASES;"
```

### Show All Tables in vnnsbiz
```bash
mysql -u root -p'vnnsbiz2026' vnnsbiz -e "SHOW TABLES;"
```

### Check Table Structure
```bash
mysql -u root -p'vnnsbiz2026' vnnsbiz -e "DESCRIBE newspapers;"
```

### Count Records
```bash
mysql -u root -p'vnnsbiz2026' vnnsbiz -e "
SELECT 'Users' as table_name, COUNT(*) as count FROM online_placard_users
UNION ALL
SELECT 'Newspapers', COUNT(*) FROM newspapers
UNION ALL
SELECT 'Advertisements', COUNT(*) FROM newspaper_advertisements
UNION ALL
SELECT 'Payments', COUNT(*) FROM payment_transactions;
"
```

---

## Security Recommendations

### 1. Change Default Root Password
```bash
mysql -u root -p'vnnsbiz2026' -e "ALTER USER 'root'@'localhost' IDENTIFIED BY 'YourNewStrongPassword';"
```

### 2. Create Dedicated Application User
Instead of using `root` in applications, create a dedicated user:
```bash
mysql -u root -p'vnnsbiz2026' -e "
CREATE USER 'newspaper_app'@'localhost' IDENTIFIED BY 'AppPassword123';
GRANT SELECT, INSERT, UPDATE, DELETE ON vnnsbiz.* TO 'newspaper_app'@'localhost';
FLUSH PRIVILEGES;
"
```

Then update `includes/config.php`:
```php
define('DB_USER', 'newspaper_app');
define('DB_PASS', 'AppPassword123');
```

### 3. Enable MySQL Logging
Edit `/etc/mysql/mariadb.conf.d/50-server.cnf`:
```ini
general_log = 1
general_log_file = /var/log/mysql/mysql.log
```

---

## Backup Strategy

### Daily Automated Backup (Cron Job)
Create file: `/usr/local/bin/backup-vnnsbiz.sh`
```bash
#!/bin/bash
BACKUP_DIR="/var/backups/mysql"
DATE=$(date +%Y%m%d_%H%M%S)
mkdir -p $BACKUP_DIR

mysqldump -u root -p'vnnsbiz2026' vnnsbiz > $BACKUP_DIR/vnnsbiz_$DATE.sql

# Keep only last 7 days
find $BACKUP_DIR -name "vnnsbiz_*.sql" -mtime +7 -delete
```

Make it executable:
```bash
chmod +x /usr/local/bin/backup-vnnsbiz.sh
```

Add to crontab:
```bash
# Daily backup at 2 AM
0 2 * * * /usr/local/bin/backup-vnnsbiz.sh
```

---

## Troubleshooting

### Access Denied Error
```bash
ERROR 1045 (28000): Access denied for user 'root'@'localhost'
```
**Solution:** Use the correct password: `vnnsbiz2026`

### Can't Connect to MySQL Server
```bash
ERROR 2002 (HY000): Can't connect to local MySQL server
```
**Solution:** Check if MariaDB is running:
```bash
sudo systemctl status mariadb
sudo systemctl start mariadb
```

### Forgot Root Password
**Solution:** Use system user bypass:
```bash
sudo -u mysql mysql -e "ALTER USER 'root'@'localhost' IDENTIFIED BY 'NewPassword';"
```

---

## All Available Users

```bash
mysql -u root -p'vnnsbiz2026' -e "SELECT User, Host FROM mysql.user;"
```

Current users:
- `root@localhost` - Full admin access (password: vnnsbiz2026)
- `mysql@localhost` - System user (no password, Unix socket only)
- `mariadb.sys@localhost` - System user

---

**Last Updated:** April 21, 2026  
**Root Password Set:** April 21, 2026

⚠️ **IMPORTANT:** Keep this file secure! Do not commit to Git or share publicly.
