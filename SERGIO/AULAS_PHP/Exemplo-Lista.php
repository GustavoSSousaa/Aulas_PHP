<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $valorres = array("Gustavo Sousa", "17", "M", "10000000000000000000000000000000000000000000000000000000000000000000000000000000");
    list($usuario, $idade, $genero, $qi) = $valorres;
    echo "Usuario: ".$usuario."<br/>";
    echo "Idade: ".$idade."<br/>";
    echo "Genero: ".$genero."<br/>";
    echo "QI: ".$qi."<br/>";
    ?>
    
</body>
</html>