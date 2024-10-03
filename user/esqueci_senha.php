    <?php
    include('../static/conexao.php');

    if (!isset($_SESSION)) {
        session_start();
    }

    // Incluir o autoload do PHPMailer
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require '../vendor/autoload.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Captura o e-mail do formulário
        $email = filter_var($_POST['bt_email'], FILTER_VALIDATE_EMAIL);

        if (!$email) {
            echo 'Por favor, insira um e-mail válido.';
            exit;
        }

        // Gera um token único para redefinição de senha
        $token = bin2hex(random_bytes(32)); // Exemplo de geração de token
        
    // Crie uma instância do PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Configurações do servidor de e-mail SMTP
        $mail->isSMTP();
        $mail->Host       = 'smtp.mailtrap.io';  // Servidor SMTP do Mailtrap
        $mail->SMTPAuth   = true;
        $mail->Username   = 'c4dad468da6562';  // Usuário SMTP do Mailtrap
        $mail->Password   = 'acee7e13074fbb';  // Senha SMTP do Mailtrap
        $mail->Port       = 2525;  // Porta SMTP usada pelo Mailtrap

        // Configure o tipo de segurança, se necessário
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Ou PHPMailer::ENCRYPTION_SMTPS se usar a porta 465

        // Destinatário e remetente
        $mail->setFrom('ivaitour@empresa.com.br', 'IvaíTour');
        $mail->addAddress($email);  // O e-mail do usuário que fez a solicitação

        // Conteúdo do e-mail
        $mail->isHTML(true);  // Enviar como HTML
        $mail->Subject = 'Redefinição de Senha';
        $mail->Body    = 'Teste de redefinicao de senha Dieimes: <a href="https://seusite.com/redefinir_senha?token=' . $token . '">Redefinir Senha</a>';
        $mail->AltBody = 'Clique no link para redefinir sua senha seu tongo: https://seusite.com/redefinir_senha?token=' . $token;

        // Enviar o e-mail
        $mail->send();
        echo 'O e-mail foi enviado com sucesso.';
    } catch (Exception $e) {
        echo "Erro ao enviar o e-mail: {$mail->ErrorInfo}";
    }

        $conexao->close();
    }
    ?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8" />
        <script defer src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <link rel="stylesheet" href="../css/style.css">
        <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script defer src="../javascript/script_navbar.js"></script>
        <script defer src="../javascript/alternar_modos.js"></script>
        <script defer src="https://apis.google.com/js/platform.js" async defer></script>
        <script defer src="../javascript/google.js"></script>
        <style>
            /* Estilo para a notificação */
            .notification {
                display: none;
                position: fixed;
                top: 0;
                left: 50%;
                transform: translateX(-50%);
                background-color: #4CAF50;
                color: white;
                text-align: center;
                padding: 10px;
                width: 300px;
                border-radius: 5px;
                z-index: 1000;
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
                            <li><a href="../user/minha_conta.php"><i class="fas fa-users"></i><span>Minha Conta</span></a></li>
                        <?php endif; ?>
                        <?php if (!isset($_SESSION['nome'])): ?>
                            <li><a href="../user/login.php"><i class="fas fa-users"></i><span>Minha Conta</span></a></li>
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
                            <a href="../user/configuracoes.php" class="nav-link" id="settings-icon">
                                <i class="fas fa-cog"></i><span>Configurações</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="container d-flex justify-content-center">
                    <form class="form" method="POST">
                        <div class="flex-column">
                            <label>Email para Redefinição de Senha </label>
                        </div>
                        <div class="inputForm">
                            <svg height="20" viewBox="0 0 32 32" width="20" xmlns="http://www.w3.org/2000/svg">
                                <g id="Layer_3" data-name="Layer 3">
                                    <path d="m30.853 13.87a15 15 0 0 0 -29.729 4.082 15.1 15.1 0 0 0 12.876 12.918 15.6 15.6 0 0 0 2.016.13 14.85 14.85 0 0 0 7.715-2.145 1 1 0 1 0 -1.031-1.711 13.007 13.007 0 1 1 5.458-6.529 2.149 2.149 0 0 1 -4.158-.759v-10.856a1 1 0 0 0 -2 0v1.726a8 8 0 1 0 .2 10.325 4.135 4.135 0 0 0 7.83.274 15.2 15.2 0 0 0 .823-7.455zm-14.853 8.13a6 6 0 1 1 6-6 6.006 6.006 0 0 1 -6 6z"></path>
                                </g>
                            </svg>
                            <input type="text" name="bt_email" class="input" placeholder="Insira seu Email">
                        </div>

                        <button class="button-submit">Enviar Email</button>


        </body>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

    </html>