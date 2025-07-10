<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    # index 0123456789012345
    $name = "Stefanie Hatcher";
    echo $name, " nome <br/><br/>"
    $length = strlen($name);
    $cmp = strcmp($name, "Brian Le");
    $index = strpos($name, "e");
    $firts = substr($name, 9, 5);
    $name = strtoupper($name);
    ?>
</body>
</html>