<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notas</title>
</head>
<body>
    <?php
    $nota = 4;
    if ($nota >= 7) {
        echo ("você foi aprovado");
    }

    if ($nota < 7 && $nota > 3) {
        echo ("você esta de exame");
    }

    if ($nota < 3) {
        echo ("você foi reprovado");
    }
    ?>
    <legend>Gustavo Sousa<legend>
    
</body>
</html>