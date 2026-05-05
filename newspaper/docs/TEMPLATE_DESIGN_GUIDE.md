# Template Design Guide for Pixel-Accurate PDF Layout

## 🎯 Best Approach: HTML/CSS for Design → ReportLab for Production

### Why This Approach?

For your ReportLab-based PDF generation system, the optimal workflow is:

1. ✅ **Design in HTML/CSS** (visual, precise, easy to iterate)
2. ✅ **Measure coordinates** (extract positions)
3. ✅ **Implement in ReportLab** (production-ready)

---

## 📊 Comparison of Methods

### Method 1: HTML/CSS ⭐ **RECOMMENDED**

**Pros:**
- ✅ Pixel-perfect positioning with CSS
- ✅ Easy to preview in browser
- ✅ Quick iterations
- ✅ Can extract exact coordinates
- ✅ Developer-friendly
- ✅ Version control friendly (text files)
- ✅ Can use browser dev tools to measure

**Cons:**
- ⚠️ Requires manual translation to ReportLab
- ⚠️ HTML-to-PDF conversion has limitations for production

**Best For:** Template design, prototyping, measuring coordinates

---

### Method 2: JPEG/PNG Template

**Pros:**
- ✅ Can use as background image in ReportLab
- ✅ Visual reference while coding
- ✅ Designers can use Photoshop/Figma
- ✅ Good for complex layouts

**Cons:**
- ⚠️ Increases PDF file size
- ⚠️ Not searchable text
- ⚠️ Must manually add text on top

**Best For:** Background templates, watermarks, complex designs

---

### Method 3: MS Word/LibreOffice

**Pros:**
- ✅ Easy for non-technical users
- ✅ WYSIWYG interface

**Cons:**
- ❌ Not pixel-accurate
- ❌ Hard to extract exact coordinates
- ❌ Inconsistent rendering
- ❌ Not suitable for programmatic generation

**Best For:** One-off documents (NOT for templates)

---

## 🛠️ Recommended Workflow

### Step 1: Design Template in HTML/CSS

Create an HTML file with exact A4 dimensions:

```html
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<style>
    @page {
        size: A4;
        margin: 0;
    }
    
    body {
        margin: 0;
        padding: 0;
        font-family: 'Sarabun', sans-serif;
    }
    
    .page {
        width: 210mm;  /* A4 width */
        height: 297mm; /* A4 height */
        position: relative;
        background: white;
        box-sizing: border-box;
    }
    
    /* Define your placeholders with exact positions */
    .header {
        position: absolute;
        top: 15mm;
        left: 15mm;
        right: 15mm;
        height: 30mm;
        border: 2px dashed red;
    }
    
    .company-name {
        position: absolute;
        top: 50mm;
        left: 20mm;
        width: 170mm;
        font-size: 18pt;
        border: 1px dashed blue;
    }
    
    .meeting-number {
        position: absolute;
        top: 65mm;
        left: 20mm;
        width: 170mm;
        font-size: 14pt;
        border: 1px dashed blue;
    }
    
    .content-area {
        position: absolute;
        top: 85mm;
        left: 20mm;
        right: 20mm;
        height: 150mm;
        border: 2px dashed green;
    }
    
    /* Add measurement labels */
    .measure {
        position: absolute;
        font-size: 8pt;
        color: red;
        font-family: monospace;
    }
</style>
</head>
<body>
    <div class="page">
        <div class="header">
            <span class="measure" style="top: -15px; left: 0;">15mm from top, 15mm from left</span>
            HEADER AREA
        </div>
        
        <div class="company-name">
            <span class="measure" style="top: -15px;">Top: 50mm, Left: 20mm</span>
            บริษัท ทดสอบ จำกัด
        </div>
        
        <div class="meeting-number">
            <span class="measure" style="top: -15px;">Top: 65mm</span>
            ครั้งที่ 1/2569
        </div>
        
        <div class="content-area">
            <span class="measure" style="top: -15px;">Content Area: 85mm from top</span>
            CONTENT AREA
        </div>
    </div>
</body>
</html>
```

### Step 2: Measure Coordinates Using Browser DevTools

1. Open HTML in Chrome/Firefox
2. Right-click → Inspect Element
3. Use "Measure" tool to get exact pixel positions
4. Note: **1mm = 3.7795 pixels at 96 DPI**

### Step 3: Create Coordinate Map

```json
{
  "page": {
    "width_mm": 210,
    "height_mm": 297,
    "margins": {
      "top": 15,
      "bottom": 15,
      "left": 15,
      "right": 15
    }
  },
  "placeholders": {
    "header": {
      "x": 15,
      "y": 282,
      "width": 180,
      "height": 30,
      "note": "y is from bottom in ReportLab"
    },
    "company_name": {
      "x": 20,
      "y": 247,
      "width": 170,
      "font_size": 18
    },
    "meeting_number": {
      "x": 20,
      "y": 232,
      "width": 170,
      "font_size": 14
    }
  }
}
```

### Step 4: Convert to ReportLab Code

```python
from reportlab.lib.units import mm
from reportlab.lib.pagesizes import A4

# A4 dimensions
PAGE_WIDTH, PAGE_HEIGHT = A4  # 210mm x 297mm

# Margins
MARGIN_TOP = 15*mm
MARGIN_LEFT = 15*mm
MARGIN_RIGHT = 15*mm

# Helper function: Convert top-origin (HTML) to bottom-origin (ReportLab)
def top_to_bottom(y_from_top_mm):
    """Convert Y coordinate from top origin to bottom origin"""
    return PAGE_HEIGHT - (y_from_top_mm * mm)

# Placeholder positions
HEADER_Y = top_to_bottom(15)  # 15mm from top
COMPANY_NAME_Y = top_to_bottom(50)  # 50mm from top
MEETING_NUMBER_Y = top_to_bottom(65)  # 65mm from top

# Usage in ReportLab
c.drawString(20*mm, COMPANY_NAME_Y, "บริษัท ทดสอบ จำกัด")
```

---

## 🎨 Alternative: Use JPEG as Background Template

If you have a complex design from a designer:

### Step 1: Get Design as High-Res PNG/JPEG
- Export at **300 DPI**
- Exact A4 size: **2480 x 3508 pixels** (at 300 DPI)

### Step 2: Use as Background in ReportLab

```python
from reportlab.lib.utils import ImageReader

def add_background_template(canvas, template_path):
    """Add template image as background"""
    img = ImageReader(template_path)
    canvas.drawImage(
        img, 
        0, 0,  # Position at origin
        width=PAGE_WIDTH,
        height=PAGE_HEIGHT,
        preserveAspectRatio=True,
        mask='auto'
    )

# Then draw text on top with exact coordinates
canvas.setFont('Sarabun-Bold', 18)
canvas.drawString(20*mm, 247*mm, "บริษัท ทดสอบ จำกัด")
```

### Step 3: Add Measurement Grid to Template

Create a ruler template in Photoshop/Figma:
- Add grid every 5mm or 10mm
- Mark key positions
- Export as PNG with transparency
- Use as overlay during development

---

## 📐 Coordinate System Reference

### HTML/CSS (Top-Left Origin)
```
(0,0) ─────────────► X
  │
  │
  ▼ Y
```

### ReportLab (Bottom-Left Origin)
```
  ▲ Y
  │
  │
(0,0) ─────────────► X
```

### Conversion Formula
```python
# From top-origin (HTML/CSS) to bottom-origin (ReportLab)
reportlab_y = PAGE_HEIGHT - html_y

# From bottom-origin (ReportLab) to top-origin (HTML/CSS)
html_y = PAGE_HEIGHT - reportlab_y
```

---

## 🔧 Tools & Resources

### Recommended Tools

1. **Browser DevTools** - Measure HTML elements
2. **Figma** (Free) - Design with exact mm measurements
3. **GIMP/Photoshop** - Create background templates
4. **VS Code** - Edit HTML templates
5. **PDF Viewer with Ruler** - Verify output

### Python Helper Script

Create `tools/measure_pdf.py`:

```python
#!/usr/bin/env python
"""
PDF Measurement Tool
Opens a PDF and allows you to click to get coordinates
"""
import PyPDF2
from reportlab.lib.pagesizes import A4
from reportlab.lib.units import mm

def pdf_coordinates():
    print("A4 Page Dimensions:")
    print(f"  Width:  {A4[0]/mm:.2f}mm ({A4[0]:.2f} points)")
    print(f"  Height: {A4[1]/mm:.2f}mm ({A4[1]:.2f} points)")
    print()
    print("Coordinate Converter:")
    print("-" * 50)
    
    while True:
        try:
            y_from_top = float(input("Enter Y position from top (mm): "))
            y_reportlab = A4[1] - (y_from_top * mm)
            print(f"  → ReportLab Y: {y_reportlab/mm:.2f}mm ({y_reportlab:.2f} points)")
            print()
        except (ValueError, EOFError):
            break

if __name__ == "__main__":
    pdf_coordinates()
```

---

## 📋 Practical Example: Create Ad Template

### 1. Design in HTML (`templates/ad_template.html`)

```html
<!DOCTYPE html>
<html>
<head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Sarabun:wght@400;700&display=swap');
    
    @page { size: A4; margin: 0; }
    
    .page {
        width: 210mm;
        height: 297mm;
        padding: 15mm;
        box-sizing: border-box;
        font-family: 'Sarabun', sans-serif;
    }
    
    .newspaper-header {
        text-align: center;
        border-bottom: 3px double #000;
        padding-bottom: 5mm;
        margin-bottom: 10mm;
    }
    
    .ad-box {
        border: 2px solid #333;
        padding: 10mm;
        min-height: 240mm;
    }
    
    .company-name {
        font-size: 20pt;
        font-weight: bold;
        text-align: center;
        margin-bottom: 8mm;
    }
    
    .meeting-info {
        font-size: 16pt;
        text-align: center;
        margin-bottom: 10mm;
    }
    
    .details {
        font-size: 14pt;
        line-height: 1.8;
    }
    
    /* Measurement guide (remove in production) */
    .ruler {
        position: absolute;
        background: rgba(255,0,0,0.1);
    }
</style>
</head>
<body>
<div class="page">
    <div class="newspaper-header">
        <h1>หนังสือพิมพ์ทดสอบ</h1>
        <p>วันที่ 3 พฤษภาคม 2569</p>
    </div>
    
    <div class="ad-box">
        <div class="company-name">
            {{COMPANY_NAME}}
        </div>
        
        <div class="meeting-info">
            ประชุมผู้ถือหุ้นสามัญ ครั้งที่ {{MEETING_NUMBER}}
        </div>
        
        <div class="details">
            <p><strong>วาระการประชุม:</strong> {{AGENDA}}</p>
            <p><strong>วันที่:</strong> {{DATE}}</p>
            <p><strong>เวลา:</strong> {{TIME}}</p>
            <p><strong>สถานที่:</strong> {{LOCATION}}</p>
        </div>
    </div>
</div>
</body>
</html>
```

### 2. Extract Measurements

Open in browser, measure with DevTools:
- Newspaper header: Top 15mm, Height 25mm
- Ad box: Top 50mm, Left 15mm, Right 15mm
- Company name: Top 60mm, Center-aligned
- Meeting info: Top 85mm, Center-aligned
- Details: Top 105mm

### 3. Implement in ReportLab

Add to your `generate_placard_pdf.py`:

```python
class PlacardTemplate:
    """Precise template measurements"""
    
    # Page setup
    MARGIN = 15*mm
    
    # Header section
    HEADER_TOP = PAGE_HEIGHT - 15*mm
    HEADER_HEIGHT = 25*mm
    
    # Ad box
    AD_BOX_TOP = PAGE_HEIGHT - 50*mm
    AD_BOX_LEFT = 15*mm
    AD_BOX_RIGHT = PAGE_WIDTH - 15*mm
    AD_BOX_BOTTOM = 15*mm
    
    # Text positions (from bottom)
    COMPANY_NAME_Y = PAGE_HEIGHT - 60*mm
    MEETING_INFO_Y = PAGE_HEIGHT - 85*mm
    DETAILS_START_Y = PAGE_HEIGHT - 105*mm
    
    # Font sizes
    COMPANY_FONT_SIZE = 20
    MEETING_FONT_SIZE = 16
    DETAILS_FONT_SIZE = 14
```

---

## ✅ My Recommendation for You

**Best approach for your system:**

1. **For quick prototyping:**
   - Use HTML/CSS template
   - Preview in browser
   - Iterate quickly

2. **For measuring coordinates:**
   - Use browser DevTools
   - Create measurement grid overlay
   - Document in JSON file

3. **For production:**
   - Implement in ReportLab with exact coordinates
   - Use Thai text renderer (already in your system)
   - Test with actual data

4. **For complex designs:**
   - Get design as PNG from Figma/Photoshop
   - Use as development reference
   - Optionally include as watermark/background

---

## 🎯 Next Steps

1. Create HTML template with your desired layout
2. Measure all placeholder positions
3. Update your `generate_placard_pdf.py` with coordinates
4. Test with sample data
5. Iterate until pixel-perfect

Would you like me to create a specific template for your ad layout?
