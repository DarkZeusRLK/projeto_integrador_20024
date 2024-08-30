<?php
    include('../static/conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Início - </title>
    <link rel="stylesheet" href="../css/style.css">
    <!-- ===== Link Swiper's CSS ===== -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
    <!-- ===== Fontawesome CDN Link ===== -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"/>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #fff;
            background-image: url("../Imagens/200w.gif");
            background-repeat: no-repeat;
            background-position: center center;
            background-size: cover;
            background-position-x: center;
            background-position-y: top;
        }
        .middle-content {
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 8px;
            margin: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .middle-content h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .middle-content p {
            text-align: justify;
            line-height: 1.6;
        }
    </style>
</head>
<body>
<nav class="navbar">
    <div class="logo">
        <img id="logo" src="Imagens/logo.jpg" alt="Logo">   
    </div>
    <h1 class="text-logo"><b>SEM NOME DEFINIDO AINDA</b></h1>
    <ul class="topics">
        <li><a href="page/contato.php">Contato</a></li>
        <li><a href="page/patrocinadores.php">Patrocinadores</a></li>
        <li><a href="page/ajuda.php">Ajuda</a></li>
    </ul>
    <div class="account">
        <div class="avatar">
            <img src="Imagens/avatar.png" alt="Avatar">
        </div>
        <div class="dropdown">
            <ul>
                <li><a href="#">Configurações</a></li>
                <li><a href="#">Ajuda</a></li>
                <li><a href="#">Sair</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <p class="text">Bem vindo ao SEM NOME DEFINIDO AINDA</p>
</div>

<!-- Parte do meio (conteúdo de contato) -->
<div class="middle-content">
    <h2>Entre em Contato Conosco</h2>
    <p>Utilize o formulário abaixo para entrar em contato conosco. Responderemos o mais breve possível.</p>
    <form id="contactForm">
        <div class="inputGroup">
            <label for="name">Nome</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="inputGroup">
            <label for="email">E-mail</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="inputGroup">
            <label for="message">Mensagem</label>
            <textarea id="message" name="message" rows="5" required></textarea>
        </div>
        <button type="submit">Enviar</button>
    </form>
</div>

<!-- Parte de avaliações -->
<div class="parte2">
    <!-- Mais avaliações aqui -->
</div>

<div id="borda" class="borda">
<div id="footer-contato" class="footer text-center">
    <p><b>&copy; 2024 SEM NOME DEFINIDO AINDA. Todos os direitos reservados.</b></p>
    <p>Desenvolvido por João Pedro Fernandes, João Rafael, Joaquim Sagioneti, Luiz Eduardo e Matheus Vital</p>
    <p>Orientado por Dieimes Nunes de Souza</p>
</div>
</div>

<!-- Swiper JS -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<!-- Initialize Swiper -->
<script src="javascript/script.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/MorphSVGPlugin.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>
