<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $name = "Gustavo Gostoso";
    $name = null;
    if (isset($name)) {
        print "Essa linha esta sendo printada por a variavel 'name' tem um valor.\n
                Essa linha não foi printada por a variavel 'name' não tem um valor";
    }
    ?>
    
</body>
</html>