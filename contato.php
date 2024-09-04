<?php
    include('static/conexao.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="../#Imagens/Icon.png">
    <title>Contato</title>
</head>
<body>

<div class="container-fluid">
        <nav class="col-md-3 col-lg-2 sidebar">
            <div class="menu-btn" onclick="toggleSidebar()">&#9776;</div>
            <div class="profile">
                <img id="logo" src="Imagens/logo (1).png" alt="Logo">
                <h1 class="text-title">IvaíTour</h1>
            </div>
            <ul class="nav-links">
                <li><a href="#home"><i class="fas fa-home"></i><span>Home</span></a></li>
                <li><a href="#services"><i class="fas fa-concierge-bell"></i><span>Serviços</span></a></li>
                <li><a href="user/login.php"><i class="fas fa-users"></i><span>Minha Conta</span></a></li>
                <li><a href="#contact"><i class="fas fa-envelope"></i><span>Contato</span></a></li>
                <?php
                if (isset($_SESSION['id_login'])) {
                ?>
                    <li class="nav-item logout">
                        <a href="#logout" class="nav-link"><i class="fas fa-sign-out-alt"></i><span>Desconectar</span></a>
                    </li>
                <?php
                }
                ?>
            </ul>
        </nav>
       
            

    <div class="container">
    <div id="form-container-ctt" class="form-container">
    <div id="form-ctt">
        <span class="heading">Contato</span>
        <input placeholder="Nome" type="text" class="input">
        <input placeholder="Email" id="mail" type="email" class="input">
        <textarea placeholder="Escreva sua mensagem..." rows="10" cols="30" id="message" name="message" class="textarea"></textarea>
        <div class="button-container">
        <div class="send-button">Enviar</div>
        <div class="reset-button-container">
            <div id="reset-btn" class="reset-button">Resetar</div>
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
    include('static/footer.php');
    ?>
    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</html>