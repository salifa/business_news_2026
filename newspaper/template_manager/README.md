# Newsletter Template Manager - GrapesJS Edition

Visual newsletter template editor with database integration for newspaper advertisements.

## 📁 Structure

```
template_manager/
├── index.html              # Main GrapesJS editor
├── api/                    # PHP APIs
│   ├── get_sample_ad.php  # Load database records
│   └── templates.php      # Save/load templates
├── saved_templates/       # Saved template files (auto-created)
└── templates/            # Empty placeholder
```

## ✨ Features

- **Visual Editor**: Drag-and-drop newsletter builder using GrapesJS
- **Database Integration**: Load actual ad records from placard table
- **Thai Font Support**: Sarabun and Prompt fonts
- **Field Placeholders**: Insert {{field_name}} that auto-replace with data
- **Save/Load Templates**: Store and reuse template designs
- **Export HTML**: Generate ready-to-use HTML newsletters
- **Responsive**: Preview in Desktop/Tablet/Mobile views
- **Newsletter Preset**: Pre-built email-safe components

## 🚀 Quick Start

### 1. Open the Editor

Open in your browser:
```
http://vnn.mac.in.th/newspaper/template_manager/
```

Or locally:
```
file:///websites/vnn.mac.in.th/newspaper/template_manager/index.html
```

### 2. Load Sample Data

Click the **"📊 Load Sample Data"** button to load the latest advertisement from your database.

### 3. Design Your Newsletter

- Use drag-and-drop blocks from the left panel
- The default template is already loaded with placeholders
- Customize colors, fonts, and layout
- Preview in different screen sizes (Desktop/Tablet/Mobile)

### 4. Insert Database Fields

1. Click **"🏷️ Insert Fields"** button
2. Select a field to insert (e.g., company name, meeting date)
3. The {{field_name}} placeholder will be inserted
4. Click **"📊 Load Sample Data"** to see actual values

### 5. Save Your Template

Click **"💾 Save Template"** to save your design for later use.

### 6. Export HTML

Click **"📤 Export HTML"** to download the newsletter as HTML file.

## � Available Database Fields

All fields from the `placard` table:

| Field | Description | Example |
|-------|-------------|---------|
| `{{id}}` | รหัสประกาศ | 123 |
| `{{companyname}}` | ชื่อบริษัท | บริษัท ตัวอย่าง จำกัด (มหาชน) |
| `{{title}}` | หัวข้อ | การประชุมสามัญผู้ถือหุ้น |
| `{{meeting_number}}` | ครั้งที่ | 1/2567 |
| `{{placard_to}}` | เรียน | ท่านผู้ถือหุ้น |
| `{{content}}` | เนื้อหา | เรียน ท่านผู้ถือหุ้น... |
| `{{meeting_agenda}}` | วาระการประชุม | 1. รับรองรายงาน... |
| `{{meeting_date}}` | วันที่ประชุม | 2026-04-28 |
| `{{meeting_date_thai}}` | วันที่ประชุม (ไทย) | 28 เมษายน 2569 |
| `{{meeting_time}}` | เวลาประชุม | 14:00:00 |
| `{{meeting_time_formatted}}` | เวลาประชุม (จัดรูปแบบ) | 14:00 น. |
| `{{meeting_place}}` | สถานที่ประชุม | ห้องประชุมใหญ่ ชั้น 5 |
| `{{placard_date}}` | วันที่ลงโฆษณา | 2026-05-08 |
| `{{placard_date_thai}}` | วันที่ลงโฆษณา (ไทย) | 8 พฤษภาคม 2569 |
| `{{email}}` | อีเมล | user@company.com |
| `{{ad_type}}` | ประเภท | template/fullpage |
| `{{status}}` | สถานะ | approved |

## 🎨 Pre-built Blocks

### Newsletter Components

- **Sections**: 100%, 50/50, 30/70 layouts
- **Text**: Thai text blocks with proper fonts
- **Images**: Image blocks
- **Buttons**: Call-to-action buttons
- **Dividers**: Horizontal lines
- **Links**: Styled links

### Custom Blocks

- **หัวบริษัท**: Company header with styling
- **ข้อมูลการประชุม**: Meeting information block
- **วาระการประชุม**: Meeting agenda block
- **ข้อความไทย**: Thai text with Sarabun font

## 💡 How It Works

### 1. Database Integration

The editor loads data from your `placard` table using PHP API:

```php
// api/get_sample_ad.php
SELECT * FROM placard 
WHERE status = 'approved' 
ORDER BY id DESC 
LIMIT 1
```

### 2. Template Placeholders

Use double curly braces for dynamic content:

```html
<h1>{{companyname}}</h1>
<p>เรียน {{placard_to}}</p>
<p>ครั้งที่ {{meeting_number}}</p>
```

### 3. Automatic Replacement

When you click "Load Sample Data", placeholders are replaced:

```
{{companyname}} → บริษัท ตัวอย่าง จำกัด (มหาชน)
{{meeting_number}} → 1/2567
{{meeting_date_thai}} → 28 เมษายน 2569
```

### 4. Save & Reuse

Templates are saved as JSON files with:
- HTML structure
- CSS styles  
- GrapesJS editor data
- Timestamps

## 🎯 Use Cases

### 1. Create Standard Newsletter Template

1. Open editor
2. Design the layout with placeholders
3. Save as "standard_meeting"
4. Reuse for all meetings

### 2. Multi-page Newsletter

1. Create page 1 (cover) - save as "cover_template"
2. Create page 2 (details) - save as "details_template"
3. Create page 3 (agenda) - save as "agenda_template"
4. Export each as HTML

### 3. Generate for Specific Advertisement

1. Load specific ad data (modify API to accept ID)
2. Placeholders auto-fill
3. Export as HTML
4. Convert to PDF using wkhtmltopdf or similar

## 🔧 Integration with Existing System

### Option 1: HTML to PDF

Use the exported HTML with a converter:

```bash
# Using wkhtmltopdf
wkhtmltopdf newsletter.html newsletter.pdf

# Using Python weasyprint
python -m weasyprint newsletter.html newsletter.pdf
```

### Option 2: Direct Integration

Modify your PHP script to use templates:

```php
// Load template
$template = file_get_contents('saved_templates/standard_meeting.json');
$data = json_decode($template, true);
$html = $data['html'];

// Replace placeholders with actual data
$ad = getAdvertisementById($id);
foreach ($ad as $key => $value) {
    $html = str_replace('{{'.$key.'}}', $value, $html);
}

// Generate PDF
// ... your PDF generation code
```

## 📝 Template Format

Saved templates are JSON files:

```json
{
    "name": "standard_meeting",
    "html": "<table>...</table>",
    "css": "body { font-family: Sarabun; }",
    "gjs_data": { ... },
    "created_at": "2026-05-08 10:00:00",
    "updated_at": "2026-05-08 10:30:00"
}
```

## 🛠️ Customization

### Add Custom Blocks

Edit `index.html` and add to `addCustomBlocks()`:

```javascript
blockManager.add('my-custom-block', {
    label: 'My Block',
    category: 'Newsletter',
    content: '<div>Custom content with {{field}}</div>'
});
```

### Add More Fields

Modify `api/get_sample_ad.php` to include additional fields:

```php
$sql = "SELECT *, 
        custom_field1,
        custom_field2
        FROM placard ...";
```

### Change Fonts

Update the fonts in `index.html`:

```html
<link href="https://fonts.googleapis.com/css2?family=YourFont&display=swap">
```

## 🆘 Troubleshooting

### Database Connection Error

Make sure `includes/database.php` and `includes/config.php` are configured properly.

### No Sample Data

The API will create dummy data if database is empty. Add real data to the `placard` table.

### Templates Not Saving

Check that `saved_templates/` directory exists and is writable:

```bash
mkdir -p /websites/vnn.mac.in.th/newspaper/template_manager/saved_templates
chmod 755 /websites/vnn.mac.in.th/newspaper/template_manager/saved_templates
```

### Thai Characters Not Displaying

Ensure your HTML includes Thai fonts:

```html
<link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;600;700&family=Prompt:wght@400;600;700&display=swap">
```

## 📚 Resources

- **GrapesJS Docs**: https://grapesjs.com/docs/
- **Newsletter Preset**: https://github.com/artf/grapesjs-preset-newsletter
- **Thai Fonts**: Google Fonts (Sarabun, Prompt)

## 🔄 Migration from Old System

The old Python-based template manager has been replaced with this visual editor. Benefits:

- ✅ Visual editing (no code required)
- ✅ Live preview
- ✅ Database integration
- ✅ Save/load templates
- ✅ Better Thai font support
- ✅ Responsive design
- ✅ Export to HTML

## 📄 License

Part of VNN Newspaper System

---

**Need help?** Open `index.html` in your browser and start designing! 🎨
