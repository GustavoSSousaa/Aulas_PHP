<?php
    //Configuraçao do banco de dados
    $host = 'localhost';
    $dbname = 'armazena_imagem';
    $username = 'root';
    $password = '';

try {
    //Conexao com o banco usando pdo
    $pdo = new pdo("mysql:host=$host;dbname:$dbname",$username,$password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //Recupera todos os funcionarios do banco de dados
    $sql = "SELECT id,nome FROM funcionarios";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $funcionarios = $stmt->fetchAll(PDO::FETCH_ASSOC); // BUSCA TODOS OS RESULTADO COMO UMA MATRIZ ASSOCIATIVA

    // VERIFICA SE FOI SOLICITADO A EXCLUSAO DE UM FUNCIONARIO
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['excluir_id'])){
        $excluir_id = $_POST['excluir_id'];
        $sql_excluir = "DELETE FROM funcionarios where id=:id";
        $stmt_excluir = $pdo->prepare($sql_excluir);
        $stmt_excluir->bindParam(':id',$excluir_id,PDO::PARAM_INT);
        $stmt_excluir->execute();

        // REDIRECIONA PARA EVITAR REENVIO DO FORMULARIO
        headre("Location: ".$_SERVER['PHP_SELF']);
        exit();
    }
} catch(PDOException $e){
    echo "ERRO: ". $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de funcionarios</title>
</head>
<body>
    <h1>Consulta de funcionarios</h1>

    <ul>
        <?php foreach($funcionarios as $funcionario):?>
            <li>
                <!-- CODIGO CRIA LINK PARA VISUALIZAR DETALHES DO FUNCIONARIO -->
                <a href="visualizar_funcionario.php?id=<?= $funcionario['id']?>">
                    <?= htmlspecialchars($funcionario['nome'])?>
                </a>
                <!-- FORMULARIO PARA EXCLUIR FUNCIONARIO -->
                 <form method="POST" style="display:inline";>
                    <input type="hidden" name="excluir_id" value="<?=$funcionario['id']?>">
                    <button type="submit">Excluir</button>
                 </form>
        </li>
        <?php endforeach; ?>
</ul>
</body>
</html>