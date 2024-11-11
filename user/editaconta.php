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
    $protectionFile = $_SESSION['tipo_usuario'] === 'administrador' ? '../static/protect_adm.php' : '../static/protect.php';
    require($protectionFile);

    // Atualização dos dados do usuário
    if (isset($_POST['bt_email']) && isset($_POST['bt_id_alterar'])) {
        $id_cadastro_alterar = $_POST['bt_id_alterar'];
        $email = $_POST['bt_email'];
        $nome = $_POST['bt_nome'];
        $telefone = $_POST['bt_telefone'];
        $cpf = $_POST['bt_cpf'];
        $foto_atual = $_SESSION['arquivo_foto'] ?? 'caminho_da_imagem_padrao.jpg';

        // Se o usuário enviar uma nova foto, faz o upload; caso contrário, mantém a foto atual
        if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
            $nome_arquivo = $_FILES['foto']['name'];
            $caminho_temp = $_FILES['foto']['tmp_name'];
            $caminho_destino = '../recebidos/' . $nome_arquivo;
            move_uploaded_file($caminho_temp, $caminho_destino);
            $_SESSION['arquivo_foto'] = $caminho_destino;
        } else {
            $caminho_destino = $foto_atual;
        }

        // Usar prepared statements para evitar SQL Injection
        $stmt = $conexao->prepare("UPDATE cadastro SET email = ?, nome = ?, cpf = ?, telefone = ?, arquivo_foto = ? WHERE id_usuario = ?");
        if ($stmt) {
            $stmt->bind_param("sssssi", $email, $nome, $cpf, $telefone, $caminho_destino, $id_cadastro_alterar);
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                // Atualizar os dados da sessão para refletir as mudanças
                atualizarSessao($nome, $email, $cpf, $telefone);

                // Redirecionar para a página com o parâmetro 'atualizado=true' se houve alterações
                header("Location: editaconta.php?atualizado=true");
                exit();
            }
            $stmt->close();
        } else {
            die("Erro na preparação da consulta SQL: " . $conexao->error);
        }
    }

    // Lógica para deletar a conta
    if (isset($_POST['deletar_conta'])) {
        $id_usuario_deletar = $_POST['id_usuario'];
        $stmt_delete = $conexao->prepare("DELETE FROM cadastro WHERE id_usuario = ?");
        if ($stmt_delete) {
            $stmt_delete->bind_param("i", $id_usuario_deletar);
            $stmt_delete->execute();

            if ($stmt_delete->affected_rows > 0) {
                // Redireciona o usuário para o logout após deletar a conta
                session_destroy();
                header("Location: ../static/logout.php");
                exit();
            }
            $stmt_delete->close();
        } else {
            die("Erro ao deletar a conta: " . $conexao->error);
        }
    }
}

function atualizarSessao($nome, $email, $cpf, $telefone) {
    $_SESSION['nome'] = $nome;
    $_SESSION['email'] = $email;
    $_SESSION['cpf'] = $cpf;
    $_SESSION['telefone'] = $telefone;
}

// Definir variáveis com os valores da sessão
$id_usuario = $_SESSION['id_usuario'] ?? null;
$nome_usuario = $_SESSION['nome'] ?? 'Visitante';
$email_usuario = $_SESSION['email'] ?? '';
$cpf_usuario = $_SESSION['cpf'] ?? 'Não disponível';
$telefone_usuario = $_SESSION['telefone'] ?? 'Não disponível';
$foto = $_SESSION['arquivo_foto'] ?? 'caminho_da_imagem_padrao.jpg';
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
    <link rel="shortcut icon" href="../Imagens/logo (1).png" type="image/x-icon">
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

        /* Alerta de sucesso */
        #successAlert {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 9998;
        }

        #successAlert div {
            background-color: #34495e;
            color: white;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        #successAlert h3 {
            margin-bottom: 10px;
        }

        #successAlert button {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <?php include('../static/menu.php'); ?>

    <?php if (isset($_GET['atualizado']) && $_GET['atualizado'] == 'true') { ?>
        <!-- Alerta de sucesso -->
        <div id="successAlert">
            <div>
                <h3>Sucesso!</h3>
                <p>Suas informações foram atualizadas com sucesso.</p>
                <button type="button" class="btn btn-light" onclick="closeSuccessAlert()">Fechar</button>
            </div>
        </div>

        <script>
            // Função para fechar o alerta de sucesso
            function closeSuccessAlert() {
                document.getElementById('successAlert').style.display = 'none';
            }

            // Mostrar o alerta de sucesso por 5 segundos
            setTimeout(function() {
                document.getElementById('successAlert').style.display = 'flex';
            }, 500);
        </script>
    <?php } ?>

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
                    <form action="editaconta.php" method="POST" enctype="multipart/form-data">
                        <!-- Campo hidden com o id do usuário -->
                        <input type="hidden" name="bt_id_alterar" value="<?php echo isset($id_usuario) ? $id_usuario : 0; ?>">

                        <!-- Upload da imagem de perfil -->
                        <input type="file" name="foto" id="foto" class="form-control" placeholder="Mudar foto de perfil">

                        <!-- Campos de texto -->
                        <input type="text" name="bt_nome" class="input" value="<?php echo $nome_usuario; ?>" placeholder="Nome" required>
                        <input type="email" name="bt_email" class="input" value="<?php echo $email_usuario; ?>" placeholder="Email" required>
                        <input type="text" name="bt_cpf" class="input" value="<?php echo $_SESSION['cpf']; ?>" placeholder="CPF" required>
                        <input type="text" name="bt_telefone" class="input" value="<?php echo $_SESSION['telefone']; ?>" placeholder="Telefone" required>
                        <div class="button-container">
                            <button type="button" class="reset-button" onclick="confirmDelete(<?php echo $id_usuario; ?>)">Deletar Conta</button>

                            <!-- Modal de Confirmação -->
                            <div id="confirmModal" style="display:none">
                                <div>
                                    <h3>Confirmar Exclusão</h3>
                                    <p>Tem certeza de que deseja excluir sua conta?</p>
                                    <button type="button" class="btn btn-danger" onclick="deleteAccount(<?php echo $id_usuario; ?>)">Sim, Deletar</button>
                                    <button type="button" class="btn btn-secondary" onclick="closeModal()">Cancelar</button>
                                </div>
                            </div>

                            <div class="save-button-container">
                                <button type="submit" class="save-button">Salvar Alterações</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php include('../static/footer.php'); ?>

    <script>
        // Função para mostrar o modal de confirmação
        function confirmDelete(id_usuario) {
            document.getElementById('confirmModal').style.display = 'flex';
        }

        // Função para fechar o modal
        function closeModal() {
            document.getElementById('confirmModal').style.display = 'none';
        }

        // Função para deletar a conta
        function deleteAccount(id_usuario) {
            fetch('editaconta.php', {
                method: 'POST',
                body: new URLSearchParams({
                    deletar_conta: true,
                    id_usuario: id_usuario
                })
            }).then(response => {
                if (response.ok) {
                    window.location.href = '../static/logout.php'; // Redireciona para logout após deletar
                }
            });
        }
    </script>
</body>

</html>
