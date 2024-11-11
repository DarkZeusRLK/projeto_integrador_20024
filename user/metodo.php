<?php

include('../static/conexao.php');

if(!isset($_SESSION)){
  session_start();
}
// Verificar o tipo de usuário e incluir o arquivo de proteção correto
if (isset($_SESSION['tipo_usuario'])) {
    if ($_SESSION['tipo_usuario'] === 'administrador') {
        require('../static/protect_adm.php'); // Proteção para administradores
    } elseif ($_SESSION['tipo_usuario'] === 'cliente') {
        require('../static/protect.php'); // Proteção para clientes
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="img/logo2.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/zere.css">
    <link rel="stylesheet" href="../estilo.css">
    <title>Minha Conta</title>
    <script defer src="../javascript/script_navbar.js"></script>
    <script defer src="../javascript/alternar_modos.js"></script>
    <script defer src="../javascript/cookie.js"></script>,
</head>
<body>
    <?php include('../static/menu.php'); ?>
    <div class="container-fluid">
        <div class="mobile">
            <div id="form-container-ctt" class="form-container">
                <div id="form-ctt">
                    <p class="aviso2">Use essas formas de método de pagamento</p>
                    <div class="payment--options">
                        <!-- Boleto e Pix com eventos de clique para alternar a visualização -->
                        <a class="botoes" onclick="mostrarBoleto()">
                            <img src="../Imagens/boleto.png" alt="Boleto" width="150rem">
                        </a>
                        <a class="botoes" onclick="mostrarPix()">
                            <img src="../Imagens/pix.svg" alt="Pix" width="120rem">
                        </a>
                    </div>

                    <!-- Seção de imagem que será exibida ao selecionar Boleto ou Pix -->
                    <div id="imagem-boleto" style="display: none;">
                        <img src="../Imagens/123454565676767674.png" alt="Boleto">
                    </div>
                    <div id="imagem-pix" style="display: none;">
                        <img src="../Imagens/RA.png" alt="Pix">
                    </div>

                    <!-- Seção do formulário de pagamento com cartão -->
                    <p class="aviso" onclick="mostrarCartao()">ou pague usando cartão de crédito</p>
                    <form id="form-cartao" action="upload_imagem.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="bt_id_alterar">
                        <input type="file" name="foto" id="foto" class="form-control" placeholder="Mudar foto de perfil">
                        <input type="text" name="bt_nome" class="input" placeholder="Nome do Titular" maxlength="85" required>
                        <input id="cartaoInput" type="email" oninput="formatarCartao()" name="bt_email" class="input" placeholder="Número do Cartão" maxlength="19" required>
                        <input id="valInput" oninput="formatarVAL()" type="text" name="bt_cpf" class="input" placeholder="Data de vencimento" maxlength="5" required>
                        <input id="cvvInput" oninput="formatarCVV()" type="text" name="bt_telefone" class="input" placeholder="CVV" maxlength="3" required>
                        <div class="button-container">
                            <div class="save-button-container">
                                <button type="submit" class="save-button">Salvar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts de acessibilidade e rodapé -->
    <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
    <script>
        new window.VLibras.Widget('https://vlibras.gov.br/app');

        // Função para mostrar o boleto
        function mostrarBoleto() {
            document.getElementById('imagem-boleto').style.display = 'block';
            document.getElementById('imagem-pix').style.display = 'none';
            document.getElementById('form-cartao').style.display = 'none';
        }

        // Função para mostrar o pix
        function mostrarPix() {
            document.getElementById('imagem-pix').style.display = 'block';
            document.getElementById('imagem-boleto').style.display = 'none';
            document.getElementById('form-cartao').style.display = 'none';
        }
         // Função para mostrar o formulário de cartão de crédito novamente
         function mostrarCartao() {
            document.getElementById('form-cartao').style.display = 'block';
            document.getElementById('imagem-boleto').style.display = 'none';
            document.getElementById('imagem-pix').style.display = 'none';
        }
    </script>
    <script src="../javascript/zere.js"></script>
    <?php include('../static/footer.php'); ?>
</body>
</html>
