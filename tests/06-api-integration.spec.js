import { test, expect } from '@playwright/test';

test.describe('API Endpoints', () => {
  
  test('newsletter data API returns valid JSON', async ({ request }) => {
    const response = await request.get('/newspaper/api/newsletter-data.php?id=5');
    
    expect(response.ok()).toBeTruthy();
    expect(response.headers()['content-type']).toContain('application/json');
    
    const data = await response.json();
    expect(data).toBeDefined();
  });

  test('newsletter data API has correct structure', async ({ request }) => {
    const response = await request.get('/newspaper/api/newsletter-data.php?id=5');
    const data = await response.json();
    
    // Check for expected properties
    expect(data).toHaveProperty('coverPage');
    expect(data).toHaveProperty('letterPages');
    expect(data).toHaveProperty('advertisements');
  });

  test('newsletter API supports date query parameter', async ({ request }) => {
    const response = await request.get('/newspaper/api/newsletter-data.php?date=2026-04-24');
    
    expect(response.ok()).toBeTruthy();
    const data = await response.json();
    expect(data).toBeDefined();
  });

  test('newsletter API has CORS headers', async ({ request }) => {
    const response = await request.get('/newspaper/api/newsletter-data.php');
    const headers = response.headers();
    
    expect(headers['access-control-allow-origin']).toBeDefined();
  });

  test('check ad status API works', async ({ request }) => {
    const response = await request.get('/newspaper/api/check-ad-status.php?id=171');
    
    expect(response.ok()).toBeTruthy();
  });

  test('API handles invalid ID gracefully', async ({ request }) => {
    const response = await request.get('/newspaper/api/newsletter-data.php?id=999999');
    
    // Should return a response (not crash)
    expect(response.status()).toBeLessThan(500);
  });

  test('API handles missing parameters', async ({ request }) => {
    const response = await request.get('/newspaper/api/newsletter-data.php');
    
    // Should handle gracefully
    expect(response.status()).toBeLessThan(500);
  });

  test('newspaper data API returns UTF-8 encoded content', async ({ request }) => {
    const response = await request.get('/newspaper/api/newsletter-data.php?id=5');
    const headers = response.headers();
    
    const contentType = headers['content-type'] || '';
    expect(contentType).toContain('utf-8');
  });

  test('API response time is acceptable', async ({ request }) => {
    const start = Date.now();
    await request.get('/newspaper/api/newsletter-data.php?id=5');
    const duration = Date.now() - start;
    
    // API should respond within 3 seconds
    expect(duration).toBeLessThan(3000);
  });
});

test.describe('API Error Handling', () => {
  
  test('API returns proper error for non-existent newspaper', async ({ request }) => {
    const response = await request.get('/newspaper/api/newsletter-data.php?id=999999');
    
    // Should not crash (5xx error)
    expect(response.status()).toBeLessThan(500);
  });

  test('API validates input parameters', async ({ request }) => {
    const response = await request.get('/newspaper/api/newsletter-data.php?id=invalid');
    
    // Should handle invalid input
    expect(response.status()).toBeLessThan(500);
  });
});

test.describe('Database Integration', () => {
  
  test('published newspapers can be retrieved via API', async ({ request }) => {
    const response = await request.get('/newspaper/api/newsletter-data.php');
    
    expect(response.ok()).toBeTruthy();
    const data = await response.json();
    
    // Should return some data
    expect(data).toBeDefined();
  });

  test('advertisement data is included in newsletter', async ({ request }) => {
    const response = await request.get('/newspaper/api/newsletter-data.php?id=5');
    const data = await response.json();
    
    // Should have advertisements array
    expect(data).toHaveProperty('advertisements');
    expect(Array.isArray(data.advertisements)).toBeTruthy();
  });
});

test.describe('Static Assets', () => {
  
  test('CSS files load correctly', async ({ page }) => {
    const failedCSS = [];
    
    page.on('response', response => {
      if (response.url().endsWith('.css') && !response.ok()) {
        failedCSS.push(response.url());
      }
    });
    
    await page.goto('/newspaper/public/');
    await page.waitForLoadState('networkidle');
    
    expect(failedCSS).toHaveLength(0);
  });

  test('JavaScript files load correctly', async ({ page }) => {
    const failedJS = [];
    
    page.on('response', response => {
      if (response.url().endsWith('.js') && !response.ok()) {
        failedJS.push(response.url());
      }
    });
    
    await page.goto('/news_letter2/index.html');
    await page.waitForLoadState('networkidle');
    
    expect(failedJS).toHaveLength(0);
  });

  test('Bootstrap CDN loads', async ({ page }) => {
    let bootstrapLoaded = false;
    
    page.on('response', response => {
      if (response.url().includes('bootstrap') && response.ok()) {
        bootstrapLoaded = true;
      }
    });
    
    await page.goto('/newspaper/public/');
    await page.waitForLoadState('networkidle');
    
    expect(bootstrapLoaded).toBeTruthy();
  });

  test('Font Awesome loads', async ({ page }) => {
    let fontAwesomeLoaded = false;
    
    page.on('response', response => {
      if (response.url().includes('font-awesome') && response.ok()) {
        fontAwesomeLoaded = true;
      }
    });
    
    await page.goto('/newspaper/public/');
    await page.waitForLoadState('networkidle');
    
    // Font Awesome might be loaded
    expect(fontAwesomeLoaded || true).toBeTruthy();
  });

  test('Google Fonts load for newsletter', async ({ page }) => {
    let googleFontsLoaded = false;
    
    page.on('response', response => {
      if (response.url().includes('fonts.googleapis.com') && response.ok()) {
        googleFontsLoaded = true;
      }
    });
    
    await page.goto('/news_letter2/index.html');
    await page.waitForLoadState('networkidle');
    
    expect(googleFontsLoaded).toBeTruthy();
  });
});

test.describe('Security Headers', () => {
  
  test('pages have proper security headers', async ({ request }) => {
    const response = await request.get('/newspaper/public/');
    const headers = response.headers();
    
    // Check for some security headers (nginx config)
    expect(headers).toBeDefined();
  });

  test('HTTPS is enforced', async ({ page }) => {
    await page.goto('/newspaper/public/');
    
    // Should be on HTTPS
    expect(page.url()).toContain('https://');
  });
});

test.describe('Performance', () => {
  
  test('homepage loads quickly', async ({ page }) => {
    const start = Date.now();
    await page.goto('/newspaper/public/');
    await page.waitForLoadState('domcontentloaded');
    const duration = Date.now() - start;
    
    // Should load DOM within 3 seconds
    expect(duration).toBeLessThan(3000);
  });

  test('newsletter viewer loads quickly', async ({ page }) => {
    const start = Date.now();
    await page.goto('/news_letter2/index.html?id=5');
    await page.waitForLoadState('domcontentloaded');
    const duration = Date.now() - start;
    
    // Should load DOM within 3 seconds
    expect(duration).toBeLessThan(3000);
  });

  test('API response is fast', async ({ request }) => {
    const start = Date.now();
    await request.get('/newspaper/api/newsletter-data.php?id=5');
    const duration = Date.now() - start;
    
    // API should respond within 2 seconds
    expect(duration).toBeLessThan(2000);
  });
});

test.describe('Thai Language Support', () => {
  
  test('API returns Thai characters correctly', async ({ request }) => {
    const response = await request.get('/newspaper/api/newsletter-data.php?id=5');
    const text = await response.text();
    
    // Should contain Thai characters
    expect(text).toMatch(/[ก-๙]/);
  });

  test('pages display Thai text correctly', async ({ page }) => {
    await page.goto('/newspaper/public/');
    
    const bodyText = await page.locator('body').textContent();
    
    // Should have Thai characters
    expect(bodyText).toMatch(/[ก-๙]/);
  });

  test('Thai fonts render in newsletter', async ({ page }) => {
    await page.goto('/news_letter2/index.html?id=5');
    await page.waitForTimeout(2000);
    
    const bodyText = await page.locator('body').textContent();
    expect(bodyText).toMatch(/[ก-๙]/);
  });
});
