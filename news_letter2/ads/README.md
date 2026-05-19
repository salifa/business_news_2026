# PDF Advertisements Directory

This folder is for storing PDF advertisement files for your newsletter.

## Usage

1. **Place your PDF files here**
   - Example: `ads/sponsor-may-2026.pdf`
   - Example: `ads/cloudbooks-ad.pdf`

2. **Reference them in data.json**
   ```json
   {
     "pdfAdvertisements": [
       {
         "title": "Sponsor Advertisement",
         "url": "ads/sponsor-may-2026.pdf",
         "description": "Monthly sponsor ad"
       }
     ]
   }
   ```

3. **Or use external URLs**
   ```json
   {
     "pdfAdvertisements": [
       {
         "title": "Sponsor Advertisement",
         "url": "https://cdn.example.com/ads/sponsor.pdf",
         "description": "Hosted sponsor ad"
       }
     ]
   }
   ```

## Creating Test PDFs

### Option 1: Use the PDF Generator Tool
1. Open `create-ad-pdf.html` in your browser
2. Click "สร้าง PDF"
3. Save the PDF to this directory

### Option 2: Design Your Own
1. Create an 8.5" × 11" document in:
   - Microsoft Word
   - Google Docs
   - Canva
   - Adobe Illustrator/InDesign
2. Export as PDF
3. Save to this directory

### Option 3: Use Existing PDFs
- Copy any existing advertisement PDFs here
- Ensure they are A4 or US Letter size
- Portrait orientation works best

## File Naming Convention

Use descriptive names:
- ✅ `cloudbooks-may-2026.pdf`
- ✅ `taxpro-services-q2.pdf`
- ✅ `accounting-software-ad.pdf`
- ❌ `ad1.pdf`
- ❌ `test.pdf`

## File Size Guidelines

- **Recommended**: Under 2MB per PDF
- **Maximum**: 5MB per PDF
- **Optimization**: Compress images before creating PDF

## Testing

After adding a PDF:

1. Update `data.json` with the correct path
2. Reload `index.html` in your browser
3. Scroll to the end to see your advertisement
4. Test print/PDF export to verify it displays correctly

## Current Status

This directory currently contains placeholder information.

To get started:
1. Create a test PDF using `create-ad-pdf.html`
2. Save it here as `dummy-ad.pdf`
3. Update `data.json` to use `"url": "ads/dummy-ad.pdf"`

---

**Need Help?** See [PDF-ADVERTISEMENT-GUIDE.md](../PDF-ADVERTISEMENT-GUIDE.md) for detailed documentation.
