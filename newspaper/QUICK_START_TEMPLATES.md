# Quick Start: Creating Pixel-Accurate PDF Templates

## 🎯 Answer: Which Format is Best?

**For your ReportLab newspaper system: Use HTML/CSS for design, then convert to ReportLab code.**

### Comparison Table

| Method | Accuracy | Ease of Use | Best For | Verdict |
|--------|----------|-------------|----------|---------|
| **HTML/CSS** | ★★★★★ Pixel-perfect | ★★★★★ Easy | Design & measurement | ✅ **RECOMMENDED** |
| **JPEG/PNG** | ★★★★☆ Good | ★★★☆☆ Medium | Complex graphics | ✅ As reference |
| **MS Word** | ★★☆☆☆ Poor | ★★★★☆ Easy | N/A | ❌ **NOT RECOMMENDED** |

---

## 🚀 Quick Start (5 Minutes)

### Step 1: Open Template Designer
```bash
cd /websites/vnn.mac.in.th/newspaper
firefox tools/template_designer.html
# or
google-chrome tools/template_designer.html
```

### Step 2: Design Your Layout
1. Click "Add Placeholder" button
2. Drag to position where you want text
3. Resize from corner handle
4. Enter name (e.g., "company_name")
5. Set font size

### Step 3: Copy Generated Code
Click "Copy Code" button to get:
```python
# Generated coordinates for ReportLab
COMPANY_NAME_X = 20.0*mm
COMPANY_NAME_Y = 247.0*mm  # 50.0mm from top
COMPANY_NAME_WIDTH = 170.0*mm
COMPANY_NAME_FONT_SIZE = 18

# canvas.drawString(COMPANY_NAME_X, 247.0*mm, "Text here")
```

### Step 4: Add to Your PDF Script
Edit `scripts/generate_placard_pdf.py`:
```python
# Add at top
COMPANY_NAME_X = 20.0*mm
COMPANY_NAME_Y = 247.0*mm
COMPANY_NAME_FONT_SIZE = 18

# Use in your drawing function
canvas.setFont('Prompt-Bold', COMPANY_NAME_FONT_SIZE)
canvas.drawString(COMPANY_NAME_X, COMPANY_NAME_Y, ad_data['company'])
```

### Step 5: Test
```bash
cd /websites/vnn.mac.in.th/newspaper
php check_recent_ads.php
```

---

## 📐 Coordinate Converter Tool

For quick calculations:
```bash
/websites/vnn.mac.in.th/.venv/bin/python tools/coordinate_converter.py
```

Choose option 1 for interactive conversion:
```
Enter Y position from top (mm): 50
→ ReportLab Y: 247.00mm (699.21 points)
→ Code: 247.0*mm
```

---

## 🎨 Method Details

### Method 1: HTML/CSS ⭐ RECOMMENDED

**Workflow:**
```
Design in HTML → Measure in Browser → Extract Coordinates → ReportLab Code
```

**Why?**
- ✅ Pixel-perfect positioning
- ✅ Visual preview
- ✅ Quick iterations
- ✅ Easy to measure with DevTools
- ✅ Works with your existing system

**Tools Provided:**
- `tools/template_designer.html` - Visual designer
- `tools/coordinate_converter.py` - Coordinate calculator

---

### Method 2: JPEG/PNG Template

**Workflow:**
```
Design in Photoshop/Figma → Export PNG → Use as Reference → Code Positions
```

**When to use:**
- Complex graphic designs
- Designer-created templates
- Development reference

**Example:**
```python
# Optional: Use as background during development
template = ImageReader('template.png')
canvas.drawImage(template, 0, 0, PAGE_WIDTH, PAGE_HEIGHT)

# Add text on top at measured positions
canvas.drawString(20*mm, 247*mm, "Company Name")
```

**Note:** Remove background image for production (smaller file size)

---

### Method 3: MS Word ❌ NOT RECOMMENDED

**Why not?**
- ❌ Not pixel-accurate
- ❌ Cannot extract precise coordinates
- ❌ Inconsistent across platforms
- ❌ Not suitable for programmatic generation

**Only use for:** One-off documents (not templates)

---

## 🎯 Your Current System

You already have:
- ✅ ReportLab PDF generation (`generate_placard_pdf.py`)
- ✅ Thai font support (Prompt-Bold, Sarabun)
- ✅ Image handling
- ✅ PDF merging for uploaded files

**What you need:** Precise placeholder coordinates

**Solution:** Use the HTML template designer tool

---

## 💡 Example: Standard Ad Layout

### 1. Design in HTML Template Designer

Open `tools/template_designer.html` and create:
- Header placeholder (top: 15mm, height: 25mm)
- Company name (top: 50mm, font: 20pt)
- Meeting number (top: 70mm, font: 16pt)
- Content area (top: 95mm, height: 150mm)

### 2. Generated Code

```python
# Ad Layout Coordinates
HEADER_Y = 272.0*mm        # 25mm from top
COMPANY_NAME_Y = 247.0*mm  # 50mm from top
MEETING_Y = 227.0*mm       # 70mm from top
CONTENT_Y = 202.0*mm       # 95mm from top

COMPANY_FONT_SIZE = 20
MEETING_FONT_SIZE = 16
CONTENT_FONT_SIZE = 14
```

### 3. Implementation

```python
def draw_standard_ad(canvas, ad_data):
    """Draw advertisement with pixel-accurate positions"""
    
    # Company name
    canvas.setFont('Prompt-Bold', COMPANY_FONT_SIZE)
    canvas.drawString(20*mm, COMPANY_NAME_Y, ad_data['company'])
    
    # Meeting number
    canvas.setFont('Sarabun-Bold', MEETING_FONT_SIZE)
    meeting_text = f"ประชุมสามัญผู้ถือหุ้น ครั้งที่ {ad_data['meeting_number']}"
    canvas.drawString(20*mm, MEETING_Y, meeting_text)
    
    # Content
    canvas.setFont('Sarabun-Regular', CONTENT_FONT_SIZE)
    y = CONTENT_Y
    for line in ad_data['content_lines']:
        canvas.drawString(20*mm, y, line)
        y -= 18  # Line spacing
```

---

## 🔧 Key Concepts

### Coordinate System

**HTML/CSS** (top-left origin):
```
(0,0) ────► X
  │
  │
  ▼ Y
```

**ReportLab** (bottom-left origin):
```
  ▲ Y
  │
  │
(0,0) ────► X
```

### Conversion Formula

```python
# HTML to ReportLab
reportlab_y = 297mm - html_y_from_top

# Example: Element at 50mm from top
reportlab_y = 297 - 50 = 247mm
```

### A4 Page Size

```
Width:  210mm (595.28 points)
Height: 297mm (841.89 points)
```

---

## 📦 Files Created for You

```
newspaper/
├── tools/
│   ├── template_designer.html      ← Visual template designer ⭐
│   └── coordinate_converter.py     ← Coordinate calculator
├── docs/
│   ├── TEMPLATE_DESIGN_GUIDE.md    ← Complete guide
│   └── TEMPLATE_METHODS_COMPARISON.md ← Method comparison
└── scripts/
    └── generate_placard_pdf.py     ← Your PDF generator
```

---

## ✅ Next Steps

1. **Open the template designer:**
   ```bash
   firefox /websites/vnn.mac.in.th/newspaper/tools/template_designer.html
   ```

2. **Design your ad layout:**
   - Add placeholders for all text elements
   - Position them visually
   - Copy the generated code

3. **Update your PDF script:**
   - Add coordinates to `generate_placard_pdf.py`
   - Update the drawing functions
   - Test with sample data

4. **Refine:**
   - Generate test PDF
   - Measure with PDF viewer
   - Adjust coordinates if needed

---

## 🎓 Pro Tips

### 1. Use Grid Overlay
Click "Toggle Grid" in template designer to see 10mm grid

### 2. Start with Standard Layout
Create one good template, then duplicate for variations

### 3. Document Your Coordinates
Keep coordinate definitions in one place:
```python
class AdLayouts:
    """Standard ad layout coordinates"""
    
    class StandardMeeting:
        COMPANY_Y = 247*mm
        MEETING_Y = 227*mm
        # ...
    
    class FullPage:
        TITLE_Y = 262*mm
        # ...
```

### 4. Test with Grid
Add temporary grid to your PDF for verification:
```python
def draw_test_grid(canvas):
    """Draw 10mm grid for testing"""
    canvas.setStrokeColorRGB(0.9, 0.9, 0.9)
    for x in range(0, 210, 10):
        canvas.line(x*mm, 0, x*mm, 297*mm)
    for y in range(0, 297, 10):
        canvas.line(0, y*mm, 210*mm, y*mm)
```

---

## 📚 Reference

### Common Positions

```python
# Margins
MARGIN = 15*mm
CONTENT_WIDTH = 180*mm  # 210 - 30mm
CONTENT_HEIGHT = 267*mm # 297 - 30mm

# Standard positions (from top)
TOP_HEADER = 15*mm
TITLE_AREA = 50*mm
CONTENT_START = 80*mm
FOOTER_AREA = 277*mm  # 20mm from bottom
```

### Font Sizes

```python
TITLE_FONT = 24       # Large title
HEADING_FONT = 20     # Section heading
SUBHEAD_FONT = 16     # Sub-heading
BODY_FONT = 14        # Normal text
CAPTION_FONT = 10     # Small text
```

---

## 💬 Summary

**Your Question:** *"How can I create PDF sample with pixel-accurate placeholders - MS Word, HTML, or JPEG?"*

**Answer:** 
- ✅ **Use HTML/CSS** for designing and measuring
- ✅ **Use provided template designer tool**
- ✅ **Copy generated ReportLab code** to your script
- ⚠️ **JPEG/PNG** only as reference during development
- ❌ **Not MS Word** - it's not suitable for this purpose

**Tools ready to use:**
1. `tools/template_designer.html` - Open in browser
2. `tools/coordinate_converter.py` - Run for calculations
3. `docs/TEMPLATE_DESIGN_GUIDE.md` - Read for details

**Start here:** Open the template designer and create your first layout!

```bash
cd /websites/vnn.mac.in.th/newspaper
firefox tools/template_designer.html &
```

Good luck! 🚀
