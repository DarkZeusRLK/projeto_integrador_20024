<?php
include('../static/conexao.php');

// Iniciar a sessão se ainda não estiver iniciada
if (!isset($_SESSION)) {
    session_start();
}

// Verificar se o usuário está logado
if (!isset($_SESSION['nome'])) {
    header("Location: login.php");
    exit();
}

// Verificar o tipo de usuário e incluir o arquivo de proteção correto
if (isset($_SESSION['tipo_usuario'])) {
    if ($_SESSION['tipo_usuario'] === 'administrador') {
        require('../static/protect_adm.php'); // Proteção para administradores
    } elseif ($_SESSION['tipo_usuario'] === 'cliente') {
        require('../static/protect.php'); // Proteção para clientes
    }

    // Atualização dos dados do usuário
    if (isset($_POST['bt_email'])) {
        $id_cadastro_alterar = $_POST['bt_id_alterar'];
        $email = $_POST['bt_email'];
        $nome = $_POST['bt_nome'];
        $telefone = $_POST['bt_telefone'];
        $cpf = $_POST['bt_cpf'];
        $foto_atual = isset($_SESSION['arquivo_foto']) ? $_SESSION['arquivo_foto'] : 'caminho_da_imagem_padrao.jpg';
        $informacoes_alteradas = false; // Para controlar se as informações foram alteradas

        // Se o usuário enviar uma nova foto, faz o upload; caso contrário, mantém a foto atual
        if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
            // Processo de upload da nova imagem
            $nome_arquivo = $_FILES['foto']['name'];
            $caminho_temp = $_FILES['foto']['tmp_name'];
            $caminho_destino = '../recebidos/' . $nome_arquivo;
            move_uploaded_file($caminho_temp, $caminho_destino);
            $_SESSION['arquivo_foto'] = $caminho_destino; // Atualiza a foto na sessão
            $informacoes_alteradas = true; // Indica que houve alteração
        } else {
            // Mantém a foto atual
            $caminho_destino = $foto_atual;
        }

        // Usar prepared statements para evitar SQL Injection
        $stmt = $conexao->prepare("UPDATE cadastro SET email = ?, nome = ?, cpf = ?, telefone = ?, arquivo_foto = ? WHERE id_usuario = ?");

        // Verifica se a preparação da query foi bem-sucedida
        if (!$stmt) {
            die("Erro na preparação da consulta SQL: " . $conexao->error);
        }

        $stmt->bind_param("sssssi", $email, $nome, $cpf, $telefone, $caminho_destino, $id_cadastro_alterar);
        $stmt->execute();
        $stmt->close();

        // Atualizar os dados da sessão para refletir as mudanças
        $_SESSION['nome'] = $nome;
        $_SESSION['email'] = $email;
        $_SESSION['cpf'] = $cpf;
        $_SESSION['telefone'] = $telefone;

        // Redirecionar para a página com o parâmetro 'atualizado=true' apenas se houver alterações
        if ($informacoes_alteradas) {
            header("Location: editaconta.php?atualizado=true");
            exit();
        }
    }

    // Consultar os dados do usuário
    if (isset($_POST['bt_id'])) {
        $id_cadastro = $_POST['bt_id'];
        $stmt = $conexao->prepare("SELECT * FROM cadastro WHERE id_usuario = ?");
        $stmt->bind_param("i", $id_cadastro);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $consultar = $resultado->fetch_assoc();
        $stmt->close();
    }
}

// Definir variáveis com os valores da sessão
$id_usuario = isset($_SESSION['id_usuario']) ? $_SESSION['id_usuario'] : null;
$nome_usuario = isset($_SESSION['nome']) ? $_SESSION['nome'] : 'Visitante';
$email_usuario = isset($_SESSION['email']) ? $_SESSION['email'] : '';
$cpf_usuario = isset($_SESSION['cpf']) ? $_SESSION['cpf'] : 'Não disponível';
$telefone_usuario = isset($_SESSION['telefone']) ? $_SESSION['telefone'] : 'Não disponível';
$foto = isset($_SESSION['arquivo_foto']) ? $_SESSION['arquivo_foto'] : 'caminho_da_imagem_padrao.jpg';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="img/logo2.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="icon" href="../Imagens/icon.png">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/zere.css">
    <title>Minha Conta</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script defer src="../javascript/script_navbar.js"></script>
    <script defer src="../javascript/alternar_modos.js"></script>
    <script defer src="../javascript/cookie.js"></script>
    <style>
        /* Estilo do Modal */
        #confirmModal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 9999;
            justify-content: center;
            align-items: center;
            display: flex;
        }

        #confirmModal div {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            color: black;
        }

        #confirmModal h3 {
            margin-bottom: 15px;
        }

        #confirmModal button {
            margin: 5px;
        }
    </style>
</head>

<body>
    <?php include('../static/menu.php'); ?>


    <div class="container-fluid">
        <div class="mobile">
            <div id="form-container-ctt" class="form-container">
                <div id="form-ctt">
                    <div class="profile-picture-container">
                        <div class="editarfoto">
                            <img class='profile-picture' src='<?php echo $foto; ?>' alt='Foto de perfil'>
                        </div>
                    </div>

                    <label class="escfoto" for="foto">
                        <a id="editar">Escolher foto</a>
                    </label>

                    <span class="heading"><?php echo $nome_usuario; ?></span>
                    <form action="deletar_conta.php" method="POST" enctype="multipart/form-data">
                        <!-- Campo hidden com o id do usuário -->
                        <input type="hidden" name="bt_id_alterar" value="<?php echo $id_usuario; ?>">

                        <!-- Upload da imagem de perfil -->
                        <input type="file" name="foto" id="foto" class="form-control" placeholder="Mudar foto de perfil">

                        <!-- Campos de texto -->
                        <input type="text" name="bt_nome" class="input" value="<?php echo $nome_usuario; ?>" placeholder="Nome" required>
                        <input type="email" name="bt_email" class="input" value="<?php echo $email_usuario; ?>" placeholder="Email" required>
                        <input type="text" name="bt_cpf" class="input" value="<?php echo $_SESSION['cpf']; ?>" placeholder="CPF" required>
                        <input type="text" name="bt_telefone" class="input" value="<?php echo $_SESSION['telefone']; ?>" placeholder="Telefone" required>
                        <div class="button-container">
                            <button type="button" class="reset-button" onclick="confirmDelete(<?php echo $_SESSION['id_usuario']; ?>)">Deletar Conta</button>

                            <!-- Modal de Confirmação -->
                            <div id="confirmModal" style="display:none">
                                <div>
                                    <h3>Confirmar Exclusão</h3>
                                    <p>Você realmente deseja deletar sua conta? Esta ação é irreversível.</p>
                                    <button class="custom-btn2" id="confirmButton">Confirmar</button>
                                    <button class="custom-btn2" onclick="closeModal()">Cancelar</button>
                                </div>
                            </div>

                            <script>
                                function confirmDelete(id) {
                                    const modal = document.getElementById('confirmModal');
                                    modal.style.display = 'flex'; // Exibe o modal
                                    document.getElementById('confirmButton').onclick = function() {
                                        // Envia requisição AJAX para deletar a conta
                                        fetch('deletar_conta.php', {
                                            method: 'POST',
                                            headers: {
                                                'Content-Type': 'application/x-www-form-urlencoded'
                                            },
                                            body: 'id_usuario=' + id
                                        }).then(response => {
                                            if (response.ok) {
                                                alert("Conta deletada com sucesso.");
                                                window.location.href = '../static/logout.php'; // Redireciona para o logout
                                            } else {
                                                alert("Erro ao deletar a conta.");
                                            }
                                        });
                                    };
                                }

                                function closeModal() {
                                    const modal = document.getElementById('confirmModal');
                                    modal.style.display = 'none'; // Fecha o modal
                                }
                            </script>


                            <div class="save-button-container">
                                <button type="submit" class="save-button">Salvar Alterações</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-FTy4U2l0fF5uK4GLUUtQJcE1Q9SgIzOBnP5pD7nmlSYXySBrOBvvoL3N3bg01Btf" crossorigin="anonymous"></script>

    <?php if (isset($_GET['atualizado']) && $_GET['atualizado'] == 'true'): ?>
        <script>
            setTimeout(function() {
                alert("As informações foram atualizadas com sucesso!");
            }, 100);
        </script>
    <?php endif; ?>
</body>

</html>