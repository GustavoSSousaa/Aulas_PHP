<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Formulário de Saúde</title>
</head>
<body>

<form id="Formulario" method="post" action="">
    <fieldset>
        <legend>Dados do Produto</legend>
        <label>Nome do produto: <input type="text" name="nome"></label><br><br>
        <label>S.K.U do produto: <input type="text" name="sku"></label><br><br>
        <label>Quantidade do produto: <input type="text" name="qtda"></label><br><br>
        <label>Preço do produto: <input type="text" name="preco"></label><br><br>
        <input type="submit" value="Cadastro">
    </fieldset>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = htmlspecialchars($_POST['nome']);
    $sku = htmlspecialchars($_POST['sku']);
    $qtda = htmlspecialchars($_POST['qtda']);
    $preco = htmlspecialchars($_POST['preco']);

    echo "<fieldset>";
    echo "<legend>Dados Cadastrados</legend>";
    echo "Nome : $nome<br><br>";
    echo "S.K.U : $sku<br><br>";
    echo "Quantidade : $qtda<br><br>";
    echo "Preço : $preco<br><br>";
    echo "</fieldset>";
}
?>

</body>
</html>
