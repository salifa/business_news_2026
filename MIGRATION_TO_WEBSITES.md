# Project Migration Summary

## Migration Date
May 2, 2026

## Overview
Successfully migrated the VNN Newspaper System project from `/var/www/html/vnn.mac.in.th` to `/websites/vnn.mac.in.th`.

## Changes Made

### 1. Directory Structure
- **Old Path:** `/var/www/html/vnn.mac.in.th`
- **New Path:** `/websites/vnn.mac.in.th`
- Created `/websites` directory with proper permissions
- Moved entire project directory including all subdirectories and files

### 2. Nginx Configuration
Updated nginx configuration files:
- **System Config:** `/etc/nginx/sites-available/vnn.mac.in.th`
  - Updated `root` directive to point to `/websites/vnn.mac.in.th`
  - Tested configuration with `nginx -t`
  - Reloaded nginx service successfully

- **Project Configs:**
  - `oldweb/nginx-http.conf`
  - `oldweb/nginx-https.conf`

### 3. PHP Configuration Files
Updated the following PHP files:
- `newspaper/includes/config.php`
  - Updated `BASE_PATH` constant
  - Updated `PYTHON_PATH` constant
- `newspaper/classes/PlacardIssue.php`
  - Updated Python path fallback
- `newspaper/test_pdf_generation.php`
  - Updated Python path

### 4. Python Scripts
Updated the following Python files:
- `newspaper/scripts/generate_placard_pdf.py`
  - Updated shebang line
  - Updated path constants (UPLOAD_PATH, OUTPUT_PATH, FONTS_PATH, LOGO_PATH)
- `test_thai_rendering.py`
  - Updated shebang line
  - Updated sys.path.insert

### 5. Shell Scripts
Updated the following shell scripts:
- `newspaper/scripts/auto_generate_issues.sh`
  - Updated directory paths
  - Updated log file path
  - Updated crontab comment
- `newspaper/scripts/test_pdf_generation.sh`
  - Updated all hardcoded paths (22 occurrences)

### 6. JavaScript Files
Updated the following JavaScript files:
- `newspaper/scripts/generate-newspaper-pdf.js`
  - Updated example path in comments

### 7. Documentation Files
Updated all Markdown documentation files:
- `newspaper/AUTO_PDF_GENERATION.md`
- `newspaper/SETUP_PDF_GENERATION.md`
- `newspaper/EMAIL_SETUP_GUIDE.md`
- `newspaper/FIX_ADMIN_ACCESS.md`
- `newspaper/PDF_GENERATION_SUMMARY.md`
- `newspaper/QUICKSTART.md`
- `newspaper/README.md`
- `newspaper/INSTALLATION_COMPLETE.md`

All documentation now references the new `/websites/vnn.mac.in.th` path.

## Verification Steps Completed

### 1. Configuration Verification
```bash
php -r "require '/websites/vnn.mac.in.th/newspaper/includes/config.php'; echo 'BASE_PATH: ' . BASE_PATH . PHP_EOL; echo 'PYTHON_PATH: ' . PYTHON_PATH . PHP_EOL;"
```
Output:
- BASE_PATH: `/websites/vnn.mac.in.th/newspaper/`
- PYTHON_PATH: `/websites/vnn.mac.in.th/.venv/bin/python`

### 2. Python Environment
```bash
/websites/vnn.mac.in.th/.venv/bin/python --version
```
- Python 3.12.3 working correctly

### 3. Nginx Configuration
```bash
sudo nginx -t
```
- Configuration syntax: OK
- Configuration file test: Successful
- Service reloaded successfully

### 4. Path Verification
- All PHP, Python, Shell, and JS files verified
- 0 remaining references to old path in code files
- Vendor directories excluded from updates (unchanged)

### 5. Directory Structure
Verified critical directories exist:
- `/websites/vnn.mac.in.th/newspaper/generated_pdfs` ✓
- `/websites/vnn.mac.in.th/newspaper/logs` ✓
- `/websites/vnn.mac.in.th/newspaper/fonts` ✓
- `/websites/vnn.mac.in.th/.venv` ✓

## Important Notes

### Crontab
No crontab entries were found. If you add cron jobs in the future, use the new path:
```
0 2 * * * /websites/vnn.mac.in.th/newspaper/scripts/auto_generate_issues.sh
```

### Permissions
Current permissions maintained:
- generated_pdfs: `drwxrwxrwx` (www-data:www-data)
- logs: `drwxrwxrwx` (www-data:www-data)
- fonts: `drwxrwxr-x` (s:s)

### Future Deployments
When deploying or updating code:
1. Always use `/websites/vnn.mac.in.th` as the base path
2. Update any new scripts or config files accordingly
3. The nginx configuration points to the new location
4. The Python virtual environment is at `/websites/vnn.mac.in.th/.venv`

## Post-Migration Checklist
- [x] Project moved to new location
- [x] Nginx configuration updated
- [x] PHP config files updated
- [x] Python scripts updated
- [x] Shell scripts updated
- [x] Documentation updated
- [x] Nginx service reloaded
- [x] Basic functionality verified
- [ ] Test the application in browser
- [ ] Test PDF generation functionality
- [ ] Test admin panel access
- [ ] Test user registration/login

## Rollback Information
If you need to rollback (not recommended):
1. Move project back: `sudo mv /websites/vnn.mac.in.th /var/www/html/vnn.mac.in.th`
2. Restore nginx config: `sudo cp /etc/nginx/sites-available/vnn.mac.in.th.backup /etc/nginx/sites-available/vnn.mac.in.th`
3. Reload nginx: `sudo systemctl reload nginx`

Note: A backup of the nginx config exists at `/etc/nginx/sites-available/vnn.mac.in.th.backup`

## Summary
The migration was completed successfully. All hardcoded paths have been updated from `/var/www/html/vnn.mac.in.th` to `/websites/vnn.mac.in.th`. The web server has been reconfigured and is now serving from the new location.

**Next Steps:**
1. Test the website in a browser to ensure all functionality works
2. Test PDF generation to verify Python integration
3. Consider updating any external documentation or deployment scripts
4. Monitor logs for any path-related issues
