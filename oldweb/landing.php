<?php
require_once 'config/db-config.php';

// Get recent placards
$conn = getDBConnection();
$sql = "SELECT * FROM placard WHERE publish = 'On' ORDER BY create_date DESC LIMIT 6";
$placards = $conn->query($sql);

// Get placard statistics
$sql = "SELECT COUNT(*) as total_placards FROM placard WHERE publish = 'On'";
$stats = $conn->query($sql)->fetch_assoc();

$conn->close();
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VNNBIZS - สื่อธุรกิจออนไลน์ ลงประกาศบริษัท ข่าวธุรกิจ และคำแนะนำภาษี</title>
    <meta name="description" content="VNNBIZS สื่อธุรกิจออนไลน์ครบวงจร ข่าวธุรกิจ คำแนะนำภาษี และบริการลงประกาศเชิญประชุมผู้ถือหุ้น ครอบคลุมพื้นที่ปทุมธานี นนทบุรี อ่อนนุช พัฒนาการ สมุทรปราการ">
    <meta name="keywords" content="ข่าวธุรกิจ, คำแนะนำภาษี, ลงประกาศบริษัท, ประกาศผู้ถือหุ้น, VNNBIZS, ภาษีธุรกิจ, ข่าวเศรษฐกิจ">
    
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Prompt&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        body {
            font-family: 'Prompt', sans-serif;
            background-color: #f8f9fa;
        }
        
        /* Hero Section */
        .hero-section {
            background: linear-gradient(135deg, #2193b0 0%, #6dd5ed 100%);
            color: white;
            padding: 80px 0;
            position: relative;
            overflow: hidden;
        }
        
        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="%23ffffff" fill-opacity="0.1" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,122.7C672,117,768,139,864,138.7C960,139,1056,117,1152,112C1248,107,1344,117,1392,122.7L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>');
            background-size: cover;
            opacity: 0.3;
        }
        
        .hero-content {
            position: relative;
            z-index: 1;
        }
        
        /* Stats Section */
        .stats-card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            text-align: center;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            transition: transform 0.3s;
        }
        
        .stats-card:hover {
            transform: translateY(-10px);
        }
        
        .stats-card i {
            font-size: 3rem;
            background: linear-gradient(135deg, #2193b0 0%, #6dd5ed 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 15px;
        }
        
        .stats-number {
            font-size: 2.5rem;
            font-weight: bold;
            color: #2193b0;
        }
        
        /* News Card */
        .news-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: all 0.3s;
            height: 100%;
        }
        
        .news-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }
        
        .news-card-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
            background: linear-gradient(135deg, #2193b0 0%, #6dd5ed 100%);
        }
        
        .news-card-body {
            padding: 20px;
        }
        
        .news-badge {
            background: linear-gradient(135deg, #2193b0 0%, #6dd5ed 100%);
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 12px;
            display: inline-block;
            margin-bottom: 10px;
        }
        
        /* Placard Card */
        .placard-card {
            background: white;
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 20px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            border-left: 5px solid #2193b0;
            transition: all 0.3s;
        }
        
        .placard-card:hover {
            transform: translateX(10px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }
        
        .section-title {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 30px;
            position: relative;
            padding-bottom: 15px;
        }
        
        .section-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 80px;
            height: 4px;
            background: linear-gradient(135deg, #2193b0 0%, #6dd5ed 100%);
        }
        
        .btn-gradient {
            background: linear-gradient(135deg, #2193b0 0%, #6dd5ed 100%);
            border: none;
            color: white;
            padding: 12px 30px;
            border-radius: 25px;
            transition: all 0.3s;
        }
        
        .btn-gradient:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(33, 147, 176, 0.4);
            color: white;
        }
        
        /* CTA Section */
        .cta-section {
            background: linear-gradient(135deg, #2193b0 0%, #6dd5ed 100%);
            color: white;
            padding: 60px 0;
            text-align: center;
        }
        
        footer {
            background: #1a1a2e;
            color: white;
            padding: 40px 0;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#" style="color: #2193b0; font-size: 1.5rem;">
                <i class="fas fa-newspaper"></i> VNNBIZS
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#home">หน้าแรก</a></li>
                    <li class="nav-item"><a class="nav-link" href="#news">ข่าวธุรกิจ</a></li>
                    <li class="nav-item"><a class="nav-link" href="#placards">ประกาศบริษัท</a></li>
                    <li class="nav-item"><a class="nav-link" href="#services">บริการ</a></li>
                    <li class="nav-item"><a class="nav-link" href="about-us.html">เกี่ยวกับเรา</a></li>
                    <li class="nav-item ms-3">
                        <a class="btn btn-gradient" href="login.php">
                            <i class="fas fa-sign-in-alt"></i> เข้าสู่ระบบ
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section" id="home">
        <div class="container hero-content">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4 fw-bold mb-4">สื่อธุรกิจออนไลน์ครบวงจร</h1>
                    <p class="lead mb-4">ข่าวธุรกิจ • คำแนะนำภาษี • ลงประกาศบริษัท<br>เพื่อผู้ประกอบการไทย</p>
                    <div class="d-flex gap-3">
                        <a href="#news" class="btn btn-light btn-lg">
                            <i class="fas fa-newspaper"></i> อ่านข่าว
                        </a>
                        <a href="login.php" class="btn btn-outline-light btn-lg">
                            <i class="fas fa-bullhorn"></i> ลงประกาศ
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 text-center">
                    <i class="fas fa-chart-line" style="font-size: 15rem; opacity: 0.2;"></i>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-5" style="margin-top: -50px;">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="stats-card">
                        <i class="fas fa-newspaper"></i>
                        <div class="stats-number"><?php echo $stats['total_placards']; ?>+</div>
                        <p class="mb-0 text-muted">ประกาศบริษัท</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stats-card">
                        <i class="fas fa-users"></i>
                        <div class="stats-number">500+</div>
                        <p class="mb-0 text-muted">ผู้ใช้งาน</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stats-card">
                        <i class="fas fa-building"></i>
                        <div class="stats-number">300+</div>
                        <p class="mb-0 text-muted">บริษัทที่ไว้วางใจ</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Business News Section -->
    <section class="py-5 bg-light" id="news">
        <div class="container">
            <h2 class="section-title">ข่าวธุรกิจและคำแนะนำภาษี</h2>
            <div class="row g-4">
                <!-- Tax News Card 1 -->
                <div class="col-md-4">
                    <div class="news-card">
                        <div class="news-card-image d-flex align-items-center justify-content-center">
                            <i class="fas fa-calculator text-white" style="font-size: 5rem;"></i>
                        </div>
                        <div class="news-card-body">
                            <span class="news-badge">ภาษีธุรกิจ</span>
                            <h5 class="fw-bold mb-3">มือใหม่ต้องรู้! ขายของออนไลน์ต้องเสียภาษีแบบไหน?</h5>
                            <p class="text-muted">พ่อค้าแม่ค้าออนไลน์มือใหม่ต้องรู้ ถ้ามีรายได้ยังไงก็ต้องยื่นภาษี เรียนรู้วิธีการคำนวณและยื่นภาษีถูกต้อง...</p>
                            <a href="index.html" class="btn btn-sm btn-gradient">อ่านต่อ <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Tax News Card 2 -->
                <div class="col-md-4">
                    <div class="news-card">
                        <div class="news-card-image d-flex align-items-center justify-content-center">
                            <i class="fas fa-percentage text-white" style="font-size: 5rem;"></i>
                        </div>
                        <div class="news-card-body">
                            <span class="news-badge">คำแนะนำภาษี</span>
                            <h5 class="fw-bold mb-3">วิธีหักค่าใช้จ่าย 2 แบบ: ตามจริง VS เหมา 60%</h5>
                            <p class="text-muted">เปรียบเทียบวิธีหักค่าใช้จ่ายทั้ง 2 แบบ เลือกแบบไหนดีที่สุดสำหรับธุรกิจของคุณ ประหยัดภาษีได้มากกว่า...</p>
                            <a href="index.html" class="btn btn-sm btn-gradient">อ่านต่อ <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Business News Card -->
                <div class="col-md-4">
                    <div class="news-card">
                        <div class="news-card-image d-flex align-items-center justify-content-center">
                            <i class="fas fa-gavel text-white" style="font-size: 5rem;"></i>
                        </div>
                        <div class="news-card-body">
                            <span class="news-badge">กฎหมายธุรกิจ</span>
                            <h5 class="fw-bold mb-3">การประชุมผู้ถือหุ้นประจำปี: สิ่งที่ต้องรู้</h5>
                            <p class="text-muted">ทุกบริษัทต้องจัดประชุมผู้ถือหุ้นประจำปี เรียนรู้ขั้นตอน กฎหมาย และวิธีลงประกาศตามกฎหมายที่ถูกต้อง...</p>
                            <a href="#" class="btn btn-sm btn-gradient">อ่านต่อ <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Accounting Tips -->
                <div class="col-md-4">
                    <div class="news-card">
                        <div class="news-card-image d-flex align-items-center justify-content-center">
                            <i class="fas fa-book text-white" style="font-size: 5rem;"></i>
                        </div>
                        <div class="news-card-body">
                            <span class="news-badge">บัญชี</span>
                            <h5 class="fw-bold mb-3">เคล็ดลับการทำบัญชีสำหรับ SME</h5>
                            <p class="text-muted">คำแนะนำและเคล็ดลับการทำบัญชีสำหรับธุรกิจ SME ให้ง่ายและถูกต้องตามมาตรฐาน...</p>
                            <a href="#" class="btn btn-sm btn-gradient">อ่านต่อ <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Business Registration -->
                <div class="col-md-4">
                    <div class="news-card">
                        <div class="news-card-image d-flex align-items-center justify-content-center">
                            <i class="fas fa-file-signature text-white" style="font-size: 5rem;"></i>
                        </div>
                        <div class="news-card-body">
                            <span class="news-badge">จดทะเบียน</span>
                            <h5 class="fw-bold mb-3">ขั้นตอนการจดทะเบียนบริษัท 2025</h5>
                            <p class="text-muted">คู่มือการจดทะเบียนบริษัทฉบับสมบูรณ์ เอกสาร ขั้นตอน และค่าใช้จ่ายที่ต้องเตรียม...</p>
                            <a href="#" class="btn btn-sm btn-gradient">อ่านต่อ <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Financial Planning -->
                <div class="col-md-4">
                    <div class="news-card">
                        <div class="news-card-image d-flex align-items-center justify-content-center">
                            <i class="fas fa-chart-pie text-white" style="font-size: 5rem;"></i>
                        </div>
                        <div class="news-card-body">
                            <span class="news-badge">การเงิน</span>
                            <h5 class="fw-bold mb-3">วางแผนการเงินธุรกิจให้ยั่งยืน</h5>
                            <p class="text-muted">เทคนิคการวางแผนการเงินธุรกิจ บริหารกระแสเงินสด และเพิ่มกำไรอย่างมั่นคง...</p>
                            <a href="#" class="btn btn-sm btn-gradient">อ่านต่อ <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Recent Placards Section -->
    <section class="py-5" id="placards">
        <div class="container">
            <h2 class="section-title">ประกาศล่าสุดจากบริษัทต่างๆ</h2>
            <p class="text-muted mb-4">ประกาศเชิญประชุมผู้ถือหุ้นและประกาศสำคัญจากบริษัทจดทะเบียน</p>
            
            <div class="row">
                <?php if ($placards->num_rows > 0): ?>
                    <?php while($placard = $placards->fetch_assoc()): ?>
                        <div class="col-md-6 mb-4">
                            <div class="placard-card">
                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <span class="news-badge">
                                        <i class="fas fa-building"></i> ประกาศบริษัท
                                    </span>
                                    <small class="text-muted">
                                        <i class="fas fa-calendar"></i> 
                                        <?php echo date('d/m/Y', strtotime($placard['placard_date'])); ?>
                                    </small>
                                </div>
                                <h5 class="fw-bold mb-2"><?php echo htmlspecialchars($placard['subject']); ?></h5>
                                <p class="text-muted mb-2">
                                    <i class="fas fa-building"></i> 
                                    <?php echo htmlspecialchars($placard['companyname']); ?>
                                </p>
                                <p class="mb-2">
                                    <i class="fas fa-calendar-check text-primary"></i> 
                                    วันประชุม: <?php echo date('d/m/Y', strtotime($placard['meeting_date'])); ?>
                                    เวลา <?php echo date('H:i', strtotime($placard['meeting_time'])); ?> น.
                                </p>
                                <?php if (!empty($placard['pdf_file1'])): ?>
                                    <a href="<?php echo $placard['pdf_file1']; ?>" target="_blank" class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-file-pdf"></i> ดาวน์โหลด PDF
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <div class="col-12">
                        <div class="alert alert-info text-center">
                            <i class="fas fa-info-circle"></i> ยังไม่มีประกาศในขณะนี้
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            
            <div class="text-center mt-4">
                <a href="/data/placard_download_list.php" class="btn btn-gradient btn-lg">
                    <i class="fas fa-list"></i> ดูประกาศทั้งหมด
                </a>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="py-5 bg-light" id="services">
        <div class="container">
            <h2 class="section-title">บริการของเรา</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="text-center p-4">
                        <div class="mb-3">
                            <i class="fas fa-bullhorn" style="font-size: 4rem; color: #2193b0;"></i>
                        </div>
                        <h4>ลงประกาศบริษัท</h4>
                        <p class="text-muted">บริการลงประกาศเชิญประชุมผู้ถือหุ้นและประกาศสำคัญตามกฎหมาย</p>
                        <strong class="text-primary">50 บาท / ครั้ง</strong>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="text-center p-4">
                        <div class="mb-3">
                            <i class="fas fa-newspaper" style="font-size: 4rem; color: #2193b0;"></i>
                        </div>
                        <h4>ข่าวธุรกิจ</h4>
                        <p class="text-muted">อัพเดทข่าวธุรกิจ เศรษฐกิจ และกฎหมายที่เกี่ยวข้อง</p>
                        <strong class="text-success">ฟรี!</strong>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="text-center p-4">
                        <div class="mb-3">
                            <i class="fas fa-book-open" style="font-size: 4rem; color: #2193b0;"></i>
                        </div>
                        <h4>คำแนะนำภาษี</h4>
                        <p class="text-muted">บทความและคำแนะนำเกี่ยวกับภาษีและบัญชีสำหรับธุรกิจ</p>
                        <strong class="text-success">ฟรี!</strong>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <h2 class="display-5 fw-bold mb-4">พร้อมลงประกาศบริษัทของคุณแล้วหรือยัง?</h2>
            <p class="lead mb-4">เริ่มต้นใช้งานง่ายๆ เพียง 3 ขั้นตอน</p>
            <div class="row justify-content-center mb-4">
                <div class="col-md-3">
                    <div class="p-3">
                        <div class="display-6">1️⃣</div>
                        <h5>สมัครสมาชิก</h5>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="p-3">
                        <div class="display-6">2️⃣</div>
                        <h5>เติมเครดิต</h5>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="p-3">
                        <div class="display-6">3️⃣</div>
                        <h5>ลงประกาศ</h5>
                    </div>
                </div>
            </div>
            <a href="login.php" class="btn btn-light btn-lg">
                <i class="fas fa-rocket"></i> เริ่มต้นเลย
            </a>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h5 class="mb-3"><i class="fas fa-newspaper"></i> VNNBIZS</h5>
                    <p>สื่อธุรกิจออนไลน์ ข่าวธุรกิจ คำแนะนำภาษี และบริการลงประกาศบริษัท</p>
                </div>
                <div class="col-md-4 mb-4">
                    <h5 class="mb-3">ลิงก์ด่วน</h5>
                    <ul class="list-unstyled">
                        <li><a href="#news" class="text-white text-decoration-none">ข่าวธุรกิจ</a></li>
                        <li><a href="#placards" class="text-white text-decoration-none">ประกาศบริษัท</a></li>
                        <li><a href="pricing.html" class="text-white text-decoration-none">ราคา</a></li>
                        <li><a href="about-us.html" class="text-white text-decoration-none">เกี่ยวกับเรา</a></li>
                    </ul>
                </div>
                <div class="col-md-4 mb-4">
                    <h5 class="mb-3">ติดต่อเรา</h5>
                    <p><i class="fas fa-envelope"></i> vnnbizs@gmail.com</p>
                    <p><i class="fas fa-map-marker-alt"></i> ครอบคลุมพื้นที่:<br>
                    ปทุมธานี นนทบุรี อ่อนนุช พัฒนาการ สมุทรปราการ สวนหลวง ศรีนครินทร์</p>
                </div>
            </div>
            <hr class="bg-light">
            <div class="text-center">
                <p class="mb-0">© 2025 VNNBIZS. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
