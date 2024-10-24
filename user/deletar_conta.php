<?php
include('../static/conexao.php');

// Iniciar a sessão se ainda não estiver iniciada
if (!isset($_SESSION)) {
    session_start();
}

// Verificar se o usuário está logado
if (!isset($_SESSION['nome'])) {
    header("Location: login.php");
    exit();
}

// Verificar se o botão de deletar foi pressionado
if (isset($_POST['bt_id_deletar'])) {
    $id_usuario_deletar = $_POST['bt_id_deletar'];

    // Usar prepared statement para evitar SQL Injection
    $stmt = $conexao->prepare("DELETE FROM cadastro WHERE id_usuario = ?");
    
    // Verifica se a preparação da query foi bem-sucedida
    if (!$stmt) {
        die("Erro na preparação da consulta SQL: " . $conexao->error);
    }

    $stmt->bind_param("i", $id_usuario_deletar);
    $stmt->execute();
    $stmt->close();

    // Finalizar a sessão e redirecionar para a página inicial ou login
    session_destroy();
    header("Location: login.php?conta_deletada=true");
    exit();
}
?>
