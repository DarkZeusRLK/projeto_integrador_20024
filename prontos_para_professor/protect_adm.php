<?php
if (!isset($_SESSION)) {
    session_start();
}

// Verifique se a variável de sessão 'tipo_usuario' está definida e se seu valor é 'administrador'
if (!isset($_SESSION["tipo_usuario"]) || $_SESSION["tipo_usuario"] !== 'administrador') {
    // Configuração de um alerta personalizado
    echo '<div style="background-color: #f8d7da; color: #721c24; padding: 10px; text-align: center; font-weight: bold;">
        Acesso negado: Você não pode acessar esta página porque não está logado como administrador. <a href="../user/login.php" style="color: #721c24; font-weight: bold; text-decoration: underline;">Clique aqui para entrar</a>.
    </div>';
    
    // Redirecionamento automático após alguns segundos
    echo '<script>
        setTimeout(function() {
            window.location.href = "login.php";
        }, 5000); // Redirecionar após 5 segundos
    </script>';
    
    // Encerre a execução do código
    exit();
}
?>
