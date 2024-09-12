<?php
include('../static/conexao.php');
require('../static/protect_adm.php');

// Consultar todos os usuários
$consultar_banco = "SELECT * FROM cadastro";
$retorno_consulta = $conexao->query($consultar_banco) or die($conexao->error);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <script defer src="../javascript/dashboard_adm.js"></script>
    <script defer src="../javascript/script_navbar.js"></script>
    <title>Dashboard Admin</title>
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
                <li><a href="#contact"><i class="fas fa-envelope"></i><span>Contato</span></a></li>
                <?php if (isset($_SESSION['nome']) && $_SESSION["tipo_usuario"] === 'administrador') : ?>
                    <li><a href="../admin/admin_dashboard.php"><i class="fas fa-tablet-alt"></i><span>Painel Adm</span></a></li>
                <?php endif; ?>
                <?php if (isset($_SESSION['nome'])) : ?>
                    <li class="nav-item logout">
                        <a href="static/logout.php" class="nav-link"><i class="fas fa-sign-out-alt"></i><span>Desconectar</span></a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
        <main class="col-md-10 col-lg-10 main-content">
            <section class="dashboard-content">
                <div class="options">
                    <button class="custom-btn2" onclick="showUsers()">Usuários</button>
                    <button class="custom-btn2" onclick="showHotels()">Hotéis</button>
                </div>

                <div id="usuariosTable" class="table-container">
                    <h3 class="titulo-dashboard-adm">Usuários Cadastrados</h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Imagem</th>
                                <th>Função</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php while ($user = $retorno_consulta->fetch_assoc()) : ?>
        <tr id="link_adm_table" onclick="window.location.href='alterar_ou_deletar.php'" style="cursor: pointer;">
            <td><?php echo $user['id_usuario']; ?></td>
            <td><?php echo $user['nome']; ?></td>
            <td><?php echo $user['email']; ?></td>
            <td>
                <?php
                $imagem = !empty($user['arquivo_caminho']) ? $user['arquivo_caminho'] : 'Imagens/foto_padrao.png';
                ?>
                <img src="<?php echo $imagem; ?>" class="card-img-top imagem-dashboard-adm" alt="Imagem do usuário">
            </td>
            <td><?php echo $user['tipo_usuario']; ?></td>
        </tr>
    <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>

                <div id="hoteisTable" class="table-container" style="display:none;">
                    <h3 class="titulo-dashboard-adm">Hotéis Cadastrados</h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Imagem</th>
                                <th>Função</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                        <tr id="link_adm_table" onclick="window.location.href='alterar_ou_deletar.php'" style="cursor: pointer;">
                                <td>1</td>
                                <td>Hotel Ivaí</td>
                                <td>contato@hotelivai.com</td>
                                <td><img src="Imagens/avatar.png" alt="Imagem do hotel" class="imagem-dashboard-adm"></td>
                                <td>Hotel</td>
                                <td>
                                    <button>Editar</button>
                                    <button>Deletar</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
        </main>
    </div>

    <script src="../javascript/script.js"></script>
</body>

</html>
