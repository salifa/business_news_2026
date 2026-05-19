// Newsletter Application - Main JavaScript File

// Configuration
const config = {
    apiBaseUrl: '/newspaper/api/newsletter-data.php', // API endpoint
    dataSourceUrl: 'data.json', // Fallback JSON data source
    pdfSourceUrl: '', // PDF file to attach
    issueNumber: '001',
    useAPI: true // Use API instead of JSON file
};

// Get newspaper ID from URL parameters
function getNewspaperIdFromURL() {
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.get('id') || urlParams.get('newspaper_id') || urlParams.get('date') || null;
}

// Initialize the application
document.addEventListener('DOMContentLoaded', function() {
    initializeDates();
    loadNewsletterData();
    initializeMenu();
});

// Initialize dates
function initializeDates() {
    const now = new Date();
    const options = { year: 'numeric', month: 'long', day: 'numeric' };
    const dateString = now.toLocaleDateString('th-TH', options);
    
    // Update all date elements
    const dateElements = document.querySelectorAll('#current-date, #letter-date');
    dateElements.forEach(el => el.textContent = dateString);
    
    const fullDateElements = document.querySelectorAll('#letter-date-full');
    fullDateElements.forEach(el => el.textContent = dateString);
    
    // Update year (Buddhist Era)
    const yearElements = document.querySelectorAll('#current-year, .current-year');
    yearElements.forEach(el => el.textContent = now.getFullYear() + 543);
    
    // Update issue number
    const issueEl = document.getElementById('issue-number');
    if (issueEl) issueEl.textContent = config.issueNumber;
}

// Load newsletter data from API or JSON
async function loadNewsletterData() {
    try {
        let data;
        
        if (config.useAPI) {
            // Load from API
            const newspaperId = getNewspaperIdFromURL();
            let apiUrl = config.apiBaseUrl;
            
            if (newspaperId) {
                // Check if it's a date or ID
                if (newspaperId.includes('-')) {
                    apiUrl += '?date=' + encodeURIComponent(newspaperId);
                } else {
                    apiUrl += '?id=' + encodeURIComponent(newspaperId);
                }
            }
            
            const response = await fetch(apiUrl);
            const result = await response.json();
            
            if (!result.success) {
                throw new Error(result.error || 'Failed to load newsletter');
            }
            
            data = result.data;
            
            // Update issue number from API
            if (data.issueNumber) {
                config.issueNumber = data.issueNumber;
            }
        } else {
            // Load from JSON file
            const response = await fetch(config.dataSourceUrl);
            data = await response.json();
        }
        
        // Render content
        if (data.coverPage) {
            renderCoverPage(data.coverPage);
        }
        
        if (data.letterPages) {
            renderLetterPages(data.letterPages);
        }
        
        if (data.pdfAttachments && data.pdfAttachments.length > 0) {
            renderPDFPages(data.pdfAttachments);
        }
        
        if (data.pdfAdvertisements && data.pdfAdvertisements.length > 0) {
            renderPDFAdvertisements(data.pdfAdvertisements);
        }
        
    } catch (error) {
        console.error('Error loading newsletter data:', error);
        showErrorMessage('ไม่สามารถโหลดข้อมูลจดหมายข่าวได้: ' + error.message);
        loadSampleData(); // Fallback to sample data
    }
}

// Show error message to user
function showErrorMessage(message) {
    const errorDiv = document.createElement('div');
    errorDiv.className = 'error-banner';
    errorDiv.innerHTML = `
        <div class="error-content">
            <span class="error-icon">⚠️</span>
            <span class="error-text">${message}</span>
            <button onclick="this.parentElement.parentElement.remove()" class="error-close">×</button>
        </div>
    `;
    document.body.insertBefore(errorDiv, document.body.firstChild);
}

// Render cover page with data
function renderCoverPage(coverData) {
    // Main headline
    const headlineEl = document.getElementById('main-headline');
    if (headlineEl && coverData.headline) {
        headlineEl.textContent = coverData.headline;
    }
    
    // Sub-headline
    const subHeadlineEl = document.getElementById('sub-headline');
    if (subHeadlineEl && coverData.subHeadline) {
        subHeadlineEl.textContent = coverData.subHeadline;
    }
    
    // Cover image
    const coverImageEl = document.querySelector('#cover-image img');
    if (coverImageEl && coverData.coverImage) {
        coverImageEl.src = coverData.coverImage;
        coverImageEl.alt = coverData.headline || 'Cover Story';
    }
    
    // Stories list
    const storiesListEl = document.getElementById('cover-stories-list');
    if (storiesListEl && coverData.stories) {
        storiesListEl.innerHTML = '';
        coverData.stories.forEach(story => {
            const li = document.createElement('li');
            li.textContent = story;
            storiesListEl.appendChild(li);
        });
    }
    
    // Highlight cards
    if (coverData.highlights) {
        coverData.highlights.forEach((highlight, index) => {
            const cardEl = document.getElementById(`highlight-${index + 1}`);
            if (cardEl) {
                const img = cardEl.querySelector('img');
                const h4 = cardEl.querySelector('h4');
                const p = cardEl.querySelector('p');
                
                if (img && highlight.image) img.src = highlight.image;
                if (h4 && highlight.title) h4.textContent = highlight.title;
                if (p && highlight.description) p.textContent = highlight.description;
            }
        });
    }
}

// Render letter pages from JSON data
function renderLetterPages(letterPages) {
    const container = document.getElementById('dynamic-pages-container');
    if (!container) return;
    
    // Track menu items to add
    const menuItemsToAdd = [];
    
    letterPages.forEach((page, pageIndex) => {
        if (pageIndex === 0) {
            // Update first letter page (page-1)
            updateFirstLetterPage(page);
        } else if (pageIndex === 1) {
            // Update second letter page (page-2)
            updateLetterPageByNumber(page, 2);
        } else if (pageIndex === 2) {
            // Update third letter page (page-3)
            updateLetterPageByNumber(page, 3);
        } else {
            // Create new letter pages for 4+
            const pageDiv = createLetterPage(page, pageIndex + 2);
            container.appendChild(pageDiv);
            
            // Add to menu items list
            if (page.menuTitle) {
                menuItemsToAdd.push({
                    id: `page-${pageIndex + 1}`,
                    title: page.menuTitle,
                    icon: page.menuIcon || '📄'
                });
            }
        }
    });
    
    // Update menu with dynamic pages
    updateMenuWithDynamicPages(menuItemsToAdd);
}

// Update letter page by number
function updateLetterPageByNumber(pageData, pageNumber) {
    const pageEl = document.getElementById(`page-${pageNumber}`);
    if (!pageEl) return;
    
    const letterBodyEl = document.getElementById(`letter-body-${pageNumber}`);
    if (!letterBodyEl) return;
    
    // Update content
    letterBodyEl.innerHTML = '';
    
    if (pageData.showLetterhead) {
        const letterhead = document.createElement('div');
        letterhead.className = 'letterhead';
        letterhead.innerHTML = `
            <div class="company-info">
                <h2>${pageData.companyName || ''}</h2>
                <p>${pageData.companyAddress || ''}</p>
            </div>
        `;
        letterBodyEl.parentElement.insertBefore(letterhead, letterBodyEl);
    }
    
    letterBodyEl.innerHTML = formatLetterContent(pageData.content);
}

// Update the first letter page template
function updateFirstLetterPage(pageData) {
    // Company info
    const companyNameEl = document.getElementById('company-name');
    if (companyNameEl && pageData.companyName) {
        companyNameEl.textContent = pageData.companyName;
    }
    
    const companyAddressEl = document.getElementById('company-address');
    if (companyAddressEl && pageData.companyAddress) {
        companyAddressEl.textContent = pageData.companyAddress;
    }
    
    // Letter body
    const letterBodyEl = document.getElementById('letter-body-1');
    if (letterBodyEl && pageData.content) {
        letterBodyEl.innerHTML = formatLetterContent(pageData.content);
    }
}

// Create a new letter page
function createLetterPage(pageData, pageNumber) {
    const pageDiv = document.createElement('div');
    pageDiv.className = 'page letter-page';
    pageDiv.id = `page-${pageNumber}`;
    
    pageDiv.innerHTML = `
        <header class="fixed-header">
            <div class="header-content">
                <div class="logo">
                    <h1>วารสารบัญชีไทย</h1>
                </div>
                <div class="header-info">
                    <span class="letter-date">${getCurrentDateString()}</span>
                </div>
            </div>
        </header>

        <main class="letter-content">
            ${pageData.showLetterhead ? `
            <div class="letterhead">
                <div class="company-info">
                    <h2>${pageData.companyName || ''}</h2>
                    <p>${pageData.companyAddress || ''}</p>
                </div>
            </div>
            ` : ''}
            
            <div class="letter-body">
                ${formatLetterContent(pageData.content)}
            </div>
        </main>

        <footer class="fixed-footer">
            <div class="footer-content">
                <div class="footer-left">
                    <p>&copy; ${new Date().getFullYear() + 543} วารสารบัญชีไทย. สงวนลิขสิทธิ์.</p>
                </div>
                <div class="footer-center">
                    <p>www.thaiaccounting.com | info@thaiaccounting.com</p>
                </div>
                <div class="footer-right">
                    <p>หน้า <span class="page-number">${pageNumber}</span></p>
                </div>
            </div>
        </footer>
    `;
    
    return pageDiv;
}

// Format letter content from JSON
function formatLetterContent(content) {
    if (typeof content === 'string') {
        return content;
    }
    
    let html = '';
    
    if (content.greeting) {
        html += `<p class="greeting">${content.greeting}</p>`;
    }
    
    if (content.paragraphs) {
        content.paragraphs.forEach(para => {
            if (typeof para === 'string') {
                html += `<p>${para}</p>`;
            } else if (para.type === 'heading') {
                html += `<h3>${para.text}</h3>`;
            } else if (para.type === 'subheading') {
                html += `<h4>${para.text}</h4>`;
            } else if (para.type === 'list') {
                html += '<ul>';
                para.items.forEach(item => {
                    html += `<li>${item}</li>`;
                });
                html += '</ul>';
            } else if (para.type === 'table') {
                html += createTable(para.data);
            } else if (para.type === 'highlight') {
                html += `<div class="highlight-box">${para.text}</div>`;
            }
        });
    }
    
    if (content.closing) {
        html += `<div class="closing"><p>${content.closing}</p></div>`;
    }
    
    if (content.signature) {
        html += `
            <div class="signature">
                <p class="signature-name">${content.signature.name}</p>
                <p class="signature-title">${content.signature.title}</p>
            </div>
        `;
    }
    
    return html;
}

// Create HTML table from data
function createTable(tableData) {
    let html = '<table class="data-table">';
    
    // Headers
    if (tableData.headers) {
        html += '<thead><tr>';
        tableData.headers.forEach(header => {
            html += `<th>${header}</th>`;
        });
        html += '</tr></thead>';
    }
    
    // Rows
    if (tableData.rows) {
        html += '<tbody>';
        tableData.rows.forEach(row => {
            html += '<tr>';
            row.forEach(cell => {
                html += `<td>${cell}</td>`;
            });
            html += '</tr>';
        });
        html += '</tbody>';
    }
    
    html += '</table>';
    return html;
}

// Configure PDF.js worker (do this once at startup)
if (typeof pdfjsLib !== 'undefined') {
    pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.worker.min.js';
}

// Render PDF pages
async function renderPDFPages(pdfAttachments) {
    const container = document.getElementById('pdf-pages-container');
    if (!container) return;
    
    for (const attachment of pdfAttachments) {
        try {
            await renderPDF(attachment.url, container, attachment.title);
        } catch (error) {
            console.error('Error rendering PDF:', error);
        }
    }
}

// Render full-page PDF advertisements (no headers/footers)
async function renderPDFAdvertisements(pdfAds) {
    const container = document.getElementById('pdf-ads-container');
    if (!container) return;
    
    for (const ad of pdfAds) {
        try {
            await renderFullPagePDF(ad.url, container, ad.title);
        } catch (error) {
            console.error('Error rendering PDF advertisement:', error);
        }
    }
}

// Render a single PDF as full-page advertisement
async function renderFullPagePDF(pdfUrl, container, title) {
    try {
        const loadingTask = pdfjsLib.getDocument(pdfUrl);
        const pdf = await loadingTask.promise;
        
        const numPages = pdf.numPages;
        
        for (let pageNum = 1; pageNum <= numPages; pageNum++) {
            const page = await pdf.getPage(pageNum);
            
            // Create page container for full-page display
            const pageDiv = document.createElement('div');
            pageDiv.className = 'page pdf-ad-page';
            pageDiv.setAttribute('data-ad-title', title || 'Advertisement');
            
            // Create canvas container that fills the page
            const canvasContainer = document.createElement('div');
            canvasContainer.className = 'pdf-ad-canvas-container';
            
            const canvas = document.createElement('canvas');
            const context = canvas.getContext('2d');
            
            // Calculate scale to fit A4 page (8.5in x 11in at 96 DPI)
            const pageWidth = 8.5 * 96; // 816px
            const pageHeight = 11 * 96; // 1056px
            
            const viewport = page.getViewport({ scale: 1 });
            const scale = Math.min(
                pageWidth / viewport.width,
                pageHeight / viewport.height
            );
            
            const scaledViewport = page.getViewport({ scale });
            
            canvas.height = scaledViewport.height;
            canvas.width = scaledViewport.width;
            
            canvasContainer.appendChild(canvas);
            pageDiv.appendChild(canvasContainer);
            
            container.appendChild(pageDiv);
            
            // Render PDF page
            const renderContext = {
                canvasContext: context,
                viewport: scaledViewport
            };
            await page.render(renderContext).promise;
        }
    } catch (error) {
        console.error('Error loading PDF advertisement:', error);
        // Show error message in page
        const errorDiv = document.createElement('div');
        errorDiv.className = 'page pdf-ad-page pdf-error';
        errorDiv.innerHTML = `
            <div class="error-message">
                <h3>⚠️ ไม่สามารถโหลดโฆษณา PDF</h3>
                <p>กรุณาตรวจสอบ URL ของไฟล์: ${pdfUrl}</p>
            </div>
        `;
        container.appendChild(errorDiv);
    }
}

// Render a single PDF file
async function renderPDF(pdfUrl, container, title) {
    try {
        const loadingTask = pdfjsLib.getDocument(pdfUrl);
        const pdf = await loadingTask.promise;
        
        const numPages = pdf.numPages;
        
        for (let pageNum = 1; pageNum <= numPages; pageNum++) {
            const page = await pdf.getPage(pageNum);
            const scale = 1.5;
            const viewport = page.getViewport({ scale });
            
            // Create page container
            const pageDiv = document.createElement('div');
            pageDiv.className = 'page pdf-page';
            
            // Add header
            const header = createPDFPageHeader(title || 'Attachment');
            pageDiv.appendChild(header);
            
            // Create canvas
            const canvasContainer = document.createElement('div');
            canvasContainer.className = 'pdf-canvas-container';
            
            const canvas = document.createElement('canvas');
            const context = canvas.getContext('2d');
            canvas.height = viewport.height;
            canvas.width = viewport.width;
            
            canvasContainer.appendChild(canvas);
            pageDiv.appendChild(canvasContainer);
            
            // Add footer
            const footer = createPDFPageFooter(pageNum + 100); // Offset page numbers
            pageDiv.appendChild(footer);
            
            container.appendChild(pageDiv);
            
            // Render PDF page
            const renderContext = {
                canvasContext: context,
                viewport: viewport
            };
            await page.render(renderContext).promise;
        }
    } catch (error) {
        console.error('Error loading PDF:', error);
    }
}

// Create header for PDF page
function createPDFPageHeader(title) {
    const header = document.createElement('header');
    header.className = 'fixed-header';
    header.innerHTML = `
        <div class="header-content">
            <div class="logo">
                <h1>วารสารบัญชีไทย</h1>
            </div>
            <div class="header-info">
                <span>${title}</span>
            </div>
        </div>
    `;
    return header;
}

// Create footer for PDF page
function createPDFPageFooter(pageNumber) {
    const footer = document.createElement('footer');
    footer.className = 'fixed-footer';
    footer.innerHTML = `
        <div class="footer-content">
            <div class="footer-left">
                <p>&copy; ${new Date().getFullYear() + 543} วารสารบัญชีไทย. สงวนลิขสิทธิ์.</p>
            </div>
            <div class="footer-center">
                <p>www.thaiaccounting.com | info@thaiaccounting.com</p>
            </div>
            <div class="footer-right">
                <p>หน้า <span class="page-number">${pageNumber}</span></p>
            </div>
        </div>
    `;
    return footer;
}

// Utility function to get current date string
function getCurrentDateString() {
    const now = new Date();
    const options = { year: 'numeric', month: 'long', day: 'numeric' };
    return now.toLocaleDateString('th-TH', options);
}

// Update menu with dynamically added pages
function updateMenuWithDynamicPages(menuItems) {
    const menuContainer = document.querySelector('.menu-items');
    if (!menuContainer || menuItems.length === 0) return;
    
    menuItems.forEach(item => {
        const menuItem = document.createElement('a');
        menuItem.href = `#${item.id}`;
        menuItem.className = 'menu-item';
        menuItem.setAttribute('data-page', item.id);
        menuItem.innerHTML = `
            <span class="icon">${item.icon}</span>
            <span class="label">${item.title}</span>
        `;
        
        // Add click handler for smooth scroll
        menuItem.addEventListener('click', function(e) {
            e.preventDefault();
            document.querySelectorAll('.menu-item').forEach(mi => mi.classList.remove('active'));
            this.classList.add('active');
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
        
        menuContainer.appendChild(menuItem);
    });
}

// Load sample data if JSON fetch fails
function loadSampleData() {
    const sampleData = {
        coverPage: {
            headline: "Tax Reform 2026: Major Changes for Accountants",
            subHeadline: "New regulations reshape the accounting landscape",
            coverImage: "https://via.placeholder.com/800x400/1a472a/ffffff?text=Tax+Reform+2026",
            stories: [
                "Understanding the New Tax Code",
                "GAAP Updates You Need to Know",
                "Automation in Accounting: A Guide",
                "Best Practices for Financial Reporting",
                "Upcoming CPE Requirements"
            ],
            highlights: [
                {
                    title: "Digital Transformation",
                    description: "How AI is changing accounting practices",
                    image: "https://via.placeholder.com/300x150/2c5f2d/ffffff?text=AI"
                },
                {
                    title: "Compliance Updates",
                    description: "New SEC regulations for 2026",
                    image: "https://via.placeholder.com/300x150/2c5f2d/ffffff?text=SEC"
                },
                {
                    title: "Client Advisory",
                    description: "Expanding your service offerings",
                    image: "https://via.placeholder.com/300x150/2c5f2d/ffffff?text=Advisory"
                }
            ]
        },
        letterPages: [
            {
                companyName: "Accounting Today Editorial Team",
                companyAddress: "123 Finance Street, New York, NY 10001",
                content: {
                    greeting: "Dear Valued Readers,",
                    paragraphs: [
                        "We are pleased to present this month's edition of Accounting Today, featuring comprehensive coverage of the latest developments in the accounting profession.",
                        {
                            type: "heading",
                            text: "This Month's Highlights"
                        },
                        "The accounting landscape continues to evolve rapidly, with new technologies and regulations reshaping how we approach our work. In this issue, we explore the most significant changes and their implications for your practice.",
                        {
                            type: "subheading",
                            text: "Key Topics Covered:"
                        },
                        {
                            type: "list",
                            items: [
                                "Tax reform implementation strategies",
                                "Latest FASB pronouncements",
                                "Technology adoption in small firms",
                                "Best practices for remote audit procedures",
                                "Continuing education opportunities"
                            ]
                        },
                        {
                            type: "highlight",
                            text: "Special Feature: Our analysis shows that firms implementing AI-driven tools have seen a 35% increase in efficiency while maintaining high accuracy standards."
                        },
                        "We encourage you to explore each article thoroughly and reach out with any questions or feedback. Your engagement helps us continue to provide relevant, timely content for the profession."
                    ],
                    closing: "Thank you for your continued readership.",
                    signature: {
                        name: "Sarah Johnson, CPA",
                        title: "Editor-in-Chief, Accounting Today"
                    }
                }
            },
            {
                companyName: "Accounting Today",
                companyAddress: "",
                showLetterhead: false,
                content: {
                    paragraphs: [
                        {
                            type: "heading",
                            text: "Financial Performance Analysis Q1 2026"
                        },
                        "The following table summarizes key financial metrics from our recent industry survey:",
                        {
                            type: "table",
                            data: {
                                headers: ["Metric", "Q1 2025", "Q1 2026", "Change (%)"],
                                rows: [
                                    ["Average Revenue per Client", "$15,250", "$17,800", "+16.7%"],
                                    ["Client Retention Rate", "92%", "94%", "+2.2%"],
                                    ["Technology Investment", "$45,000", "$68,000", "+51.1%"],
                                    ["Staff Utilization Rate", "78%", "82%", "+5.1%"]
                                ]
                            }
                        },
                        "These metrics indicate a healthy growth trajectory for the industry, with particular emphasis on technology adoption driving efficiency gains.",
                        {
                            type: "subheading",
                            text: "Looking Ahead"
                        },
                        "As we move into the second quarter, industry experts predict continued momentum in digital transformation initiatives. Firms that invest in training and technology infrastructure are positioning themselves for long-term success."
                    ]
                }
            }
        ],
        pdfAttachments: []
    };
    
    renderCoverPage(sampleData.coverPage);
    renderLetterPages(sampleData.letterPages);
}

// Print functionality
function printNewsletter() {
    window.print();
}

// Save to PDF functionality using html2pdf library
function saveToPDF() {
    // Get references
    const sidebar = document.querySelector('.sidebar-menu');
    const content = document.querySelector('.content-wrapper');
    const fab = document.querySelector('.menu-toggle-fab');
    const issueNumber = document.getElementById('issue-number')?.textContent || '001';
    
    // Store original states
    const sidebarWasHidden = sidebar?.classList.contains('hidden');
    const contentWasExpanded = content?.classList.contains('menu-hidden');
    
    // Temporarily hide sidebar for clean PDF
    if (sidebar && !sidebarWasHidden) {
        sidebar.classList.add('hidden');
        content?.classList.add('menu-hidden');
        if (fab) fab.classList.add('visible');
    }
    
    // Add print-specific class to body
    document.body.classList.add('preparing-pdf');
    
    // Set document title for PDF filename
    const originalTitle = document.title;
    document.title = `วารสารบัญชีไทย-ฉบับที่-${issueNumber}`;
    
    // Small delay to let CSS apply
    setTimeout(() => {
        // Trigger browser print dialog (user can save as PDF)
        window.print();
        
        // Restore everything after print dialog closes
        setTimeout(() => {
            document.title = originalTitle;
            document.body.classList.remove('preparing-pdf');
            
            // Restore sidebar to original state
            if (!sidebarWasHidden && sidebar) {
                sidebar.classList.remove('hidden');
                content?.classList.remove('menu-hidden');
                if (fab) fab.classList.remove('visible');
            }
        }, 500);
    }, 100);
}

// Toggle sidebar menu
function toggleMenu() {
    const sidebar = document.querySelector('.sidebar-menu');
    const content = document.querySelector('.content-wrapper');
    const fab = document.querySelector('.menu-toggle-fab');
    const toggleBtn = document.getElementById('toggle-menu-btn');
    
    if (sidebar.classList.contains('hidden')) {
        // Show menu
        sidebar.classList.remove('hidden');
        content.classList.remove('menu-hidden');
        if (fab) fab.classList.remove('visible');
        if (toggleBtn) {
            toggleBtn.innerHTML = '<span class="icon">👁️</span><span class="label">ซ่อนเมนู</span>';
        }
    } else {
        // Hide menu
        sidebar.classList.add('hidden');
        content.classList.add('menu-hidden');
        if (fab) fab.classList.add('visible');
        if (toggleBtn) {
            toggleBtn.innerHTML = '<span class="icon">👁️</span><span class="label">แสดงเมนู</span>';
        }
    }
}

// Initialize menu functionality
function initializeMenu() {
    // Update issue number in menu
    const menuIssueEl = document.getElementById('menu-issue-number');
    const issueEl = document.getElementById('issue-number');
    if (menuIssueEl && issueEl) {
        menuIssueEl.textContent = issueEl.textContent;
    }

    // Add scroll spy for menu items
    const menuItems = document.querySelectorAll('.menu-item');
    const pages = document.querySelectorAll('.page');

    // Create floating toggle button for when menu is hidden
    const fab = document.createElement('button');
    fab.className = 'menu-toggle-fab';
    fab.innerHTML = '☰';
    fab.onclick = toggleMenu;
    fab.title = 'แสดงเมนู';
    document.body.appendChild(fab);

    // Smooth scroll for menu items
    menuItems.forEach(item => {
        item.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Remove active class from all items
            menuItems.forEach(mi => mi.classList.remove('active'));
            
            // Add active class to clicked item
            this.classList.add('active');
            
            // Scroll to page
            const pageId = this.getAttribute('href');
            const targetPage = document.querySelector(pageId);
            if (targetPage) {
                targetPage.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });

    // Highlight active menu item based on scroll position
    window.addEventListener('scroll', function() {
        let current = '';
        
        pages.forEach(page => {
            const pageTop = page.offsetTop;
            const pageHeight = page.clientHeight;
            if (window.pageYOffset >= pageTop - 200) {
                current = page.getAttribute('id');
            }
        });

        menuItems.forEach(item => {
            item.classList.remove('active');
            const href = item.getAttribute('href');
            if (href === '#' + current) {
                item.classList.add('active');
            }
        });
    });
}

// Export to PDF functionality (fallback)
function exportToPDF() {
    saveToPDF();
}

// Make functions available globally
window.printNewsletter = printNewsletter;
window.saveToPDF = saveToPDF;
window.exportToPDF = exportToPDF;
window.toggleMenu = toggleMenu;
