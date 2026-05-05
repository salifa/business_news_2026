<?php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/../classes/Newspaper.php';

requireAdmin();

$newspaper = new Newspaper();
$newspaperId = isset($_GET['id']) ? (int)$_GET['id'] : null;

if (!$newspaperId) {
	header('Location: generate-newspaper.php');
	exit;
}

// Get newspaper record
$np = $newspaper->getNewspaperById($newspaperId);
if (!$np) {
	die('ไม่พบข้อมูลหนังสือพิมพ์');
}

// Get advertisements for this newspaper
$ads = $newspaper->getAdvertisementsForNewspaper($newspaperId);

// Get JSON data that would be sent to Puppeteer
$token = hash('sha256', DB_NAME . '|' . DB_USER . '|' . DB_HOST);
$apiUrl = BASE_URL . 'api/newspaper-data.php?date=' . urlencode($np['newspaper_date']) . '&newspaper_id=' . urlencode($newspaperId) . '&token=' . urlencode($token);

// Fetch API data
$apiData = @file_get_contents($apiUrl);
$jsonData = $apiData ? json_decode($apiData, true) : null;

$pdfPath = !empty($np['pdf_file']) ? BASE_URL . 'public/newspapers/pdf/' . $np['pdf_file'] : null;
?>
<!DOCTYPE html>
<html lang="th">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Preview #<?= $newspaperId ?> - Housekeeping Tool</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;500;600;700&display=swap" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism-okaidia.min.css" rel="stylesheet">
	<style>
		body { 
			font-family: 'Google Sans', sans-serif; 
			background: #1a1a2e;
			color: #e0e0e0;
		}
		.page-wrap { 
			max-width: 100%; 
			margin: 0;
			padding: 20px;
		}
		.card { 
			border: 1px solid #2d2d44;
			border-radius: 12px; 
			box-shadow: 0 6px 20px rgba(0,0,0,0.3);
			background: #16213e;
			color: #e0e0e0;
		}
		.card-header {
			background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
			color: white;
			border-radius: 12px 12px 0 0 !important;
			font-weight: 600;
		}
		.pdf-viewer {
			width: 100%;
			height: 85vh;
			border: 2px solid #667eea;
			border-radius: 8px;
			background: #fff;
		}
		.json-viewer {
			background: #1e1e1e;
			border: 1px solid #333;
			border-radius: 8px;
			max-height: 500px;
			overflow-y: auto;
		}
		.json-viewer pre {
			margin: 0;
			padding: 15px;
			font-size: 13px;
			line-height: 1.5;
		}
		.ad-card {
			background: #0f3460;
			border: 1px solid #1a5490;
			border-radius: 8px;
			padding: 12px;
			margin-bottom: 10px;
		}
		.ad-card h6 {
			color: #667eea;
			margin-bottom: 8px;
		}
		.ad-field {
			display: grid;
			grid-template-columns: 150px 1fr;
			gap: 10px;
			padding: 4px 0;
			font-size: 13px;
		}
		.ad-field-label {
			color: #a0a0b0;
			font-weight: 500;
		}
		.ad-field-value {
			color: #e0e0e0;
		}
		.tab-content {
			background: #16213e;
			border: 1px solid #2d2d44;
			border-top: 0;
			padding: 20px;
			border-radius: 0 0 8px 8px;
		}
		.nav-tabs {
			border-bottom: 2px solid #2d2d44;
		}
		.nav-tabs .nav-link {
			color: #a0a0b0;
			border: 0;
			border-bottom: 3px solid transparent;
		}
		.nav-tabs .nav-link:hover {
			color: #667eea;
			border-bottom-color: #667eea;
		}
		.nav-tabs .nav-link.active {
			background: #16213e;
			color: #667eea;
			border-bottom-color: #667eea;
		}
		.info-badge {
			display: inline-block;
			background: #667eea;
			color: white;
			padding: 4px 12px;
			border-radius: 20px;
			font-size: 12px;
			font-weight: 600;
			margin-right: 8px;
		}
		.btn-regenerate {
			background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
			border: 0;
			color: white;
			font-weight: 600;
		}
		.btn-regenerate:hover {
			background: linear-gradient(135deg, #f5576c 0%, #f093fb 100%);
			color: white;
		}
		.toolbar {
			position: sticky;
			top: 0;
			z-index: 100;
			background: #16213e;
			padding: 10px;
			border-bottom: 2px solid #667eea;
			margin: -20px -20px 20px -20px;
		}
	</style>
</head>
<body>
<div class="page-wrap container-fluid">
	<div class="toolbar d-flex justify-content-between align-items-center">
		<div>
			<h4 class="mb-0">
				<i class="fas fa-microscope text-warning"></i> 
				Housekeeping Preview Tool
			</h4>
		</div>
		<div>
			<a href="generate-newspaper.php" class="btn btn-outline-light btn-sm">
				<i class="fas fa-arrow-left"></i> Back
			</a>
			<a href="<?= BASE_URL ?>public/newspapers/pdf/<?= escape($np['pdf_file']) ?>" 
			   target="_blank" 
			   class="btn btn-primary btn-sm">
				<i class="fas fa-external-link-alt"></i> Open PDF
			</a>
		</div>
	</div>

	<div class="row mb-3">
		<div class="col-12">
			<div class="card">
				<div class="card-body">
					<h5 class="mb-3">
						<i class="fas fa-newspaper text-info"></i> 
						หนังสือพิมพ์ #<?= $newspaperId ?>
					</h5>
					<div class="mb-2">
						<span class="info-badge"><i class="fas fa-calendar"></i> <?= escape($np['newspaper_date']) ?></span>
						<span class="info-badge"><i class="fas fa-file-pdf"></i> <?= escape($np['pdf_file']) ?></span>
						<span class="info-badge"><i class="fas fa-file"></i> <?= (int)$np['page_count'] ?> หน้า</span>
						<span class="info-badge"><i class="fas fa-ad"></i> <?= (int)$np['advertisement_count'] ?> ประกาศ</span>
						<span class="info-badge"><i class="fas fa-check-circle"></i> <?= escape($np['status']) ?></span>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<!-- Left: PDF Preview -->
		<div class="col-lg-7">
			<div class="card mb-3">
				<div class="card-header">
					<i class="fas fa-file-pdf"></i> PDF Output Preview
				</div>
				<div class="card-body p-2">
					<?php if ($pdfPath): ?>
						<iframe src="<?= escape($pdfPath) ?>" class="pdf-viewer"></iframe>
					<?php else: ?>
						<div class="alert alert-warning">ไม่พบไฟล์ PDF</div>
					<?php endif; ?>
				</div>
			</div>
		</div>

		<!-- Right: Data Source -->
		<div class="col-lg-5">
			<div class="card mb-3">
				<div class="card-header">
					<i class="fas fa-database"></i> Source Data & Debug Info
				</div>
				<div class="card-body p-0">
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item" role="presentation">
							<button class="nav-link active" data-bs-toggle="tab" data-bs-target="#tab-ads" type="button">
								<i class="fas fa-list"></i> Advertisements (<?= count($ads) ?>)
							</button>
						</li>
						<li class="nav-item" role="presentation">
							<button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-json" type="button">
								<i class="fas fa-code"></i> JSON API Data
							</button>
						</li>
						<li class="nav-item" role="presentation">
							<button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-api" type="button">
								<i class="fas fa-plug"></i> API Endpoint
							</button>
						</li>
					</ul>

					<div class="tab-content">
						<!-- Advertisements Tab -->
						<div class="tab-pane fade show active" id="tab-ads" role="tabpanel">
							<?php if (empty($ads)): ?>
								<div class="alert alert-info">ไม่มีประกาศในหนังสือพิมพ์นี้</div>
							<?php else: ?>
								<?php foreach ($ads as $idx => $ad): ?>
									<div class="ad-card">
										<h6>
											<i class="fas fa-hashtag"></i> 
											ประกาศ #<?= (int)$ad['id'] ?> 
											<small class="text-muted">(<?= escape($ad['ad_type']) ?>)</small>
										</h6>
										<div class="ad-field">
											<div class="ad-field-label">หัวข้อ:</div>
											<div class="ad-field-value"><?= escape($ad['title'] ?? '-') ?></div>
										</div>
										<div class="ad-field">
											<div class="ad-field-label">บริษัท:</div>
											<div class="ad-field-value"><?= escape($ad['companyname'] ?? '-') ?></div>
										</div>
										<div class="ad-field">
											<div class="ad-field-label">ครั้งที่ประชุม:</div>
											<div class="ad-field-value"><?= escape($ad['meeting_number'] ?? '-') ?></div>
										</div>
										<div class="ad-field">
											<div class="ad-field-label">วันประชุม:</div>
											<div class="ad-field-value"><?= escape($ad['meeting_date'] ?? '-') ?> <?= escape($ad['meeting_time'] ?? '') ?></div>
										</div>
										<div class="ad-field">
											<div class="ad-field-label">สถานที่:</div>
											<div class="ad-field-value"><?= nl2br(escape($ad['meeting_place'] ?? '-')) ?></div>
										</div>
										<div class="ad-field">
											<div class="ad-field-label">วาระ:</div>
											<div class="ad-field-value"><?= nl2br(escape(substr($ad['meeting_agenda'] ?? '', 0, 200))) ?><?= strlen($ad['meeting_agenda'] ?? '') > 200 ? '...' : '' ?></div>
										</div>
									</div>
								<?php endforeach; ?>
							<?php endif; ?>
						</div>

						<!-- JSON API Tab -->
						<div class="tab-pane fade" id="tab-json" role="tabpanel">
							<?php if ($jsonData): ?>
								<div class="json-viewer">
									<pre><code class="language-json"><?= escape(json_encode($jsonData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)) ?></code></pre>
								</div>
								<div class="mt-3">
									<button class="btn btn-sm btn-outline-light" onclick="copyJson()">
										<i class="fas fa-copy"></i> Copy JSON
									</button>
								</div>
							<?php else: ?>
								<div class="alert alert-danger">ไม่สามารถดึงข้อมูล JSON ได้</div>
							<?php endif; ?>
						</div>

						<!-- API Endpoint Tab -->
						<div class="tab-pane fade" id="tab-api" role="tabpanel">
							<div class="mb-3">
								<label class="form-label text-light">API URL:</label>
								<div class="input-group">
									<input type="text" class="form-control form-control-sm bg-dark text-light border-secondary" 
									       value="<?= escape($apiUrl) ?>" 
									       readonly 
									       id="apiUrlField">
									<button class="btn btn-outline-light btn-sm" onclick="copyApiUrl()">
										<i class="fas fa-copy"></i>
									</button>
								</div>
							</div>
							<div class="mb-3">
								<label class="form-label text-light">Test API:</label>
								<div>
									<a href="<?= escape($apiUrl) ?>" target="_blank" class="btn btn-sm btn-primary">
										<i class="fas fa-external-link-alt"></i> Open API Response
									</a>
								</div>
							</div>
							<div class="mb-3">
								<label class="form-label text-light">Puppeteer Template:</label>
								<div>
									<code class="text-info">newspaper/scripts/generate-newspaper-pdf.js</code>
								</div>
								<div class="mt-2">
									<small class="text-muted">
										Edit <code>buildHtmlFormal()</code> or <code>buildHtmlModern()</code> 
										to adjust PDF layout
									</small>
								</div>
							</div>
							<hr class="border-secondary">
							<div>
								<form method="POST" action="generate-newspaper.php" onsubmit="return confirm('Regenerate PDF for this date?');">
									<input type="hidden" name="action" value="generate">
									<input type="hidden" name="newspaper_date" value="<?= escape($np['newspaper_date']) ?>">
									<button type="submit" class="btn btn-regenerate">
										<i class="fas fa-sync"></i> Regenerate PDF
									</button>
									<small class="d-block mt-2 text-muted">
										This will rebuild the PDF using current template
									</small>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/prism.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-json.min.js"></script>
<script>
	function copyJson() {
		const jsonText = <?= json_encode(json_encode($jsonData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)) ?>;
		navigator.clipboard.writeText(jsonText).then(() => {
			alert('Copied JSON to clipboard!');
		});
	}

	function copyApiUrl() {
		const urlField = document.getElementById('apiUrlField');
		urlField.select();
		document.execCommand('copy');
		alert('Copied API URL to clipboard!');
	}

	// Highlight syntax on load
	document.addEventListener('DOMContentLoaded', () => {
		Prism.highlightAll();
	});
</script>
</body>
</html>
