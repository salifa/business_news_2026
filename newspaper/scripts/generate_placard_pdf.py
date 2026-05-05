#!/websites/vnn.mac.in.th/.venv/bin/python
"""
Placard PDF Generator
Generates newspaper-style PDF with advertisements using ReportLab
Enhanced with proper Thai text rendering using libraqm for mark-to-mark and mark-to-base positioning
"""

import sys
import os
import json
import io
from datetime import datetime, timedelta
from pathlib import Path

from reportlab.lib.pagesizes import A4
from reportlab.lib.units import mm, cm
from reportlab.pdfgen import canvas
from reportlab.lib import colors
from reportlab.lib.utils import ImageReader
from reportlab.pdfbase import pdfmetrics
from reportlab.pdfbase.ttfonts import TTFont
from reportlab.platypus import Paragraph, Frame
from reportlab.lib.styles import ParagraphStyle
from PIL import Image, ImageDraw, ImageFont, features
import PyPDF2

# Configuration
UPLOAD_PATH = '/websites/vnn.mac.in.th/newspaper/uploads/'
OUTPUT_PATH = '/websites/vnn.mac.in.th/newspaper/generated_pdfs/'
FONTS_PATH = '/websites/vnn.mac.in.th/newspaper/fonts/'
LOGO_PATH = '/websites/vnn.mac.in.th/newspaper/assets/images/newspaper_logo.png'

# Font names
FONT_PROMPT_BOLD = 'Prompt-Bold'
FONT_SARABUN = 'Sarabun-Regular'
FONT_SARABUN_BOLD = 'Sarabun-Bold'

# Page dimensions
PAGE_WIDTH, PAGE_HEIGHT = A4
MARGIN_LEFT = 15*mm
MARGIN_RIGHT = 15*mm
MARGIN_TOP = 15*mm
MARGIN_BOTTOM = 15*mm


class ThaiTextRenderer:
    """
    Renders Thai text with proper OpenType features using Pillow + libraqm
    Supports mark-to-mark and mark-to-base positioning for correct vowel/tone mark placement
    High resolution rendering at 300 DPI for crisp text in PDFs
    """
    
    # DPI settings for high-quality PDF output
    RENDER_DPI = 300  # High resolution for PDF
    PDF_DPI = 72      # PDF standard DPI
    
    def __init__(self, fonts_path):
        self.fonts_path = fonts_path
        self.fonts_cache = {}
        
        # Check libraqm support
        if not features.check('raqm'):
            print("WARNING: libraqm not available. Thai text may not render correctly.")
        else:
            print("✓ libraqm enabled - Thai text will render with proper OpenType features")
            print(f"✓ Rendering at {self.RENDER_DPI} DPI for high-quality output")
    
    def render_text_to_image(self, text, font_name, font_size, color=(0, 0, 0)):
        """
        Render Thai text to image with proper OpenType shaping at 300 DPI
        Returns PIL Image object
        
        Args:
            text: Text to render
            font_name: Font name
            font_size: Font size in points (PDF points, 72 DPI)
            color: RGB tuple
        """
        # Scale font size for high DPI rendering
        # Convert from 72 DPI (PDF points) to 300 DPI (high res)
        scale_factor = self.RENDER_DPI / self.PDF_DPI  # 300/72 = 4.167
        scaled_font_size = int(font_size * scale_factor)
        
        # Get scaled font
        cache_key = f"{font_name}_{scaled_font_size}"
        if cache_key not in self.fonts_cache:
            font_file_map = {
                'Prompt-Bold': 'Prompt-Bold.ttf',
                'Sarabun-Regular': 'Sarabun-Regular.ttf',
                'Sarabun-Bold': 'Sarabun-Bold.ttf'
            }
            font_file = font_file_map.get(font_name, 'Sarabun-Regular.ttf')
            font_path = os.path.join(self.fonts_path, font_file)
            try:
                self.fonts_cache[cache_key] = ImageFont.truetype(font_path, scaled_font_size)
            except Exception as e:
                print(f"Error loading font {font_path}: {e}")
                self.fonts_cache[cache_key] = ImageFont.load_default()
        
        pil_font = self.fonts_cache[cache_key]
        
        # Get text bounding box with proper shaping
        # libraqm will handle mark-to-mark and mark-to-base positioning
        temp_img = Image.new('RGBA', (1, 1), (255, 255, 255, 0))
        temp_draw = ImageDraw.Draw(temp_img)
        
        # Get accurate text size with shaping
        bbox = temp_draw.textbbox((0, 0), text, font=pil_font)
        text_width = bbox[2] - bbox[0]
        text_height = bbox[3] - bbox[1]
        
        # Add padding for marks that extend beyond base characters (scaled for high DPI)
        padding_x = int(scaled_font_size * 0.2)
        padding_y = int(scaled_font_size * 0.5)
        
        # Create image with transparent background at 300 DPI
        img_width = text_width + padding_x * 2
        img_height = text_height + padding_y * 2
        
        img = Image.new('RGBA', (img_width, img_height), (255, 255, 255, 0))
        
        # Set DPI metadata for proper scaling
        img.info['dpi'] = (self.RENDER_DPI, self.RENDER_DPI)
        
        draw = ImageDraw.Draw(img)
        
        # Draw text with proper positioning for marks
        # The libraqm library will handle all OpenType features
        x_pos = padding_x - bbox[0]
        y_pos = padding_y - bbox[1]
        draw.text((x_pos, y_pos), text, font=pil_font, fill=color)
        
        return img
    
    def draw_text_on_canvas(self, canvas_obj, text, x, y, font_name, font_size, 
                           color=(0, 0, 0), align='left'):
        """
        Draw Thai text on ReportLab canvas using properly shaped image
        
        Args:
            canvas_obj: ReportLab canvas
            text: Text to draw
            x, y: Position in points
            font_name: Font name (Prompt-Bold, Sarabun-Regular, etc.)
            font_size: Font size in points
            color: RGB tuple (0-255) or ReportLab color
            align: 'left', 'center', or 'right'
        """
        # Convert ReportLab color to RGB if needed
        if hasattr(color, 'rgb'):
            rgb_color = (int(color.red * 255), int(color.green * 255), int(color.blue * 255))
        elif isinstance(color, tuple) and len(color) == 3:
            rgb_color = color
        else:
            rgb_color = (0, 0, 0)
        
        # Render text to image with proper shaping at 300 DPI
        text_img = self.render_text_to_image(text, font_name, font_size, rgb_color)
        
        # Convert pixels to points using 300 DPI
        # At 300 DPI: 1 point = 300/72 pixels = 4.167 pixels
        # So: points = pixels * 72/300
        img_width_points = text_img.width * self.PDF_DPI / self.RENDER_DPI
        img_height_points = text_img.height * self.PDF_DPI / self.RENDER_DPI
        
        if align == 'center':
            x = x - img_width_points / 2
        elif align == 'right':
            x = x - img_width_points
        
        # Adjust y position (ReportLab uses bottom-left origin)
        y = y - img_height_points * 0.3  # Adjust for baseline
        
        # Convert PIL Image to ImageReader for ReportLab
        img_buffer = io.BytesIO()
        # Save as PNG with high quality
        text_img.save(img_buffer, format='PNG', dpi=(self.RENDER_DPI, self.RENDER_DPI))
        img_buffer.seek(0)
        img_reader = ImageReader(img_buffer)
        
        # Draw on canvas with proper dimensions
        canvas_obj.drawImage(img_reader, x, y, 
                            width=img_width_points, 
                            height=img_height_points,
                            mask='auto')


class PlacardPDFGenerator:
    def __init__(self, issue_date, ads_data):
        """
        Initialize PDF generator
        
        Args:
            issue_date: Date of the issue (YYYY-MM-DD)
            ads_data: List of advertisement dictionaries
        """
        self.issue_date = datetime.strptime(issue_date, '%Y-%m-%d')
        self.ads_data = ads_data
        self.output_filename = f"placard_{issue_date}.pdf"
        self.output_path = os.path.join(OUTPUT_PATH, self.output_filename)
        
        # Initialize Thai text renderer for proper mark positioning
        self.thai_renderer = ThaiTextRenderer(FONTS_PATH)
        
        # Register fonts (still needed for Paragraph objects)
        self._register_fonts()
        
    def _register_fonts(self):
        """Register Thai fonts for ReportLab"""
        try:
            # Register Prompt Bold
            pdfmetrics.registerFont(TTFont(FONT_PROMPT_BOLD, 
                os.path.join(FONTS_PATH, 'Prompt-Bold.ttf')))
            
            # Register Sarabun
            pdfmetrics.registerFont(TTFont(FONT_SARABUN, 
                os.path.join(FONTS_PATH, 'Sarabun-Regular.ttf')))
            pdfmetrics.registerFont(TTFont(FONT_SARABUN_BOLD, 
                os.path.join(FONTS_PATH, 'Sarabun-Bold.ttf')))
                
        except Exception as e:
            print(f"Warning: Could not load fonts: {e}")
            # Fallback to Helvetica
            self.FONT_PROMPT_BOLD = 'Helvetica-Bold'
            self.FONT_SARABUN = 'Helvetica'
            self.FONT_SARABUN_BOLD = 'Helvetica-Bold'
    
    def generate(self):
        """Generate the complete PDF"""
        try:
            # Create output directory if not exists
            os.makedirs(OUTPUT_PATH, exist_ok=True)
            
            # Create temporary PDF
            temp_pdf = os.path.join(OUTPUT_PATH, f'temp_{self.output_filename}')
            c = canvas.Canvas(temp_pdf, pagesize=A4)
            
            # Generate cover page
            self._draw_cover_page(c)
            c.showPage()
            
            # Generate advertisement pages
            self._generate_ad_pages(c)
            
            # Save temporary PDF
            c.save()
            
            # Merge with uploaded PDFs if any
            self._merge_uploaded_pdfs(temp_pdf)
            
            # Clean up temp file
            if os.path.exists(temp_pdf) and temp_pdf != self.output_path:
                os.remove(temp_pdf)
            
            return {
                'success': True,
                'filename': self.output_filename,
                'path': self.output_path,
                'ad_count': len(self.ads_data)
            }
            
        except Exception as e:
            return {
                'success': False,
                'error': str(e)
            }
    
    def _draw_cover_page(self, c):
        """Draw the cover page with newspaper header and date"""
        
        # Draw logo if exists
        if os.path.exists(LOGO_PATH):
            try:
                logo = ImageReader(LOGO_PATH)
                c.drawImage(logo, PAGE_WIDTH/2 - 50*mm, PAGE_HEIGHT - 80*mm, 
                           width=100*mm, height=40*mm, preserveAspectRatio=True)
            except:
                pass
        
        # Newspaper name - using Thai renderer for proper mark positioning
        self.thai_renderer.draw_text_on_canvas(
            c, "หนังสือพิมพ์ข่าวสารนักบัญชี", 
            PAGE_WIDTH/2, PAGE_HEIGHT - 90*mm,
            'Prompt-Bold', 28, (0, 0, 0), align='center'
        )
        
        self.thai_renderer.draw_text_on_canvas(
            c, "VNNBIZS.COM",
            PAGE_WIDTH/2, PAGE_HEIGHT - 100*mm,
            'Prompt-Bold', 18, (0, 0, 0), align='center'
        )
        
        # Issue date
        thai_months = ['', 'มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 
                      'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม',
                      'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม']
        
        thai_date = f"{self.issue_date.day} {thai_months[self.issue_date.month]} {self.issue_date.year + 543}"
        
        self.thai_renderer.draw_text_on_canvas(
            c, f"ฉบับวันที่ {thai_date}",
            PAGE_WIDTH/2, PAGE_HEIGHT - 120*mm,
            'Sarabun-Bold', 20, (0, 0, 0), align='center'
        )
        
        # Draw decorative line
        c.setStrokeColor(colors.HexColor('#1E40AF'))
        c.setLineWidth(2)
        c.line(MARGIN_LEFT, PAGE_HEIGHT - 130*mm, 
               PAGE_WIDTH - MARGIN_RIGHT, PAGE_HEIGHT - 130*mm)
        
        # Issue information box
        box_y = PAGE_HEIGHT - 160*mm
        c.setFillColor(colors.HexColor('#EFF6FF'))
        c.roundRect(MARGIN_LEFT + 20*mm, box_y - 40*mm, 
                   PAGE_WIDTH - MARGIN_LEFT - MARGIN_RIGHT - 40*mm, 
                   35*mm, 5*mm, fill=1, stroke=0)
        
        info_lines = [
            "ฉบับนี้รวมประกาศโฆษณา",
            f"จำนวนทั้งสิ้น {len(self.ads_data)} รายการ",
            "",
            "เอกสารนี้มีผลทางกฎหมายสำหรับการบัญชี",
            "และการประชุมผู้ถือหุ้น"
        ]
        
        y_pos = box_y - 10*mm
        for line in info_lines:
            if line:  # Skip empty lines
                self.thai_renderer.draw_text_on_canvas(
                    c, line,
                    PAGE_WIDTH/2, y_pos,
                    'Sarabun-Regular', 14, (0, 0, 0), align='center'
                )
            y_pos -= 6*mm
        
        # Footer
        self.thai_renderer.draw_text_on_canvas(
            c, "สำนักงาน: อ่อนนุช พัฒนาการ สมุทรปราการ | โทร: 02-XXX-XXXX",
            PAGE_WIDTH/2, MARGIN_BOTTOM + 10*mm,
            'Sarabun-Regular', 10, (128, 128, 128), align='center'
        )
        self.thai_renderer.draw_text_on_canvas(
            c, "Website: https://vnn.mac.in.th | Email: info@vnn.mac.in.th",
            PAGE_WIDTH/2, MARGIN_BOTTOM + 5*mm,
            'Sarabun-Regular', 10, (128, 128, 128), align='center'
        )
    
    def _generate_ad_pages(self, c):
        """Generate pages with advertisements"""
        
        for idx, ad in enumerate(self.ads_data, 1):
            # Check if we need to add this as uploaded PDF or generate it
            if ad.get('pdf_file1'):
                # Skip for now, will be merged later
                continue
            
            # Draw advertisement using template style (single size only)
            # Note: System no longer supports fullpage ads - all ads use template style
            self._draw_template_ad(c, ad, idx)
            
            c.showPage()
    
    def _draw_fullpage_ad(self, c, ad, ad_number):
        """Draw a full-page advertisement (DEPRECATED - kept for backward compatibility)"""
        # This method is deprecated but kept for backward compatibility
        # All ads now use template style regardless of ad_type
        # If called, redirect to template style
        self._draw_template_ad(c, ad, ad_number)
        return
        
        # Old fullpage code below (no longer used)
        # Header
        c.setFont(FONT_PROMPT_BOLD, 10)
        c.drawString(MARGIN_LEFT, PAGE_HEIGHT - 10*mm, "หนังสือพิมพ์ข่าวสารนักบัญชี")
        c.drawCentredString(PAGE_WIDTH/2, PAGE_HEIGHT - 10*mm, "VNNBIZS.COM")
        
        thai_date = self._format_thai_date(self.issue_date)
        c.drawRightString(PAGE_WIDTH - MARGIN_RIGHT, PAGE_HEIGHT - 10*mm, thai_date)
        
        # Line under header
        c.setStrokeColor(colors.black)
        c.setLineWidth(0.5)
        c.line(MARGIN_LEFT, PAGE_HEIGHT - 12*mm, 
               PAGE_WIDTH - MARGIN_RIGHT, PAGE_HEIGHT - 12*mm)
        
        # Advertisement content area
        content_top = PAGE_HEIGHT - 20*mm
        content_height = PAGE_HEIGHT - 40*mm
        
        # Draw image if exists
        if ad.get('image1'):
            image_path = os.path.join(UPLOAD_PATH, ad['image1'])
            if os.path.exists(image_path):
                self._draw_image_centered(c, image_path, 
                                         MARGIN_LEFT, content_top - content_height,
                                         PAGE_WIDTH - MARGIN_LEFT - MARGIN_RIGHT,
                                         content_height)
        
        # Ad number at bottom
        c.setFont(FONT_SARABUN, 8)
        c.setFillColor(colors.grey)
        c.drawRightString(PAGE_WIDTH - MARGIN_RIGHT, MARGIN_BOTTOM,
                         f"ประกาศที่ {ad_number}")
    
    def _draw_template_ad(self, c, ad, ad_number):
        """Draw a template-based advertisement with company meeting info"""
        
        # Header - using Thai renderer for proper mark positioning
        self.thai_renderer.draw_text_on_canvas(
            c, "หนังสือพิมพ์ข่าวสารนักบัญชี",
            MARGIN_LEFT, PAGE_HEIGHT - 10*mm,
            'Prompt-Bold', 10, (0, 0, 0), align='left'
        )
        
        self.thai_renderer.draw_text_on_canvas(
            c, "VNNBIZS.COM",
            PAGE_WIDTH/2, PAGE_HEIGHT - 10*mm,
            'Prompt-Bold', 10, (0, 0, 0), align='center'
        )
        
        thai_date = self._format_thai_date(self.issue_date)
        self.thai_renderer.draw_text_on_canvas(
            c, thai_date,
            PAGE_WIDTH - MARGIN_RIGHT, PAGE_HEIGHT - 10*mm,
            'Prompt-Bold', 10, (0, 0, 0), align='right'
        )
        
        c.setStrokeColor(colors.black)
        c.setLineWidth(0.5)
        c.line(MARGIN_LEFT, PAGE_HEIGHT - 12*mm, 
               PAGE_WIDTH - MARGIN_RIGHT, PAGE_HEIGHT - 12*mm)
        
        # Advertisement title
        y_pos = PAGE_HEIGHT - 25*mm
        
        title = ad.get('title', 'ประกาศเชิญประชุม')
        self.thai_renderer.draw_text_on_canvas(
            c, title,
            PAGE_WIDTH/2, y_pos,
            'Prompt-Bold', 16, colors.HexColor('#1E40AF'), align='center'
        )
        
        y_pos -= 10*mm
        
        # Company name
        if ad.get('companyname'):
            self.thai_renderer.draw_text_on_canvas(
                c, ad['companyname'],
                PAGE_WIDTH/2, y_pos,
                'Sarabun-Bold', 14, (0, 0, 0), align='center'
            )
            y_pos -= 8*mm
        
        # Meeting info box
        box_y = y_pos - 5*mm
        box_height = 80*mm
        
        c.setFillColor(colors.HexColor('#F3F4F6'))
        c.roundRect(MARGIN_LEFT + 10*mm, box_y - box_height,
                   PAGE_WIDTH - MARGIN_LEFT - MARGIN_RIGHT - 20*mm,
                   box_height, 3*mm, fill=1, stroke=1)
        
        # Meeting details
        details_y = box_y - 10*mm
        left_x = MARGIN_LEFT + 15*mm
        
        # Meeting number
        if ad.get('meeting_number'):
            self.thai_renderer.draw_text_on_canvas(
                c, f"ครั้งที่: {ad['meeting_number']}",
                left_x, details_y,
                'Sarabun-Regular', 12, (0, 0, 0), align='left'
            )
            details_y -= 7*mm
        
        # To whom
        if ad.get('placard_to'):
            self.thai_renderer.draw_text_on_canvas(
                c, f"เรียน: {ad['placard_to']}",
                left_x, details_y,
                'Sarabun-Regular', 12, (0, 0, 0), align='left'
            )
            details_y -= 7*mm
        
        # Agenda
        if ad.get('meeting_agenda'):
            self.thai_renderer.draw_text_on_canvas(
                c, "วาระการประชุม:",
                left_x, details_y,
                'Sarabun-Regular', 12, (0, 0, 0), align='left'
            )
            details_y -= 6*mm
            
            # Wrap agenda text using Paragraph (still uses TTFont but better than nothing)
            # TODO: Future improvement - render agenda text with Thai renderer too
            agenda_style = ParagraphStyle(
                'agenda',
                fontName=FONT_SARABUN,
                fontSize=11,
                leading=14
            )
            agenda_frame = Frame(left_x, details_y - 30*mm,
                               PAGE_WIDTH - left_x - MARGIN_RIGHT - 15*mm,
                               30*mm, showBoundary=0)
            agenda_para = Paragraph(ad['meeting_agenda'], agenda_style)
            agenda_frame.addFromList([agenda_para], c)
            details_y -= 35*mm
        
        # Meeting date and time
        if ad.get('meeting_date'):
            meeting_date = self._format_thai_date(
                datetime.strptime(ad['meeting_date'], '%Y-%m-%d'))
            self.thai_renderer.draw_text_on_canvas(
                c, f"วันที่: {meeting_date}",
                left_x, details_y,
                'Sarabun-Regular', 12, (0, 0, 0), align='left'
            )
            details_y -= 7*mm
        
        if ad.get('meeting_time'):
            self.thai_renderer.draw_text_on_canvas(
                c, f"เวลา: {ad['meeting_time']} น.",
                left_x, details_y,
                'Sarabun-Regular', 12, (0, 0, 0), align='left'
            )
            details_y -= 7*mm
        
        # Meeting place
        if ad.get('meeting_place'):
            self.thai_renderer.draw_text_on_canvas(
                c, f"สถานที่: {ad['meeting_place']}",
                left_x, details_y,
                'Sarabun-Regular', 12, (0, 0, 0), align='left'
            )
        
        # Image if exists (smaller, at bottom)
        if ad.get('image1'):
            image_path = os.path.join(UPLOAD_PATH, ad['image1'])
            if os.path.exists(image_path):
                img_y = box_y - box_height - 60*mm
                self._draw_image_centered(c, image_path,
                                        MARGIN_LEFT + 30*mm, img_y,
                                        PAGE_WIDTH - MARGIN_LEFT - MARGIN_RIGHT - 60*mm,
                                        50*mm)
        
        # Footer
        self.thai_renderer.draw_text_on_canvas(
            c, f"ประกาศที่ {ad_number} | วันที่ลงประกาศ: {ad.get('placard_date', '')}",
            PAGE_WIDTH - MARGIN_RIGHT, MARGIN_BOTTOM,
            'Sarabun-Regular', 8, (128, 128, 128), align='right'
        )
    
    def _draw_image_centered(self, c, image_path, x, y, max_width, max_height):
        """Draw image centered within bounds"""
        try:
            img = Image.open(image_path)
            img_width, img_height = img.size
            
            # Calculate scaling
            scale = min(max_width / img_width, max_height / img_height)
            new_width = img_width * scale
            new_height = img_height * scale
            
            # Center the image
            x_offset = x + (max_width - new_width) / 2
            y_offset = y + (max_height - new_height) / 2
            
            c.drawImage(image_path, x_offset, y_offset, 
                       width=new_width, height=new_height,
                       preserveAspectRatio=True)
        except Exception as e:
            print(f"Error drawing image {image_path}: {e}")
    
    def _merge_uploaded_pdfs(self, base_pdf):
        """Merge uploaded customer PDFs into the bulletin"""
        pdf_merger = PyPDF2.PdfMerger()
        
        try:
            # Add base PDF (cover + template ads)
            pdf_merger.append(base_pdf)
            
            # Add uploaded PDFs
            for ad in self.ads_data:
                if ad.get('pdf_file1'):
                    pdf_path = os.path.join(UPLOAD_PATH, ad['pdf_file1'])
                    if os.path.exists(pdf_path):
                        try:
                            pdf_merger.append(pdf_path)
                        except Exception as e:
                            print(f"Error merging PDF {pdf_path}: {e}")
            
            # Write merged PDF
            with open(self.output_path, 'wb') as output_file:
                pdf_merger.write(output_file)
            
            pdf_merger.close()
            
        except Exception as e:
            # If merge fails, just copy base PDF
            print(f"PDF merge error: {e}")
            if base_pdf != self.output_path:
                import shutil
                shutil.copy(base_pdf, self.output_path)
    
    def _format_thai_date(self, date_obj):
        """Format date in Thai"""
        thai_months = ['', 'ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 
                      'พ.ค.', 'มิ.ย.', 'ก.ค.', 'ส.ค.',
                      'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.']
        return f"{date_obj.day} {thai_months[date_obj.month]} {date_obj.year + 543}"


def main():
    """Main function to generate PDF from command line arguments"""
    if len(sys.argv) < 3:
        print(json.dumps({
            'success': False,
            'error': 'Usage: generate_placard_pdf.py <issue_date> <ads_json>'
        }))
        sys.exit(1)
    
    issue_date = sys.argv[1]
    ads_json = sys.argv[2]
    
    try:
        ads_data = json.loads(ads_json)
        
        generator = PlacardPDFGenerator(issue_date, ads_data)
        result = generator.generate()
        
        print(json.dumps(result))
        sys.exit(0 if result['success'] else 1)
        
    except Exception as e:
        print(json.dumps({
            'success': False,
            'error': str(e)
        }))
        sys.exit(1)


if __name__ == '__main__':
    main()
