<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="../Imagens/icon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/depay.css">
    <title>Minha Conta</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script defer src="../javascript/script_navbar.js"></script>
    <script defer src="../javascript/alternar_modos.js"></script>
    <script defer src="../javascript/cookie.js"></script>
    <link rel="shortcut icon" href="../Imagens/logo (1).png">
</head>

<body>
    <?php
    include('../static/menu.php');
    ?>
    <div class="mobile">
        <div class="container-fluid">
            <div class="container">
                <div id="form-ctt" class="form-container">
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
                        <div class="input">
                            <label for="password_field" class="input_label">Nome completo do Titular</label>
                            <input id="password_field" class="input" type="text" name="input-name" title="Inpit title" placeholder="Nome Completo" maxlength="70">
                        </div>
                        <div class="input">
                            <label for="password_field" class="input_label">Número do Cartão</label>
                            <input id="cartaoInput" oninput="formatarCartao()" class="input" type="text" name="input-name" title="Inpit title" placeholder="0000 0000 0000 0000" maxlength="19">
                        </div>
                        <div class="input">
                            <label for="password_field" class="input_label">Data de vencimento</label>
                                <input id="valInput" class="input" oninput="formatarVAL()" type="text" name="input-name" title="Expiry Date" placeholder="01/23" maxlength="5">
                            </label> 
                        </div>
                        <div class="input">
                        <label for="password_field" class="input_label">CVV</label>
                                <input id="cvvInput" oninput="formatarCVV()" class="input" type="text" name="cvv" title="CVV" placeholder="CVV" maxlength="3">
                        </div>
                    <div class="button-container">
                        <div class="save-button-container">
                            <button type="submit" class="save-button">Salvar</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <?php
        include('../static/footer.php');
        ?>
    <script src="../javascript/zere.js"></script>
</body>
</html>