# Image Guidelines for Newsletter

## Quick Reference

### Required Images
1. **Cover Image**: 800×400 pixels (2:1 ratio)
2. **Highlight Cards** (3 images): 300×150 pixels each (2:1 ratio)
3. **Company Logo** (optional): 200×80 pixels

### Image Specifications
- **Format**: JPG or PNG
- **File Size**: Keep under 500KB per image
- **Quality**: 72 DPI for web, 300 DPI for high-quality print
- **Color Space**: RGB for screen, CMYK for professional printing

## Where to Get Images

### Free Stock Photo Sources
1. **Unsplash** - https://unsplash.com
   - Search for: accounting, business, finance, office, data
   - High-quality, free for commercial use

2. **Pexels** - https://pexels.com
   - Similar to Unsplash with great business images

3. **Pixabay** - https://pixabay.com
   - Wide variety of business and finance images

4. **Freepik** - https://freepik.com
   - Vector graphics and photos (check license)

### Creating Custom Images

#### Option 1: Using Online Tools (No Software Required)

**Canva** (https://canva.com)
1. Create account (free)
2. Select "Custom Size"
3. For cover: 800 × 400 pixels
4. For highlights: 300 × 150 pixels
5. Design your image with templates, text, icons
6. Download as JPG or PNG

**Adobe Express** (https://adobe.com/express)
- Similar to Canva
- Professional templates for business content

#### Option 2: Using Graphic Software

**GIMP** (Free, Open Source)
- Download: https://gimp.org
- Create New Image → Set dimensions
- Design and export

**Adobe Photoshop** (Professional)
- File → New → Set dimensions
- Create design
- Save for Web (JPG quality 80-90)

#### Option 3: Using Placeholder Services (For Testing)

Current placeholders in data.json use this format:
```
https://via.placeholder.com/WIDTH×HEIGHT/BGCOLOR/TEXTCOLOR?text=Your+Text
```

Examples:
```
Cover Image (800×400):
https://via.placeholder.com/800x400/1a472a/ffffff?text=Your+Headline

Highlight (300×150):
https://via.placeholder.com/300x150/2c5f2d/ffffff?text=Your+Title
```

## Folder Structure (Recommended)

```
news_letter2/
├── images/
│   ├── covers/
│   │   ├── may-2026-cover.jpg
│   │   └── june-2026-cover.jpg
│   ├── highlights/
│   │   ├── digital-transformation.jpg
│   │   ├── compliance.jpg
│   │   └── advisory.jpg
│   └── logos/
│       └── company-logo.png
```

## Image Optimization Tips

### Before Adding Images to Newsletter:

1. **Resize to exact dimensions** - Don't use oversized images
2. **Compress** - Use online tools like:
   - TinyPNG (https://tinypng.com)
   - Squoosh (https://squoosh.app)
   - ImageOptim (Mac app)

3. **Check file size** - Aim for:
   - Cover image: < 300KB
   - Highlight images: < 150KB each

### Color Scheme

Match your images to the newsletter color scheme:
- Primary: #1a472a (Dark Green)
- Secondary: #2c5f2d (Medium Green)
- Accent: #c9a961 (Gold)

Look for images with these tones or use photo filters to adjust.

## Specific Image Ideas for Accounting Newsletter

### Cover Images
- Calculator and documents
- Business meeting or handshake
- Financial charts and graphs
- Modern office workspace
- Professional person analyzing data
- Digital technology and finance

### Highlight Images (300×150 each)

**For "Digital Transformation":**
- AI/Technology icons
- Computer with financial software
- Digital dashboard
- Automation concepts

**For "Compliance Updates":**
- Legal documents
- Checkmarks and approvals
- Government/regulatory imagery
- Document stacks with stamps

**For "Client Advisory":**
- Consultation meeting
- Professional guidance
- Business growth charts
- Strategic planning imagery

## Creating Images with PowerPoint (Simple Method)

1. Open PowerPoint
2. Set slide size to match image needs:
   - Design → Slide Size → Custom
   - Cover: 8" × 4" 
   - Highlight: 3" × 1.5"
3. Design your slide with:
   - Background colors matching theme
   - Professional fonts
   - Icons from Insert → Icons
   - Stock images from Insert → Pictures → Stock Images
4. Export:
   - File → Save As → PNG
   - Select "Just this slide"

## AI-Generated Images (Modern Option)

Services that can generate custom images:
1. **DALL-E** (OpenAI)
2. **Midjourney**
3. **Stable Diffusion**

Example prompts:
```
"Professional accounting office with calculator and financial documents, 
corporate style, green and gold color scheme, modern and clean"

"Digital transformation in finance, AI and technology, 
professional business illustration, minimalist"
```

## Quick Setup Commands

If you have ImageMagick installed, create placeholder images locally:

```bash
# Install ImageMagick (Mac)
brew install imagemagick

# Create cover placeholder
convert -size 800x400 xc:#1a472a -gravity center \
  -pointsize 40 -fill white -annotate +0+0 "Cover Image" \
  images/cover-placeholder.jpg

# Create highlight placeholders
convert -size 300x150 xc:#2c5f2d -gravity center \
  -pointsize 20 -fill white -annotate +0+0 "Highlight 1" \
  images/highlight-1-placeholder.jpg
```

## Updating Images in data.json

Once you have your images, update the paths in data.json:

```json
{
  "coverPage": {
    "coverImage": "images/covers/may-2026-cover.jpg",
    "highlights": [
      {
        "image": "images/highlights/digital-transformation.jpg"
      },
      {
        "image": "images/highlights/compliance.jpg"
      },
      {
        "image": "images/highlights/advisory.jpg"
      }
    ]
  }
}
```

## Testing Your Images

1. Add images to your project folder
2. Update paths in data.json
3. Open index.html in browser
4. Check that all images load correctly
5. Test print preview (Ctrl+P / Cmd+P)
6. Verify images appear in print/PDF output

## Image Copyright Note

Always ensure you have the right to use images:
- ✓ Your own photos
- ✓ Stock photos with proper license
- ✓ AI-generated images
- ✓ Images with Creative Commons license
- ✗ Google Images without checking license
- ✗ Copyrighted professional photography

## Recommended Image Sizes for Print

If printing professionally (not just PDF):
- Cover Image: 2400×1200 pixels (300 DPI)
- Highlight Images: 900×450 pixels (300 DPI)
- Use CMYK color space
- Save as high-quality JPG (quality 90+) or TIFF

---

**Quick Start**: Use the placeholder URLs in data.json for testing, then replace with real images when ready!
