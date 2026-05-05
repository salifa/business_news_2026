<?php
require_once __DIR__ . '/../includes/config.php';

// Logout user
if (isLoggedIn()) {
    $user = new User();
    $user->logout();
}

setFlash('success', 'ออกจากระบบสำเร็จ');
redirect(BASE_URL . 'public/login.php');
