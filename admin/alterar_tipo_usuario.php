<?php
include('../static/conexao.php');

require('../static/protect_adm.php');
if(!isset($_SESSION)){
    session_start();
}

if (isset($_POST['bt_email'])) {
    $id_cadastro_alterar =  $_POST['bt_id_alterar'];
    $email = $_POST['bt_email'];
    $senha = $_POST['bt_senha'];
    $nome = $_POST['bt_nome'];
    $tipo_usuario = $_POST['bt_tipo_usuario'];

    $sql_alterar = "UPDATE cadastro
        SET email = '$email',
        senha = '$senha',
        nome = '$nome',
        tipo_usuario = '$tipo_usuario'
        WHERE id_usuario = '$id_cadastro_alterar'";

    $conexao_alterar = $conexao->query($sql_alterar) or die($conexao->error);
}

if (isset($_POST['bt_id'])) {
    $id_cadastro = $_POST['bt_id'];
    $sql_consultar = "SELECT * FROM cadastro WHERE id_usuario = '$id_cadastro'";
    $mysqli_consultar = $conexao->query($sql_consultar) or die($conexao->error);
    $consultar = $mysqli_consultar->fetch_assoc();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<html>

<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script defer src="../javascript/script_navbar.js"></script>
    <title>Alterar Informações</title>
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
                <?php if (isset($_SESSION['nome'])) : ?>
                    <li><a href="../user/minha_conta.php"><i class="fas fa-users"></i><span>Minha Conta</span></a></li>
            <?php endif; ?>
            <?php if (!isset($_SESSION['nome'])) : ?>
                    <li><a href="../user/login.php"><i class="fas fa-users"></i><span>Minha Conta</span></a></li>
            <?php endif; ?>
                <li><a href="../page/contato.php"><i class="fas fa-envelope"></i><span>Contato</span></a></li>
                <?php
                if (isset($_SESSION['nome'])) {
                ?>
                    <li class="nav-item logout">
                        <a href="../static/logout.php" class="nav-link"><i class="fas fa-sign-out-alt"></i><span>Desconectar</span></a>
                    </li>
                <?php
                }
                ?>
            </ul>
        </nav>
        <main class="col-md-10 col-lg-10     main-content">
    <div class="container-fluid" id="container">
    <div class="signup-container">
    <h2 id="h2-alterar">Cadastrar Administrador</h2>
        <form action="" method="POST">
            <label for="">ID</label>
            <input type="text" name="bt_id_alterar" value="<?php 
            if (isset($consultar['id_usuario'])) {
            echo $consultar['id_usuario'];
            }
            ?>">
            <label>Email</label>
            <input class="form-control" type="email" name="bt_email" placeholder="Sem valor" value="<?php
            if (isset($consultar['email'])) {
            echo $consultar['email'];
            }
            ?>">
            <label for="">Senha</label>
            <input class="form-control" type="password" name="bt_senha" placeholder="Sem valor" value="<?php
            if (isset($consultar['senha'])) {
            echo $consultar['senha'];
            }
            ?>">
            <label for="">Nome</label>
            <input type="text" name="bt_nome" placeholder="Sem valor" required value="<?php
            if (isset($consultar['nome'])) {
            echo $consultar['nome'];
            }
            ?>">
            <label for="">Função:</label>
            <input type="text" name="bt_tipo_usuario" placeholder="Sem valor" required value="<?php
            if (isset($consultar['tipo_usuario'])) {
                echo $consultar['tipo_usuario'];
            }
            ?>">
            
            <input type="submit" value="Cadastrar"class="btn btn-success"  onclick="return validateFields()">
            <input  type="reset" id="btn-alterarr" class="btn btn-danger" value="Redefinir">
        </form>
        <form action="" method="POST">
        <div id="form-alterar"  class="row-auto">
            <div class="col-auto">
                    <label for="inputPassword6" class="col-form-label">Digite o ID para alteração</label>
            </div>
            <div  class="col-auto">
                <input name="bt_id" type="text" class="form-control" aria-describedby="passwordHelpInline">
            </div>
            <input id="botao_alterar" class="btn btn-warning" type="submit" value="Consultar">
        </div>
        </form>
    </div>
    </div>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.all.min.js"></script>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</html>