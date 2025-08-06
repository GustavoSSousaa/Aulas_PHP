<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $vogais = array("a", "e", "i", "o", "u",
                    "A", "E", "I", "O", "U");
    echo "Hello world of PHP<br/>";
    $cons = str_replace($vogais, "", "Hello world of PHP");
    echo "Consoantes:".$cons,"<br/>";
    // 12345678901
    $test = "Hello world! \n";
    print "Posição da letra 'o' :";
    print strpos($test, "o", 5)."<hr/>";
    print "Posição da letra 'o' apos 5°";
    print strpos($test, "o", 5)."<hr/>";
    $message = "troca letra uma a uma";
    echo $message."<br/>";
    $new_message = strtr($message, "abcef", "123456");
    echo "Criptogrando: ".$new_message."<br/>";
    $new_message = strtr($message, "123456", "abcef");
    echo "Descriptorafando:".$new_message."<br/>";
    ?>
    
</body>
</html>