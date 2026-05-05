#!/bin/bash
# Quick Test Script for PDF Generation
# Usage: ./test_pdf_generation.sh

echo "==================================="
echo "PDF Generation System - Quick Test"
echo "==================================="
echo ""

# Check if Python is installed
echo "1. Checking Python installation..."
if command -v python3 &> /dev/null; then
    echo "   ✓ Python3 installed: $(python3 --version)"
else
    echo "   ✗ Python3 not found. Please install Python 3.8+"
    exit 1
fi

# Check Python packages
echo ""
echo "2. Checking Python packages..."
PYTHON_BIN="/websites/vnn.mac.in.th/.venv/bin/python"
if [ -f "$PYTHON_BIN" ]; then
    $PYTHON_BIN -c "import reportlab; print('   ✓ ReportLab installed')" 2>/dev/null || echo "   ✗ ReportLab not installed. Run: $PYTHON_BIN -m pip install reportlab"
    $PYTHON_BIN -c "import PyPDF2; print('   ✓ PyPDF2 installed')" 2>/dev/null || echo "   ✗ PyPDF2 not installed. Run: $PYTHON_BIN -m pip install pypdf2"
    $PYTHON_BIN -c "import PIL; print('   ✓ Pillow installed')" 2>/dev/null || echo "   ✗ Pillow not installed. Run: $PYTHON_BIN -m pip install pillow"
else
    python3 -c "import reportlab; print('   ✓ ReportLab installed')" 2>/dev/null || echo "   ✗ ReportLab not installed. Run: pip3 install reportlab"
    python3 -c "import PyPDF2; print('   ✓ PyPDF2 installed')" 2>/dev/null || echo "   ✗ PyPDF2 not installed. Run: pip3 install pypdf2"
    python3 -c "import PIL; print('   ✓ Pillow installed')" 2>/dev/null || echo "   ✗ Pillow not installed. Run: pip3 install pillow"
fi

# Check directories
echo ""
echo "3. Checking directories..."
[ -d "/websites/vnn.mac.in.th/newspaper/generated_pdfs" ] && echo "   ✓ generated_pdfs directory exists" || echo "   ✗ generated_pdfs directory missing"
[ -d "/websites/vnn.mac.in.th/newspaper/fonts" ] && echo "   ✓ fonts directory exists" || echo "   ✗ fonts directory missing"
[ -d "/websites/vnn.mac.in.th/newspaper/logs" ] && echo "   ✓ logs directory exists" || echo "   ✗ logs directory missing"

# Check fonts
echo ""
echo "4. Checking Thai fonts..."
[ -f "/websites/vnn.mac.in.th/newspaper/fonts/Prompt-Bold.ttf" ] && echo "   ✓ Prompt-Bold.ttf exists" || echo "   ✗ Prompt-Bold.ttf missing"
[ -f "/websites/vnn.mac.in.th/newspaper/fonts/Sarabun-Regular.ttf" ] && echo "   ✓ Sarabun-Regular.ttf exists" || echo "   ✗ Sarabun-Regular.ttf missing"
[ -f "/websites/vnn.mac.in.th/newspaper/fonts/Sarabun-Bold.ttf" ] && echo "   ✓ Sarabun-Bold.ttf exists" || echo "   ✗ Sarabun-Bold.ttf missing"

# Check permissions
echo ""
echo "5. Checking permissions..."
if [ -w "/websites/vnn.mac.in.th/newspaper/generated_pdfs" ]; then
    echo "   ✓ generated_pdfs is writable"
else
    echo "   ✗ generated_pdfs is not writable"
    echo "   Run: sudo chmod 775 /websites/vnn.mac.in.th/newspaper/generated_pdfs"
fi

# Check database
echo ""
echo "6. Checking database tables..."
mysql -u root -pvnnsbiz2026 vnnsbiz -e "SELECT COUNT(*) as count FROM placard_issues" 2>/dev/null && echo "   ✓ placard_issues table exists" || echo "   ✗ placard_issues table missing. Run migration."

# Test Python script
echo ""
echo "7. Testing Python script..."
cd /websites/vnn.mac.in.th/newspaper/scripts
TEST_DATA='[{"id":999,"title":"Test Advertisement","companyname":"Test Company Ltd.","placard_date":"'$(date +%Y-%m-%d)'","meeting_number":"1/2026","meeting_agenda":"Test Meeting","ad_type":"template"}]'

PYTHON_BIN="/websites/vnn.mac.in.th/.venv/bin/python"
if [ -f "$PYTHON_BIN" ]; then
    $PYTHON_BIN generate_placard_pdf.py "$(date +%Y-%m-%d)" "$TEST_DATA" > /tmp/pdf_test_output.txt 2>&1
else
    ./generate_placard_pdf.py "$(date +%Y-%m-%d)" "$TEST_DATA" > /tmp/pdf_test_output.txt 2>&1
fi

if [ $? -eq 0 ]; then
    echo "   ✓ Python script executed successfully"
    cat /tmp/pdf_test_output.txt
else
    echo "   ✗ Python script failed"
    cat /tmp/pdf_test_output.txt
fi

# Check if PDF was created
TEST_PDF="/websites/vnn.mac.in.th/newspaper/generated_pdfs/placard_$(date +%Y-%m-%d).pdf"
if [ -f "$TEST_PDF" ]; then
    echo "   ✓ Test PDF created: $TEST_PDF"
    ls -lh "$TEST_PDF"
else
    echo "   ✗ Test PDF not created"
fi

echo ""
echo "==================================="
echo "Test Complete!"
echo "==================================="
echo ""
echo "If all checks passed, you can:"
echo "1. Access admin panel: https://vnn.mac.in.th/newspaper/admin/issues.php"
echo "2. Access public downloads: https://vnn.mac.in.th/newspaper/public/download.php"
echo ""
