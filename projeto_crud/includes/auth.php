<?php
// includes/auth.php
if (session_status() !== PHP_SESSION_ACTIVE) session_start();

function require_login() {
    if (empty($_SESSION['user'])) {
        header('Location: /login.php?m=precisa-logar');
        exit;
    }
}
function current_user() {
    return $_SESSION['user'] ?? null;
}
?>