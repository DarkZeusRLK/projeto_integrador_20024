<?php
    include('../static/conexao.php');

    if(!isset($_SESSION)){
        session_start();
    }

    // Verifique se as variáveis de sessão estão definidas
$tipo_usuario = isset($_SESSION['tipo_usuario']) ? $_SESSION['tipo_usuario'] : null;
$nome_usuario = isset($_SESSION['nome']) ? $_SESSION['nome'] : 'Visitante';
$foto = isset($_SESSION['arquivo_foto']) ? $_SESSION['arquivo_foto'] : ''; // Caminho para a foto do usuário

// Conecte-se ao banco de dados normal para obter informações do usuário
$sql_user = "SELECT arquivo_foto FROM cadastro WHERE nome = ?";
$stmt = $conexao->prepare($sql_user);
$stmt->bind_param('s', $nome_usuario);
$stmt->execute();
$result_user = $stmt->get_result();
if ($result_user->num_rows > 0) {
    $row_user = $result_user->fetch_assoc();
    if (!empty($row_user['arquivo_foto'])) {
        $foto = $row_user['arquivo_foto'];
    } 
}
$stmt->close();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script defer src="../javascript/script_navbar.js"></script>
    <script defer src="../javascript/alternar_modos.js"></script>
    <script defer src="../javascript/cookie.js"></script>
    <script src="../javascript/configuracoes.js"></script>
    <title>Contato</title>
</head>
<body>

<div class="container-fluid">
<?php
                if(isset($_SESSION['nome'])){

            ?>
        <div class="user-profile">
  <span class="username"><b><?php echo $_SESSION['nome'];?></b></span>
  <?php if ($tipo_usuario === 'administrador'): ?>
  <span id="admin-badge">ADM</span>
  <?php endif; ?>
  <a href="../user/conta.php" class="user-avatar-link">
  <img src="../<?php echo $foto; ?>" alt="Avatar" class="avatar">
</div>
<?php
                }
?>
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
                    <li><a href="../user/conta.php"><i class="fas fa-users"></i><span>Minha Conta</span></a></li>
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
       
            

    <div class="container">
    <div id="form-container-ctt" class="form-container">
    <div id="form-ctt">
        <span class="heading">Contato</span>
        <input placeholder="Nome" type="text" class="input">
        <input placeholder="Email" id="mail" type="email" class="input">
        <textarea placeholder="Escreva sua mensagem..." rows="10" cols="30" id="message" name="message" class="textarea"></textarea>
        <div class="button-container">
        <div class="send-button">Enviar</div>
        <div class="reset-button-container">
            <div id="reset-btn" class="reset-button">Resetar</div>
        </div>
    </div>
</div>
</div>

<div vw class="enabled">
        <div vw-access-button class="active"></div>
        <div vw-plugin-wrapper>
            <div class="vw-plugin-top-wrapper"></div>
        </div>
    </div>
    </div>
    <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
    <script>
        new window.VLibras.Widget('https://vlibras.gov.br/app');
    </script>
    

        </section>
    </div>
    <?php
    include('../static/footer.php');
    ?>
    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</html>