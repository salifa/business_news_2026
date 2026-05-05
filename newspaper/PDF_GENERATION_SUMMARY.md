# Placard PDF Generation System - Complete Implementation

## Overview

I've implemented a complete PDF generation system for your placard newspaper with the following components:

## 📁 Files Created

### 1. **Python PDF Generator** 
- `newspaper/scripts/generate_placard_pdf.py`
- Uses ReportLab for page layout and PDF generation
- Uses Pillow for image processing
- Uses PyPDF2 for merging uploaded PDFs
- Supports Thai fonts (Prompt Bold & Sarabun)

### 2. **PHP Backend Classes**
- `newspaper/classes/PlacardIssue.php`
- Handles issue generation, tracking, and download management
- Auto-generation logic for pending dates
- Download tracking and statistics

### 3. **Database Tables**
- `newspaper/migrations/004_create_placard_issues_tables.sql`
- `placard_issues`: Stores generated PDF metadata
- `placard_downloads`: Tracks all downloads with IP and timestamp
- Updated `placard` table with `published_at` and `issue_id` fields

### 4. **Public Download Page**
- `newspaper/public/download.php`
- **Open to public** - no authentication required
- Shows recent 25 issues
- Beautiful UI with download statistics
- Legal notice about document validity

### 5. **Admin Interface**
- `newspaper/admin/issues.php`
- Manual PDF generation
- Auto-generate all pending issues
- View statistics (total issues, ads, downloads, file size)
- Regenerate or delete issues

### 6. **Automation Scripts**
- `newspaper/scripts/auto_generate_issues.sh` - Bash wrapper
- `newspaper/scripts/auto_generate_issues.php` - PHP script
- `newspaper/scripts/requirements.txt` - Python dependencies

### 7. **Documentation**
- `newspaper/SETUP_PDF_GENERATION.md` - Complete setup guide

## ✨ Key Features Implemented

### 1. **Date Range Logic** ✅
Each issue includes:
- Ads with `placard_date` = issue date
- **PLUS** ads from 7 days before the issue date
- This meets legal requirements for accounting documents

### 2. **Cover Page** ✅
- Newspaper name and logo
- Issue date in Thai format
- Number of advertisements
- Legal notice about document validity
- Professional design with gradient and colors

### 3. **Template Ads (Regular)** ✅
Beautiful structured layout with:
- Company name
- Meeting number
- Meeting agenda
- Date, time, and place
- Optional image display
- Uses **Prompt Bold** for headers
- Uses **Sarabun** for body text

### 4. **Full Page Ads** ✅
- Full A4 page layout
- Image centered and scaled properly
- Page header with newspaper name and date

### 5. **PDF Merging** ✅
- Automatically merges uploaded customer PDFs
- Maintains original quality
- Proper page ordering

### 6. **Public Download** ✅
- **No login required** (for legal purposes)
- Browse recent 25 issues
- Shows issue date, ad count, file size, download count
- Date range display (7-day window)
- Clean, professional UI

### 7. **Download Tracking** ✅
- Every download logged with:
  - IP address
  - User agent
  - Timestamp
- Statistics in admin panel
- Download counter per issue

### 8. **Auto-Generation** ✅
- Cron job runs daily at 2 AM
- Finds all dates with approved ads but no issue
- Generates PDFs automatically
- Logs all activity
- Updates ad status to 'published'

## 🚀 Setup Instructions

### Quick Start:

```bash
# 1. Install Python dependencies
cd /websites/vnn.mac.in.th/newspaper/scripts
pip3 install -r requirements.txt

# 2. Install Thai fonts
mkdir -p /websites/vnn.mac.in.th/newspaper/fonts
cd /websites/vnn.mac.in.th/newspaper/fonts
wget https://github.com/google/fonts/raw/main/ofl/prompt/Prompt-Bold.ttf
wget https://github.com/google/fonts/raw/main/ofl/sarabun/Sarabun-Regular.ttf
wget https://github.com/google/fonts/raw/main/ofl/sarabun/Sarabun-Bold.ttf

# 3. Create directories
mkdir -p /websites/vnn.mac.in.th/newspaper/generated_pdfs
mkdir -p /websites/vnn.mac.in.th/newspaper/logs
chmod 775 /websites/vnn.mac.in.th/newspaper/generated_pdfs
chmod 775 /websites/vnn.mac.in.th/newspaper/logs

# 4. Run database migration
mysql -u root -p vnnsbiz < /websites/vnn.mac.in.th/newspaper/migrations/004_create_placard_issues_tables.sql

# 5. Make scripts executable
chmod +x /websites/vnn.mac.in.th/newspaper/scripts/*.sh
chmod +x /websites/vnn.mac.in.th/newspaper/scripts/*.php
chmod +x /websites/vnn.mac.in.th/newspaper/scripts/*.py

# 6. Setup cron job
crontab -e
# Add: 0 2 * * * /websites/vnn.mac.in.th/newspaper/scripts/auto_generate_issues.sh

# 7. Test generation
php /websites/vnn.mac.in.th/newspaper/scripts/auto_generate_issues.php
```

## 📊 Usage

### For Admin:
1. Go to admin panel → "จัดการฉบับหนังสือพิมพ์"
2. See pending dates (dates with approved ads but no issue)
3. Click "สร้างฉบับ" to generate specific date
4. Or click "สร้างทั้งหมด" to auto-generate all pending dates

### For Public:
1. Visit: `https://vnn.mac.in.th/newspaper/public/download.php`
2. Browse recent 25 issues
3. Click download to get PDF
4. No login required!

## 🎨 Design Features

- **Fonts**: Prompt Bold (headers) + Sarabun (body)
- **Colors**: Professional blue gradient
- **Layout**: Clean A4 format with proper margins
- **Thai Support**: Full Thai language support
- **Legal Compliance**: Cover page states document validity

## 📝 Database Schema

```sql
placard_issues
├── id (PK)
├── issue_date (UNIQUE) - Date of publication
├── filename - PDF filename
├── file_size - Size in bytes
├── ad_count - Number of ads included
├── date_range_start - 7 days before issue date
├── date_range_end - Issue date
├── download_count - Times downloaded
└── generated_at - Generation timestamp

placard_downloads
├── id (PK)
├── issue_id (FK)
├── ip_address
├── user_agent
└── downloaded_at
```

## 🔧 Technical Details

- **Python 3.8+** required
- **ReportLab** for PDF generation
- **PyPDF2** for PDF merging
- **Pillow** for image processing
- **Thai fonts** included
- **7-day window** logic implemented
- **Automatic cleanup** of old temp files

## 🎯 Next Steps

1. Run the setup commands above
2. Test PDF generation manually from admin panel
3. Verify fonts render correctly
4. Check public download page works
5. Enable cron job for daily auto-generation

See `SETUP_PDF_GENERATION.md` for detailed instructions!
