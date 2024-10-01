<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/depay.css">
    <link rel="stylesheet" href="../css/zere.css">
    <link rel="stylesheet" href="../css/style.css">
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
                    <li><a href="conta.php"><i class="fas fa-users"></i><span>Minha Conta</span></a></li>
                <?php else: ?>
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
                <p class="aviso">Use essas formas de metodo de pagamento</p>
                <div class="payment--options">
                    <a class="botoes" name="boleto" href="boleto.php">
                        <center>
                            <img src="../Imagens/boleto.png" alt="" width="150rem">
                            </svg>
                        </center>
                    </a>

                    <a class="botoes" name="pix" href="pix.php">
                        <center>
                            <img src="../Imagens/pix.svg" alt="" width="120rem">
                        </center>
                    </a>


                </div>
                <p class="aviso">ou pague usando cartão de crédito</p>
                <div class="credit-card-info--form">
                    <div class="input_container">
                        <label for="password_field" class="input_label">Nome completo do Titular</label>
                        <input id="password_field" class="input" type="text" name="input-name" title="Inpit title" placeholder="Nome Completo" maxlength="70">
                    </div>
                    <div class="input_container">
                        <label for="password_field" class="input_label">Número do Cartão</label>
                        <input id="cartaoInput" oninput="formatarCartao()" class="input" type="text" name="input-name" title="Inpit title" placeholder="0000 0000 0000 0000" maxlength="19">
                    </div>
                    <div class="input_container">
                        <label for="password_field" class="input_label">Data de vencimento/ CVV</label>
                        <div class="split">
                            <input id="valInput" class="input" oninput="formatarVAL()" type="text" name="input-name" title="Expiry Date" placeholder="01/23" maxlength="5">
                            <input id="cvvInput" oninput="formatarCVV() " class="input" type="text" name="cvv" title="CVV" placeholder="CVV" maxlength="3">
                        </div>
                    </div>
                </div>
                <div class="button-container">
                    <div class="save-button-container">
                        <button type="submit" class="save-button">Salvar</button>
                    </div>
                </div>

            </div>
        </div>
        <?php
        include('../static/footer.php');
        ?>
</body>
<script src="javascript/zere.js"></script>

</html>