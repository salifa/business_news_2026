#!/usr/bin/env node
/**
 * Puppeteer PDF Template Generator
 * Input: PHP JSON API URL
 * Output: PDF file path
 *
 * Example:
 * node scripts/generate-newspaper-pdf.js \
 *   --api-url='https://vnn.mac.in.th/newspaper/api/newspaper-data.php?date=2026-04-24&newspaper_id=1&token=...' \
 *   --output='/websites/vnn.mac.in.th/newspaper/public/newspapers/pdf/newspaper-2026-04-24-1.pdf'
 */

const fs = require('fs');
const path = require('path');
const http = require('http');
const https = require('https');
const puppeteer = require('puppeteer');

function getArg(name) {
  const found = process.argv.find((a) => a.startsWith(`${name}=`));
  return found ? found.split('=').slice(1).join('=') : '';
}

function splitAgendaLines(text) {
  const raw = String(text || '')
    .split(/\r?\n/)
    .map((s) => s.trim())
    .filter(Boolean);
  return raw.length > 0 ? raw : ['-'];
}

function fetchJson(url) {
  return new Promise((resolve, reject) => {
    const client = url.startsWith('https://') ? https : http;
    const req = client.get(url, { rejectUnauthorized: false }, (res) => {
      let raw = '';
      res.setEncoding('utf8');
      res.on('data', (chunk) => (raw += chunk));
      res.on('end', () => {
        try {
          const parsed = JSON.parse(raw);
          resolve(parsed);
        } catch (err) {
          reject(new Error(`Invalid JSON from API: ${err.message}\nRaw: ${raw.slice(0, 500)}`));
        }
      });
    });

    req.on('error', reject);
  });
}

function esc(v) {
  if (v === null || v === undefined) return '';
  return String(v)
    .replace(/&/g, '&amp;')
    .replace(/</g, '&lt;')
    .replace(/>/g, '&gt;')
    .replace(/"/g, '&quot;')
    .replace(/'/g, '&#39;');
}

function nl2br(v) {
  return esc(v).replace(/\n/g, '<br>');
}

function buildHtmlModern(data) {
  const meta = data.meta || {};
  const ads = Array.isArray(data.ads) ? data.ads : [];

  const cards = ads
    .map((ad, idx) => {
      const title = ad.title || ad.subject || `ประกาศ #${idx + 1}`;
      const agenda = ad.meeting_agenda || '-';
      const extra = ad.content || '';
      return `
        <article class="ad-card">
          <header class="ad-header">
            <h2>${esc(title)}</h2>
            <span class="tag">${esc(ad.ad_type || 'template')}</span>
          </header>
          <div class="grid">
            <div><strong>บริษัท:</strong> ${esc(ad.companyname || '-')}</div>
            <div><strong>ครั้งที่:</strong> ${esc(ad.meeting_number || '-')}</div>
            <div><strong>ประกาศถึง:</strong> ${esc(ad.placard_to || '-')}</div>
            <div><strong>วันที่:</strong> ${esc(ad.meeting_date || '-')} ${esc(ad.meeting_time || '')}</div>
            <div class="full"><strong>สถานที่:</strong><br>${nl2br(ad.meeting_place || '-')}</div>
          </div>
          <section class="block">
            <h3>วาระการประชุม</h3>
            <p>${nl2br(agenda)}</p>
          </section>
          ${extra ? `<section class="block"><h3>รายละเอียดเพิ่มเติม</h3><p>${nl2br(extra)}</p></section>` : ''}
        </article>
      `;
    })
    .join('\n');

  return `<!doctype html>
<html lang="th">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>หนังสือพิมพ์ประกาศ ${esc(meta.date || '')}</title>
  <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;500;700&display=swap" rel="stylesheet">
  <style>
    @page { size: A4; margin: 12mm; }
    * { box-sizing: border-box; }
    body { font-family: 'Sarabun', sans-serif; margin: 0; color: #111827; }
    .top {
      border: 2px solid #4f46e5;
      border-radius: 10px;
      padding: 14px 16px;
      margin-bottom: 14px;
      background: linear-gradient(135deg, #eef2ff 0%, #f5f3ff 100%);
    }
    .top h1 { margin: 0; font-size: 24px; color: #3730a3; }
    .top p { margin: 4px 0 0; color: #374151; }
    .layout { display: grid; grid-template-columns: 1fr 1fr; gap: 10px; }
    .ad-card {
      border: 1px solid #d1d5db;
      border-radius: 8px;
      padding: 10px;
      break-inside: avoid;
      background: #fff;
    }
    .ad-header {
      display: flex;
      justify-content: space-between;
      align-items: start;
      gap: 8px;
      border-bottom: 1px dashed #d1d5db;
      padding-bottom: 6px;
      margin-bottom: 8px;
    }
    .ad-header h2 { margin: 0; font-size: 17px; color: #1f2937; line-height: 1.3; }
    .tag {
      font-size: 11px;
      background: #e0e7ff;
      color: #3730a3;
      border-radius: 999px;
      padding: 2px 8px;
      white-space: nowrap;
    }
    .grid { display: grid; grid-template-columns: 1fr 1fr; gap: 6px 10px; font-size: 12px; margin-bottom: 8px; }
    .grid .full { grid-column: 1 / -1; }
    .block { background: #f9fafb; border-radius: 6px; padding: 7px; margin-top: 6px; }
    .block h3 { margin: 0 0 4px; font-size: 13px; color: #374151; }
    .block p { margin: 0; white-space: normal; line-height: 1.45; font-size: 12px; }
  </style>
</head>
<body>
  <header class="top">
    <h1>${esc(meta.newspaper_name || 'หนังสือพิมพ์ประกาศ')}</h1>
    <p>วันที่ ${esc(meta.date || '-')} | จำนวนประกาศ ${esc(meta.ad_count || 0)} รายการ</p>
  </header>
  <main class="layout">
    ${cards || '<p>ไม่พบข้อมูลประกาศ</p>'}
  </main>
</body>
</html>`;
}

function buildHtmlFormal(data) {
  const meta = data.meta || {};
  const ads = Array.isArray(data.ads) ? data.ads : [];

  const notices = ads
    .map((ad, idx) => {
      const title = ad.title || ad.subject || `ประกาศ #${idx + 1}`;
      const company = ad.companyname || '-';
      const meetingNo = ad.meeting_number || '-';
      const placardTo = ad.placard_to || '-';
      const meetingDate = ad.meeting_date || '-';
      const meetingTime = ad.meeting_time || '-';
      const meetingPlace = ad.meeting_place || '-';
      const agendaLines = splitAgendaLines(ad.meeting_agenda);
      const agendaHtml = agendaLines.map((line) => `<li>${esc(line)}</li>`).join('');
      const extra = (ad.content || '').trim();

      return `
        <article class="notice">
          <div class="notice-header">
            <div class="paper-name">${esc(meta.newspaper_name || 'หนังสือพิมพ์ประกาศ')}</div>
            <div class="notice-title">${esc(title)}</div>
            <div class="notice-subtitle">ฉบับวันที่ ${esc(meta.date || '-')}</div>
          </div>

          <section class="notice-body">
            <p class="salute"><strong>เรื่อง:</strong> ${esc(title)}</p>
            <p><strong>เรียน:</strong> ${esc(placardTo)}</p>
            <p><strong>ชื่อบริษัท:</strong> ${esc(company)}</p>
            <p><strong>ครั้งที่ประชุม:</strong> ${esc(meetingNo)}</p>

            <div class="meeting-box">
              <div><strong>วันประชุม:</strong> ${esc(meetingDate)}</div>
              <div><strong>เวลา:</strong> ${esc(meetingTime)}</div>
              <div class="full"><strong>สถานที่:</strong> ${nl2br(meetingPlace)}</div>
            </div>

            <div class="agenda-box">
              <h3>วาระการประชุม</h3>
              <ol>${agendaHtml}</ol>
            </div>

            ${extra ? `<div class="extra-box"><h3>รายละเอียดเพิ่มเติม</h3><p>${nl2br(extra)}</p></div>` : ''}
          </section>

          <footer class="notice-footer">
            <div>ผู้ประกาศ: ${esc(company)}</div>
            <div>เลขที่ประกาศ: ${esc(ad.id || '-')}</div>
          </footer>
        </article>
      `;
    })
    .join('\n');

  return `<!doctype html>
<html lang="th">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>หนังสือพิมพ์ประกาศ ${esc(meta.date || '')}</title>
  <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;500;700&display=swap" rel="stylesheet">
  <style>
    @page { size: A4; margin: 10mm 10mm 12mm 10mm; }
    * { box-sizing: border-box; }
    body {
      margin: 0;
      font-family: 'Sarabun', sans-serif;
      font-size: 14px;
      color: #111;
      line-height: 1.55;
      background: #fff;
    }
    .notice {
      border: 2px solid #111;
      padding: 12mm 10mm;
      margin-bottom: 8mm;
      break-inside: avoid;
      page-break-inside: avoid;
      min-height: 126mm;
    }
    .notice-header {
      text-align: center;
      border-bottom: 1.5px solid #111;
      margin-bottom: 10px;
      padding-bottom: 10px;
    }
    .paper-name {
      font-size: 14px;
      letter-spacing: 0.4px;
      margin-bottom: 2px;
    }
    .notice-title {
      font-size: 24px;
      font-weight: 700;
      margin: 2px 0;
    }
    .notice-subtitle {
      font-size: 13px;
    }
    .notice-body p { margin: 4px 0; }
    .salute { margin-top: 0; }
    .meeting-box {
      border: 1px solid #333;
      padding: 8px;
      margin: 10px 0;
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 4px 14px;
    }
    .meeting-box .full { grid-column: 1 / -1; }
    .agenda-box {
      border-top: 1px dashed #444;
      border-bottom: 1px dashed #444;
      padding: 8px 0;
      margin: 8px 0;
    }
    .agenda-box h3,
    .extra-box h3 {
      margin: 0 0 4px;
      font-size: 16px;
    }
    .agenda-box ol {
      margin: 0;
      padding-left: 24px;
    }
    .agenda-box li {
      margin-bottom: 2px;
    }
    .extra-box p { margin: 0; }
    .notice-footer {
      margin-top: 12px;
      padding-top: 8px;
      border-top: 1px solid #aaa;
      font-size: 12px;
      display: flex;
      justify-content: space-between;
      gap: 10px;
      color: #333;
    }
  </style>
</head>
<body>
  ${notices || '<p>ไม่พบข้อมูลประกาศ</p>'}
</body>
</html>`;
}

async function main() {
  const apiUrl = getArg('--api-url');
  const outputFile = getArg('--output');
  const template = (getArg('--template') || 'formal').toLowerCase();

  if (!apiUrl || !outputFile) {
    throw new Error('Usage: node scripts/generate-newspaper-pdf.js --api-url=<url> --output=<path> [--template=formal|modern]');
  }

  const data = await fetchJson(apiUrl);
  if (!data || !data.success) {
    throw new Error(`API returned error: ${JSON.stringify(data)}`);
  }

  const html = template === 'modern' ? buildHtmlModern(data) : buildHtmlFormal(data);

  const outDir = path.dirname(outputFile);
  fs.mkdirSync(outDir, { recursive: true });

  const browser = await puppeteer.launch({
    headless: 'new',
    args: ['--no-sandbox', '--disable-setuid-sandbox']
  });

  try {
    const page = await browser.newPage();
    await page.setContent(html, { waitUntil: 'networkidle0' });
    await page.pdf({
      path: outputFile,
      format: 'A4',
      printBackground: true,
      margin: { top: '10mm', right: '10mm', bottom: '10mm', left: '10mm' }
    });
  } finally {
    await browser.close();
  }

  process.stdout.write(`PDF generated: ${outputFile}\n`);
}

main().catch((err) => {
  process.stderr.write(`${err.message}\n`);
  process.exit(1);
});
