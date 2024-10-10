<?php
include('../static/conexao.php');
require('../static/protect_adm.php');

// Verificar o tipo de usuário e incluir o arquivo de proteção correto
if (isset($_SESSION['tipo_usuario'])) {
    if ($_SESSION['tipo_usuario'] === 'administrador') {
        require('../static/protect_adm.php'); // Proteção para administradores
    } elseif ($_SESSION['tipo_usuario'] === 'cliente') {
        require('../static/protect.php'); // Proteção para clientes
    }
}

// Definir variáveis com os valores da sessão
$id_usuario = isset($_SESSION['id_usuario']) ? $_SESSION['id_usuario'] : null;
$nome_usuario = isset($_SESSION['nome']) ? $_SESSION['nome'] : 'Visitante';
$email_usuario = isset($_SESSION['email']) ? $_SESSION['email'] : '';
$cpf_usuario = isset($_SESSION['cpf']) ? $_SESSION['cpf'] : 'Não disponível';
$telefone_usuario = isset($_SESSION['telefone']) ? $_SESSION['telefone'] : 'Não disponível';

// Consultar todos os usuários
$consultar_banco = "SELECT * FROM cadastro";
$retorno_consulta = $conexao->query($consultar_banco) or die($conexao->error);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Altear ou Deletar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <script defer src="../javascript/dashboard_adm.js"></script>
    <script defer src="../javascript/script_navbar.js"></script>
</head>

<body>
    <div class="container-fluid">
    <?php
        include('../static/menu.php');
       ?>
        <!-- Seção com os cards -->
        <div class="container mt-5 d-flex justify-content-center">
            <div class="row">
                <!-- Card 1 -->
                <div id="cards2" class="col-md-3 mb-2">
                    <div id="link_adm_table" onclick="window.location.href='../user/editaconta.php?id=<?php echo $id_usuario;?>'" style="cursor: pointer;" class="card h-100">
                        <img src="../Imagens/images.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Alterar Usuário</h5>
                            <p class="card-text">Clique aqui para alterar as informações dos usuários cadastrados.</p>
                            <h5 class="card-text"></h5>
                        </div>
                    </div>
                </div>
                <!-- Card 2 -->
                <div id="cards2" class="col-md-3 mb-2">
                    <div id="link_adm_table" onclick="window.location.href='deletar_usuario.php'" style="cursor: pointer;" class="card h-100">
                        <img src="../Imagens/images2.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Deletar Usuário</h5>
                            <p class="card-text">Clique aqui para deletar as informações dos usuários cadastrados.</p>
                            <h5 class="card-text"></h5>
                        </div>
                    </div>
                </div>
            </div>
</body>

</html>