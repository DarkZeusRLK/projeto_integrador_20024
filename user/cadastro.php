<?php
include('../static/conexao.php'); // Certifique-se de que o caminho está correto

$mensagem = ''; // Inicializa a variável de mensagem

// Função para sanitizar dados
function sanitize_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = sanitize_input($_POST['bt_email']);
    $senha = sanitize_input($_POST['bt_senha']);
    $nome = sanitize_input($_POST['bt_nome']);
    $telefone = sanitize_input($_POST['bt_telefone']);
    $cpf = sanitize_input($_POST['bt_cpf']);
    $genero = sanitize_input($_POST['bt_genero']);
    
    $caminho_imagem = "Imagens/avatar2.png";
    $tipo_usuario = "cliente"; // Definindo o tipo de usuário como "cliente"

    // Verifique se a variável $conexao está definida
    if (isset($conexao)) {
        // Verifique se o email já está cadastrado
        $verificar_email = "SELECT * FROM cadastro WHERE email = ?";
        $stmt_verificar = $conexao->prepare($verificar_email);
        
        // Verifica se a preparação foi bem-sucedida
        if ($stmt_verificar === false) {
            die('Erro ao preparar consulta: ' . $conexao->error); // Exibe o erro do MySQL
        }

        $stmt_verificar->bind_param("s", $email);
        $stmt_verificar->execute();
        $result = $stmt_verificar->get_result();

        if ($result->num_rows > 0) {
            // Email já cadastrado, retorne uma mensagem de erro específica
            $mensagem = "Email já cadastrado!";
        } else {
            // Criptografa a senha
            $senha_hashed = password_hash($senha, PASSWORD_DEFAULT);

            // Insira os dados no banco de dados
            $query = "INSERT INTO cadastro (nome, email, senha, telefone, cpf, genero, tipo_usuario, arquivo_caminho) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conexao->prepare($query);

            // Verifica se a preparação foi bem-sucedida
            if ($stmt === false) {
                die('Erro ao preparar consulta: ' . $conexao->error); // Exibe o erro do MySQL
            }

            $stmt->bind_param("ssssssss", $nome, $email, $senha_hashed, $telefone, $cpf, $genero, $tipo_usuario, $caminho_imagem);

            if ($stmt->execute()) {
                // Cadastro bem-sucedido, retorne uma mensagem de sucesso
                $mensagem = "Cadastro realizado com sucesso!";
            } else {
                // Cadastro falhou, retorne uma mensagem de erro
                $mensagem = "Erro ao realizar o cadastro. Tente novamente.";
            }
        }
    } else {
        $mensagem = "Erro de conexão com o banco de dados.";
    }
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
  <script defer src="../javascript/configuracoes.js"></script>
  <script defer src="../javascript/alternar_modos.js"></script>
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
        <div class="container d-flex justify-content-center">
            <form class="form" action="" method="post">
                <div class="flex-column">
                    <label>Email </label>
                </div>
                <div class="inputForm">
                    <svg height="20" viewBox="0 0 32 32" width="20" xmlns="http://www.w3.org/2000/svg">
                        <g id="Layer_3" data-name="Layer 3">
                            <path d="m30.853 13.87a15 15 0 0 0 -29.729 4.082 15.1 15.1 0 0 0 12.876 12.918 15.6 15.6 0 0 0 2.016.13 14.85 14.85 0 0 0 7.715-2.145 1 1 0 1 0 -1.031-1.711 13.007 13.007 0 1 1 5.458-6.529 2.149 2.149 0 0 1 -4.158-.759v-10.856a1 1 0 0 0 -2 0v1.726a8 8 0 1 0 .2 10.325 4.135 4.135 0 0 0 7.83.274 15.2 15.2 0 0 0 .823-7.455zm-14.853 8.13a6 6 0 1 1 6-6 6.006 6.006 0 0 1 -6 6z"></path>
                        </g>
                    </svg>
                    <input type="text" name="bt_email" class="input" placeholder="Insira seu Email">
                </div>

                <div class="flex-column">
                    <label>Senha </label>
                </div>
                <div class="inputForm">
                    <svg height="20" viewBox="-64 0 512 512" width="20" xmlns="http://www.w3.org/2000/svg">
                        <path d="m336 512h-288c-26.453125 0-48-21.523438-48-48v-224c0-26.476562 21.546875-48 48-48h288c26.453125 0 48 21.523438 48 48v224c0 26.476562-21.546875 48-48 48zm-288-288c-8.8125 0-16 7.167969-16 16v224c0 8.832031 7.1875 16 16 16h288c8.8125 0 16-7.167969 16-16v-224c0-8.832031-7.1875-16-16-16zm0 0"></path>
                        <path d="m304 224c-8.832031 0-16-7.167969-16-16v-80c0-52.929688-43.070312-96-96-96s-96 43.070312-96 96v80c0 8.832031-7.167969 16-16 16s-16-7.167969-16-16v-80c0-70.59375 57.40625-128 128-128s128 57.40625 128 128v80c0 8.832031-7.167969 16-16 16zm0 0"></path>
                    </svg>
                    <input type="password" name="bt_senha" class="input" placeholder="Insira sua Senha">
                </div>

                <div class="flex-column">
                    <label>Nome </label>
                </div>
                <div class="inputForm">
                    <svg height="20" viewBox="0 0 32 32" width="20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16 0a16 16 0 1 0 16 16A16 16 0 0 0 16 0zm0 6a4.5 4.5 0 1 1 -4.5 4.5A4.5 4.5 0 0 1 16 6zm0 21.93A11.93 11.93 0 0 1 8.72 23.5c.01-2.72 5.45-4.21 7.28-4.21s7.27 1.49 7.28 4.21A11.93 11.93 0 0 1 16 27.93z"></path>
                    </svg>
                    <input type="text" name="bt_nome" class="input" placeholder="Insira seu Nome">
                </div>

                <div class="flex-column">
                    <label>Telefone </label>
                </div>
                <div class="inputForm">
                    <svg height="20" viewBox="0 0 24 24" width="20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20 16.52a2.15 2.15 0 0 1 -1.3-.46l-2.36-1.86a2.07 2.07 0 0 0 -2.74.16l-1.31 1.33A15.39 15.39 0 0 1 6.31 8.34l1.32-1.32a2.09 2.09 0 0 0 .15-2.74l-1.86-2.36a2.14 2.14 0 0 1 -.47-1.3A2.22 2.22 0 0 1 4.69 0 4.7 4.7 0 0 0 2.6.35 2.32 2.32 0 0 0 1 1.53C.35 2.84-.73 8.85 4.62 14.2S21.17 23.65 22.48 23a2.31 2.31 0 0 0 1.18-1.56A4.63 4.63 0 0 0 24 19.31a2.24 2.24 0 0 1 -2.22-2.79z"></path>
                    </svg>
                    <input type="text" name="bt_telefone" class="input" placeholder="Insira seu Telefone">
                </div>

                <div class="flex-column">
                    <label>CPF</label>
                </div>
                <div class="inputForm">
                    <svg height="20" viewBox="0 0 24 24" width="20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20 16.52a2.15 2.15 0 0 1 -1.3-.46l-2.36-1.86a2.07 2.07 0 0 0 -2.74.16l-1.31 1.33A15.39 15.39 0 0 1 6.31 8.34l1.32-1.32a2.09 2.09 0 0 0 .15-2.74l-1.86-2.36a2.14 2.14 0 0 1 -.47-1.3A2.22 2.22 0 0 1 4.69 0 4.7 4.7 0 0 0 2.6.35 2.32 2.32 0 0 0 1 1.53C.35 2.84-.73 8.85 4.62 14.2S21.17 23.65 22.48 23a2.31 2.31 0 0 0 1.18-1.56A4.63 4.63 0 0 0 24 19.31a2.24 2.24 0 0 1 -2.22-2.79z"></path>
                    </svg>
                    <input type="text" name="bt_cpf" class="input" placeholder="Insira seu CPF">
                </div>
                <div class="mb-3">
                    <label for="bt_genero" class="form-label">Gênero</label>
                    <select name="bt_genero" id="bt_genero" class="form-control" required>
                        <option value="Masculino">Masculino</option>
                        <option value="Feminino">Feminino</option>
                        <option value="Feminino">Não Binário</option>
                    </select>
                </div>

                <input class="btn btn-warning" type="submit" value="Cadastrar">
            </form>
        </div>
            <br>
            <br>
            <div class="borda">

            </div>
            <?php
            include("../static/footer.php");
            ?>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</html>