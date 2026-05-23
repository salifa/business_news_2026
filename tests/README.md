# Playwright E2E Test Suite

## Overview
Comprehensive end-to-end tests for the VNN Business Newsletter System.

## Test Coverage

### 1. Public Pages (01-public-pages.spec.js)
- ✅ Homepage loading
- ✅ Public index page
- ✅ Download page
- ✅ Login/Register pages
- ✅ Newspapers listing
- ✅ Character encoding (Thai language)
- ✅ Navigation links
- ✅ Static resource loading
- ✅ Load time performance

### 2. Newsletter Viewer (02-newsletter-viewer.spec.js)
- ✅ Main viewer page loading
- ✅ Newsletter with specific ID
- ✅ API data fetching
- ✅ PDF.js library integration
- ✅ Sidebar menu functionality
- ✅ Print/Export buttons
- ✅ Thai font rendering
- ✅ Error handling
- ✅ Query parameters (id, date)
- ✅ Mobile responsiveness
- ✅ External CDN resources
- ✅ CORS headers
- ✅ PDF advertisements
- ✅ Cover and letter pages

### 3. User Flow (03-user-flow.spec.js)
- ✅ Login validation
- ✅ My advertisements page
- ✅ User profile
- ✅ Buy credits page
- ✅ Transactions page
- ✅ Advertisement submission
- ✅ Published ad newsletter links
- ✅ Sidebar navigation
- ✅ Logout functionality
- ✅ JavaScript error checking
- ✅ Thai encoding
- ✅ Status displays (pending/approved/published)
- ✅ Ad cards rendering
- ✅ Credit system UI

### 4. Admin Flow (04-admin-flow.spec.js)
- ✅ Admin dashboard
- ✅ Manage advertisements
- ✅ Manage users
- ✅ Approve payments
- ✅ Generate newspaper
- ✅ Manage newsletter
- ✅ Issues management
- ✅ Admin bypass (dev mode)
- ✅ JavaScript error checking
- ✅ Character encoding
- ✅ Navigation and sidebar
- ✅ Statistics display
- ✅ Filters and search
- ✅ Action buttons

### 5. Mobile Responsive (05-mobile-responsive.spec.js)
- ✅ Mobile viewport (375x667)
- ✅ Tablet viewport (768x1024)
- ✅ Newsletter viewer responsiveness
- ✅ Mobile menu button
- ✅ Form usability on mobile
- ✅ Touch target sizes
- ✅ Text readability
- ✅ Image responsiveness
- ✅ No horizontal scrolling
- ✅ Multiple breakpoints testing
- ✅ Touch interactions
- ✅ Accessibility on mobile

### 6. API & Integration (06-api-integration.spec.js)
- ✅ Newsletter data API
- ✅ API JSON structure
- ✅ Query parameters (id, date)
- ✅ CORS headers
- ✅ Ad status API
- ✅ Error handling
- ✅ UTF-8 encoding
- ✅ Response times
- ✅ Database integration
- ✅ Static asset loading (CSS, JS)
- ✅ Bootstrap CDN
- ✅ Font Awesome
- ✅ Google Fonts
- ✅ Security headers
- ✅ HTTPS enforcement
- ✅ Performance metrics
- ✅ Thai language support

## Running Tests

### Run All Tests
```bash
npx playwright test
```

### Run Specific Test File
```bash
npx playwright test 01-public-pages.spec.js
npx playwright test 02-newsletter-viewer.spec.js
npx playwright test 03-user-flow.spec.js
npx playwright test 04-admin-flow.spec.js
npx playwright test 05-mobile-responsive.spec.js
npx playwright test 06-api-integration.spec.js
```

### Run Tests in UI Mode (Interactive)
```bash
npx playwright test --ui
```

### Run Tests with Browser Visible
```bash
npx playwright test --headed
```

### Run Tests in Specific Browser
```bash
npx playwright test --project=chromium
npx playwright test --project=firefox
npx playwright test --project=webkit
```

### Run Tests in Debug Mode
```bash
npx playwright test --debug
```

### Generate HTML Report
```bash
npx playwright test --reporter=html
npx playwright show-report
```

### Run Tests in Parallel
```bash
npx playwright test --workers=4
```

### Run Only Failed Tests
```bash
npx playwright test --last-failed
```

## NPM Scripts

Add these to your package.json:

```json
{
  "scripts": {
    "test": "playwright test",
    "test:ui": "playwright test --ui",
    "test:headed": "playwright test --headed",
    "test:public": "playwright test 01-public-pages.spec.js",
    "test:newsletter": "playwright test 02-newsletter-viewer.spec.js",
    "test:user": "playwright test 03-user-flow.spec.js",
    "test:admin": "playwright test 04-admin-flow.spec.js",
    "test:mobile": "playwright test 05-mobile-responsive.spec.js",
    "test:api": "playwright test 06-api-integration.spec.js",
    "test:report": "playwright show-report"
  }
}
```

Then run:
```bash
npm test
npm run test:ui
npm run test:mobile
```

## Test Results

### Viewing Reports
After running tests, view the HTML report:
```bash
npx playwright show-report
```

### Screenshots & Videos
- Screenshots on failure: `test-results/` folder
- Videos on failure: `test-results/` folder
- Traces: Available in HTML report

## CI/CD Integration

### GitHub Actions Example
```yaml
name: Playwright Tests
on: [push, pull_request]
jobs:
  test:
    runs-on: ubuntu-latest
    steps:
      - uses: actions/checkout@v3
      - uses: actions/setup-node@v3
      - name: Install dependencies
        run: npm ci
      - name: Install Playwright Browsers
        run: npx playwright install --with-deps
      - name: Run Playwright tests
        run: npx playwright test
      - uses: actions/upload-artifact@v3
        if: always()
        with:
          name: playwright-report
          path: playwright-report/
```

## Configuration

Edit `playwright.config.js` to customize:
- Base URL
- Timeout settings
- Retries
- Screenshot/video settings
- Browser configurations

## Test Strategy

### What Gets Tested
1. **UI Rendering** - All pages load without errors
2. **JavaScript Errors** - No console errors
3. **API Integration** - Endpoints return valid data
4. **Mobile Responsiveness** - Works on all screen sizes
5. **Thai Language** - Proper UTF-8 encoding
6. **Performance** - Load times under 3-5 seconds
7. **Security** - HTTPS, CORS headers
8. **User Flows** - Complete workflows work
9. **Admin Functions** - All admin pages accessible
10. **Newsletter System** - Viewer works correctly

### What's NOT Tested
- Database operations (use PHPUnit for this)
- Unit testing (use PHPUnit for PHP classes)
- Authentication flows (requires valid credentials)
- Payment processing (requires test payment gateway)

## Troubleshooting

### Tests Fail Due to Timeout
Increase timeout in `playwright.config.js`:
```javascript
timeout: 60000, // 60 seconds
```

### Tests Fail on Login Pages
These tests check if pages redirect to login (no credentials needed).
For authenticated tests, you'll need to add login credentials.

### Screenshots Not Captured
Check `playwright.config.js` has:
```javascript
use: {
  screenshot: 'only-on-failure',
  video: 'retain-on-failure',
}
```

### Slow Test Execution
Run fewer workers:
```bash
npx playwright test --workers=1
```

## Best Practices

1. **Keep Tests Independent** - Each test should work alone
2. **Use Waits Properly** - Wait for network idle, not arbitrary timeouts
3. **Check Real Errors** - Filter out favicon 404s
4. **Mobile First** - Test responsive design early
5. **API Tests** - Test APIs separately from UI
6. **Clear Test Names** - Describe what's being tested

## Adding New Tests

Create a new `.spec.js` file in `tests/` folder:

```javascript
import { test, expect } from '@playwright/test';

test.describe('My New Feature', () => {
  test('feature works correctly', async ({ page }) => {
    await page.goto('/my-feature');
    await expect(page.locator('.result')).toBeVisible();
  });
});
```

## Support

For Playwright documentation:
- https://playwright.dev/docs/intro
- https://playwright.dev/docs/api/class-test

For project-specific questions:
- Check test files for examples
- Review `playwright.config.js` configuration
