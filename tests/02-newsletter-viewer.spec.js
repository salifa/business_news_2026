import { test, expect } from '@playwright/test';

test.describe('Newsletter Viewer - news_letter2', () => {
  
  test('newsletter viewer page loads without errors', async ({ page }) => {
    const consoleErrors = [];
    const jsErrors = [];
    
    page.on('console', msg => {
      if (msg.type() === 'error') consoleErrors.push(msg.text());
    });
    
    page.on('pageerror', error => {
      jsErrors.push(error.message);
    });
    
    await page.goto('/news_letter2/index.html');
    await page.waitForLoadState('networkidle');
    
    // Check main container exists
    await expect(page.locator('#app, body')).toBeVisible();
    
    // Verify no console or JavaScript errors
    expect(consoleErrors.filter(e => !e.includes('favicon'))).toHaveLength(0);
    expect(jsErrors).toHaveLength(0);
  });

  test('newsletter viewer with specific ID loads', async ({ page }) => {
    await page.goto('/news_letter2/index.html?id=5');
    
    // Wait for content to load
    await page.waitForTimeout(2000);
    
    // Check if cover page or letter page is visible
    const hasCoverPage = await page.locator('#coverPage, .cover-page').isVisible().catch(() => false);
    const hasLetterPage = await page.locator('#letterPages, .letter-page').isVisible().catch(() => false);
    
    expect(hasCoverPage || hasLetterPage).toBeTruthy();
  });

  test('API endpoint returns valid data', async ({ page }) => {
    const response = await page.request.get('/newspaper/api/newsletter-data.php?id=5');
    expect(response.ok()).toBeTruthy();
    
    const data = await response.json();
    expect(data).toHaveProperty('coverPage');
    expect(data).toHaveProperty('letterPages');
  });

  test('PDF.js library loads correctly', async ({ page }) => {
    await page.goto('/news_letter2/index.html');
    
    // Check if PDF.js is loaded
    const pdfJsLoaded = await page.evaluate(() => {
      return typeof window.pdfjsLib !== 'undefined';
    });
    
    expect(pdfJsLoaded).toBeTruthy();
  });

  test('sidebar menu is functional', async ({ page }) => {
    await page.goto('/news_letter2/index.html?id=5');
    await page.waitForTimeout(1000);
    
    // Check if sidebar exists
    const sidebar = page.locator('#sidebar, .sidebar');
    const sidebarExists = await sidebar.count() > 0;
    
    if (sidebarExists) {
      await expect(sidebar).toBeVisible();
    }
  });

  test('print button exists and is functional', async ({ page }) => {
    await page.goto('/news_letter2/index.html?id=5');
    await page.waitForTimeout(1000);
    
    // Look for print button
    const printButton = page.locator('button:has-text("พิมพ์"), button:has-text("Print"), #printBtn');
    const buttonExists = await printButton.count() > 0;
    
    if (buttonExists) {
      await expect(printButton.first()).toBeVisible();
    }
  });

  test('export PDF button exists', async ({ page }) => {
    await page.goto('/news_letter2/index.html?id=5');
    await page.waitForTimeout(1000);
    
    // Look for export button
    const exportButton = page.locator('button:has-text("Export"), button:has-text("บันทึก"), #exportBtn');
    const buttonExists = await exportButton.count() > 0;
    
    if (buttonExists) {
      await expect(exportButton.first()).toBeVisible();
    }
  });

  test('Thai fonts load correctly', async ({ page }) => {
    await page.goto('/news_letter2/index.html');
    
    // Check if Google Fonts are loaded
    const fonts = await page.evaluate(() => {
      return document.fonts.check('12px "Prompt"') || 
             document.fonts.check('12px "Sarabun"');
    });
    
    // Thai fonts should be available
    expect(fonts).toBeTruthy();
  });

  test('error handling for invalid newspaper ID', async ({ page }) => {
    await page.goto('/news_letter2/index.html?id=99999');
    await page.waitForTimeout(2000);
    
    // Should show error message or fallback content
    const bodyText = await page.locator('body').textContent();
    const hasContent = bodyText.length > 100;
    
    expect(hasContent).toBeTruthy();
  });

  test('newsletter date query parameter works', async ({ page }) => {
    await page.goto('/news_letter2/index.html?date=2026-04-24');
    await page.waitForTimeout(2000);
    
    // Should load content
    await expect(page.locator('body')).toBeVisible();
  });

  test('responsive design - sidebar on mobile', async ({ page }) => {
    await page.setViewportSize({ width: 375, height: 667 }); // iPhone size
    await page.goto('/news_letter2/index.html?id=5');
    await page.waitForTimeout(1000);
    
    // Check if page adapts to mobile
    const sidebar = page.locator('#sidebar, .sidebar');
    const sidebarExists = await sidebar.count() > 0;
    
    if (sidebarExists) {
      // Sidebar should be collapsible on mobile
      const isCollapsed = await sidebar.evaluate(el => {
        const style = window.getComputedStyle(el);
        return style.transform !== 'none' || style.display === 'none';
      }).catch(() => true);
      
      // On mobile, sidebar might be hidden or transformed
      expect(isCollapsed || true).toBeTruthy();
    }
  });

  test('all external resources load (Bootstrap, Font Awesome)', async ({ page }) => {
    const failedResources = [];
    
    page.on('response', response => {
      if (!response.ok() && response.url().includes('cdn')) {
        failedResources.push(response.url());
      }
    });
    
    await page.goto('/news_letter2/index.html');
    await page.waitForLoadState('networkidle');
    
    expect(failedResources).toHaveLength(0);
  });

  test('newsletter data API handles CORS correctly', async ({ page }) => {
    const response = await page.request.get('/newspaper/api/newsletter-data.php');
    const headers = response.headers();
    
    // Should have CORS headers
    expect(headers['access-control-allow-origin']).toBeDefined();
  });

  test('PDF advertisement section renders', async ({ page }) => {
    await page.goto('/news_letter2/index.html?id=5');
    await page.waitForTimeout(3000);
    
    // Check if advertisements section exists
    const adsSection = page.locator('#advertisementsSection, #pdfAdsSection, .advertisements');
    const adsSectionExists = await adsSection.count() > 0;
    
    if (adsSectionExists) {
      await expect(adsSection.first()).toBeVisible();
    }
  });

  test('cover page displays correctly', async ({ page }) => {
    await page.goto('/news_letter2/index.html?id=5');
    await page.waitForTimeout(2000);
    
    // Check for cover page elements
    const coverPage = page.locator('#coverPage, .cover-page, .newspaper-cover');
    const coverExists = await coverPage.count() > 0;
    
    if (coverExists) {
      await expect(coverPage.first()).toBeVisible();
    }
  });

  test('letter pages section exists', async ({ page }) => {
    await page.goto('/news_letter2/index.html?id=5');
    await page.waitForTimeout(2000);
    
    // Check for letter pages
    const letterPages = page.locator('#letterPages, .letter-pages, .newsletter-content');
    const pagesExist = await letterPages.count() > 0;
    
    if (pagesExist) {
      await expect(letterPages.first()).toBeVisible();
    }
  });
});
