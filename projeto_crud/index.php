<?php
require __DIR__.'/includes/auth.php';
require_login();
require __DIR__.'/includes/header.php';
?>
<div class="card">
  <h1>Bem-vindo(a) 👋</h1>
  <p>Esta é a área administrativa protegida. Use o menu para gerenciar usuários.</p>
</div>
<?php require __DIR__.'/includes/footer.php'; ?>