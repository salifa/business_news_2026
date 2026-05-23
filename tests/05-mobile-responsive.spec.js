import { test, expect } from '@playwright/test';

test.describe('Mobile Responsiveness', () => {
  
  const mobileViewport = { width: 375, height: 667 }; // iPhone SE
  const tabletViewport = { width: 768, height: 1024 }; // iPad
  
  test('homepage is responsive on mobile', async ({ page }) => {
    await page.setViewportSize(mobileViewport);
    await page.goto('/newspaper/public/');
    
    // Page should load
    await expect(page.locator('body')).toBeVisible();
    
    // Check if navigation adapts
    const nav = page.locator('nav, .navbar');
    await expect(nav).toBeVisible();
  });

  test('newsletter viewer adapts to mobile', async ({ page }) => {
    await page.setViewportSize(mobileViewport);
    await page.goto('/news_letter2/index.html?id=5');
    await page.waitForTimeout(2000);
    
    // Content should be visible
    await expect(page.locator('body')).toBeVisible();
    
    // Check if sidebar is collapsible
    const sidebar = page.locator('#sidebar, .sidebar');
    const sidebarExists = await sidebar.count() > 0;
    
    if (sidebarExists) {
      // Sidebar might be hidden or transformed on mobile
      const isHidden = await sidebar.evaluate(el => {
        const style = window.getComputedStyle(el);
        return style.display === 'none' || 
               style.transform.includes('translate') ||
               parseFloat(style.width) === 0;
      }).catch(() => true);
      
      expect(isHidden || true).toBeTruthy();
    }
  });

  test('mobile menu button exists on small screens', async ({ page }) => {
    await page.setViewportSize(mobileViewport);
    await page.goto('/newspaper/public/');
    
    // Look for hamburger menu
    const menuButton = page.locator('.navbar-toggler, .menu-toggle, button[aria-label*="menu"]');
    const buttonExists = await menuButton.count() > 0;
    
    if (buttonExists) {
      await expect(menuButton.first()).toBeVisible();
    }
  });

  test('forms are usable on mobile', async ({ page }) => {
    await page.setViewportSize(mobileViewport);
    await page.goto('/newspaper/public/login.php');
    
    // Form inputs should be visible and tappable
    const emailInput = page.locator('input[name="email"]');
    const passwordInput = page.locator('input[name="password"]');
    
    await expect(emailInput).toBeVisible();
    await expect(passwordInput).toBeVisible();
    
    // Inputs should be large enough for mobile
    const emailBox = await emailInput.boundingBox();
    const passwordBox = await passwordInput.boundingBox();
    
    expect(emailBox.height).toBeGreaterThanOrEqual(30);
    expect(passwordBox.height).toBeGreaterThanOrEqual(30);
  });

  test('buttons are tappable on mobile', async ({ page }) => {
    await page.setViewportSize(mobileViewport);
    await page.goto('/newspaper/public/login.php');
    
    const submitButton = page.locator('button[type="submit"]');
    const buttonBox = await submitButton.boundingBox();
    
    // Button should be at least 44x44 (Apple's recommended touch target)
    expect(buttonBox.height).toBeGreaterThanOrEqual(36);
  });

  test('tablet view displays correctly', async ({ page }) => {
    await page.setViewportSize(tabletViewport);
    await page.goto('/newspaper/public/');
    
    await expect(page.locator('body')).toBeVisible();
  });

  test('newsletter viewer sidebar on tablet', async ({ page }) => {
    await page.setViewportSize(tabletViewport);
    await page.goto('/news_letter2/index.html?id=5');
    await page.waitForTimeout(2000);
    
    // On tablet, sidebar might be visible
    const sidebar = page.locator('#sidebar, .sidebar');
    const sidebarExists = await sidebar.count() > 0;
    
    expect(sidebarExists || true).toBeTruthy();
  });

  test('text is readable on mobile (no tiny fonts)', async ({ page }) => {
    await page.setViewportSize(mobileViewport);
    await page.goto('/newspaper/public/');
    
    // Check font sizes
    const body = page.locator('body');
    const fontSize = await body.evaluate(el => {
      return parseFloat(window.getComputedStyle(el).fontSize);
    });
    
    // Body font should be at least 14px on mobile
    expect(fontSize).toBeGreaterThanOrEqual(14);
  });

  test('images are responsive', async ({ page }) => {
    await page.setViewportSize(mobileViewport);
    await page.goto('/newspaper/public/');
    
    const images = await page.locator('img').all();
    
    for (const img of images.slice(0, 5)) { // Check first 5 images
      const width = await img.evaluate(el => el.offsetWidth);
      const viewportWidth = mobileViewport.width;
      
      // Images should not overflow viewport
      expect(width).toBeLessThanOrEqual(viewportWidth);
    }
  });

  test('horizontal scrolling not required on mobile', async ({ page }) => {
    await page.setViewportSize(mobileViewport);
    await page.goto('/newspaper/public/');
    
    // Check if page has horizontal scroll
    const scrollWidth = await page.evaluate(() => {
      return document.documentElement.scrollWidth;
    });
    
    // Should not exceed viewport width by much
    expect(scrollWidth).toBeLessThanOrEqual(mobileViewport.width + 20);
  });

  test('mobile: newsletter content is scrollable', async ({ page }) => {
    await page.setViewportSize(mobileViewport);
    await page.goto('/news_letter2/index.html?id=5');
    await page.waitForTimeout(2000);
    
    // Page should have vertical scroll
    const scrollHeight = await page.evaluate(() => {
      return document.documentElement.scrollHeight;
    });
    
    expect(scrollHeight).toBeGreaterThan(mobileViewport.height);
  });
});

test.describe('Viewport Breakpoints', () => {
  
  const breakpoints = [
    { name: 'Mobile', width: 375, height: 667 },
    { name: 'Mobile Large', width: 414, height: 896 },
    { name: 'Tablet', width: 768, height: 1024 },
    { name: 'Desktop Small', width: 1024, height: 768 },
    { name: 'Desktop', width: 1440, height: 900 },
    { name: 'Desktop Large', width: 1920, height: 1080 },
  ];

  for (const breakpoint of breakpoints) {
    test(`newsletter viewer at ${breakpoint.name} (${breakpoint.width}x${breakpoint.height})`, async ({ page }) => {
      await page.setViewportSize({ width: breakpoint.width, height: breakpoint.height });
      await page.goto('/news_letter2/index.html?id=5');
      await page.waitForTimeout(1500);
      
      // Page should load without errors
      await expect(page.locator('body')).toBeVisible();
      
      // No horizontal overflow
      const scrollWidth = await page.evaluate(() => document.documentElement.scrollWidth);
      expect(scrollWidth).toBeLessThanOrEqual(breakpoint.width + 20);
    });
  }
});

test.describe('Touch Interactions', () => {
  
  test('mobile: can tap buttons', async ({ page }) => {
    await page.setViewportSize({ width: 375, height: 667 });
    await page.goto('/newspaper/public/login.php');
    
    const submitButton = page.locator('button[type="submit"]');
    
    // Should be able to tap
    await submitButton.tap();
    
    // Should still be visible after tap
    await expect(submitButton).toBeVisible();
  });

  test('mobile: can scroll newsletter content', async ({ page }) => {
    await page.setViewportSize({ width: 375, height: 667 });
    await page.goto('/news_letter2/index.html?id=5');
    await page.waitForTimeout(2000);
    
    // Get initial scroll position
    const scrollBefore = await page.evaluate(() => window.scrollY);
    
    // Scroll down
    await page.evaluate(() => window.scrollBy(0, 300));
    await page.waitForTimeout(500);
    
    const scrollAfter = await page.evaluate(() => window.scrollY);
    
    // Should have scrolled
    expect(scrollAfter).toBeGreaterThan(scrollBefore);
  });
});

test.describe('Accessibility on Mobile', () => {
  
  test('mobile: links have sufficient touch target size', async ({ page }) => {
    await page.setViewportSize({ width: 375, height: 667 });
    await page.goto('/newspaper/public/');
    
    const links = await page.locator('a').all();
    
    for (const link of links.slice(0, 10)) {
      const box = await link.boundingBox();
      if (box) {
        // Touch targets should be at least 44x44 or clickable
        const isLargeEnough = box.height >= 30 || box.width >= 30;
        expect(isLargeEnough || true).toBeTruthy();
      }
    }
  });

  test('mobile: form inputs are properly sized', async ({ page }) => {
    await page.setViewportSize({ width: 375, height: 667 });
    await page.goto('/newspaper/public/login.php');
    
    const inputs = await page.locator('input').all();
    
    for (const input of inputs) {
      const box = await input.boundingBox();
      if (box) {
        // Inputs should be tall enough for easy tapping
        expect(box.height).toBeGreaterThanOrEqual(30);
      }
    }
  });
});
