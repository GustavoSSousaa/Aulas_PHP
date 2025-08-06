<!DOCTYPE html>
<html lang="pt-bt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    echo "<br/>";
    $AmazonProducts = array(
        array("Codigo" => "Livro", "Descrição" => "Livro", "Preço" => 50),
        array("Codigo" => "DVD", "Descrição" => "Filmes", "Preço" => 15),
        array("Codigo" => "CDs", "Descrição" => "Musica", "Preço" => 20),
    );
    for ($linha = 0; $linha < 3; $linha++) { ?>
    <p> | <?= $AmazonProducts[$linha]["Codigo"] ?>
        | <?= $AmazonProducts[$linha]["Descrição"] ?>
        | <?= $AmazonProducts[$linha]["Preço"] ?>
    </p>
<?php
}
?>
        
    
</body>
</html>