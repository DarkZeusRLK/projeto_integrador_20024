<?php
include('../static/conexao.php');

require('../static/protect_adm.php');

if (!isset($_SESSION)) {
    session_start();
}


// Verifique se o tipo de usuário está definido na sessão
if (isset($_SESSION['tipo_usuario'])) {
    $tipo_usuario = $_SESSION['tipo_usuario'];
} else {
    $tipo_usuario = 'cliente'; // Defina um valor padrão se necessário
}

$foto = isset($_SESSION['arquivo_foto']) ? $_SESSION['arquivo_foto'] : 'caminho/para/avatar/padrao.png'; // Caminho para um avatar padrão

// Verifique se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifique se os campos esperados existem no POST
    if (isset($_POST['bt_nome']) && isset($_POST['bt_valor_diaria']) && isset($_POST['bt_descricao']) && isset($_FILES['bt_arquivo'])) {
        // Atribua as variáveis
        $nome = $_POST['bt_nome'];
        $valor_diaria = $_POST['bt_valor_diaria'];
        $descricao = $_POST['bt_descricao'];
        $arquivo = $_FILES['bt_arquivo'];

        // Diretório de upload e nome do arquivo
        $pasta = "../recebidos/";  // Diretório onde o arquivo será armazenado
        $nome_arquivo = $arquivo['name'];
        $novo_nome_arquivo = uniqid();
        $extensao = strtolower(pathinfo($nome_arquivo, PATHINFO_EXTENSION));

        // Caminho para o novo arquivo
        $caminho_relativo = "recebidos/" . $novo_nome_arquivo . "." . $extensao;
        $caminho_absoluto = $pasta . $novo_nome_arquivo . "." . $extensao;

        // Verifique se a extensão do arquivo é permitida
        if ($extensao != "jpg" && $extensao != "jpeg" && $extensao != "png") {
            die("Tipo de arquivo não aceito");
        }

        // Mova o arquivo para o diretório de uploads
        $deucerto = move_uploaded_file($arquivo["tmp_name"], $caminho_absoluto);

        if ($deucerto) {
            // Insira os dados no banco de dados
            $conexao->query("INSERT INTO hoteis_gramado (nome, valor_diaria, descricao, arquivo_caminho) 
                VALUES ('$nome', '$valor_diaria', '$descricao','$caminho_relativo')") or die($conexao->error);

            // Defina uma mensagem de sucesso
            $_SESSION['Sucesso'] = 'Hotel cadastrado com sucesso!';
        } else {
            die("Erro ao fazer upload do arquivo.");
        }
    } else {
        die("Dados do formulário não recebidos.");
    }
}
?>
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
    <title>Cadastro de Hotel</title>

    <style>
        .btn{
            color: black;
        }
    </style>
</head>

<body>
        
<div class="container-fluid">
   <!-- Mensagem de cookies -->
   <div id="cookie-message" class="card-cookie">
        <svg xml:space="preserve" viewBox="0 0 122.88 122.25" y="0px" x="0px" id="cookieSvg" version="1.1">
            <g>
                <path d="M101.77,49.38c2.09,3.1,4.37,5.11,6.86,5.78c2.45,0.66,5.32,0.06,8.7-2.01c1.36-0.84,3.14-0.41,3.97,0.95 c0.28,0.46,0.42,0.96,0.43,1.47c0.13,1.4,0.21,2.82,0.24,4.26c0.03,1.46,0.02,2.91-0.05,4.35h0v0c0,0.13-0.01,0.26-0.03,0.38 c-0.91,16.72-8.47,31.51-20,41.93c-11.55,10.44-27.06,16.49-43.82,15.69v0.01h0c-0.13,0-0.26-0.01-0.38-0.03 c-16.72-0.91-31.51-8.47-41.93-20C5.31,90.61-0.73,75.1,0.07,58.34H0.07v0c0-0.13,0.01-0.26,0.03-0.38 C1,41.22,8.81,26.35,20.57,15.87C32.34,5.37,48.09-0.73,64.85,0.07V0.07h0c1.6,0,2.89,1.29,2.89,2.89c0,0.4-0.08,0.78-0.23,1.12 c-1.17,3.81-1.25,7.34-0.27,10.14c0.89,2.54,2.7,4.51,5.41,5.52c1.44,0.54,2.2,2.1,1.74,3.55l0.01,0 c-1.83,5.89-1.87,11.08-0.52,15.26c0.82,2.53,2.14,4.69,3.88,6.4c1.74,1.72,3.9,3,6.39,3.78c4.04,1.26,8.94,1.18,14.31-0.55 C99.73,47.78,101.08,48.3,101.77,49.38L101.77,49.38z M59.28,57.86c2.77,0,5.01,2.24,5.01,5.01c0,2.77-2.24,5.01-5.01,5.01 c-2.77,0-5.01-2.24-5.01-5.01C54.27,60.1,56.51,57.86,59.28,57.86L59.28,57.86z M34.53,49.32c2.77,0,5.01,2.24,5.01,5.01c0,2.77-2.24,5.01-5.01,5.01c-2.77,0-5.01-2.24-5.01-5.01C29.52,51.56,31.76,49.32,34.53,49.32L34.53,49.32z"></path>
            </g>
        </svg>
        <div class="cookieHeading">Este site usa cookies</div>
        <div class="cookieDescription">
            Para uma melhor experiência, usamos cookies em nosso site. Para saber mais, leia nossa <a href="#">Política de Cookies</a>.
        </div>
        <div class="buttonContainer">
            <button id="accept-cookies" class="acceptButton">Aceitar</button>
            <button id="decline-cookies" class="declineButton">Rejeitar</button>
        </div>
    </div>
        <nav class="col-md-3 col-lg-2 sidebar">
            <div class="menu-btn" onclick="toggleSidebar()">&#9776;</div>
            <div class="profile">
                <img id="logo" src="../Imagens/logo (1).png" alt="Logo">
                <h1 class="text-title">IvaíTour</h1>
            </div>
            <ul class="nav-links">
                <li><a href="../index.php"><i class="fas fa-home"></i><span>Home</span></a></li>
                <li><a href="#"><i class="fas fa-concierge-bell"></i><span>Serviços</span></a></li>
                <?php if (isset($_SESSION['nome'])): ?>
                    <li><a href="user/conta.php"><i class="fas fa-users"></i><span>Minha Conta</span></a></li>
                <?php endif; ?>
                <?php if (!isset($_SESSION['nome'])): ?>
                    <li><a href="user/login.php"><i class="fas fa-users"></i><span>Minha Conta</span></a></li>
                <?php endif; ?>
                <li><a href="page/contato.php"><i class="fas fa-envelope"></i><span>Contato</span></a></li>
                <?php if (isset($_SESSION['nome']) && $_SESSION["tipo_usuario"] === 'administrador'): ?>
                    <li><a href="admin/admin_dashboard.php"><i class="fas fa-tablet-alt"></i><span>Painel Adm</span></a></li>
                <?php endif; ?>
                <?php if (isset($_SESSION['nome'])): ?>
                    <li class="nav-item logout">
                        <a href="static/logout.php" class="nav-link"><i class="fas fa-sign-out-alt"></i><span>Desconectar</span></a>
                    </li>
                <?php endif; ?>
                <li class="nav-item">
                    <a href="user/configuracoes.php" class="nav-link" id="settings-icon">
                        <i class="fas fa-cog"></i><span>Configurações</span>
                    </a>
                </li>
            </ul>
        </nav>
        <?php
                if(isset($_SESSION['nome'])){

            ?>
        <div class="user-profile">
  <span class="username"><b><?php echo $_SESSION['nome'];?></b></span>
  <?php if ($tipo_usuario === 'administrador'): ?>
  <span id="admin-badge">ADM</span>
  <?php endif; ?>
  <a href="user/conta.php" class="user-avatar-link">
  <img src="../<?php echo $foto;?>" alt="Avatar" class="avatar">
  </a>
</div>
<?php
                }
?>
        <div class="container-fluid">
            <h1>Cadastro de Hotéis - IvaíTour</h1>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome do Hotel</label>
                    <input name="bt_nome" type="text" class="form-control" id="nome" aria-describedby="nomeHelp">
                    <div id="nomeHelp" class="form-text">Coloque o nome do Hotel</div>
                </div>
                <div class="mb-3">
                    <label for="valor_diaria" class="form-label">Valor da Diária:</label>
                    <input name="bt_valor_diaria" type="text" class="form-control" id="valor_diaria">
                </div>
                <div class="mb-3">
                    <label for="descricao" class="form-label">Descrição do Hotel:</label>
                    <input name="bt_descricao" type="text" class="form-control" id="descricao">
                </div>
                <div class="mb-3">
                    <label for="arquivo" class="form-label">Imagem do Hotel:</label>
                    <input type="file" name="bt_arquivo" class="form-control" id="arquivo">
                </div>
                <?php
                if (isset($_SESSION['Sucesso'])) {
                    echo '<div class="alert alert-success" role="alert">' . $_SESSION['Sucesso'] . '</div>';
                    unset($_SESSION['Sucesso']);
                }
                ?>
                <input class="btn btn-success" type="submit" value="Cadastrar Hotel">
                <a class="btn btn-danger" href="index.php">Cancelar</a>
                <a class="btn btn-primary" href="lista_hoteis.php">Ver Hotéis</a>
            </form>
        </div>
    </div>
</body>

</html>
