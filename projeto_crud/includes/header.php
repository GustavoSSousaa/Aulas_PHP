<?php
// includes/header.php
if (session_status() !== PHP_SESSION_ACTIVE) session_start();
$user = $_SESSION['user'] ?? null;
?>
<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Projeto CRUD</title>
  <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<div class="container">
  <nav>
    <a href="/index.php">Início</a>
    <?php if ($user): ?>
      <a href="/usuarios/listar.php">Usuários</a>
      <span class="small">Logado como <strong><?= htmlspecialchars($user['nome']) ?></strong></span>
      <a class="button secondary" href="/logout.php">Sair</a>
    <?php else: ?>
      <a href="/login.php">Login</a>
    <?php endif; ?>
  </nav>

  <footer>Projeto CRUD em PHP • <?php echo date('Y'); ?></footer>
</div>
</body>
</html>