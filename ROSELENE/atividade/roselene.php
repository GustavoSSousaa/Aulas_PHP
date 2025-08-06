<!--CODIGO HTML DO FORMULARIO-->
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Saúde</title>
    <!--ESCREVA O CSS ou UTILIZE BOOTSTRAP NO CÓDIGO ABAIXO-->
    <script src="Formulario.js"></script>
    <link rel="stylesheet" type="text/css" href="estilo_saude2.css">
</head>
<body>
    <form action="#" id="Formulario" onsubmit="return valida()" method="post">
        <!--DADOS PESSOAIS-->
        <fieldset>
            <div>
                <h3>Cadastro e Visualização de Produtos no Estoque</h3>
            </div>
            <div id="linha">
                <hr>
            </div>
            <br>


            <div id="autor">
                <h2>Gustavo Sousa</h2>
            </div>


            <table border="0"cellspacing="5">
                <tr>    <!--NOME-->
                    <td align="right">
                        <label for="nome">Nome do produto: </label>
                    </td>


                    <td align="right">
                        <input class="tamanho" type="text" name="nome" size="15" required>
                    </td>
                </tr>


                <tr>    <!--POSTO DE SAÚDE-->
                    <td align="right">
                        <label for="postosaude">S.K.U: </label>
                    </td>


                    <td align="right">
                        <input class="tamanho2" type="text" name="posto" size="15" maxlength="15">
                    </td>
                </tr>


                <tr>    <!--DIABETES-->
                    <td align="right">
                        <label for="tipodiabete">Quantidade: </label>
                    </td>


                    <td align="right">
                        <input class="tamanho" type="text" name="diabetes" required>
                    </td>
                </tr>


                <tr>    <!--CARTÃO SUS-->
                    <td align="right">
                        <label for="cartaosus">Preço: </label>
                    </td>


                    <td align="right">
                        <input type="text" required onkeypress="mascara(this, CartaoSus)" maxlength="10">
                    </td>
                </tr>


               

                <tr>
                    <td class="botao">
                        <input class="btn1" type="submit" onclick="return validar" value="Enviar">
                        <input class="btn2" type="button" value="cancelar">
                    </td>
                </tr>
            </table>
        </fieldset>
    </form>


</body>
</html>
