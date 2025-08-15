<?php
// includes/conexao.php
$host = 'localhost';
$dbname = 'projeto_crud';
$username = 'root'; // ajuste conforme seu ambiente
$password = '';     // ajuste conforme seu ambiente

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
} catch(PDOException $e) {
    die("Erro de conexão: " . $e->getMessage());
}
?>