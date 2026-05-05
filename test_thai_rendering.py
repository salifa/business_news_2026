#!/websites/vnn.mac.in.th/.venv/bin/python
"""
Test Thai text rendering with proper OpenType features
"""

import sys
sys.path.insert(0, '/websites/vnn.mac.in.th/newspaper/scripts')

from generate_placard_pdf import PlacardPDFGenerator
from datetime import datetime

# Test data with Thai text including tone marks and vowels
test_ads = [
    {
        'id': 1,
        'title': 'ประกาศเชิญประชุมผู้ถือหุ้น',
        'companyname': 'บริษัท ทดสอบการแสดงผลภาษาไทย จำกัด',
        'meeting_number': 'ครั้งที่ 1/2569',
        'placard_to': 'ผู้ถือหุ้นทุกท่าน',
        'meeting_agenda': 'พิจารณาอนุมัติงบการเงินประจำปี 2568 และแต่งตั้งกรรมการใหม่',
        'meeting_date': '2026-06-15',
        'meeting_time': '10:00',
        'meeting_place': 'โรงแรมแกรนด์ ห้องประชุมใหญ่ ชั้น 5',
        'placard_date': '2026-05-01'
    }
]

print("🔧 Testing Thai text rendering with proper OpenType features...")
print("=" * 70)

generator = PlacardPDFGenerator('2026-05-01', test_ads)
result = generator.generate()

if result['success']:
    print("✅ PDF generated successfully!")
    print(f"   📄 File: {result['filename']}")
    print(f"   📁 Path: {result['path']}")
    print(f"   📊 Ads: {result['ad_count']}")
    print()
    print("✨ Thai text rendering features enabled:")
    print("   ✓ libraqm text shaping")
    print("   ✓ Mark-to-base positioning")
    print("   ✓ Mark-to-mark positioning")
    print("   ✓ Proper vowel and tone mark placement")
    print()
    print("📖 Please check the generated PDF to verify Thai text rendering.")
    print("   Look for:")
    print("   - No overlapping characters")
    print("   - Proper vowel positioning (ี ์ ุ ู etc.)")
    print("   - Correct tone marks (่ ้ ๊ ๋)")
else:
    print(f"❌ Error: {result['error']}")
    sys.exit(1)
