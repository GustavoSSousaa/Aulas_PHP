<?php
require __DIR__.'/includes/conexao.php';
require __DIR__.'/includes/functions.php';
if (session_status() !== PHP_SESSION_ACTIVE) session_start();

$erro = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = sanitize($_POST['email'] ?? '');
    $senha = $_POST['senha'] ?? '';

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erro = 'E-mail inválido.';
    } else {
        $st = $conn->prepare('SELECT id, nome, email, senha FROM usuarios WHERE email = ? LIMIT 1');
        $st->execute([$email]);
        $user = $st->fetch();
        if (!$user || !password_verify($senha, $user['senha'])) {
            $erro = 'Credenciais inválidas.';
        } else {
            $_SESSION['user'] = ['id'=>$user['id'], 'nome'=>$user['nome'], 'email'=>$user['email']];
            header('Location: /index.php');
            exit;
        }
    }
}
require __DIR__.'/includes/header.php';
?>
<div class="card" style="max-width:520px;margin:0 auto;">
  <h1>Login</h1>
  <?php if ($msg = ($_GET['m'] ?? null)): ?>
    <div class="alert small"><?= htmlspecialchars($msg) ?></div>
  <?php endif; ?>
  <?php if ($erro): ?><div class="alert error"><?= htmlspecialchars($erro) ?></div><?php endif; ?>
  <form method="post" novalidate>
    <label>E-mail</label>
    <input type="email" name="email" required>
    <label>Senha</label>
    <input type="password" name="senha" required>
    <input type="submit" value="Entrar">
  </form>
  <p class="small"><a href="/esqueci_senha.php">Esqueci minha senha</a></p>
</div>
<?php require __DIR__.'/includes/footer.php'; ?>