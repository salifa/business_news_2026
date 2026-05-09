# 🎨 Newsletter Template Editor - Quick Start Guide

## ✅ What's Done

You now have a **visual newsletter template editor** with these features:

### Features
- ✅ **GrapesJS Visual Editor** - Drag-and-drop interface
- ✅ **Database Integration** - Loads real data from `placard` table
- ✅ **Thai Font Support** - **CordiaUPC (Cordia New)** + Sarabun fonts
- ✅ **Field Placeholders** - {{field_name}} auto-replacement
- ✅ **Save/Load Templates** - Reusable template storage
- ✅ **Export HTML** - Generate newsletter files
- ✅ **Responsive Preview** - Desktop/Tablet/Mobile views
- ✅ **Pre-built Blocks** - Newsletter components ready to use

## 📝 Font Information

**Primary Font: CordiaUPC (Cordia New)**
- Very common Thai font used in official documents
- System font - pre-installed on most Thai Windows systems
- Larger, clearer characters suitable for formal correspondence
- Font size increased to 18px for better readability

**Fallback Font: Sarabun**
- Available via Google Fonts
- Used if CordiaUPC is not installed on the system

## 🚀 How to Use

### Step 1: Open the Editor

```bash
# Option 1: Via web browser (if web server is running)
http://vnn.mac.in.th/newspaper/template_manager/

# Option 2: Direct file access
file:///websites/vnn.mac.in.th/newspaper/template_manager/index.html
```

### Step 2: Load Database Fields

1. Click **"📊 Load Sample Data"** button
   - Loads the latest advertisement from your database
   - Shows: บริษัท แอมเพอร์แซนด์ โค้ด จำกัด (current data)

2. **Default Template Appears** with these sections:
   - Header (newspaper name & ISSN)
   - Company name {{companyname}}
   - Title {{title}}
   - Meeting number {{meeting_number}}
   - Meeting details
   - Agenda {{meeting_agenda}}
   - Footer

### Step 3: Design Your Newsletter

**Using Blocks (Left Panel):**
- Drag sections, text, images, buttons
- Custom Thai blocks: หัวบริษัท, ข้อมูลการประชุม, วาระการประชุม

**Editing:**
- Click any element to edit
- Use right panel for styling
- Insert database fields: Click **"🏷️ Insert Fields"**

### Step 4: Save & Export

**Save Template:**
- Click **"💾 Save Template"**
- Name it (e.g., "standard_meeting")
- Reuse later with **"📂 Load Template"**

**Export HTML:**
- Click **"📤 Export HTML"**
- Downloads newsletter with all data filled in
- Ready for PDF conversion or email

## 📊 Available Database Fields

From your actual `placard` table:

| Field | Current Value Example |
|-------|----------------------|
| {{id}} | 170 |
| {{companyname}} | บริษัท แอมเพอร์แซนด์ โค้ด จำกัด |
| {{title}} | เชิญประชุมปิดงบประจำปี |
| {{meeting_number}} | 11/2569 |
| {{placard_to}} | ท่านผู้ถือหุ้นของบริษัท |
| {{meeting_agenda}} | 1. รับรองรายงาน... |
| {{meeting_date}} | 2026-05-07 |
| {{meeting_date_thai}} | 7 พฤษภาคม 2569 |
| {{meeting_time_formatted}} | 11:11 น. |
| {{meeting_place}} | ห้องประชุมใหญ่ มหาวิทยาลัย ธรรมศาสตร์ |
| {{placard_date_thai}} | 30 เมษายน 2569 |

## 🎯 Common Workflows

### Workflow 1: Create Standard Template

```
1. Open editor
2. Load sample data
3. Adjust the default template layout
4. Save as "standard_meeting"
5. Use for all future meetings
```

### Workflow 2: Multi-Page Newsletter

```
Page 1 (Cover):
- Company header
- Meeting announcement
- Key details
→ Save as "cover_page"

Page 2 (Details):
- Full agenda
- Meeting details
- Location map
→ Save as "details_page"

Page 3 (Additional):
- Financial reports
- Appendices
→ Save as "appendix_page"
```

### Workflow 3: Generate for Specific Ad

```
1. Modify api/get_sample_ad.php to accept ID parameter
2. Load specific ad: ?id=170
3. Design auto-fills with that ad's data
4. Export HTML
5. Convert to PDF (see below)
```

## 🔄 HTML to PDF Conversion

### Option 1: Using wkhtmltopdf

```bash
# Install
sudo apt-get install wkhtmltopdf

# Convert
wkhtmltopdf newsletter.html newsletter.pdf
```

### Option 2: Using Python WeasyPrint

```bash
# Install
pip install weasyprint

# Convert
python -m weasyprint newsletter.html newsletter.pdf
```

### Option 3: Using headless Chrome

```bash
# Using Puppeteer (Node.js)
npm install puppeteer

# Or Chrome directly
google-chrome --headless --print-to-pdf=newsletter.pdf newsletter.html
```

## 📁 File Structure

```
template_manager/
├── index.html              # Main GrapesJS editor ⭐
├── api/
│   ├── get_sample_ad.php  # Load database records
│   └── templates.php      # Save/load templates
├── saved_templates/       # Your saved templates (auto-created)
└── README.md             # Full documentation
```

## 🔧 Customization

### Add Custom Field

1. Edit `api/get_sample_ad.php`:
```php
$sql = "SELECT *, 
        your_custom_field
        FROM placard ...";
```

2. Add to fields list:
```php
'fields' => [
    // ... existing fields
    'your_custom_field' => 'Custom Field Label'
]
```

3. Use in template: `{{your_custom_field}}`

### Add Custom Block

Edit `index.html`, find `addCustomBlocks()`:

```javascript
blockManager.add('my-block', {
    label: 'My Block',
    category: 'Newsletter',
    content: '<div>{{your_field}}</div>'
});
```

## 🆘 Troubleshooting

### "No sample data" Error
**Solution:** Make sure you have data in `placard` table
```sql
SELECT * FROM placard WHERE status='approved' LIMIT 1;
```

### Thai Characters Show as Boxes
**Solution:** 
1. **CordiaUPC Font**: If you're on Windows, the font should already be installed as "Cordia New" or "CordiaUPC"
2. **On Linux/Mac**: Install Cordia New font or the editor will automatically fallback to Sarabun (Google Fonts)
3. **For PDF Generation**: Ensure CordiaUPC font files are available in your system fonts directory

### Font Looks Different When Exported
**Solution:** CordiaUPC is a system font. Exported HTML will use it if installed on the viewing system, otherwise falls back to Sarabun. For PDF conversion, ensure the PDF generator has access to CordiaUPC font files.

### Can't Save Templates
**Solution:** Check directory permissions:
```bash
mkdir -p /websites/vnn.mac.in.th/newspaper/template_manager/saved_templates
chmod 755 /websites/vnn.mac.in.th/newspaper/template_manager/saved_templates
```

### Placeholders Not Replacing
**Solution:** Click "📊 Load Sample Data" first, then check field names match exactly.

## 💡 Pro Tips

1. **Start with Default**: The pre-loaded template is email-safe and responsive
2. **Use Tables**: For newsletter emails, use table-based layouts
3. **Test Responsive**: Check all 3 device sizes before exporting
4. **Save Often**: Save your work frequently with different names
5. **Preview Data**: Always load sample data to see actual content

## 📱 Responsive Design

The editor includes these breakpoints:
- **Desktop**: Full width (default)
- **Tablet**: 768px
- **Mobile**: 320px

Test your design in all views using the device selector in toolbar.

## 🎓 Next Steps

1. **Try it now**: Open `/newspaper/template_manager/index.html`
2. **Experiment**: Drag blocks, edit text, try different layouts
3. **Save template**: Create your standard meeting template
4. **Export**: Generate HTML and test PDF conversion
5. **Integrate**: Connect with your existing PDF generation system

## 📚 Resources

- Full documentation: `README.md`
- GrapesJS docs: https://grapesjs.com/docs/
- Newsletter preset: https://github.com/artf/grapesjs-preset-newsletter

---

## 🎉 You're Ready!

Your visual newsletter editor is fully configured and connected to your database. Start designing!

**Quick Access:**
```bash
cd /websites/vnn.mac.in.th/newspaper/template_manager
firefox index.html
```

**Current Database Sample:**
- Company: บริษัท แอมเพอร์แซนด์ โค้ด จำกัด
- Meeting: 11/2569
- Date: 7 พฤษภาคม 2569
- Place: ห้องประชุมใหญ่ มหาวิทยาลัย ธรรมศาสตร์
