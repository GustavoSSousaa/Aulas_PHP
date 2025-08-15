<?php
require __DIR__.'/../includes/auth.php';
require_login();
require __DIR__.'/../includes/conexao.php';
require __DIR__.'/../includes/header.php';

$st = $conn->query('SELECT id, nome, email FROM usuarios ORDER BY id DESC');
$usuarios = $st->fetchAll();
?>
<div class="card">
  <h1>Usuários</h1>
  <p><a class="button" href="/usuarios/cadastrar.php">+ Novo usuário</a></p>
  <table>
    <thead>
      <tr><th>ID</th><th>Nome</th><th>E-mail</th><th>Ações</th></tr>
    </thead>
    <tbody>
      <?php foreach ($usuarios as $u): ?>
        <tr>
          <td><?= (int)$u['id'] ?></td>
          <td><?= htmlspecialchars($u['nome']) ?></td>
          <td><?= htmlspecialchars($u['email']) ?></td>
          <td>
            <a href="/usuarios/editar.php?id=<?= (int)$u['id'] ?>">Editar</a> |
            <a href="/usuarios/excluir.php?id=<?= (int)$u['id'] ?>">Excluir</a>
          </td>
        </tr>
      <?php endforeach; ?>
      <?php if (empty($usuarios)): ?>
        <tr><td colspan="4" class="small">Nenhum usuário encontrado.</td></tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>
<?php require __DIR__.'/../includes/footer.php'; ?>