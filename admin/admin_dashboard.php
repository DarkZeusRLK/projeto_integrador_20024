<?php
include('../static/conexao.php');
require('../static/protect_adm.php');

// Consultar todos os usuários
$consultar_banco = "SELECT * FROM cadastro";
$retorno_consulta = $conexao->query($consultar_banco) or die($conexao->error);

$consultar_banco2 = "SELECT * FROM cadastro_hoteis";
$retorno_consulta2 = $conexao->query($consultar_banco2) or die($conexao->error);


?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">
    
    
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script defer src="../javascript/dashboard_adm.js"></script>
    <script defer src="../javascript/script_navbar.js"></script>
    <script defer src="../javascript/alternar_modos.js"></script>
    <script defer src="../javascript/cookie.js"></script>
    <link rel="shortcut icon" href="../Imagens/logo (1).png" type="image/x-icon">
    <title>Dashboard Admin</title>
</head>
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

table th, table td {
    padding: 10px;
    border: 1px solid #ddd;
}

/* Ajustes de layout em diferentes larguras de tela */
@media (max-width: 768px) {
.footer{
    margin-top: 40vh;
}
    table th, table td {
        font-size: 14px;
        padding: 2px;
    }

    img#imagem {
        width: 80px;
        height: 80px;
    }

    .imagem-dashboard-adm {
        width: 100px;
        height: auto;
    }

    .custom-btn2 {
        width: 100%;
        margin-bottom: 10px;
    }
}

@media (max-width: 576px) {
    .footer{
        margin-top: 45vh;
    }
    table th, table td {
        font-size: 12px;
        padding: 5px;
        color: #ddd;
    }
.dashboard-content{
display: contents;
}
    img#imagem {
        width: 60px;
        height: 60px;
    }

    .imagem-dashboard-adm {
        width: 8px;
    }

    /* Exibição das tabelas em blocos verticais no celular */
    .my-custom-table, .table-container {
        overflow-x: scroll;
    }

    .custom-btn2 {
        width: 100%;
    }
}

</style>
<body>

    <div class="container-fluid">
    <?php
        include('../static/menu.php');
       ?>
        <main class="col-md-10 col-lg-10 main-content">
            <section class="dashboard-content">
                <div class="options">
                    <button class="custom-btn2" onclick="showUsers()">Usuários</button>
                    <button class="custom-btn2" onclick="showHotels()">Hotéis</button>
                </div>

                <div id="usuariosTable" class="my-custom-table">
                    <h3 class="titulo-dashboard-adm">Usuários Cadastrados</h3>
                    <table class="table custom-bg">
                        <thead class="my-custom-bg">
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
        <tr id="link_adm_table" onclick="window.location.href='alterar_ou_deletar.php?codigo_cadastro=<?php echo $user['id_usuario'];?>'" style="cursor: pointer;">
            <td><?php echo $user['id_usuario']; ?></td>
            <td><?php echo $user['nome']; ?></td>
            <td><?php echo $user['email']; ?></td>
            <td><?php echo $user['tipo_usuario']; ?> 
            <td><i class="fas fa-cog"> </i><span> Editar</span></td>   </td>
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
                                <th>Descrição</th>
                                <th>Imagem</th>
                                <th>Função</th>
                                <th>Config. Adicional</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php while ($hotel = $retorno_consulta2->fetch_assoc()) : ?>
                            <tr id="link_adm_table" onclick="window.location.href='alterar_ou_deletar.php?codigo_cadastro=<?php echo $hotel['id_hotel'];?>'" style="cursor: pointer;">
                                <td><?php echo $hotel['id_hotel'];?></td>
                                <td><?php echo $hotel['nome'];?></td>
                                <td><?php echo $hotel['descricao'];?></td>
                                <td><img src="../<?php echo $hotel['arquivo_caminho'];?>" alt="Imagem do hotel" class="imagem-dashboard-adm"></td>
                                <td>Hotel</td>
                                <td><i class="fas fa-cog"> </i><span> Editar</span></td>   </td>

                                </td>
                            </tr>
                            <?php endwhile; ?>

                        </tbody>
                    </table>
                  <a class="custom-btn2" href="../user/cadastrar_hoteis_gramado.php">Cadastrar Hotéis Gramado</a>
                </div>
            </section>
        </main>
    </div>
    <?php
        include('../static/footer.php');
    ?>

    <script src="../javascript/script.js"></script>
</body>

</html>
