<?php
if (session_status() !== PHP_SESSION_ACTIVE) session_start();
$_SESSION = [];
session_destroy();
header('Location: /login.php?m=logout-ok');
exit;
?>