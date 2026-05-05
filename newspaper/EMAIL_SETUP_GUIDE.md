# 📧 Gmail SMTP Setup Guide

## Step-by-Step: Getting Gmail App Password

### ⚠️ Important Notes
- Gmail no longer allows "less secure apps" to use your regular password
- You MUST use an **App Password** instead
- 2-Factor Authentication (2FA) must be enabled on your Gmail account

---

## 📝 Step 1: Enable 2-Factor Authentication

1. Go to your Google Account: https://myaccount.google.com
2. Click **Security** in the left menu
3. Under "Signing in to Google", click **2-Step Verification**
4. Follow the setup wizard to enable 2FA
5. Verify it's working by signing in once

---

## 🔑 Step 2: Generate App Password

1. Go to Google Account Security: https://myaccount.google.com/security
2. Under "Signing in to Google", click **2-Step Verification**
3. Scroll down to the bottom and click **App passwords**
   
   **Direct link:** https://myaccount.google.com/apppasswords

4. You may need to sign in again

5. Click **Select app** dropdown and choose **Mail**

6. Click **Select device** dropdown and choose **Other (Custom name)**

7. Enter a name like: `VNN Newspaper System`

8. Click **Generate**

9. Google will display a 16-character password like: `abcd efgh ijkl mnop`

10. **COPY THIS PASSWORD IMMEDIATELY** - you won't see it again!

---

## 📋 Your Gmail SMTP Settings

Use these settings for `salifa@gmail.com`:

```
SMTP Host:     smtp.gmail.com
SMTP Port:     587 (TLS) or 465 (SSL)
SMTP Security: TLS (STARTTLS)
Username:      salifa@gmail.com
Password:      [Your 16-character App Password]
```

---

## 🚀 Quick Setup Commands

Once you have your App Password, I'll update the configuration for you.

**Example App Password format:** `abcdefghijklmnop` (16 characters, no spaces)

---

## 🧪 Testing Email

After configuration, you can test with:

```bash
cd /websites/vnn.mac.in.th/newspaper
php -r "
require 'includes/config.php';
\$to = 'salifa@gmail.com';
\$subject = 'Test Email from Newspaper System';
\$message = 'This is a test email. If you receive this, SMTP is working!';
\$headers = 'From: ' . SMTP_FROM_EMAIL;
if (mail(\$to, \$subject, \$message, \$headers)) {
    echo 'Email sent successfully!';
} else {
    echo 'Email failed to send.';
}
"
```

---

## 🔧 Alternative: Using PHPMailer (Recommended)

For better email functionality, install PHPMailer:

```bash
cd /websites/vnn.mac.in.th/newspaper
composer require phpmailer/phpmailer
```

---

## ❓ Troubleshooting

### Error: "Username and Password not accepted"
- ✅ Make sure you're using the **App Password**, not your regular Gmail password
- ✅ Remove any spaces from the App Password
- ✅ Verify 2FA is enabled

### Error: "Could not connect to SMTP host"
- ✅ Check firewall allows outbound connections on port 587
- ✅ Try port 465 with SSL instead of TLS
- ✅ Verify internet connection

### Error: "Authentication failed"
- ✅ Double-check the App Password is correct
- ✅ Make sure username is the full email: salifa@gmail.com
- ✅ Try generating a new App Password

---

## 📧 What Emails Will Be Sent?

The newspaper system will send emails for:

1. **User Registration**
   - Welcome email with account details
   - Email verification link (if enabled)

2. **Payment Notifications**
   - Payment received confirmation
   - Payment approved notification
   - Payment rejected notification

3. **Advertisement Notifications**
   - Advertisement submitted confirmation
   - Advertisement approved notification
   - Advertisement rejected notification

4. **Admin Notifications**
   - New user registration
   - New payment received
   - New advertisement submitted

---

## 🔐 Security Best Practices

1. ✅ **Never share your App Password**
2. ✅ **Store it securely in config.php** (not in public files)
3. ✅ **Don't commit it to Git** (add config.php to .gitignore)
4. ✅ **Revoke App Passwords** when no longer needed
5. ✅ **Use different App Passwords** for different applications

---

## 📚 Next Steps

1. **Get your App Password** from Google
2. **Provide the App Password** to me (securely)
3. I'll update the configuration
4. We'll test email sending
5. You're ready to go! 🎉

---

**Need Help?**
- Google App Passwords Help: https://support.google.com/accounts/answer/185833
- Gmail SMTP Documentation: https://support.google.com/a/answer/176600

---

**Ready to proceed?**

Please obtain your Gmail App Password following the steps above, then provide it to me and I'll configure the system for you.
