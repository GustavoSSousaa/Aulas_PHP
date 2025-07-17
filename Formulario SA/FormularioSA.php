<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if (isset($_GET['tipo1']) && isset($_GET['voltagem1']) && isset($_GET['marca1']) && isset($_GET['qtda1']) && isset($_GET['preco1']) && isset($_GET['data1']))
    {
        echo "<b>Recebido o Nome :</b> ".$_GET['tipo1'];
        echo "<br><br>";
        echo ":<b>Recebido a Voltagem : :</b>".$_GET['voltagem1']."w";
        echo "<br><br>";
        echo ":<b>Recebido a Marca : :</b>".$_GET['marca1'];
        echo "<br><br>";
        echo ":<b>Recebido a Quantidade : :</b>".$_GET['qtda1'];
        echo "<br><br>";
        echo ":<b>Recebido o Preço : :</b>".$_GET['preco1'];
        echo "<br><br>";
        echo ":<b>Recebido a Data de validade : :</b>".$_GET['data1'];
    } else{
        echo ":<b>ERRO NO CADASTRO:</b>";
    }
    ?>
    
</body>
</html>