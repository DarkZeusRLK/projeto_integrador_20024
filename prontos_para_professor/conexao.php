<?php
$host = "localhost";
$user = "root";  // Substitua pelo nome do usuário do banco de dados
$password = "";  // Substitua pela senha do banco de dados
$database = "projeto_integrador";  // Substitua pelo nome do banco de dados

// Cria a conexão
$conexao = new mysqli($host, $user, $password, $database);

// Verifica se houve erro na conexão
if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}
?>
