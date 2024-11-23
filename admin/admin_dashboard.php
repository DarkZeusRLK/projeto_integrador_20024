<?php
include('../static/conexao.php');
require('../static/protect_adm.php');

// Consultar todos os usuários
$consultar_banco = "SELECT * FROM cadastro";
$retorno_consulta = $conexao->query($consultar_banco) or die($conexao->error);

$consultar_banco2 = "SELECT * FROM cadastro_hoteis";
$retorno_consulta2 = $conexao->query($consultar_banco2) or die($conexao->error);

$consultar_banco3 = "SELECT * FROM mensagem_contato";
$retorno_consulta3 = $conexao->query($consultar_banco3) or die($conexao->error);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <script defer src="../javascript/dashboard_adm.js"></script>
    <script defer src="../javascript/script_navbar.js"></script>
    <script defer src="../javascript/alternar_modos.js"></script>
    <script defer src="../javascript/cookie.js"></script>
    <link rel="shortcut icon" href="../Imagens/logo (1).png" type="image/x-icon">
    <title>Dashboard Admin</title>
    <style>
        /* Definições gerais para manter a tabela responsiva */
        .my-custom-table {
            width: 100%;
            overflow-x: auto;
            display: block;
            margin-bottom: 20px;
        }

        .table-container {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        table th,
        table td {
            padding: 10px;
            border: 1px solid #ddd;
        }

        /* Ajustes de layout em diferentes larguras de tela */
        @media (max-width: 768px) {


            table td {
                padding: 10px;
            }

            .dashboard-content {
                width: 70%;
                margin-left: 5%;
            }

            .custom-btn2 {
                width: 100%;
                margin-bottom: 10px;
            }
        }

        @media (max-width: 576px) {
            table td {
                font-size: 12px;
                padding: 10px;
                color: #000;
            }

            .dashboard-content {
                width: 70%;
                margin-left: 14%;
            }


            /* Exibição das tabelas em blocos verticais no celular */
            .my-custom-table,
            .table-container {
                overflow-x: scroll;
            }

            .custom-btn2 {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <h1 class="titulo-dashboard-adm">Painel Administrativo</h1>
        <?php include('../static/menu.php'); ?>
        <main class="col-md-10 col-lg-10 main-content">
            <section class="dashboard-content">
                <div class="options">
                    <button class="custom-btn2" onclick="showUsers()">Usuários</button>
                    <button class="custom-btn2" onclick="showHotels()">Hotéis</button>
                    <button class="custom-btn2" onclick="showMensagens()">Mensagens Contato</button>
                </div>

                <div id="usuariosTable" class="table-container">
                    <h3 class="titulo-dashboard-adm">Usuários Cadastrados</h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Função</th>
                                <th>Config. Adicional</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($user = $retorno_consulta->fetch_assoc()) : ?>
                                <tr id="link_adm_table" onclick="window.location.href='alterar_ou_deletar.php?codigo_cadastro=<?php echo $user['id_usuario']; ?>'" style="cursor: pointer;">
                                    <td><?php echo $user['id_usuario']; ?></td>
                                    <td><?php echo $user['nome']; ?></td>
                                    <td><?php echo $user['email']; ?></td>
                                    <td><?php echo $user['tipo_usuario']; ?></td>
                                    <td><i class="fas fa-cog"> </i><span> Editar</span></td>
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
                                <th>Imagem</th>
                                <th>Função</th>
                                <th>Config. Adicional</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($hotel = $retorno_consulta2->fetch_assoc()) : ?>
                                <tr id="link_adm_table" onclick="window.location.href='alterar_ou_deletar_3.php?codigo_hotel=<?php echo $hotel['id_hotel']; ?>'" style="cursor: pointer;">
                                    <td><?php echo $hotel['id_hotel']; ?></td>
                                    <td><?php echo $hotel['nome']; ?></td>
                                    <td><img src="../<?php echo $hotel['arquivo_caminho']; ?>" alt="Imagem do hotel" class="imagem-dashboard-adm"></td>
                                    <td>Hotel</td>
                                    <td><i class="fas fa-cog"> </i><span> Editar</span></td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>

                <div id="mensagensTable" class="table-container" style="display:none;">
                    <h3 class="titulo-dashboard-adm">Mensagens Cadastradas</h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Mensagem</th>
                                <th>Config. Adicional</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($mensagem = $retorno_consulta3->fetch_assoc()) : ?>
                                <tr id="link_adm_table" onclick="window.location.href='alterar_ou_deletar_2.php?codigo_mensagem=<?php echo $mensagem['id_mensagem']; ?>'" style="cursor: pointer;">
                                    <td><?php echo $mensagem['id_mensagem']; ?></td>
                                    <td><?php echo $mensagem['nome']; ?></td>
                                    <td><?php echo $mensagem['email']; ?></td>
                                    <td><?php echo $mensagem['mensagem']; ?></td>
                                    <td><i class="fas fa-cog"> </i><span> Editar</span></td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>

            </section>
        </main>
    </div>
    <?php include('../static/footer.php'); ?>
</body>

</html>