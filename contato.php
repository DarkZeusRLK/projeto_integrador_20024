<?php
    include('static/conexao.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="css/ctt.css">
    <link rel="icon" href="../#Imagens/Icon.png">
    <title>Contato</title>
</head>
<body>

    <?php
    include('static/menu.php');
    ?>

    <div class="container">
    <div class="form-container">
    <div class="form">
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