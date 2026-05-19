# Accounting Newsletter - Print Media Online

A professional newsletter system for accounting-related content with print-ready formatting, dynamic content loading from JSON, and PDF attachment support.

## Features

- **Cover Page**: Eye-catching cover with fixed header/footer, headlines, featured images, and story highlights
- **Letter Format Pages**: Corporate letter-style pages with professional formatting
- **Dynamic Content**: Load content from JSON database/API
- **PDF Integration**: Embed PDF attachments as additional pages
- **PDF Advertisements**: Full-page PDF advertisements (no headers/footers) for paid advertising space
- **Print Ready**: Optimized for printing with proper page breaks and fixed headers/footers
- **Responsive Design**: Works on screen and maintains formatting when printed
- **Thai Language Support**: Full Thai language support with Google Fonts (Prompt)
- **Buddhist Era Calendar**: Automatic date conversion to Buddhist Era (พ.ศ.)

## File Structure

```
news_letter2/
├── index.html                      # Main HTML file with page templates
├── styles.css                      # All styling including print media queries
├── script.js                       # JavaScript for dynamic content and PDF rendering
├── data.json                       # Sample JSON data structure
├── create-ad-pdf.html              # Tool to create test PDF advertisements
├── README.md                       # This file
├── PDF-ADVERTISEMENT-GUIDE.md      # Detailed PDF advertisement documentation
├── IMAGE-GUIDE.md                  # Image sourcing and optimization guide
├── setup-guide.html                # Interactive setup guide
├── package.json                    # NPM configuration for local server
└── database-integration-examples.js # Backend integration examples
```

## Quick Start

1. **Open the newsletter**:
   - Simply open `index.html` in a web browser
   - Or use a local server (recommended):
     ```bash
     python -m http.server 8000
     # Then open http://localhost:8000
     ```

2. **View the newsletter**:
   - The newsletter will load with sample data automatically
   - Fixed header and footer appear on all pages

3. **Print or Export to PDF**:
   - Use browser's print function (Ctrl+P or Cmd+P)
   - Select "Save as PDF" as destination
   - Ensure "Background graphics" is enabled

## Customizing Content

### Using JSON Data

Edit `data.json` to customize your newsletter content. The structure includes:

#### Cover Page Configuration
```json
{
  "coverPage": {
    "headline": "Your Main Headline",
    "subHeadline": "Subtitle text",
    "coverImage": "path/to/image.jpg",
    "stories": ["Story 1", "Story 2", ...],
    "highlights": [
      {
        "title": "Highlight Title",
        "description": "Brief description",
        "image": "path/to/image.jpg"
      }
    ]
  }
}
```

#### Letter Pages Configuration
```json
{
  "letterPages": [
    {
      "companyName": "Your Company",
      "companyAddress": "Company Address",
      "showLetterhead": true,
      "content": {
        "greeting": "Dear Readers,",
        "paragraphs": [
          "Regular paragraph text",
          {
            "type": "heading",
            "text": "Section Heading"
          },
          {
            "type": "list",
            "items": ["Item 1", "Item 2"]
          },
          {
            "type": "table",
            "data": {
              "headers": ["Col1", "Col2"],
              "rows": [["Data1", "Data2"]]
            }
          }
        ],
        "closing": "Best regards,",
        "signature": {
          "name": "John Doe",
          "title": "Position"
        }
      }
    }
  ]
}
```

### Content Types Supported

The letter pages support various content types:

- **Paragraphs**: Simple text paragraphs
- **Headings**: Section headers (`type: "heading"`)
- **Subheadings**: Subsection headers (`type: "subheading"`)
- **Lists**: Bullet point lists (`type: "list"`)
- **Tables**: Data tables with headers and rows (`type: "table"`)
- **Highlight Boxes**: Emphasized content (`type: "highlight"`)

### Adding PDF Attachments

Add PDF files to the newsletter by configuring the `pdfAttachments` array:

```json
{
  "pdfAttachments": [
    {
      "title": "Tax Tables 2026",
      "url": "path/to/your-pdf.pdf",
      "description": "Description of the PDF content"
    }
  ]
}
```

**Note**: PDF files must be accessible from the web page. Place them in the same directory or provide a full URL.

## Connecting to Database

To load data from a database instead of a static JSON file:

1. **Create an API endpoint** that returns JSON in the format specified above
2. **Update the data source** in `script.js`:
   ```javascript
   const config = {
       dataSourceUrl: 'https://your-api.com/newsletter-data',
       // or for local API:
       // dataSourceUrl: '/api/newsletter/latest'
   };
   ```

3. **Example API Response Format**:
   Your API should return JSON matching the structure in `data.json`

4. **CORS Considerations**: Ensure your API allows cross-origin requests if hosted on a different domain

### Database Integration Examples

#### Node.js/Express Backend
```javascript
app.get('/api/newsletter/:id', async (req, res) => {
  const newsletter = await db.newsletters.findById(req.params.id);
  res.json({
    issueNumber: newsletter.issue,
    coverPage: newsletter.cover,
    letterPages: newsletter.pages,
    pdfAttachments: newsletter.attachments
  });
});
```

#### PHP Backend
```php
header('Content-Type: application/json');
$newsletter = getNewsletterData($id);
echo json_encode($newsletter);
```

## Customization

### Changing Colors

Edit the CSS variables in `styles.css`:

```css
:root {
    --primary-color: #1a472a;      /* Dark green */
    --secondary-color: #2c5f2d;    /* Medium green */
    --accent-color: #c9a961;       /* Gold */
    --text-color: #333;            /* Dark gray */
}
```

### Adjusting Header/Footer Size

Modify the header and footer heights in `styles.css`:

```css
:root {
    --header-height: 80px;
    --footer-height: 60px;
}
```

### Customizing Layout

- **Cover page layout**: Edit `.cover-content` class in `styles.css`
- **Letter page margins**: Adjust padding in `.letter-content` class
- **Font styles**: Change `font-family` properties

## PDF Advertisement Integration

### Overview

The newsletter supports **full-page PDF advertisements** that display without headers or footers. These are perfect for paid advertising space and appear after the main content pages.

### Adding PDF Advertisements

Add the `pdfAdvertisements` array to your `data.json`:

```json
{
  "pdfAdvertisements": [
    {
      "title": "CloudBooks Accounting Software",
      "url": "https://example.com/ads/cloudbooks-ad.pdf",
      "description": "Full page advertisement"
    }
  ]
}
```

### Creating Test Advertisements

1. **Open** `create-ad-pdf.html` in your browser
2. **Click** "สร้าง PDF" button
3. **Save** the PDF to `ads/dummy-ad.pdf`
4. **Update** `data.json` to use your local PDF:
   ```json
   {
     "url": "ads/dummy-ad.pdf"
   }
   ```

### PDF Requirements

- **Format**: PDF (any version)
- **Size**: A4 or US Letter (8.5" × 11")
- **Orientation**: Portrait
- **Resolution**: 300 DPI recommended
- **File Size**: Under 5MB for fast loading

### API Integration

Your API should include the `pdfAdvertisements` array:

```javascript
{
  "coverPage": {...},
  "letterPages": [...],
  "pdfAttachments": [...],
  "pdfAdvertisements": [
    {
      "title": "Sponsor Ad",
      "url": "https://cdn.example.com/ads/current-sponsor.pdf"
    }
  ]
}
```

**Note:** For external PDFs, ensure CORS is enabled on your server.

📚 **See [PDF-ADVERTISEMENT-GUIDE.md](PDF-ADVERTISEMENT-GUIDE.md) for detailed documentation**

## Print Optimization

The newsletter is optimized for printing with:

- **Page size**: US Letter (8.5" × 11")
- **Fixed positioning**: Headers and footers stay in place on each page
- **Page breaks**: Automatic breaks between pages, avoiding content splitting
- **Background graphics**: Ensure this is enabled in print settings

### Print Settings Recommendations

When printing or saving as PDF:
- **Paper size**: Letter (8.5" × 11")
- **Margins**: None (0mm) - headers/footers have built-in margins
- **Background graphics**: Enabled
- **Scale**: 100%

## Image Guidelines

For best results with images:

- **Cover image**: 800×400 pixels minimum (2:1 ratio)
- **Highlight cards**: 300×150 pixels minimum (2:1 ratio)
- **Format**: JPG or PNG
- **File size**: Keep under 500KB for faster loading

### Using Your Own Images

Replace placeholder images with your own:

1. Add images to your project directory
2. Update image paths in `data.json`:
   ```json
   "coverImage": "images/my-cover.jpg"
   ```

## Browser Compatibility

Tested and working on:
- Chrome/Edge (recommended)
- Firefox
- Safari

**Note**: For PDF rendering, modern browsers with ES6 support are required.

## Troubleshooting

### Images Not Loading
- Check image paths are correct relative to `index.html`
- Ensure images are accessible (check file permissions)
- Try using absolute URLs for testing

### PDF Not Rendering
- Verify PDF.js library is loading (check browser console)
- Ensure PDF file is accessible from the web page
- Check PDF file is not corrupted

### Print Layout Issues
- Enable "Background graphics" in print dialog
- Set margins to "None" or "Minimum"
- Try different browsers if issues persist

### Data Not Loading
- Check browser console for errors
- Verify `data.json` is valid JSON (use a JSON validator)
- Ensure web server is serving JSON files correctly

## Advanced Features

### Dynamic Page Numbers

Page numbers are automatically assigned:
- Cover page: Page 1
- Letter pages: Pages 2, 3, 4...
- PDF pages: Pages 100+

### Multiple Newsletters

To create multiple newsletters:
1. Create separate JSON files (e.g., `data-january.json`, `data-february.json`)
2. Pass the issue as a URL parameter: `index.html?issue=january`
3. Modify `script.js` to read the parameter and load the correct JSON

### Custom Headers/Footers Per Page

You can customize headers/footers for specific pages by modifying the page generation functions in `script.js`.

## Development

### Adding New Content Types

To add new content types to letter pages:

1. Add the type to your JSON structure
2. Add a handler in the `formatLetterContent()` function in `script.js`
3. Add corresponding CSS styling in `styles.css`

Example for a new "quote" type:
```javascript
else if (para.type === 'quote') {
    html += `<blockquote class="quote">${para.text}</blockquote>`;
}
```

### Styling Tips

- Use relative units (em, rem) for better print scaling
- Test print layout frequently during development
- Use `page-break-inside: avoid` for elements that shouldn't split across pages

## License

This project is provided as-is for use in creating accounting newsletters and similar print media content.

## Support

For issues or questions:
1. Check the troubleshooting section above
2. Review browser console for error messages
3. Validate your JSON data structure

## Future Enhancements

Potential features to add:
- Interactive elements for web viewing
- Email export functionality
- Template selection system
- Real-time preview editor
- Multi-language support
- Archive system for past issues

---

**Version**: 1.0  
**Last Updated**: May 2026
