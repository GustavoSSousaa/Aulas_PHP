<?php
require __DIR__.'/../includes/auth.php';
require_login();
require __DIR__.'/../includes/conexao.php';
require __DIR__.'/../includes/functions.php';
require __DIR__.'/../includes/header.php';

$id = (int)($_GET['id'] ?? 0);
$st = $conn->prepare('SELECT id, nome, email FROM usuarios WHERE id = ?');
$st->execute([$id]);
$u = $st->fetch();
if (!$u) { header('Location: /usuarios/listar.php'); exit; }

$erro = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = sanitize($_POST['nome'] ?? '');
    $email = sanitize($_POST['email'] ?? '');

    if (!$nome || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erro = 'Preencha nome e um e-mail válido.';
    } else {
        // Verifica duplicidade de e-mail (outro usuário)
        $chk = $conn->prepare('SELECT id FROM usuarios WHERE email = ? AND id <> ? LIMIT 1');
        $chk->execute([$email, $id]);
        if ($chk->fetch()) {
            $erro = 'Já existe outro usuário com este e-mail.';
        } else {
            $upd = $conn->prepare('UPDATE usuarios SET nome = ?, email = ? WHERE id = ?');
            $upd->execute([$nome, $email, $id]);
            header('Location: /usuarios/listar.php');
            exit;
        }
    }
}
?>
<div class="card" style="max-width:640px;">
  <h1>Editar usuário #<?= (int)$u['id'] ?></h1>
  <?php if ($erro): ?><div class="alert error"><?= htmlspecialchars($erro) ?></div><?php endif; ?>
  <form method="post">
    <label>Nome</label>
    <input type="text" name="nome" required value="<?= htmlspecialchars($u['nome']) ?>">
    <label>E-mail</label>
    <input type="email" name="email" required value="<?= htmlspecialchars($u['email']) ?>">
    <input type="submit" value="Salvar alterações">
    <a class="button secondary" href="/usuarios/listar.php">Cancelar</a>
  </form>
</div>
<?php require __DIR__.'/../includes/footer.php'; ?>