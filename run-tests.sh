#!/bin/bash
# Quick Test Runner Script

echo "====================================="
echo "VNN Newsletter System - E2E Tests"
echo "====================================="
echo ""

# Check if Playwright is installed
if ! command -v npx &> /dev/null; then
    echo "❌ npx not found. Please install Node.js"
    exit 1
fi

# Function to run tests
run_test() {
    echo ""
    echo "▶️  Running: $1"
    echo "-------------------------------------"
    npx playwright test "$2" --reporter=list
    echo ""
}

# Menu
echo "Select test suite to run:"
echo ""
echo "1. All Tests (Full Suite)"
echo "2. Public Pages Only"
echo "3. Newsletter Viewer Only"
echo "4. User Flow Only"
echo "5. Admin Flow Only"
echo "6. Mobile Responsive Only"
echo "7. API & Integration Only"
echo "8. Quick Smoke Test (Critical Paths)"
echo "9. Run in UI Mode (Interactive)"
echo "0. Exit"
echo ""
read -p "Enter choice [0-9]: " choice

case $choice in
    1)
        echo ""
        echo "🚀 Running ALL tests..."
        npx playwright test --reporter=html
        echo ""
        echo "✅ Done! Opening report..."
        npx playwright show-report
        ;;
    2)
        run_test "Public Pages Tests" "tests/01-public-pages.spec.js"
        ;;
    3)
        run_test "Newsletter Viewer Tests" "tests/02-newsletter-viewer.spec.js"
        ;;
    4)
        run_test "User Flow Tests" "tests/03-user-flow.spec.js"
        ;;
    5)
        run_test "Admin Flow Tests" "tests/04-admin-flow.spec.js"
        ;;
    6)
        run_test "Mobile Responsive Tests" "tests/05-mobile-responsive.spec.js"
        ;;
    7)
        run_test "API & Integration Tests" "tests/06-api-integration.spec.js"
        ;;
    8)
        echo ""
        echo "🔥 Running Smoke Tests (Critical Paths)..."
        npx playwright test tests/01-public-pages.spec.js tests/02-newsletter-viewer.spec.js tests/06-api-integration.spec.js --reporter=list
        ;;
    9)
        echo ""
        echo "🎨 Opening UI Mode..."
        npx playwright test --ui
        ;;
    0)
        echo "Goodbye!"
        exit 0
        ;;
    *)
        echo "❌ Invalid choice"
        exit 1
        ;;
esac

echo ""
echo "====================================="
echo "Test run completed!"
echo "====================================="
