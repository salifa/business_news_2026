# Template Creation Methods Comparison

## Quick Summary

For your newspaper PDF generation system, here's my recommendation:

### 🏆 **Best Method: HTML for Design → ReportLab for Production**

```
HTML/CSS Template → Browser DevTools → Extract Coordinates → ReportLab Code
     (Design)         (Measure)         (Document)        (Production)
```

---

## Method Comparison with Examples

### Method 1: HTML/CSS Template ⭐ **RECOMMENDED**

**Use Case:** Design and measure precise layouts

**Example File:** `examples/ad_template.html`

```html
<div class="ad-layout" style="
    width: 210mm;
    height: 297mm;
    padding: 15mm;
">
    <div class="company-name" style="
        position: absolute;
        top: 50mm;
        left: 20mm;
        width: 170mm;
        font-size: 20pt;
    ">
        บริษัท ทดสอบ จำกัด
    </div>
</div>
```

**How to use:**
1. Open `tools/template_designer.html` in browser
2. Add placeholders visually
3. Drag to position precisely
4. Copy generated ReportLab code

**Generated Code:**
```python
COMPANY_NAME_X = 20.0*mm
COMPANY_NAME_Y = 232.0*mm  # 50.0mm from top
COMPANY_NAME_FONT_SIZE = 20
```

---

### Method 2: JPEG/PNG Background Template

**Use Case:** Complex designs from graphic designers

**Workflow:**
1. Designer creates in Photoshop/Figma
2. Export as high-res PNG (300 DPI, 2480×3508 px)
3. Use as background in ReportLab
4. Overlay text at measured positions

**Example Code:**
```python
from reportlab.lib.utils import ImageReader

# Add background template
template_img = ImageReader('template.png')
c.drawImage(template_img, 0, 0, 
           width=PAGE_WIDTH, 
           height=PAGE_HEIGHT)

# Then add text on top
c.setFont('Sarabun-Bold', 20)
c.drawString(20*mm, 232*mm, "บริษัท ทดสอบ จำกัด")
```

**Pros:**
- Designer-friendly
- Good for complex layouts
- Visual reference while coding

**Cons:**
- Larger PDF file size
- Background image not searchable
- Must manually overlay text

---

### Method 3: MS Word/LibreOffice ❌ **NOT RECOMMENDED**

**Why not?**
- Not pixel-accurate
- Hard to extract coordinates
- Inconsistent rendering
- Not programmable

**When to use:**
- One-off documents only
- Not for automated generation

---

## Practical Examples for Your System

### Example 1: Standard Advertisement Layout

**Design in HTML:**
```html
<!DOCTYPE html>
<html>
<head>
<style>
    .page { width: 210mm; height: 297mm; position: relative; }
    .header { position: absolute; top: 15mm; left: 15mm; right: 15mm; }
    .company { position: absolute; top: 50mm; left: 20mm; font-size: 20pt; }
    .meeting { position: absolute; top: 70mm; left: 20mm; font-size: 16pt; }
    .agenda { position: absolute; top: 95mm; left: 20mm; right: 20mm; }
</style>
</head>
<body>
<div class="page">
    <div class="header">หนังสือพิมพ์ประกาศ</div>
    <div class="company">บริษัท ทดสอบ จำกัด</div>
    <div class="meeting">ประชุมสามัญผู้ถือหุ้น ครั้งที่ 1/2569</div>
    <div class="agenda">
        <p><b>วาระที่ 1</b> พิจารณารับรองงบการเงิน</p>
        <p><b>วันที่:</b> 15 พฤษภาคม 2569</p>
        <p><b>เวลา:</b> 14:00 น.</p>
    </div>
</div>
</body>
</html>
```

**Convert to ReportLab:**
```python
# In your generate_placard_pdf.py

class StandardAdLayout:
    """Pixel-accurate layout for standard ads"""
    
    # Page setup
    PAGE_WIDTH, PAGE_HEIGHT = A4
    MARGIN = 15*mm
    
    # Header
    HEADER_Y = PAGE_HEIGHT - 15*mm
    HEADER_HEIGHT = 20*mm
    
    # Company name
    COMPANY_Y = PAGE_HEIGHT - 50*mm
    COMPANY_FONT_SIZE = 20
    
    # Meeting info
    MEETING_Y = PAGE_HEIGHT - 70*mm
    MEETING_FONT_SIZE = 16
    
    # Agenda/content
    AGENDA_Y = PAGE_HEIGHT - 95*mm
    AGENDA_LEFT = 20*mm
    AGENDA_WIDTH = PAGE_WIDTH - 40*mm
    
def draw_standard_ad(canvas, ad_data):
    """Draw advertisement using pixel-accurate layout"""
    
    # Header
    canvas.setFont('Prompt-Bold', 16)
    canvas.drawCentredString(
        PAGE_WIDTH/2, 
        StandardAdLayout.HEADER_Y,
        "หนังสือพิมพ์ประกาศ"
    )
    
    # Company name
    canvas.setFont('Prompt-Bold', StandardAdLayout.COMPANY_FONT_SIZE)
    canvas.drawString(
        20*mm,
        StandardAdLayout.COMPANY_Y,
        ad_data['company_name']
    )
    
    # Meeting info
    canvas.setFont('Sarabun-Bold', StandardAdLayout.MEETING_FONT_SIZE)
    canvas.drawString(
        20*mm,
        StandardAdLayout.MEETING_Y,
        f"ประชุมสามัญผู้ถือหุ้น ครั้งที่ {ad_data['meeting_number']}"
    )
    
    # Agenda content
    y = StandardAdLayout.AGENDA_Y
    canvas.setFont('Sarabun-Regular', 14)
    for line in ad_data['agenda_lines']:
        canvas.drawString(20*mm, y, line)
        y -= 20  # Line spacing
```

---

### Example 2: Full Page Advertisement

**Design Process:**
1. Create 210mm × 297mm canvas in Figma
2. Add image placeholder
3. Add text overlays with exact positions
4. Export measurements

**ReportLab Implementation:**
```python
def draw_fullpage_ad(canvas, image_path, title, subtitle):
    """Full page ad with image and text"""
    
    # Background image (full bleed)
    canvas.drawImage(
        image_path,
        0, 0,
        width=PAGE_WIDTH,
        height=PAGE_HEIGHT,
        preserveAspectRatio=False
    )
    
    # Title overlay (measured in HTML)
    canvas.setFillColorRGB(1, 1, 1, alpha=0.9)  # White with transparency
    canvas.rect(
        15*mm, 
        PAGE_HEIGHT - 60*mm,
        180*mm, 
        30*mm,
        fill=1
    )
    
    canvas.setFillColorRGB(0, 0, 0)
    canvas.setFont('Prompt-Bold', 24)
    canvas.drawCentredString(
        PAGE_WIDTH/2,
        PAGE_HEIGHT - 45*mm,
        title
    )
```

---

## 🛠️ Tools Provided

### 1. Visual Template Designer
**File:** `tools/template_designer.html`

Open in browser to:
- ✅ Create placeholders visually
- ✅ Drag and position precisely
- ✅ Resize interactively
- ✅ See coordinates in real-time
- ✅ Copy generated ReportLab code

### 2. Coordinate Converter
**File:** `tools/coordinate_converter.py`

```bash
python tools/coordinate_converter.py
```

Features:
- Convert top→bottom coordinates
- Convert mm→points
- Calculate bounding boxes
- Batch convert multiple coordinates
- Generate template code

### 3. Documentation
**File:** `docs/TEMPLATE_DESIGN_GUIDE.md`

Complete guide with:
- Detailed method comparison
- Coordinate system explanation
- Practical examples
- Best practices

---

## 📝 Recommended Workflow

### For New Templates:

1. **Design Phase**
   ```
   Open: tools/template_designer.html
   → Add placeholders visually
   → Adjust positions/sizes
   → Preview layout
   ```

2. **Measurement Phase**
   ```
   Use browser DevTools
   → Inspect elements
   → Note exact positions
   → Document measurements
   ```

3. **Conversion Phase**
   ```
   Run: tools/coordinate_converter.py
   → Convert coordinates
   → Generate code snippets
   → Copy to your script
   ```

4. **Implementation Phase**
   ```
   Edit: scripts/generate_placard_pdf.py
   → Add layout class
   → Implement drawing function
   → Test with sample data
   ```

5. **Testing Phase**
   ```
   Generate sample PDF
   → Verify positions
   → Adjust if needed
   → Measure in PDF viewer
   ```

### For Existing Designs:

1. **Get design as PNG** (300 DPI, exact A4 size)
2. **Use as background** in development
3. **Measure positions** using PDF viewer ruler
4. **Implement overlay text** at measured positions
5. **Remove background** for production (optional)

---

## 💡 Pro Tips

### 1. Use Grid Overlay
```python
def draw_grid(canvas):
    """Debug: Draw 10mm grid for alignment"""
    canvas.setStrokeColorRGB(0.9, 0.9, 0.9)
    for x in range(0, 210, 10):
        canvas.line(x*mm, 0, x*mm, PAGE_HEIGHT)
    for y in range(0, 297, 10):
        canvas.line(0, y*mm, PAGE_WIDTH, y*mm)
```

### 2. Create Layout Classes
```python
class LayoutA:
    """Template A: Corporate meeting"""
    COMPANY_Y = 247*mm
    MEETING_Y = 227*mm
    # ...

class LayoutB:
    """Template B: Shareholder notice"""
    TITLE_Y = 262*mm
    CONTENT_Y = 230*mm
    # ...
```

### 3. Use Helper Functions
```python
def y_from_top(mm_from_top):
    """Convert Y from top origin to ReportLab bottom origin"""
    return PAGE_HEIGHT - (mm_from_top * mm)

# Usage
canvas.drawString(20*mm, y_from_top(50), "Text")
```

### 4. Test with Rulers
Add rulers to your PDF for verification:
```python
def add_rulers(canvas):
    """Add measurement rulers"""
    canvas.setFont('Helvetica', 6)
    # Horizontal ruler
    for x in range(0, 210, 10):
        canvas.drawString(x*mm, 5*mm, f"{x}")
    # Vertical ruler
    for y in range(0, 297, 10):
        canvas.drawString(2*mm, y*mm, f"{y}")
```

---

## 🎯 Final Recommendation

**For your newspaper system, I recommend:**

1. ✅ Use **HTML template designer** for layout design
2. ✅ Use **browser DevTools** to measure exact positions
3. ✅ Use **coordinate converter** to generate ReportLab code
4. ✅ Implement in your existing **generate_placard_pdf.py**
5. ✅ Keep PNG templates as **reference only** (not in final PDF)

This gives you:
- Pixel-perfect positioning
- Easy iteration and updates
- Developer-friendly workflow
- Small PDF file sizes
- Searchable text in PDFs

---

## 📚 Resources

- ReportLab User Guide: https://www.reportlab.com/docs/reportlab-userguide.pdf
- A4 size: 210mm × 297mm (8.27" × 11.69")
- 1mm = 2.8346 points (ReportLab)
- 1 inch = 72 points (ReportLab)

---

**Questions?** Check `docs/TEMPLATE_DESIGN_GUIDE.md` for more details!
