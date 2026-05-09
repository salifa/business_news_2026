"""
Template Manager Package
Organized PDF template and generation system
"""

from .templates.layout_config import TemplateLayouts
from .generators.pdf_generator import PDFGenerator
from .utils.pdf_merger import PDFMerger

__all__ = ['TemplateLayouts', 'PDFGenerator', 'PDFMerger']
__version__ = '1.0.0'
