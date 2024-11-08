<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="img/logo2.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="icon" href="../Imagens/icon.png">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/zere.css">
    <link rel="stylesheet" href="../estilo.css">
    <title>Minha Conta</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script defer src="../javascript/script_navbar.js"></script>
    <script defer src="../javascript/alternar_modos.js"></script>
    <script defer src="../javascript/cookie.js"></script>
</head>
<style>
.payment--options a {
  display: flex;
  justify-content: center;
  align-items: center;
}

.payment--options {
  display: flex;
  gap: 60px;
  /* Espaçamento entre as imagens, ajuste conforme necessário */
  max-width: 30rem;
  display: grid;
  grid-template-columns: 33% 33%;
  padding: 10px;
}

.payment--options img {
  max-width: 100%;
  height: auto;
  object-fit: contain;
}

.botoes {
  align-items: center;
  height: 55px;
  background: #F2F2F2;
  border-radius: 11px;
  padding: 0;
  border: 0;
  outline: none;
  transition: 0.2s;
}

.botoes:hover {
  height: 55px;
  background: #F2F2F2;
  border-radius: 11px;
  padding: 0;
  border: 0;
  outline: none;
  transition: 0.2s;
  transform: scale(1.05);
}

.input_label {
  font-size: 13px;
  color: #8B8E98;
}

.aviso {
  font-family: Arial, Helvetica, sans-serif;
  color: #8B8E98;
}
</style>
<body>
    <?php
    include('../static/menu.php');
    ?>
    <div class="container-fluid">
        <div class="mobile">
            <div id="form-container-ctt" class="form-container">
                <div id="form-ctt">
                <p class="aviso">Use essas formas de metodo de pagamento</p>
                    <div class="payment--options">
                        <a class="botoes" name="boleto" href="boleto.php">
                            <img src="../Imagens/boleto.png" alt="" width="150rem">
                        </a>
                        <a class="botoes" name="pix" href="pix.php">
                            <img src="../Imagens/pix.svg" alt="" width="120rem">
                        </a>
                    </div>
                    <p class="aviso">ou pague usando cartão de crédito</p>
                    <form action="upload_imagem.php" method="POST" enctype="multipart/form-data">
                        <!-- Campo hidden com o id do usuário -->
                        <input type="hidden" name="bt_id_alterar">

                        <!-- Upload da imagem de perfil -->
                        <input type="file" name="foto" id="foto" class="form-control" placeholder="Mudar foto de perfil">

                        <!-- Campos de texto -->
                        <input type="text" name="bt_nome" class="input"  placeholder="Nome do Titular" maxlength="85" required>
                        <input id="cartaoInput" type="email" oninput="formatarCartao()" name="bt_email" class="input"  placeholder="Número do Cartão " maxlength="19" required>
                        <input id="valInput" oninput="formatarVAL()" type="text" name="bt_cpf" class="input"  placeholder="Data de vencimento" maxlength="5" required>
                        <input id="cvvInput" oninput="formatarCVV()" type="text" name="bt_telefone" class="input"  placeholder="CVV" maxlength="3" required>

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
    </div>
    <!-- Scripts de acessibilidade e rodapé -->
    <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
    <script>
        new window.VLibras.Widget('https://vlibras.gov.br/app');
    </script>
<script src="../javascript/zere.js"></script>
    <?php include('../static/footer.php'); ?>
</body>

</html>