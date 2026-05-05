<?php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../classes/Advertisement.php';

requireLogin();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['csrf_token']) || !verifyCsrfToken($_POST['csrf_token'])) {
        setFlash('error', 'Invalid request');
        redirect(BASE_URL . 'user/my-advertisements.php');
    }
    
    $adId = (int)$_POST['ad_id'];
    $userEmail = getCurrentUserEmail();
    
    $ad = new Advertisement();
    $result = $ad->delete($adId, $userEmail);
    
    if ($result['success']) {
        setFlash('success', $result['message']);
    } else {
        setFlash('error', $result['message']);
    }
}

redirect(BASE_URL . 'user/my-advertisements.php');
