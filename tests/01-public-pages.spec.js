import { test, expect } from '@playwright/test';

test.describe('Public Pages - No Errors', () => {
  
  test('homepage loads without errors', async ({ page }) => {
    const consoleErrors = [];
    page.on('console', msg => {
      if (msg.type() === 'error') consoleErrors.push(msg.text());
    });
    
    await page.goto('/newspaper/');
    
    // Check page title
    await expect(page).toHaveTitle(/หนังสือพิมพ์/);
    
    // Verify main elements exist
    await expect(page.locator('body')).toBeVisible();
    
    // Check no console errors
    expect(consoleErrors).toHaveLength(0);
  });

  test('public index page displays correctly', async ({ page }) => {
    await page.goto('/newspaper/public/');
    
    // Check navigation elements
    await expect(page.locator('nav, .navbar')).toBeVisible();
    
    // Verify no JavaScript errors
    const errors = [];
    page.on('pageerror', error => errors.push(error.message));
    
    await page.waitForLoadState('networkidle');
    expect(errors).toHaveLength(0);
  });

  test('download page loads', async ({ page }) => {
    await page.goto('/newspaper/public/download.php');
    
    // Should redirect to newsletter viewer or show newspapers
    await expect(page.locator('body')).toBeVisible();
    
    // Check for main heading (use first() to handle multiple matches)
    const heading = page.locator('h1, .header-section').first();
    await expect(heading).toBeVisible();
  });

  test('login page displays correctly', async ({ page }) => {
    await page.goto('/newspaper/public/login.php');
    
    // Verify login form exists
    await expect(page.locator('input[name="email"]')).toBeVisible();
    await expect(page.locator('input[name="password"]')).toBeVisible();
    await expect(page.locator('button[type="submit"]')).toBeVisible();
    
    // Check for register link
    await expect(page.locator('a[href*="register"]')).toBeVisible();
  });

  test('register page displays correctly', async ({ page }) => {
    await page.goto('/newspaper/public/register.php');
    
    // Verify registration form fields
    await expect(page.locator('input[name="fullname"]')).toBeVisible();
    await expect(page.locator('input[name="email"]')).toBeVisible();
    await expect(page.locator('input[name="password"]')).toBeVisible();
    
    // Check submit button
    await expect(page.locator('button[type="submit"]')).toBeVisible();
  });

  test('newspapers listing page works', async ({ page }) => {
    await page.goto('/newspaper/public/newspapers/');
    
    // Check page loads
    await expect(page.locator('body')).toBeVisible();
    
    // Look for newspaper cards or listings
    const hasContent = await page.locator('.newspaper-card, .card, table, .list-group').count() > 0;
    expect(hasContent).toBeTruthy();
  });

  test('all pages have proper charset and no encoding issues', async ({ page }) => {
    const pages = [
      '/newspaper/',
      '/newspaper/public/',
      '/newspaper/public/login.php',
    ];
    
    for (const url of pages) {
      await page.goto(url);
      
      // Check for UTF-8 meta tag
      const metaCharset = await page.locator('meta[charset]').first();
      const hasCharset = await metaCharset.count() > 0;
      expect(hasCharset).toBeTruthy();
      
      // Verify Thai text appears (not garbled)
      const thaiText = await page.locator('body').textContent();
      expect(thaiText).toMatch(/[ก-๙]/); // Contains Thai characters
    }
  });

  test('pages load within acceptable time', async ({ page }) => {
    const startTime = Date.now();
    await page.goto('/newspaper/public/');
    const loadTime = Date.now() - startTime;
    
    // Should load within 5 seconds
    expect(loadTime).toBeLessThan(5000);
  });

  test('navigation links are not broken', async ({ page }) => {
    await page.goto('/newspaper/public/');
    
    // Get all navigation links
    const links = await page.locator('nav a, .navbar a').all();
    
    for (const link of links) {
      const href = await link.getAttribute('href');
      if (href && !href.startsWith('#') && !href.startsWith('javascript:')) {
        const isVisible = await link.isVisible();
        expect(isVisible).toBeTruthy();
      }
    }
  });

  test('no 404 errors on static resources', async ({ page }) => {
    const failed = [];
    
    page.on('response', response => {
      if (response.status() === 404) {
        failed.push(response.url());
      }
    });
    
    await page.goto('/newspaper/public/');
    await page.waitForLoadState('networkidle');
    
    // Filter out expected 404s (favicon, etc.)
    const realErrors = failed.filter(url => 
      !url.includes('favicon') && 
      !url.includes('apple-touch-icon')
    );
    
    expect(realErrors).toHaveLength(0);
  });
});
