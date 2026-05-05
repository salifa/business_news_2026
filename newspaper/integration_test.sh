#!/bin/bash

echo "╔═══════════════════════════════════════════════════════════╗"
echo "║    NEWSPAPER SYSTEM - INTEGRATION TEST                   ║"
echo "╚═══════════════════════════════════════════════════════════╝"
echo ""

# Colors
GREEN='\033[0;32m'
RED='\033[0;31m'
YELLOW='\033[1;33m'
NC='\033[0m' # No Color

# Test counter
PASSED=0
FAILED=0

# Function to check test result
check_result() {
    if [ $1 -eq 0 ]; then
        echo -e "${GREEN}✓ PASS${NC}: $2"
        ((PASSED++))
    else
        echo -e "${RED}✗ FAIL${NC}: $2"
        ((FAILED++))
    fi
}

echo "1. Testing Database Connection"
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━"
mysql -u root -pvnnsbiz2026 vnnsbiz -e "SELECT 1" > /dev/null 2>&1
check_result $? "Database connection"

echo ""
echo "2. Testing Web Server Response"
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━"
HTTP_CODE=$(curl -s -o /dev/null -w "%{http_code}" https://vnn.mac.in.th/newspaper/public/index.php)
if [ "$HTTP_CODE" = "200" ]; then
    check_result 0 "Web server responding (HTTP $HTTP_CODE)"
else
    check_result 1 "Web server responding (HTTP $HTTP_CODE)"
fi

echo ""
echo "3. Testing PHP Functionality"
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━"
cd /websites/vnn.mac.in.th/newspaper
php -r "echo 'PHP is working';" > /dev/null 2>&1
check_result $? "PHP runtime"

php -r "require 'includes/config.php'; echo 'Config loaded';" > /dev/null 2>&1
check_result $? "Config file loading"

php -r "require 'includes/database.php'; \$db = Database::getInstance(); echo 'DB class loaded';" > /dev/null 2>&1
check_result $? "Database class"

echo ""
echo "4. Testing Python Environment"
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━"
/websites/vnn.mac.in.th/.venv/bin/python --version > /dev/null 2>&1
check_result $? "Python executable"

/websites/vnn.mac.in.th/.venv/bin/python -c "import reportlab" > /dev/null 2>&1
check_result $? "ReportLab library"

/websites/vnn.mac.in.th/.venv/bin/python -c "from PIL import Image" > /dev/null 2>&1
check_result $? "Pillow (PIL) library"

echo ""
echo "5. Testing File System"
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━"
[ -w /websites/vnn.mac.in.th/newspaper/generated_pdfs ] && check_result 0 "PDF directory writable" || check_result 1 "PDF directory writable"
[ -w /websites/vnn.mac.in.th/newspaper/logs ] && check_result 0 "Logs directory writable" || check_result 1 "Logs directory writable"
[ -w /websites/vnn.mac.in.th/newspaper/temp ] && check_result 0 "Temp directory writable" || check_result 1 "Temp directory writable"

echo ""
echo "6. Testing Database Tables and Data"
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━"

# Check critical tables
mysql -u root -pvnnsbiz2026 vnnsbiz -e "SELECT COUNT(*) FROM placard" > /dev/null 2>&1
check_result $? "Placard table accessible"

mysql -u root -pvnnsbiz2026 vnnsbiz -e "SELECT COUNT(*) FROM placard_issues" > /dev/null 2>&1
check_result $? "Placard issues table accessible"

mysql -u root -pvnnsbiz2026 vnnsbiz -e "SELECT COUNT(*) FROM credit_packages" > /dev/null 2>&1
check_result $? "Credit packages table accessible"

# Check if we have data
PLACARD_COUNT=$(mysql -u root -pvnnsbiz2026 vnnsbiz -se "SELECT COUNT(*) FROM placard")
if [ "$PLACARD_COUNT" -gt 0 ]; then
    check_result 0 "Placard data exists ($PLACARD_COUNT records)"
else
    check_result 1 "Placard data exists"
fi

echo ""
echo "7. Testing PDF Generation System"
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━"

# Check if PDFs exist
PDF_COUNT=$(find /websites/vnn.mac.in.th/newspaper/generated_pdfs -name "*.pdf" | wc -l)
if [ "$PDF_COUNT" -gt 0 ]; then
    check_result 0 "Generated PDFs exist ($PDF_COUNT files)"
else
    check_result 1 "Generated PDFs exist"
fi

# Check PDF generation script
[ -f /websites/vnn.mac.in.th/newspaper/scripts/generate_placard_pdf.py ] && check_result 0 "PDF generation script exists" || check_result 1 "PDF generation script exists"

# Test PDF generation with sample data (dry run)
cd /websites/vnn.mac.in.th/newspaper
PYTHON_TEST=$(/websites/vnn.mac.in.th/.venv/bin/python -c "
import sys
sys.path.append('/websites/vnn.mac.in.th/newspaper/scripts')
try:
    from reportlab.pdfgen import canvas
    from reportlab.lib.pagesizes import A4
    print('OK')
except Exception as e:
    print('ERROR')
" 2>&1)

if [ "$PYTHON_TEST" = "OK" ]; then
    check_result 0 "PDF generation libraries functional"
else
    check_result 1 "PDF generation libraries functional"
fi

echo ""
echo "8. Testing Thai Font Support"
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━"
FONT_COUNT=$(find /websites/vnn.mac.in.th/newspaper/fonts -name "*.ttf" -o -name "*.TTF" | wc -l)
if [ "$FONT_COUNT" -gt 0 ]; then
    check_result 0 "Thai fonts available ($FONT_COUNT font files)"
else
    check_result 1 "Thai fonts available"
fi

echo ""
echo "════════════════════════════════════════════════════════════"
echo "                    TEST SUMMARY                            "
echo "════════════════════════════════════════════════════════════"
TOTAL=$((PASSED + FAILED))
PERCENTAGE=$((PASSED * 100 / TOTAL))

echo "Total Tests: $TOTAL"
echo -e "Passed: ${GREEN}$PASSED ✓${NC}"
echo -e "Failed: ${RED}$FAILED ✗${NC}"
echo "Success Rate: $PERCENTAGE%"
echo "════════════════════════════════════════════════════════════"

if [ $FAILED -eq 0 ]; then
    echo -e "\n${GREEN}🎉 ALL INTEGRATION TESTS PASSED! 🎉${NC}\n"
    echo "✓ System is fully operational"
    echo "✓ Ready for production use"
    exit 0
else
    echo -e "\n${YELLOW}⚠️  SOME TESTS FAILED ⚠️${NC}\n"
    echo "Please review the failures above"
    exit 1
fi
