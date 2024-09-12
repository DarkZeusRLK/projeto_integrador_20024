<?php
include('../static/conexao.php');
require('../static/protect_adm.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Altear ou Deletar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <script defer src="../javascript/dashboard_adm.js"></script>
    <script defer src="../javascript/script_navbar.js"></script>
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
                <li><a href="#contact"><i class="fas fa-envelope"></i><span>Contato</span></a></li>
                <?php if (isset($_SESSION['nome']) && $_SESSION["tipo_usuario"] === 'administrador') : ?>
                    <li><a href="../admin/admin_dashboard.php"><i class="fas fa-tablet-alt"></i><span>Painel Adm</span></a></li>
                <?php endif; ?>
                <?php if (isset($_SESSION['nome'])) : ?>
                    <li class="nav-item logout">
                        <a href="static/logout.php" class="nav-link"><i class="fas fa-sign-out-alt"></i><span>Desconectar</span></a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
        <!-- Seção com os cards -->
        <div class="container mt-5 d-flex justify-content-center">
            <div class="row">
                <!-- Card 1 -->
                <div id="cards2" class="col-md-3 mb-2">
                    <div id="link_adm_table" onclick="window.location.href='alterar_tipo_usuario.php'" style="cursor: pointer;" class="card h-100">
                        <img src="../Imagens/images.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Alterar Usuário</h5>
                            <p class="card-text">Clique aqui para alterar as informações dos usuários cadastrados.</p>
                            <h5 class="card-text"></h5>
                        </div>
                    </div>
                </div>
                <!-- Card 2 -->
                <div id="cards2" class="col-md-3 mb-2">
                    <div id="link_adm_table" onclick="window.location.href='deletar_usuario.php'" style="cursor: pointer;" class="card h-100">
                        <img src="../Imagens/images2.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Deletar Usuário</h5>
                            <p class="card-text">Clique aqui para deletar as informações dos usuários cadastrados.</p>
                            <h5 class="card-text"></h5>
                        </div>
                    </div>
                </div>
            </div>
</body>

</html>