<?php
require __DIR__.'/../includes/auth.php';
require_login();
require __DIR__.'/../includes/conexao.php';
require __DIR__.'/../includes/functions.php';
require __DIR__.'/../includes/header.php';

$erro = $ok = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = sanitize($_POST['nome'] ?? '');
    $email = sanitize($_POST['email'] ?? '');
    $senha = $_POST['senha'] ?? '';

    if (!$nome || !filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($senha) < 6) {
        $erro = 'Preencha nome, e-mail válido e senha (mín. 6).';
    } else {
        // Verifica duplicidade de e-mail
        $st = $conn->prepare('SELECT id FROM usuarios WHERE email = ? LIMIT 1');
        $st->execute([$email]);
        if ($st->fetch()) {
            $erro = 'Já existe um usuário com este e-mail.';
        } else {
            $hash = password_hash($senha, PASSWORD_DEFAULT);
            $ins = $conn->prepare('INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)');
            $ins->execute([$nome, $email, $hash]);
            header('Location: /usuarios/listar.php');
            exit;
        }
    }
}
?>
<div class="card" style="max-width:640px;">
  <h1>Novo usuário</h1>
  <?php if ($erro): ?><div class="alert error"><?= htmlspecialchars($erro) ?></div><?php endif; ?>
  <form method="post">
    <label>Nome</label>
    <input type="text" name="nome" required>
    <label>E-mail</label>
    <input type="email" name="email" required>
    <label>Senha</label>
    <input type="password" name="senha" required>
    <input type="submit" value="Salvar">
    <a class="button secondary" href="/usuarios/listar.php">Cancelar</a>
  </form>
</div>
<?php require __DIR__.'/../includes/footer.php'; ?>