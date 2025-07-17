<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style type="text/css">
        label {
            display: inline-block;
            width: 100px;
        }
        </style>
</head>
<body>
    <form method="POST" apache="#";>
        <label for="usuario"> Usuario: </label>
        <input type="text" name="usuario" required />
        <br/>
        <label for="senha"> Senha: </label>
        <input type="password" name="senha" required />
        <br/>
        <input type="submit" value="Enviar" name="enviar" />
        <input type="reset" value="Limpar" />

    </form>

    <?php
        if (isset($_POST["enviar"]))
        {
            $usuario = $_POST["usuario"];
            $senha = $_POST["senha"];
            echo "RECIBIDO $usuario e $senha <br/>";
            $cripto = MD5($senha);
            echo "CRIPTOGRAFADA $cripto";
        }
        ?>

    
</body>
</html>