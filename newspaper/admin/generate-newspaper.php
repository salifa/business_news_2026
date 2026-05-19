<?php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/../classes/Newspaper.php';

requireAdmin();

$newspaper = new Newspaper();
$message = '';
$messageType = '';

$selectedDate = $_POST['newspaper_date'] ?? date('Y-m-d');

$newNewspaperId = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
	if ($_POST['action'] === 'generate') {
		$result = $newspaper->generateNewspaper($selectedDate, getCurrentUserEmail());
		$message = $result['message'];
		$messageType = $result['success'] ? 'success' : 'danger';
		if ($result['success']) {
			$newNewspaperId = $result['newspaper_id'] ?? null;
			// Redirect to prevent form resubmission and force page reload
			header("Location: generate-newspaper.php?success=1&new_id=" . urlencode($newNewspaperId));
			exit;
		}
	} elseif ($_POST['action'] === 'delete' && !empty($_POST['newspaper_id'])) {
		$result = $newspaper->delete((int)$_POST['newspaper_id']);
		$message = $result['message'];
		$messageType = $result['success'] ? 'success' : 'danger';
		if ($result['success']) {
			// Redirect after delete to refresh the list
			header("Location: generate-newspaper.php?deleted=1");
			exit;
		}
	}
}

// Handle success messages from redirect
if (isset($_GET['success']) && $_GET['success'] == '1') {
	$message = 'สร้างหนังสือพิมพ์สำเร็จ (Puppeteer)';
	$messageType = 'success';
	$newNewspaperId = isset($_GET['new_id']) ? (int)$_GET['new_id'] : null;
}
if (isset($_GET['deleted']) && $_GET['deleted'] == '1') {
	$message = 'ลบหนังสือพิมพ์สำเร็จ';
	$messageType = 'success';
}

$approvedAdCount = $newspaper->getApprovedAdCount($selectedDate);
$newspapers = $newspaper->getAllNewspapers(1, 50);
?>
<!DOCTYPE html>
<html lang="th">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>สร้างหนังสือพิมพ์ (Puppeteer)</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;500;600;700&display=swap" rel="stylesheet">
	<style>
		body { font-family: 'Google Sans', sans-serif; background: #f5f7fb; }
		.page-wrap { max-width: 1100px; margin: 24px auto; }
		.card { border: 0; border-radius: 12px; box-shadow: 0 6px 20px rgba(0,0,0,0.08); }
		.highlight-new {
			background: linear-gradient(90deg, rgba(102, 126, 234, 0.1) 0%, rgba(118, 75, 162, 0.05) 100%);
			animation: fadeIn 0.5s ease-in;
		}
		@keyframes fadeIn {
			from { background-color: rgba(102, 126, 234, 0.3); }
			to { background-color: rgba(102, 126, 234, 0.1); }
		}
		.running-number {
			font-size: 1.1em;
			font-weight: 600;
			color: #667eea;
		}
	</style>
</head>
<body>
<div class="page-wrap container-fluid">
	<div class="d-flex justify-content-between align-items-center mb-3">
		<h3 class="mb-0"><i class="fas fa-file-pdf text-danger"></i> สร้างหนังสือพิมพ์ด้วย Puppeteer</h3>
		<a href="dashboard.php" class="btn btn-outline-secondary"><i class="fas fa-arrow-left"></i> กลับ</a>
	</div>

	<?php if (!empty($message)): ?>
		<div class="alert alert-<?= escape($messageType) ?> alert-dismissible fade show" role="alert">
			<?= escape($message) ?>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
	<?php endif; ?>

	<div class="row g-3 mb-3">
		<div class="col-md-4">
			<div class="card p-3">
				<div class="text-muted">ประกาศรอสร้าง (ตามวันที่เลือก)</div>
				<div class="fs-2 fw-bold"><?= number_format($approvedAdCount) ?></div>
			</div>
		</div>
	</div>

	<div class="card mb-3">
		<div class="card-body">
			<form method="POST" class="row g-3 align-items-end">
				<input type="hidden" name="action" value="generate">
				<div class="col-md-4">
					<label class="form-label">วันที่หนังสือพิมพ์</label>
					<input type="date" name="newspaper_date" class="form-control" value="<?= escape($selectedDate) ?>" required>
				</div>
				<div class="col-md-8">
					<button type="submit" class="btn btn-primary">
						<i class="fas fa-play"></i> สร้าง PDF จาก JSON API (Puppeteer)
					</button>
				</div>
			</form>
			<hr>
			<p class="mb-0 text-muted">
				API: <code>api/newspaper-data.php</code> | Script: <code>scripts/generate-newspaper-pdf.js</code>
			</p>
		</div>
	</div>

	<div class="card">
		<div class="card-body">
			<h5 class="mb-3">รายการหนังสือพิมพ์</h5>
			<div class="table-responsive">
				<table class="table table-striped align-middle">
					<thead>
					<tr>
						<th width="80">เลขที่</th>
						<th>วันที่</th>
						<th width="200">ไฟล์ PDF</th>
						<th width="60">หน้า</th>
						<th width="80">ประกาศ</th>
						<th width="100">สถานะ</th>
						<th width="80">จัดการ</th>
					</tr>
					</thead>
					<tbody>
					<?php foreach ($newspapers as $np): 
						$isNew = ($newNewspaperId && (int)$np['id'] === (int)$newNewspaperId);
						$rowClass = $isNew ? 'highlight-new' : '';
					?>
						<tr class="<?= $rowClass ?>">
							<td>
								<span class="running-number">
									<?php if ($isNew): ?>
										<i class="fas fa-star text-warning"></i> 
									<?php endif; ?>
									#<?= (int)$np['id'] ?>
								</span>
							</td>
							<td><?= escape($np['newspaper_date']) ?></td>
							<td>
								<?php if ($np['status'] === 'published'): ?>
									<a class="btn btn-sm btn-outline-primary" target="_blank" href="/news_letter2/index.html?id=<?= (int)$np['id'] ?>">
										<i class="fas fa-eye"></i> ดูจดหมายข่าว
									</a>
									<a class="btn btn-sm btn-outline-info" href="/newspaper/admin/manage-newsletter.php?id=<?= (int)$np['id'] ?>" title="แก้ไขเนื้อหา">
										<i class="fas fa-edit"></i>
									</a>
								<?php else: ?>
									<span class="text-muted">-</span>
								<?php endif; ?>
							</td>
							<td><?= (int)$np['page_count'] ?></td>
							<td><?= (int)$np['advertisement_count'] ?></td>
							<td><span class="badge bg-secondary"><?= escape($np['status']) ?></span></td>
							<td>
								<form method="POST" onsubmit="return confirm('ยืนยันการลบหนังสือพิมพ์ #<?= (int)$np['id'] ?>?');" class="d-inline">
									<input type="hidden" name="action" value="delete">
									<input type="hidden" name="newspaper_id" value="<?= (int)$np['id'] ?>">
									<button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
								</form>
							</td>
						</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
	// Auto-dismiss success alerts after 5 seconds
	<?php if ($messageType === 'success'): ?>
		setTimeout(() => {
			const alert = document.querySelector('.alert');
			if (alert) {
				const bsAlert = bootstrap.Alert.getOrCreateInstance(alert);
				bsAlert.close();
			}
		}, 5000);
	<?php endif; ?>

	// Scroll to newly created newspaper row
	<?php if ($newNewspaperId): ?>
		document.addEventListener('DOMContentLoaded', () => {
			const newRow = document.querySelector('.highlight-new');
			if (newRow) {
				setTimeout(() => {
					newRow.scrollIntoView({ behavior: 'smooth', block: 'center' });
				}, 300);
			}
		});
	<?php endif; ?>
</script>
</body>
</html>

