<?php
include('../static/conexao.php');

if (!isset($_SESSION)) {
    session_start();
}

// Verificar se o usuário está logado
if (!isset($_SESSION['nome'])) {
    // Se a sessão do usuário não estiver ativa, redireciona para a página de login
    header("Location: login.php");
    exit();
}

// Verificar o tipo de usuário e incluir o arquivo de proteção correto
if (isset($_SESSION['tipo_usuario'])) {
    if ($_SESSION['tipo_usuario'] === 'administrador') {
        require('../static/protect_adm.php'); // Proteção para administradores
    } elseif ($_SESSION['tipo_usuario'] === 'cliente') {
        require('../static/protect.php'); // Proteção para clientes
    }
}

// Impedir cache do navegador
header("Cache-Control: no-cache, no-store, must-revalidate"); // Não permitir o cache
header("Pragma: no-cache"); // Compatibilidade com navegadores antigos
header("Expires: 0"); // Expirar imediatamente a página
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="img/logo2.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="icon" href="Imagens/icon.png">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/zere.css">  
    <title>Minha Conta</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script defer src="../javascript/script_navbar.js"></script>
</head>

<body>
    <!------------------------------------------------->
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
        <?php if (isset($_SESSION['nome'])): ?>
          <li><a href="conta.php"><i class="fas fa-users"></i><span>Minha Conta</span></a></li>
        <?php endif; ?>
        <?php if (!isset($_SESSION['nome'])): ?>
          <li><a href="login.php"><i class="fas fa-users"></i><span>Minha Conta</span></a></li>
        <?php endif; ?>
        <li><a href="#contact"><i class="fas fa-envelope"></i><span>Contato</span></a></li>
        <?php if (isset($_SESSION['nome']) && $_SESSION["tipo_usuario"] === 'administrador'): ?>
          <li><a href="../admin/admin_dashboard.php"><i class="fas fa-tablet-alt"></i><span>Painel Adm</span></a></li>
        <?php endif; ?>
        <?php if (isset($_SESSION['nome'])): ?>
          <li class="nav-item logout">
            <a href="../static/logout.php" class="nav-link"><i class="fas fa-sign-out-alt"></i><span>Desconectar</span></a>
          </li>
        <?php endif; ?>
        <li class="nav-item">
          <a href="configuracoes.php" class="nav-link" id="settings-icon">
            <i class="fas fa-cog"></i><span>Configurações</span>
          </a>
        </li>
      </ul>
    </nav>


        <div class="container">
            <div id="form-container-ctt" class="form-container">
                <div id="form-ctt">
                    <div class="text-center mb-4">
                        <div class="profile-picture-container">
                            <img class='profile-picture' src='../Imagens/avatar2.png' alt='Foto de perfil'>
                        </div>
                        <span class="heading">Usuário</span>
                    </div>
                    <input placeholder="Nome" type="text" class="input" readonly>
                    <input placeholder="Email" id="mail" type="email" class="input" readonly>
                    <input placeholder="CPF" id="mail" type="text" class="input" readonly>
                    <input placeholder="Endereço" id="mail" type="text" class="input" readonly>
                    <div class="button-container">
                        <div class="reset-button-container">
                            <a href="editaconta.php"  class="reset-button">Editar conta</a>
                        </div>
                    </div>
                </div>
            </div>

            <div vw class="enabled">
                <div vw-access-button class="active"></div>
                <div vw-plugin-wrapper>
                    <div class="vw-plugin-top-wrapper"></div>
                </div>
            </div>
        </div>
        <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
        <script>
            new window.VLibras.Widget('https://vlibras.gov.br/app');
        </script>


        </section>
    </div>
    <?php
    include('../static/footer.php');
    ?>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</html>