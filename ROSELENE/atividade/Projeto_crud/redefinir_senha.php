<?php
require __DIR__.'/includes/conexao.php';
require __DIR__.'/includes/functions.php';

$erro = $ok = null;
$token = sanitize($_GET['token'] ?? '');
if (!$token) {
    header('Location: /login.php?m=token-ausente');
    exit;
}

$st = $conn->prepare('SELECT id, data_token FROM usuarios WHERE token_recuperacao = ? LIMIT 1');
$st->execute([$token]);
$user = $st->fetch();
if (!$user) {
    $erro = 'Token inválido.';
} else {
    $criado = strtotime($user['data_token']);
    if (!$criado || (time() - $criado) > 3600) { // 1 hora
        $erro = 'Token expirado. Solicite novamente.';
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !$erro) {
    $senha = $_POST['senha'] ?? '';
    $conf = $_POST['confirmar'] ?? '';
    if (strlen($senha) < 6) {
        $erro = 'A senha deve ter ao menos 6 caracteres.';
    } elseif ($senha !== $conf) {
        $erro = 'As senhas não coincidem.';
    } else {
        $hash = password_hash($senha, PASSWORD_DEFAULT);
        $up = $conn->prepare('UPDATE usuarios SET senha = ?, token_recuperacao = NULL, data_token = NULL WHERE id = ?');
        $up->execute([$hash, $user['id']]);
        $ok = 'Senha alterada com sucesso. Você já pode fazer login.';
    }
}

require __DIR__.'/includes/header.php';
?>
<div class="card" style="max-width:560px;margin:0 auto;">
  <h1>Redefinir senha</h1>
  <?php if ($erro): ?><div class="alert error"><?= htmlspecialchars($erro) ?></div><?php endif; ?>
  <?php if ($ok): ?><div class="alert success"><?= htmlspecialchars($ok) ?></div><?php endif; ?>
  <form method="post" novalidate>
    <label>Nova senha</label>
    <input type="password" name="senha" required>
    <label>Confirmar senha</label>
    <input type="password" name="confirmar" required>
    <input type="submit" value="Salvar nova senha">
  </form>
</div>
<?php require __DIR__.'/includes/footer.php'; ?>