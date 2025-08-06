<?php
//INCLUI O ARQUIVO DE CONEXÃO COM O BANCO DE DADOS
require_once ('conecta.php');

//CRIA A CONSULTA sql PARA SELECIONAR OS DADOS PRINCIPAIS(SEM COLUNAS IMAGEM)

$querySelecao = "SELECT codigo, evento, descricao, nome_imagem, tamanho_imagem FROM tabela_imagem";

$resultado = mysqli_query($conexao, $querySelecao);

if (!$resultado){
    die("Erro na consulta: ".mysqli_error($conexao));
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Armazenando imagens no banco Mysqli</title>
</head>
<body>
    <h2>Selecione um novo arquivo de imagem</h2>
    <form enctype="multipart/form-data" action="upload.php" method="POST">
        <input type="hidden" name="MAX_FILE_SIZE" value="999999999"/>
        <input type="text" name="evento" placeholder="Nome do Evento"/>
        <input type="text" name="descricao" placeholder="Descrição do Evento"/>
        <input type="file" name="imagem"/>
        <input type="submit" name="Salvar"/>
    </form>
</br>
<table border="1">
    <tr>
        <td aling="center">Código</td>
        <td aling="center">Evento</td>
        <td aling="center">Descrição</td>
        <td aling="center">Nome da imagem</td>
        <td aling="center">Tamanho</td>
        <td aling="center">Visualizar imagem</td>
        <td aling="center">Excluir imagem</td>
    </tr>
    <?php 
    while($arquivos= mysqli_fetch_array($resultado)){    ?>
    <tr>
        <td aling="center"><?php echo $arquivos['codigo'];?></td>
        <td aling="center"><?php echo $arquivos['evento'];?></td>
        <td aling="center"><?php echo $arquivos['descricao'];?></td>
        <td aling="center"><?php echo $arquivos['nome_imagem'];?></td>
        <td aling="center"><?php echo $arquivos['tamanho_imagem'];?></td>
        <td aling="center"><a href="ver_imagens.php?id=<?php echo $arquivos['codigo'];?>">Ver imagens</a></td>
        <td aling="center"><a href="excluir_imagens.php?id=<?php echo $arquivos['codigo'];?>">Excluir imagens</a></td>
    </tr>
    <?php } ?>
    </table>

</body>
</html>