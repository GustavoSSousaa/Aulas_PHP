<?php
require __DIR__.'/../includes/auth.php';
require_login();
require __DIR__.'/../includes/conexao.php';
require __DIR__.'/../includes/header.php';

$id = (int)($_GET['id'] ?? 0);
// Busca para exibir confirmação
$st = $conn->prepare('SELECT id, nome, email FROM usuarios WHERE id = ?');
$st->execute([$id]);
$u = $st->fetch();
if (!$u) { header('Location: /usuarios/listar.php'); exit; }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (($_POST['confirm'] ?? '') === 'sim') {
        $del = $conn->prepare('DELETE FROM usuarios WHERE id = ?');
        $del->execute([$id]);
    }
    header('Location: /usuarios/listar.php');
    exit;
}
?>
<div class="card" style="max-width:640px;">
  <h1>Excluir usuário</h1>
  <p>Tem certeza que deseja excluir <strong><?= htmlspecialchars($u['nome']) ?></strong> (<?= htmlspecialchars($u['email']) ?>)?</p>
  <form method="post">
    <input type="hidden" name="confirm" value="sim">
    <input type="submit" value="Sim, excluir">
    <a class="button secondary" href="/usuarios/listar.php">Cancelar</a>
  </form>
</div>
<?php require __DIR__.'/../includes/footer.php'; ?>