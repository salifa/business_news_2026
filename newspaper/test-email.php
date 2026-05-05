<?php
/**
 * Email Test Script
 * Test Gmail SMTP Configuration
 */

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/database.php';

echo "========================================\n";
echo " Email Configuration Test\n";
echo " Gmail SMTP for salifa@gmail.com\n";
echo "========================================\n\n";

// Display current configuration
echo "Current SMTP Settings:\n";
echo "----------------------\n";
echo "SMTP Enabled: " . (SMTP_ENABLE ? 'Yes' : 'No') . "\n";
echo "SMTP Host: " . SMTP_HOST . "\n";
echo "SMTP Port: " . SMTP_PORT . "\n";
echo "SMTP User: " . SMTP_USER . "\n";
echo "SMTP Password: " . (SMTP_PASS === 'your-password' ? 'NOT SET' : '***' . substr(SMTP_PASS, -4)) . "\n";
echo "From Email: " . SMTP_FROM_EMAIL . "\n";
echo "From Name: " . SMTP_FROM_NAME . "\n\n";

if (!SMTP_ENABLE) {
    echo "⚠️  SMTP is DISABLED in config.php\n";
    echo "Please set SMTP_ENABLE to true\n\n";
    exit(1);
}

if (SMTP_USER === 'your-email@gmail.com' || SMTP_PASS === 'your-password') {
    echo "⚠️  SMTP credentials not configured\n";
    echo "Please update SMTP_USER and SMTP_PASS in config.php\n\n";
    exit(1);
}

// Check if PHPMailer is available
if (file_exists(__DIR__ . '/vendor/autoload.php')) {
    require __DIR__ . '/vendor/autoload.php';
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    echo "Testing with PHPMailer...\n";
    echo "----------------------\n\n";
    
    $mail = new PHPMailer(true);
    
    try {
        // Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host       = SMTP_HOST;
        $mail->SMTPAuth   = true;
        $mail->Username   = SMTP_USER;
        $mail->Password   = SMTP_PASS;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = SMTP_PORT;
        $mail->CharSet    = 'UTF-8';
        
        // Recipients
        $mail->setFrom(SMTP_FROM_EMAIL, SMTP_FROM_NAME);
        $mail->addAddress(SMTP_USER); // Send to yourself for testing
        
        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Test Email - Newspaper System';
        $mail->Body    = '<h1>Test Email</h1><p>If you receive this email, your Gmail SMTP configuration is working correctly!</p><p>System: ' . NEWSPAPER_NAME . '</p>';
        $mail->AltBody = 'Test Email - If you receive this email, your Gmail SMTP configuration is working correctly!';
        
        $mail->send();
        echo "\n✅ Email sent successfully!\n";
        echo "Check your inbox at: " . SMTP_USER . "\n";
        
    } catch (Exception $e) {
        echo "\n❌ Email could not be sent.\n";
        echo "Error: {$mail->ErrorInfo}\n";
    }
    
} else {
    // Fallback to PHP mail()
    echo "PHPMailer not found, using PHP mail() function...\n";
    echo "⚠️  Note: PHP mail() may not work with Gmail SMTP\n";
    echo "Install PHPMailer with: composer require phpmailer/phpmailer\n\n";
    
    $to = SMTP_USER;
    $subject = 'Test Email - Newspaper System';
    $message = 'If you receive this email, email configuration is working!';
    $headers = 'From: ' . SMTP_FROM_EMAIL . "\r\n";
    $headers .= 'Content-Type: text/html; charset=UTF-8' . "\r\n";
    
    if (mail($to, $subject, $message, $headers)) {
        echo "✅ Email sent successfully!\n";
        echo "Check your inbox at: $to\n";
    } else {
        echo "❌ Email failed to send.\n";
    }
}

echo "\n========================================\n";
echo " Test Complete\n";
echo "========================================\n";
