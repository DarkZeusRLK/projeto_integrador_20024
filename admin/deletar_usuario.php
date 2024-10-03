<?php
include('../static/conexao.php');
require('../static/protect_adm.php');

if (isset($_GET['codigo_cadastro'])) {
    $id_usuario = $_GET['codigo_cadastro'];
    $sql_consultar = "SELECT * FROM cadastro WHERE id_usuario = '$id_usuario'";
    $comando_sql = $mysqli->query($sql_consultar) or die($mysqli->error);
    $user = $comando_sql->fetch_assoc();

    if (isset($_POST['btn_deletar'])) {
        $sql_deletar = "DELETE FROM cadastro WHERE id_usuario = '$id_usuario'";
        $deu_certo = $mysqli->query($sql_deletar) or die($mysqli->error);

        header("location: ../index.php");

        if (!isset($_SESSION)) {
            session_start();
        }

        session_destroy();
    }
} else {
    echo "Não tem código de consulta disponível";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deletar Usuários</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script defer src="../javascript/script_navbar.js"></script>

    <!-- Script para confirmação de exclusão -->
    <script>
        function confirmarDelecao() {
            return confirm('Tem certeza que deseja deletar sua conta? Esta ação não pode ser desfeita.');
        }
    </script>
</head>
<body>
<div class="container-fluid">
    <nav class="col-md-3 col-lg-2 sidebar">
        <div class="menu-btn" onclick="toggleSidebar()">&#9776;</div>
        <div class="profile">
            <img id="logo" src="../Imagens/logo (1).png" alt="Logo">
            <h1 class="text-title">IvaíTour</h1>
        </div>
        <ul class="nav-links">
            <li><a href="../index.php"><i class="fas fa-home"></i><span>Home</span></a></li>
            <li><a href="#services"><i class="fas fa-concierge-bell"></i><span>Serviços</span></a></li>
            <?php if (isset($_SESSION['nome'])) : ?>
                <li><a href="../user/minha_conta.php"><i class="fas fa-users"></i><span>Minha Conta</span></a></li>
            <?php endif; ?>
            <?php if (!isset($_SESSION['nome'])) : ?>
                <li><a href="../user/login.php"><i class="fas fa-users"></i><span>Minha Conta</span></a></li>
            <?php endif; ?>
            <li><a href="../page/contato.php"><i class="fas fa-envelope"></i><span>Contato</span></a></li>
            <?php if (isset($_SESSION['nome']) && $_SESSION["tipo_usuario"] === 'administrador') : ?>
                <li><a href="admin_dashboard.php"><i class="fas fa-tablet-alt"></i><span>Painel Adm</span></a></li>
            <?php endif; ?>
            <li class="nav-item logout">
                <a href="../static/logout.php" class="nav-link"><i class="fas fa-sign-out-alt"></i><span>Desconectar</span></a>
            </li>
        </ul>
    </nav>

    <div class="container mt-4">
        <h1>Deletar Conta</h1>
        <p>Tem certeza que deseja deletar sua conta, <strong></strong>?</p>

        <!-- Formulário de Deletar Conta -->
        <form method="POST" onsubmit="return confirmarDelecao();">
            <button type="submit" name="btn_deletar" class="btn btn-danger">Deletar Conta</button>
        </form>
    </div>
</div>
</body>
</html>
