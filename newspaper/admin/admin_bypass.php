<?php
/**
 * Temporary Admin Bypass for Testing
 * Remove this file in production!
 */

require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/database.php';
require_once __DIR__ . '/../includes/auth.php';

// Create a test admin session with all necessary variables
$_SESSION['user_id'] = 1;
$_SESSION['user_role'] = 'admin';
$_SESSION['user_email'] = 'admin@vnn.mac.in.th';
$_SESSION['user_type'] = 'admin';  // For backward compatibility
$_SESSION['login_time'] = time();

echo "<!DOCTYPE html>
<html lang='th'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Admin Access - Test Mode</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' rel='stylesheet'>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css'>
    <style>
        body { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); min-height: 100vh; }
        .info-box { background: white; border-radius: 15px; padding: 30px; margin: 20px 0; box-shadow: 0 5px 20px rgba(0,0,0,0.1); }
        .section-header { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 15px; border-radius: 10px; margin-bottom: 20px; }
        .badge-large { font-size: 1rem; padding: 8px 15px; }
    </style>
</head>
<body>
    <div class='container mt-5'>
        <div class='row justify-content-center'>
            <div class='col-md-10'>
                
                <!-- Success Message -->
                <div class='card mb-3' style='border: 3px solid #28a745;'>
                    <div class='card-body text-center'>
                        <h3 class='text-success mb-3'>
                            <i class='bi bi-check-circle-fill'></i> Admin Access Granted
                        </h3>
                        <p class='mb-2'><strong>Email:</strong> admin@vnn.mac.in.th</p>
                        <p class='mb-0'><strong>Role:</strong> <span class='badge bg-danger badge-large'>ADMINISTRATOR</span></p>
                    </div>
                </div>
                
                <!-- Explanation -->
                <div class='info-box'>
                    <h4 class='mb-3'><i class='bi bi-info-circle text-primary'></i> How This Works</h4>
                    <div class='alert alert-info mb-3'>
                        <strong>✅ YES - Admin can do EVERYTHING!</strong><br>
                        As admin, you can:
                        <ul class='mb-0 mt-2'>
                            <li>Use all <strong>USER features</strong> (buy credits, post ads, manage your own ads)</li>
                            <li>Use all <strong>ADMIN features</strong> (approve payments, manage all users, generate PDFs)</li>
                            <li>Switch between user and admin views seamlessly</li>
                        </ul>
                    </div>
                    
                    <h5 class='mt-4 mb-3'>📍 Where to Start?</h5>
                    
                    <div class='row'>
                        <!-- User Section -->
                        <div class='col-md-6'>
                            <div class='section-header'>
                                <h5 class='mb-0'><i class='bi bi-person-circle'></i> 👤 USER MODE</h5>
                                <small>Test features as a regular user</small>
                            </div>
                            
                            <div class='list-group'>
                                <a href='/newspaper/user/dashboard.php' class='list-group-item list-group-item-action'>
                                    <i class='bi bi-house-door'></i> <strong>User Dashboard</strong>
                                    <br><small class='text-muted'>See your credits, ads, transactions (includes admin menu in sidebar)</small>
                                </a>
                                <a href='/newspaper/user/buy-credits.php' class='list-group-item list-group-item-action'>
                                    <i class='bi bi-wallet2'></i> Buy Credits
                                    <br><small class='text-muted'>Purchase credits to post advertisements</small>
                                </a>
                                <a href='/newspaper/user/my-advertisements.php' class='list-group-item list-group-item-action'>
                                    <i class='bi bi-megaphone'></i> My Advertisements
                                    <br><small class='text-muted'>View and manage your ads</small>
                                </a>
                            </div>
                        </div>
                        
                        <!-- Admin Section -->
                        <div class='col-md-6'>
                            <div class='section-header'>
                                <h5 class='mb-0'><i class='bi bi-shield-check'></i> 🔐 ADMIN MODE</h5>
                                <small>Manage the entire system</small>
                            </div>
                            
                            <div class='list-group'>
                                <a href='/newspaper/admin/dashboard.php' class='list-group-item list-group-item-action'>
                                    <i class='bi bi-speedometer2'></i> <strong>Admin Dashboard</strong>
                                    <br><small class='text-muted'>System overview and statistics</small>
                                </a>
                                <a href='/newspaper/admin/approve-payments.php' class='list-group-item list-group-item-action'>
                                    <i class='bi bi-credit-card-2-front'></i> Approve Payments
                                    <br><small class='text-muted'>Review and approve credit purchases</small>
                                </a>
                                <a href='/newspaper/admin/manage-advertisements.php' class='list-group-item list-group-item-action'>
                                    <i class='bi bi-card-list'></i> Manage Ads
                                    <br><small class='text-muted'>Approve/reject all user advertisements</small>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <div class='alert alert-warning mt-4'>
                        <strong><i class='bi bi-lightbulb'></i> Pro Tip:</strong> When you're on User pages, look at the <strong>left sidebar</strong> - you'll see an \"Admin Section\" at the bottom with quick links to admin features!
                    </div>
                    
                    <h5 class='mt-4 mb-3'>🌐 Public Access</h5>
                    <a href='/news_letter2/index.html' class='btn btn-outline-secondary btn-lg w-100' target='_blank'>
                        <i class='bi bi-newspaper'></i> Newsletter Viewer
                        <br><small>No login required - anyone can view published newsletters</small>
                    </a>
                </div>
                
                <!-- Warning -->
                <div class='alert alert-danger text-center'>
                    <strong><i class='bi bi-exclamation-triangle-fill'></i> WARNING:</strong> This is a test bypass for development.
                    <br>Remove <code>admin_bypass.php</code> before going to production!
                </div>
                
            </div>
        </div>
    </div>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css'>
</body>
</html>";
?>
