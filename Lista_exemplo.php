<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    list($nome, $telefone, $codigo) = file ("pessoais.txt");
    echo "Nome: $nome <br/>";
    echo "Telefone: $telefone <br/>";
    echo "Codigo: $codigo <br/>";
    ?>

    
</body>
</html>