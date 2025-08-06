<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
if (isset($_GET['Nome']) && isset($_GET['Idade']))
{
    echo "Recebido o cliente ".$_GET['Nome'];
    echo " que tem ".$_GET['Idade']." anos";
}
?>
    
</body>
</html>