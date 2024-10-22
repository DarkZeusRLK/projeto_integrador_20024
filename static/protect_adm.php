<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>protect_adm</title>
</head>
<style>
    .protect-adm{
    width: 100%;
    background-color: #f8d7da; 
    color: #721c24; 
    padding: 10px; 
    text-align: center; 
    font-weight: bold;
    }
</style>
<body>
<?php
if (!isset($_SESSION)) {
    session_start();
}

// Verifique se a variável de sessão 'tipo_usuario' está definida e se seu valor é 'administrador'
if (!isset($_SESSION["tipo_usuario"]) || $_SESSION["tipo_usuario"] !== 'administrador') {
    // Configuração de um alerta personalizado
    echo '<div class="protect-adm">
        Acesso negado: Você não pode acessar esta página porque não está logado como administrador. <a href="../user/login.php" style="color: #721c24; font-weight: bold; text-decoration: underline;">Clique aqui para entrar</a>.
    </div>';
    // Redirecionamento automático após alguns segundos
   
    
    // Encerre a execução do código
    exit();
}
?>

</body>
</html>
