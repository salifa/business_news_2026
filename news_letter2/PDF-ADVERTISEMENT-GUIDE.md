# PDF Advertisement Integration Guide

## Overview

The newsletter now supports **full-page PDF advertisements** that display without headers or footers. These advertisements appear after the main content and are perfect for paid advertising space.

## Features

- ✅ **Full-page display** - PDFs take up the entire page (no headers/footers)
- ✅ **A4/Letter size compatible** - Automatically scales to fit 8.5" x 11" pages
- ✅ **Multi-page support** - Each page of the PDF becomes a separate newsletter page
- ✅ **Print-ready** - Maintains quality when exporting to PDF
- ✅ **Error handling** - Shows friendly error messages if PDFs fail to load

## How to Add PDF Advertisements

### 1. Via JSON Data (API Integration)

Add PDF advertisements to your `data.json` file:

```json
{
  "pdfAdvertisements": [
    {
      "title": "CloudBooks Accounting Software",
      "url": "https://example.com/ads/cloudbooks-ad.pdf",
      "description": "Full page advertisement for accounting software"
    },
    {
      "title": "Tax Planning Services",
      "url": "https://example.com/ads/tax-services.pdf",
      "description": "Advertisement for tax planning services"
    }
  ]
}
```

### 2. Via JavaScript Function

You can also add PDF advertisements programmatically:

```javascript
// Add a single PDF advertisement
const pdfAds = [
  {
    title: "My Advertisement",
    url: "path/to/your-ad.pdf",
    description: "Description of the advertisement"
  }
];

renderPDFAdvertisements(pdfAds);
```

## PDF Requirements

### File Specifications

- **Format**: PDF (any version)
- **Size**: A4 (210mm × 297mm) or US Letter (8.5" × 11")
- **Orientation**: Portrait recommended
- **Resolution**: 300 DPI for print quality
- **File Size**: Keep under 5MB for fast loading

### Design Guidelines

1. **Safe Area**: Keep important content at least 0.25" from edges
2. **Bleed**: If designing for professional printing, add 0.125" bleed
3. **Fonts**: Embed all fonts in the PDF
4. **Images**: Use high-resolution images (300 DPI minimum)
5. **Colors**: Use CMYK color mode for print, RGB for screen

## URL Options

### 1. External URLs (Recommended for Production)

```json
{
  "url": "https://cdn.example.com/advertisements/ad-2024-05.pdf"
}
```

**Pros:**
- Easy to update ads without changing code
- Can be managed via CMS/API
- Supports CDN caching

**Note:** Ensure CORS is enabled on your server:
```
Access-Control-Allow-Origin: *
```

### 2. Local Files (Development/Testing)

```json
{
  "url": "ads/my-advertisement.pdf"
}
```

**Pros:**
- No network dependency
- Faster loading during development

**Cons:**
- Must be deployed with the application
- Requires server for local testing

### 3. Base64 Encoded (Small Files Only)

```json
{
  "url": "data:application/pdf;base64,JVBERi0xLjQKJeLjz9..."
}
```

**Use only for very small PDFs (<100KB)**

## Testing with Dummy PDFs

### Option 1: Online Dummy PDF (Current Default)

The system uses a W3C test PDF by default:
```
https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf
```

### Option 2: Create Your Own Dummy PDF

1. **Using Microsoft Word/Google Docs:**
   - Create an 8.5" × 11" document
   - Add your advertisement design
   - Export as PDF

2. **Using Design Software (Canva/Adobe):**
   - Use the "US Letter" template
   - Design your advertisement
   - Download as PDF

3. **Save to project folder:**
   ```
   /news_letter2/ads/dummy-ad.pdf
   ```

4. **Update data.json:**
   ```json
   {
     "url": "ads/dummy-ad.pdf"
   }
   ```

## API Integration Example

### Backend API Response Format

```json
{
  "coverPage": { ... },
  "letterPages": [ ... ],
  "pdfAdvertisements": [
    {
      "title": "Premium Sponsor Ad",
      "url": "https://api.newsletter.com/ads/current-sponsor.pdf",
      "description": "Monthly premium sponsor advertisement"
    }
  ]
}
```

### PHP Example

```php
<?php
header('Content-Type: application/json');

$data = [
    'coverPage' => [...],
    'letterPages' => [...],
    'pdfAdvertisements' => [
        [
            'title' => 'Sponsor Advertisement',
            'url' => 'https://cdn.example.com/ads/' . date('Y-m') . '.pdf',
            'description' => 'Monthly sponsor ad'
        ]
    ]
];

echo json_encode($data, JSON_UNESCAPED_UNICODE);
?>
```

### Node.js/Express Example

```javascript
app.get('/api/newsletter-data', async (req, res) => {
    const data = {
        coverPage: {...},
        letterPages: [...],
        pdfAdvertisements: [
            {
                title: 'Sponsor Advertisement',
                url: `https://cdn.example.com/ads/${new Date().toISOString().slice(0, 7)}.pdf`,
                description: 'Monthly sponsor ad'
            }
        ]
    };
    
    res.json(data);
});
```

## Display Behavior

### On Screen
- PDF advertisements appear after all content pages
- Each PDF page becomes a separate newsletter page
- Pages have gray borders (same as content pages)
- Canvas scales to fit the page while maintaining aspect ratio

### In Print/PDF Export
- Full-page display without borders
- No headers or footers
- Maintains original PDF quality
- Each page prints separately

## Troubleshooting

### PDF Not Loading

**Error Message:** "⚠️ ไม่สามารถโหลดโฆษณา PDF"

**Solutions:**

1. **Check CORS:** Ensure the PDF server allows cross-origin requests
2. **Verify URL:** Make sure the PDF URL is accessible
3. **Check Console:** Open browser DevTools for detailed error messages
4. **Test PDF:** Try opening the PDF URL directly in browser

### PDF Appears Blank

**Possible Causes:**

1. PDF file is corrupted
2. PDF contains complex JavaScript
3. PDF uses unsupported features

**Solutions:**

- Re-export the PDF from source
- Flatten PDF layers
- Use PDF/A format for better compatibility

### Slow Loading

**Solutions:**

1. Optimize PDF file size (compress images)
2. Use a CDN for PDF hosting
3. Consider generating thumbnail previews
4. Implement lazy loading for multiple ads

## Best Practices

1. **Limit Number:** Maximum 2-3 PDF ads per newsletter
2. **Optimize Size:** Keep PDFs under 2MB each
3. **Cache Strategy:** Use proper HTTP caching headers
4. **Fallback Content:** Provide text/image fallback for failed PDFs
5. **Loading States:** Show loading indicators for large PDFs

## Example: Complete Newsletter with Ads

```json
{
  "coverPage": {
    "headline": "ปฏิรูปภาษี 2569",
    "subHeadline": "การเปลี่ยนแปลงสำคัญสำหรับนักบัญชี"
  },
  "letterPages": [
    {
      "companyName": "ทีมบรรณาธิการ",
      "content": {...}
    }
  ],
  "pdfAttachments": [
    {
      "title": "ตารางภาษีอ้างอิง",
      "url": "attachments/tax-tables.pdf"
    }
  ],
  "pdfAdvertisements": [
    {
      "title": "CloudBooks - ซอฟต์แวร์บัญชี",
      "url": "https://cdn.example.com/ads/cloudbooks-may-2026.pdf",
      "description": "โฆษณาซอฟต์แวร์บัญชีบนคลาวด์"
    },
    {
      "title": "Tax Pro Services",
      "url": "https://cdn.example.com/ads/taxpro-may-2026.pdf",
      "description": "โฆษณาบริการวางแผนภาษี"
    }
  ]
}
```

## Need Help?

If you encounter issues:

1. Check the browser console for errors
2. Verify PDF URL is accessible
3. Test with the default dummy PDF
4. Review CORS settings on your server
5. Check PDF file integrity

---

**Created:** May 2026  
**Version:** 1.0
