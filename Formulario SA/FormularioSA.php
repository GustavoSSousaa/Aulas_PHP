<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
if (isset($_GET['tipo']) && isset($_GET['voltagem']) && isset($_GET['marca']) && isset($_GET['qtda']) && isset($_GET['preco']) && isset($_GET['data']))
{
    echo "Recebido o Nome : ".$_GET['tipo'];
    echo "Recebido a Voltagem : ".$_GET['voltagem']."w";
    echo "Recebido a Marca : ".$_GET['marca'];
    echo "Recebido a Quantidade : ".$_GET['qtda'];
    echo "Recebido o Preço : ".$_GET['preco'];
    echo "Recebido a Data de validade : ".$_GET['data'];
}
?>
    
</body>
</html>