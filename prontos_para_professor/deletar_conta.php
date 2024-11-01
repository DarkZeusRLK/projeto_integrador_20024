<?php
include('../static/conexao.php');

// Iniciar a sessão se ainda não estiver iniciada
if (!isset($_SESSION)) {
    session_start();
}

// Verificar se o ID do usuário a ser deletado foi passado via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_usuario'])) {
    $id_usuario_deletar = $_POST['id_usuario'];
    
    // Usar prepared statement para evitar SQL Injection
    $stmt = $conexao->prepare("DELETE FROM cadastro WHERE id_usuario = ?");

    // Verifica se a preparação da query foi bem-sucedida
    if (!$stmt) {
        die("Erro na preparação da consulta SQL: " . $conexao->error);
    }

    $stmt->bind_param("i", $id_usuario_deletar);
    
    // Executar e verificar se a exclusão foi realizada
    if ($stmt->execute()) {
        $stmt->close();

        // Finalizar a sessão e redirecionar para a página de login
        session_destroy();
        sleep(1); // Esperar 1 segundo para garantir o término da sessão
        header("Location: login.php?conta_deletada=true");
        exit();
    } else {
        // Em caso de falha na execução da query
        die("Erro ao deletar a conta: " . $stmt->error);
    }
} else {
    // Caso o ID não tenha sido enviado, redirecionar para a página de conta
    header("Location: editaconta.php?erro=sem_id");
    exit();
}
?>
