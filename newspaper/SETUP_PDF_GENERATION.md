# Placard PDF Generation Setup Guide

## Prerequisites

### 1. Python 3.8+ and Dependencies

```bash
# Install Python 3 and pip
sudo apt-get update
sudo apt-get install -y python3 python3-pip

# Install required Python packages
cd /websites/vnn.mac.in.th/newspaper/scripts
pip3 install -r requirements.txt
```

### 2. Thai Fonts Installation

Download and install Thai fonts:

```bash
# Create fonts directory
mkdir -p /websites/vnn.mac.in.th/newspaper/fonts

# Download Prompt font (Google Fonts)
cd /websites/vnn.mac.in.th/newspaper/fonts
wget https://github.com/google/fonts/raw/main/ofl/prompt/Prompt-Bold.ttf

# Download Sarabun font (Google Fonts)
wget https://github.com/google/fonts/raw/main/ofl/sarabun/Sarabun-Regular.ttf
wget https://github.com/google/fonts/raw/main/ofl/sarabun/Sarabun-Bold.ttf

# Set permissions
chmod 644 *.ttf
```

### 3. Directory Setup

```bash
# Create necessary directories
mkdir -p /websites/vnn.mac.in.th/newspaper/generated_pdfs
mkdir -p /websites/vnn.mac.in.th/newspaper/logs

# Set permissions
chmod 755 /websites/vnn.mac.in.th/newspaper/generated_pdfs
chmod 755 /websites/vnn.mac.in.th/newspaper/logs
chown -R www-data:www-data /websites/vnn.mac.in.th/newspaper/generated_pdfs
chown -R www-data:www-data /websites/vnn.mac.in.th/newspaper/logs
```

### 4. Database Migration

```bash
# Run the migration SQL
mysql -u root -p vnnsbiz < /websites/vnn.mac.in.th/newspaper/migrations/004_create_placard_issues_tables.sql
```

### 5. Configuration Update

Add these constants to `includes/config.php`:

```php
// PDF Generation paths
define('GENERATED_PDF_PATH', __DIR__ . '/../generated_pdfs/');
define('FONTS_PATH', __DIR__ . '/../fonts/');
define('PYTHON_PATH', '/usr/bin/python3');
```

### 6. Make Scripts Executable

```bash
chmod +x /websites/vnn.mac.in.th/newspaper/scripts/auto_generate_issues.sh
chmod +x /websites/vnn.mac.in.th/newspaper/scripts/auto_generate_issues.php
chmod +x /websites/vnn.mac.in.th/newspaper/scripts/generate_placard_pdf.py
```

### 7. Setup Cron Job

```bash
# Edit crontab
crontab -e

# Add this line to run daily at 2 AM
0 2 * * * /websites/vnn.mac.in.th/newspaper/scripts/auto_generate_issues.sh
```

## Testing

### 1. Test Python Script Directly

```bash
cd /websites/vnn.mac.in.th/newspaper/scripts

# Test with sample data
python3 generate_placard_pdf.py "2026-04-29" '[{"id":1,"title":"Test Ad","companyname":"Test Company","placard_date":"2026-04-29"}]'
```

### 2. Test PHP Generation

```bash
# Run auto-generate script manually
php /websites/vnn.mac.in.th/newspaper/scripts/auto_generate_issues.php
```

### 3. Test via Admin Interface

1. Login to admin panel
2. Go to "จัดการฉบับหนังสือพิมพ์" (Issues Management)
3. Click "สร้างฉบับ" (Generate Issue)

## Verification

Check if PDF was generated:

```bash
ls -lah /websites/vnn.mac.in.th/newspaper/generated_pdfs/
```

Check logs:

```bash
tail -f /websites/vnn.mac.in.th/newspaper/logs/auto_generate.log
```

## Public Download Page

The public download page is accessible at:
```
https://vnn.mac.in.th/newspaper/public/download.php
```

No authentication required - open to public for legal document purposes.

## Troubleshooting

### Permission Issues

```bash
# Fix ownership
chown -R www-data:www-data /websites/vnn.mac.in.th/newspaper

# Fix permissions
chmod -R 755 /websites/vnn.mac.in.th/newspaper
chmod -R 775 /websites/vnn.mac.in.th/newspaper/generated_pdfs
chmod -R 775 /websites/vnn.mac.in.th/newspaper/logs
```

### Font Issues

If Thai characters don't display:
1. Verify fonts are in correct location
2. Check font file permissions
3. Try using absolute font paths in Python script

### Python Module Issues

```bash
# Reinstall packages
pip3 install --upgrade reportlab pypdf2 pillow
```

## Features

### What Gets Generated

Each issue includes:
- **Cover Page**: Date, newspaper name, issue info
- **Template Ads**: Company meeting notices with structured layout
- **Full Page Ads**: Custom uploaded images
- **Uploaded PDFs**: Merged customer PDFs

### Date Range Logic

- Issue date: The publication date
- Includes: All approved ads with placard_date = issue_date OR within 7 days before
- This complies with legal requirements for accounting documents

### Download Tracking

- Every download is logged with IP and timestamp
- Statistics available in admin panel
- No authentication required for downloads

## Maintenance

### Regular Tasks

1. **Monitor disk space**: PDFs accumulate over time
2. **Archive old issues**: Consider moving old PDFs to backup storage
3. **Check logs**: Review auto-generate logs for errors
4. **Verify fonts**: Ensure font files remain accessible

### Manual Regeneration

If an issue needs to be regenerated:
1. Go to admin issues page
2. Click regenerate icon for that issue
3. Old PDF is deleted and new one is generated

## Security Notes

- Download page is public (required for legal purposes)
- PDFs are read-only once generated
- No user input in PDF generation (only admin-approved ads)
- File paths are validated to prevent directory traversal
