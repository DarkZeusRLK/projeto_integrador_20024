<?php
include('../static/conexao.php');

if (!isset($_SESSION)) {
    session_start();
}

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
            $mysqli->query("INSERT INTO cadastro_hoteis (nome, descricao, valor_diaria, arquivo_caminho) 
                VALUES ('$nome', '$descricao', '$valor_diaria', '$caminho_relativo')") or die($mysqli->error);

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
    <title>Cadastro de Hotel</title>
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
                <li><a href="#home"><i class="fas fa-home"></i><span>Home</span></a></li>
                <li><a href="#services"><i class="fas fa-concierge-bell"></i><span>Serviços</span></a></li>
                <li><a href="#clients"><i class="fas fa-users"></i><span>Minha Conta</span></a></li>
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
