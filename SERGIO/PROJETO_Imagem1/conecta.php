<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'armazena_imagem';

$conexao = mysqli_connect($host, $user, $password, $database);

if (!$conexao) {
    die("Erro na conexão com o banco de dados: " . mysqli_connect_error());
}
?>