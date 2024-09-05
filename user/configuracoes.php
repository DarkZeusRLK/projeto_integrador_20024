<?php
include('../static/conexao.php');

if (!isset($_SESSION)) {
  session_start();
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="../css/style.css">
  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script defer src="../javascript/script_navbar.js"></script>
  <script defer src="../javascript/configuracoes.js"></script>
  <script defer src="../javascript/alternar_modos.js"></script>
  <title>Configurações - IvaíTour</title>
  <style>
    body {
      background-size: cover;
      /* A imagem irá cobrir toda a página */
      background-position: center;
      /* Centralizar a imagem de fundo */
      background-repeat: no-repeat;
      /* Não repetir a imagem */
      background-attachment: fixed;
      /* Fixar a imagem de fundo ao rolar a página */
    }
  </style>
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
        <?php if (isset($_SESSION['nome'])): ?>
          <li><a href="user/minha_conta.php"><i class="fas fa-users"></i><span>Minha Conta</span></a></li>
        <?php endif; ?>
        <?php if (!isset($_SESSION['nome'])): ?>
          <li><a href="user/login.php"><i class="fas fa-users"></i><span>Minha Conta</span></a></li>
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
          <a href="user/configuracoes.php" class="nav-link" id="settings-icon">
            <i class="fas fa-cog"></i><span>Configurações</span>
          </a>
        </li>
      </ul>
    </nav>

    <!-- Conteúdo da Página -->
    <div class="container-fluid">
      <h1><b>Configurações do Site</b></h1>

      <!-- Alternar modo dia/noite -->
      <div class="mt-4">
        <h3>Modo de Exibição</h3>
        <div class="theme-toggle-container">
          <span id="day-icon" class="fas fa-sun"></span>
          <label class="switch">
            <input type="checkbox" id="theme-toggle">
            <span class="slider round"></span>
          </label>
          <span id="night-icon" class="fas fa-moon"></span>
        </div>
      </div>

      <!-- Alterar imagem de fundo do index -->
      <div class="mt-4">
        <h3>Alterar Imagem de Fundo</h3>
        <form id="background-form">
          <div class="form-group">
            <label for="background-select">Selecione a Imagem/GIF de Fundo:</label>
            <select class="form-control" id="background-select">
              <option value="Imagens/Vegetação2.gif">Avião GIF</option>
              <option value="Imagens/a733d129bf370f5085507c89b6f3272c.gif">Praia GIF</option>
              <option value="Imagens/pngtree-8-best-free-mountain-background-images-4k-wallpapers-image_2670051.jpg">Montanha</option>
              <option value="Imagens/Cidade.jpg">Cidade</option>
            </select>
          </div>
          <button type="submit" class="btn btn-primary mt-3">Salvar Alterações</button>
        </form>
      </div>

      <!-- Alterar tamanho da fonte -->
      <div class="mt-4">
        <h3>Tamanho da Fonte</h3>
        <div class="form-group">
          <label for="font-size-select">Selecione o Tamanho da Fonte:</label>
          <select class="form-control" id="font-size-select">
            <option value="16px">Padrão (16px)</option>
            <option value="18px">Médio (18px)</option>
            <option value="20px">Grande (20px)</option>
            <option value="22px">Extra Grande (22px)</option>
          </select>
        </div>
        <button id="save-font-size" class="btn btn-primary mt-3">Salvar Tamanho da Fonte</button>


        <div class="teste">
          <div class="theme-toggle-container">
            <span id="day-icon" class="fas fa-sun"></span>
            <label class="switch">
              <input type="checkbox" id="theme-toggle">
              <span class="slider round"></span>
            </label>
            <span id="night-icon" class="fas fa-moon"></span>
          </div>
        </div>
      </div>
    </div>
  </div>



</body>

</html>