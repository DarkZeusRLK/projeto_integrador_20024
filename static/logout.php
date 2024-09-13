<?php
session_start();
session_destroy(); // Destruir a sessão

// Limpar o cache do navegador
header("Cache-Control: no-cache, no-store, must-revalidate"); // Para forçar o navegador a não armazenar em cache
header("Pragma: no-cache"); // Para compatibilidade com navegadores antigos
header("Expires: 0"); // Para garantir que a página expire imediatamente

// Redirecionar o usuário para a página de login ou outra página
header("Location: ../user/login.php");
exit();
?>
