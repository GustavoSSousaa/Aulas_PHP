<?php
// includes/functions.php
function sanitize($value) {
    if (is_array($value)) return array_map('sanitize', $value);
    $value = trim($value ?? '');
    $value = strip_tags($value);
    return $value;
}
function flash($key, $msg = null) {
    if (session_status() !== PHP_SESSION_ACTIVE) session_start();
    if ($msg !== null) {
        $_SESSION['flash'][$key] = $msg;
        return;
    }
    if (!empty($_SESSION['flash'][$key])) {
        $m = $_SESSION['flash'][$key];
        unset($_SESSION['flash'][$key]);
        return $m;
    }
    return null;
}
?>