<?php
/**
 * Simple Email Test - Gmail SMTP
 * Tests configuration without PHPMailer
 */

// SMTP Configuration
$smtp_host = 'smtp.gmail.com';
$smtp_port = 587;
$smtp_user = 'salifa@gmail.com';
$smtp_pass = 'ehhcixtxrsitxvhr';
$from_email = 'salifa@gmail.com';
$from_name = 'VNN Newspaper System';
$to_email = 'salifa@gmail.com';

echo "========================================\n";
echo " Gmail SMTP Test\n";
echo "========================================\n\n";

echo "Testing SMTP connection...\n";
echo "Host: $smtp_host:$smtp_port\n";
echo "User: $smtp_user\n\n";

// Create socket connection
$socket = fsockopen($smtp_host, $smtp_port, $errno, $errstr, 30);

if (!$socket) {
    echo "❌ Failed to connect to SMTP server\n";
    echo "Error: $errstr ($errno)\n";
    exit(1);
}

echo "✅ Connected to SMTP server\n";

// Read server response
$response = fgets($socket, 512);
echo "Server: " . trim($response) . "\n";

// Send EHLO command
fputs($socket, "EHLO vnn.mac.in.th\r\n");
// Read all EHLO responses
while ($line = fgets($socket, 512)) {
    echo "EHLO: " . trim($line) . "\n";
    if (substr($line, 3, 1) == ' ') break; // Last line
}

// Start TLS
fputs($socket, "STARTTLS\r\n");
$response = fgets($socket, 512);
echo "STARTTLS: " . trim($response) . "\n";

if (strpos($response, '220') !== false) {
    echo "✅ TLS started successfully\n";
    
    // Enable crypto
    if (stream_socket_enable_crypto($socket, true, STREAM_CRYPTO_METHOD_TLS_CLIENT)) {
        echo "✅ TLS encryption enabled\n";
        
        // Send EHLO again after TLS
        fputs($socket, "EHLO vnn.mac.in.th\r\n");
        // Read all EHLO responses
        while ($line = fgets($socket, 512)) {
            if (substr($line, 3, 1) == ' ') break; // Last line
        }
        
        // Authenticate
        fputs($socket, "AUTH LOGIN\r\n");
        $response = fgets($socket, 512);
        echo "AUTH: " . trim($response) . "\n";
        
        fputs($socket, base64_encode($smtp_user) . "\r\n");
        $response = fgets($socket, 512);
        echo "User: " . trim($response) . "\n";
        
        fputs($socket, base64_encode($smtp_pass) . "\r\n");
        $response = fgets($socket, 512);
        echo "Pass: " . trim($response) . "\n";
        
        if (strpos($response, '235') !== false) {
            echo "\n✅ ✅ ✅ Authentication SUCCESSFUL! ✅ ✅ ✅\n\n";
            echo "Your Gmail SMTP credentials are working correctly!\n";
            echo "Email notifications are now enabled.\n";
        } else {
            echo "\n❌ Authentication failed\n";
            echo "Please check your App Password\n";
        }
    } else {
        echo "❌ Failed to enable TLS encryption\n";
    }
} else {
    echo "❌ STARTTLS failed\n";
}

// Close connection
fputs($socket, "QUIT\r\n");
fclose($socket);

echo "\n========================================\n";
echo " Test Complete\n";
echo "========================================\n";
