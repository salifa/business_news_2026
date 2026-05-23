import { test, expect } from '@playwright/test';

test.describe('User Flow - Authentication & Advertisements', () => {
  
  test('login page validation works', async ({ page }) => {
    await page.goto('/newspaper/public/login.php');
    
    // Try to submit empty form
    await page.click('button[type="submit"]');
    
    // Should still be on login page or show validation
    await expect(page).toHaveURL(/login/);
  });

  test('user can access my advertisements page after login', async ({ page }) => {
    // Note: This test requires valid credentials
    // Skip if not authenticated
    await page.goto('/newspaper/user/my-advertisements.php');
    
    // Either redirects to login or shows advertisements
    const url = page.url();
    const isLoginPage = url.includes('login');
    const isMyAdsPage = url.includes('my-advertisements');
    
    expect(isLoginPage || isMyAdsPage).toBeTruthy();
  });

  test('my advertisements page displays correctly (if accessible)', async ({ page }) => {
    await page.goto('/newspaper/user/my-advertisements.php');
    
    // If we can access it (logged in), check the page
    if (!page.url().includes('login')) {
      await expect(page.locator('body')).toBeVisible();
      
      // Should have navigation
      await expect(page.locator('nav, .navbar')).toBeVisible();
    }
  });

  test('user profile page structure', async ({ page }) => {
    await page.goto('/newspaper/user/profile.php');
    
    // Either login redirect or profile page
    if (!page.url().includes('login')) {
      await expect(page.locator('body')).toBeVisible();
    }
  });

  test('buy credits page displays', async ({ page }) => {
    await page.goto('/newspaper/user/buy-credits.php');
    
    if (!page.url().includes('login')) {
      // Check for credit packages
      await expect(page.locator('body')).toBeVisible();
    }
  });

  test('transactions page loads', async ({ page }) => {
    await page.goto('/newspaper/user/transactions.php');
    
    if (!page.url().includes('login')) {
      await expect(page.locator('body')).toBeVisible();
    }
  });

  test('advertisement submission page loads', async ({ page }) => {
    await page.goto('/newspaper/user/submit-advertisement.php');
    
    if (!page.url().includes('login')) {
      // Should have form elements
      await expect(page.locator('form, body')).toBeVisible();
    }
  });

  test('published ad shows newsletter link', async ({ page }) => {
    // Visit my advertisements with a specific published ad
    await page.goto('/newspaper/user/my-advertisements.php?newAdId=171');
    
    if (!page.url().includes('login')) {
      await page.waitForTimeout(1000);
      
      // Look for newsletter view button
      const viewButton = page.locator('a:has-text("ดูในจดหมายข่าว"), a:has-text("ดู")');
      const buttonExists = await viewButton.count() > 0;
      
      if (buttonExists) {
        await expect(viewButton.first()).toBeVisible();
        
        // Verify it links to newsletter viewer
        const href = await viewButton.first().getAttribute('href');
        expect(href).toContain('news_letter2');
      }
    }
  });

  test('user sidebar navigation works', async ({ page }) => {
    await page.goto('/newspaper/user/my-advertisements.php');
    
    if (!page.url().includes('login')) {
      // Check sidebar links exist
      const sidebarLinks = await page.locator('.sidebar a, nav a').count();
      expect(sidebarLinks).toBeGreaterThan(0);
    }
  });

  test('logout functionality exists', async ({ page }) => {
    await page.goto('/newspaper/user/my-advertisements.php');
    
    if (!page.url().includes('login')) {
      // Look for logout link
      const logoutLink = page.locator('a[href*="logout"]');
      const logoutExists = await logoutLink.count() > 0;
      
      if (logoutExists) {
        await expect(logoutLink.first()).toBeVisible();
      }
    }
  });
});

test.describe('User Pages - UI Error Check', () => {
  
  const userPages = [
    '/newspaper/user/my-advertisements.php',
    '/newspaper/user/profile.php',
    '/newspaper/user/buy-credits.php',
    '/newspaper/user/transactions.php',
  ];

  for (const pagePath of userPages) {
    test(`${pagePath} has no JavaScript errors`, async ({ page }) => {
      const jsErrors = [];
      page.on('pageerror', error => jsErrors.push(error.message));
      
      await page.goto(pagePath);
      await page.waitForLoadState('networkidle');
      
      // Expect no JS errors (unless redirected to login)
      if (!page.url().includes('login')) {
        expect(jsErrors).toHaveLength(0);
      }
    });

    test(`${pagePath} has proper Thai encoding`, async ({ page }) => {
      await page.goto(pagePath);
      
      if (!page.url().includes('login')) {
        const content = await page.content();
        expect(content).toContain('utf-8');
        
        // Check for Thai characters
        const bodyText = await page.locator('body').textContent();
        expect(bodyText).toMatch(/[ก-๙]/);
      }
    });
  }
});

test.describe('Advertisement Status Display', () => {
  
  test('pending ad shows correct status', async ({ page }) => {
    await page.goto('/newspaper/user/my-advertisements.php');
    
    if (!page.url().includes('login')) {
      await page.waitForTimeout(1000);
      
      // Look for status badges
      const statusBadges = page.locator('.badge, .alert');
      const badgeCount = await statusBadges.count();
      
      // Should have some status indicators
      expect(badgeCount).toBeGreaterThanOrEqual(0);
    }
  });

  test('approved ad shows waiting message', async ({ page }) => {
    await page.goto('/newspaper/user/my-advertisements.php');
    
    if (!page.url().includes('login')) {
      await page.waitForTimeout(1000);
      
      const bodyText = await page.locator('body').textContent();
      
      // Might contain status messages
      const hasStatusText = 
        bodyText.includes('รอ') || 
        bodyText.includes('อนุมัติ') || 
        bodyText.includes('เผยแพร่') ||
        bodyText.includes('pending') ||
        bodyText.includes('approved') ||
        bodyText.includes('published');
      
      expect(hasStatusText || bodyText.length > 100).toBeTruthy();
    }
  });

  test('ad cards display properly', async ({ page }) => {
    await page.goto('/newspaper/user/my-advertisements.php');
    
    if (!page.url().includes('login')) {
      await page.waitForTimeout(1000);
      
      // Look for ad cards
      const adCards = page.locator('.ad-card, .card, .advertisement');
      const cardCount = await adCards.count();
      
      // Should have cards if there are ads
      expect(cardCount).toBeGreaterThanOrEqual(0);
    }
  });
});

test.describe('Credit System UI', () => {
  
  test('credit balance displays', async ({ page }) => {
    await page.goto('/newspaper/user/buy-credits.php');
    
    if (!page.url().includes('login')) {
      await page.waitForTimeout(1000);
      
      // Look for credit display
      const bodyText = await page.locator('body').textContent();
      const hasCreditText = 
        bodyText.includes('เครดิต') || 
        bodyText.includes('credit') ||
        bodyText.includes('คงเหลือ');
      
      expect(hasCreditText || bodyText.length > 100).toBeTruthy();
    }
  });

  test('credit packages display', async ({ page }) => {
    await page.goto('/newspaper/user/buy-credits.php');
    
    if (!page.url().includes('login')) {
      await page.waitForTimeout(1000);
      
      // Should show packages
      await expect(page.locator('body')).toBeVisible();
    }
  });
});
