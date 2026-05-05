#!/bin/bash
# Cron job to auto-generate placard issues daily
# Add to crontab: 0 2 * * * /websites/vnn.mac.in.th/newspaper/scripts/auto_generate_issues.sh

# Change to script directory
cd /websites/vnn.mac.in.th/newspaper/scripts

# Run PHP script to auto-generate issues
php auto_generate_issues.php >> /websites/vnn.mac.in.th/newspaper/logs/auto_generate.log 2>&1
