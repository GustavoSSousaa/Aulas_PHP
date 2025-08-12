<?php
    //Configuração do banco de dados
    $host = 'localhost';
    $dbname = 'armazenaimagemm';
    $username = 'root';
    $password = '';

try {
    //Conexão com o banco usando PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //Recupera todos os funcionarios do banco de dados
    $sql = "SELECT id,nome FROM funcionarios";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $funcionarios = $stmt->fetchAll(PDO::FETCH_ASSOC); //busca todos os resultados como uma matriz associativa

    //verifica se foi solicitado a exclusão de um funcionario
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['excluir_id'])) {
        $excluir_id = $_POST['excluir_id'];
        //prepara a query de exclusão
        $sql_excluir = "DELETE FROM funcionarios WHERE id = :id";
        $stmt_excluir = $pdo->prepare($sql_excluir);
        $stmt_excluir->bindParam(':id', $excluir_id, PDO::PARAM_INT);
        $stmt_excluir->execute();

        //Redireciona para evitar reenvio do formulário
        header("location: " . $_SERVER['PHP_SELF']);
        exit();
    }
} catch(PDOException $e){
    echo "Erro: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Funcionários</title>
</head>
<body>
    <h1>Consulta de Funcionários</h1>
    
    <ul>
        <?php foreach($funcionarios as $funcionario): ?>
        <li>
            <!-- CODIGO ABAIXO CRIA LINK PARA VISUALIZAR DETALHES DO FUNCIONARIO -->
            <a href="visualizar_funcionario.php?id=<?=$funcionario['id']?>">
                <?= htmlspecialchars($funcionario['nome']) ?>
            </a>

            <!-- FORMULARIO PARA EXCLUIR FUNCIONARIO -->
            <form method="POST" style="display:inline;">
                <input type="hidden" name="excluir_id" value="<?=$funcionario['id']?>">
                <button type="submit">EXCLUIR</button>
            </form>
        </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>