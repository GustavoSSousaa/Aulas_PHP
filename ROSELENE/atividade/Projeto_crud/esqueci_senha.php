<?php
require __DIR__.'/includes/conexao.php';
require __DIR__.'/includes/functions.php';

$info = $erro = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = sanitize($_POST['email'] ?? '');
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erro = 'Informe um e-mail válido.';
    } else {
        $st = $conn->prepare('SELECT id, nome, email FROM usuarios WHERE email = ? LIMIT 1');
        $st->execute([$email]);
        if ($u = $st->fetch()) {
            $token = bin2hex(random_bytes(32));
            $now = date('Y-m-d H:i:s');
            $up = $conn->prepare('UPDATE usuarios SET token_recuperacao = ?, data_token = ? WHERE id = ?');
            $up->execute([$token, $now, $u['id']]);
            $link = (isset($_SERVER['HTTPS'])?'https':'http') . '://' . $_SERVER['HTTP_HOST'] . '/redefinir_senha.php?token=' . urlencode($token);

            // Envio de e-mail (ambiente local pode não enviar). Mantemos o link na tela como fallback.
            // @mail($u['email'], 'Recuperação de senha', "Use este link para redefinir sua senha: $link");

            $info = 'Se o e-mail existir, enviaremos instruções. Link de teste: ' . $link;
        } else {
            $info = 'Se o e-mail existir, enviaremos instruções. (Proteção de privacidade)';
        }
    }
}
require __DIR__.'/includes/header.php';
?>
<div class="card" style="max-width:560px;margin:0 auto;">
  <h1>Esqueci minha senha</h1>
  <?php if ($info): ?><div class="alert success"><?= $info ?></div><?php endif; ?>
  <?php if ($erro): ?><div class="alert error"><?= htmlspecialchars($erro) ?></div><?php endif; ?>
  <form method="post" novalidate>
    <label>E-mail cadastrado</label>
    <input type="email" name="email" required>
    <input type="submit" value="Enviar link de recuperação">
  </form>
</div>
<?php require __DIR__.'/includes/footer.php'; ?>