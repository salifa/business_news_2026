#!/websites/vnn.mac.in.th/.venv/bin/python
"""
PDF Coordinate Converter
Helps convert between different coordinate systems for PDF generation
"""

from reportlab.lib.pagesizes import A4
from reportlab.lib.units import mm, cm, inch

class CoordinateConverter:
    """Convert between different PDF coordinate systems"""
    
    def __init__(self):
        self.page_width, self.page_height = A4
        self.page_width_mm = self.page_width / mm
        self.page_height_mm = self.page_height / mm
        
    def print_page_info(self):
        """Print A4 page dimensions in various units"""
        print("╔═══════════════════════════════════════════════════════╗")
        print("║       PDF COORDINATE CONVERTER - A4 Page Info        ║")
        print("╚═══════════════════════════════════════════════════════╝\n")
        
        print("A4 Page Dimensions:")
        print(f"  Points:      {self.page_width:.2f} × {self.page_height:.2f} pt")
        print(f"  Millimeters: {self.page_width_mm:.2f} × {self.page_height_mm:.2f} mm")
        print(f"  Centimeters: {self.page_width/cm:.2f} × {self.page_height/cm:.2f} cm")
        print(f"  Inches:      {self.page_width/inch:.2f} × {self.page_height/inch:.2f} in")
        print()
        
    def top_to_bottom(self, y_from_top_mm):
        """
        Convert Y coordinate from top-origin (HTML/CSS) to bottom-origin (ReportLab)
        
        Args:
            y_from_top_mm: Y position in mm from top of page
            
        Returns:
            Y position in mm from bottom of page (for ReportLab)
        """
        return self.page_height_mm - y_from_top_mm
    
    def bottom_to_top(self, y_from_bottom_mm):
        """
        Convert Y coordinate from bottom-origin (ReportLab) to top-origin (HTML/CSS)
        
        Args:
            y_from_bottom_mm: Y position in mm from bottom of page
            
        Returns:
            Y position in mm from top of page (for HTML/CSS)
        """
        return self.page_height_mm - y_from_bottom_mm
    
    def mm_to_points(self, value_mm):
        """Convert millimeters to points"""
        return value_mm * mm
    
    def points_to_mm(self, value_points):
        """Convert points to millimeters"""
        return value_points / mm
    
    def interactive_converter(self):
        """Interactive coordinate converter"""
        print("\n╔═══════════════════════════════════════════════════════╗")
        print("║           INTERACTIVE COORDINATE CONVERTER           ║")
        print("╚═══════════════════════════════════════════════════════╝\n")
        
        print("Choose conversion type:")
        print("  1. Top-origin (HTML/CSS) → Bottom-origin (ReportLab)")
        print("  2. Bottom-origin (ReportLab) → Top-origin (HTML/CSS)")
        print("  3. Millimeters → Points")
        print("  4. Points → Millimeters")
        print("  5. Calculate bounding box")
        print("  0. Exit")
        print()
        
        while True:
            try:
                choice = input("Select option (0-5): ").strip()
                
                if choice == '0':
                    print("\nGoodbye!")
                    break
                    
                elif choice == '1':
                    y_top = float(input("Enter Y position from top (mm): "))
                    y_bottom = self.top_to_bottom(y_top)
                    print(f"  → ReportLab Y: {y_bottom:.2f}mm ({y_bottom*mm:.2f} points)")
                    print(f"  → Code: {y_bottom:.1f}*mm\n")
                    
                elif choice == '2':
                    y_bottom = float(input("Enter Y position from bottom (mm): "))
                    y_top = self.bottom_to_top(y_bottom)
                    print(f"  → HTML/CSS Y: {y_top:.2f}mm from top")
                    print(f"  → Top position: {y_top:.1f}mm\n")
                    
                elif choice == '3':
                    value_mm = float(input("Enter value in millimeters: "))
                    value_points = self.mm_to_points(value_mm)
                    print(f"  → {value_points:.2f} points")
                    print(f"  → Code: {value_mm:.1f}*mm\n")
                    
                elif choice == '4':
                    value_points = float(input("Enter value in points: "))
                    value_mm = self.points_to_mm(value_points)
                    print(f"  → {value_mm:.2f}mm\n")
                    
                elif choice == '5':
                    print("\nBounding Box Calculator")
                    print("Enter position from TOP of page:")
                    x = float(input("  X (mm from left): "))
                    y = float(input("  Y (mm from top): "))
                    width = float(input("  Width (mm): "))
                    height = float(input("  Height (mm): "))
                    
                    y_bottom = self.top_to_bottom(y + height)
                    
                    print("\n  ReportLab Coordinates:")
                    print(f"    X: {x:.1f}*mm")
                    print(f"    Y: {y_bottom:.1f}*mm  (bottom of box)")
                    print(f"    Width: {width:.1f}*mm")
                    print(f"    Height: {height:.1f}*mm")
                    print("\n  ReportLab Code:")
                    print(f"    c.rect({x:.1f}*mm, {y_bottom:.1f}*mm, {width:.1f}*mm, {height:.1f}*mm)")
                    print(f"    # Top-left corner: ({x:.1f}mm, {y:.1f}mm from top)\n")
                    
                else:
                    print("Invalid choice. Try again.\n")
                    
            except ValueError:
                print("Invalid input. Please enter a number.\n")
            except EOFError:
                print("\nGoodbye!")
                break
            except KeyboardInterrupt:
                print("\n\nGoodbye!")
                break
    
    def batch_convert(self, coordinates_list):
        """
        Convert a batch of coordinates
        
        Args:
            coordinates_list: List of dicts with keys: name, x, y, width, height, font_size
        """
        print("\n╔═══════════════════════════════════════════════════════╗")
        print("║              BATCH COORDINATE CONVERSION             ║")
        print("╚═══════════════════════════════════════════════════════╝\n")
        
        for coord in coordinates_list:
            name = coord.get('name', 'unnamed')
            x = coord.get('x', 0)
            y_top = coord.get('y', 0)
            width = coord.get('width', 0)
            height = coord.get('height', 0)
            font_size = coord.get('font_size', 14)
            
            y_bottom = self.top_to_bottom(y_top + height)
            y_text = self.top_to_bottom(y_top)
            
            print(f"# {name.upper()}")
            print(f"{name.upper()}_X = {x:.1f}*mm")
            print(f"{name.upper()}_Y = {y_bottom:.1f}*mm  # {y_top:.1f}mm from top")
            print(f"{name.upper()}_WIDTH = {width:.1f}*mm")
            print(f"{name.upper()}_HEIGHT = {height:.1f}*mm")
            if font_size:
                print(f"{name.upper()}_FONT_SIZE = {font_size}")
            print()


def demo_usage():
    """Demonstrate common usage patterns"""
    print("\n╔═══════════════════════════════════════════════════════╗")
    print("║                  COMMON USAGE EXAMPLES                ║")
    print("╚═══════════════════════════════════════════════════════╝\n")
    
    conv = CoordinateConverter()
    
    print("Example 1: Place text 50mm from top")
    y = conv.top_to_bottom(50)
    print(f"  c.drawString(20*mm, {y:.1f}*mm, 'Text here')\n")
    
    print("Example 2: Draw rectangle at top 30mm, height 20mm")
    y_top = 30
    height = 20
    y_rect = conv.top_to_bottom(y_top + height)
    print(f"  c.rect(15*mm, {y_rect:.1f}*mm, 180*mm, {height}*mm)")
    print(f"  # Top-left: (15mm, {y_top}mm from top)\n")
    
    print("Example 3: Place image 80mm from top")
    y = conv.top_to_bottom(80)
    print(f"  c.drawImage('image.jpg', 20*mm, {y:.1f}*mm, width=80*mm, height=60*mm)\n")
    
    print("Example 4: Standard margins")
    margin = 15
    content_width = 210 - (margin * 2)
    content_height = 297 - (margin * 2)
    print(f"  MARGIN = {margin}*mm")
    print(f"  CONTENT_WIDTH = {content_width}*mm")
    print(f"  CONTENT_HEIGHT = {content_height}*mm")
    print(f"  CONTENT_LEFT = {margin}*mm")
    print(f"  CONTENT_BOTTOM = {margin}*mm\n")


def generate_template_code():
    """Generate a template code snippet"""
    print("\n╔═══════════════════════════════════════════════════════╗")
    print("║              REPORTLAB TEMPLATE CODE                  ║")
    print("╚═══════════════════════════════════════════════════════╝\n")
    
    code = '''from reportlab.lib.pagesizes import A4
from reportlab.lib.units import mm
from reportlab.pdfgen import canvas

# Page setup
PAGE_WIDTH, PAGE_HEIGHT = A4

# Margins
MARGIN_TOP = 15*mm
MARGIN_BOTTOM = 15*mm
MARGIN_LEFT = 15*mm
MARGIN_RIGHT = 15*mm

# Content area
CONTENT_WIDTH = PAGE_WIDTH - MARGIN_LEFT - MARGIN_RIGHT
CONTENT_HEIGHT = PAGE_HEIGHT - MARGIN_TOP - MARGIN_BOTTOM
CONTENT_LEFT = MARGIN_LEFT
CONTENT_BOTTOM = MARGIN_BOTTOM

# Helper function
def y_from_top(mm_from_top):
    """Convert Y position from top to bottom origin"""
    return PAGE_HEIGHT - (mm_from_top * mm)

# Usage in your PDF generation
def create_pdf(filename):
    c = canvas.Canvas(filename, pagesize=A4)
    
    # Example: Draw text 50mm from top
    c.setFont('Helvetica', 14)
    c.drawString(20*mm, y_from_top(50), 'Text 50mm from top')
    
    # Example: Draw rectangle 30mm from top, 20mm height
    c.rect(15*mm, y_from_top(50), 180*mm, 20*mm)
    
    c.save()
'''
    print(code)


def main():
    """Main function"""
    conv = CoordinateConverter()
    conv.print_page_info()
    
    print("\nWhat would you like to do?")
    print("  1. Interactive converter")
    print("  2. Show usage examples")
    print("  3. Generate template code")
    print("  4. Batch convert coordinates")
    print()
    
    try:
        choice = input("Select option (1-4): ").strip()
        
        if choice == '1':
            conv.interactive_converter()
        elif choice == '2':
            demo_usage()
        elif choice == '3':
            generate_template_code()
        elif choice == '4':
            # Example batch conversion
            coords = [
                {'name': 'header', 'x': 15, 'y': 15, 'width': 180, 'height': 30, 'font_size': 18},
                {'name': 'company_name', 'x': 20, 'y': 50, 'width': 170, 'height': 15, 'font_size': 20},
                {'name': 'content', 'x': 20, 'y': 80, 'width': 170, 'height': 180, 'font_size': 14},
            ]
            conv.batch_convert(coords)
            print("Edit the script to add your own coordinates!")
        else:
            print("Invalid choice")
            
    except (EOFError, KeyboardInterrupt):
        print("\n\nGoodbye!")


if __name__ == '__main__':
    main()
