<?php
include('../static/conexao.php');

// Iniciar a sessão se ainda não estiver iniciada
if (!isset($_SESSION)) {
    session_start();
}

// Verificar se o usuário está logado
if (!isset($_SESSION['nome'])) {
    // Se a sessão do usuário não estiver ativa, redireciona para a página de login
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

        // Se o usuário enviar uma nova foto, faz o upload; caso contrário, mantém a foto atual
        if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
            // Processo de upload da nova imagem
            $nome_arquivo = $_FILES['foto']['name'];
            $caminho_temp = $_FILES['foto']['tmp_name'];
            $caminho_destino = '../recebidos/' . $nome_arquivo;
            move_uploaded_file($caminho_temp, $caminho_destino);

            // Atualiza a foto na sessão e na variável
            $_SESSION['arquivo_foto'] = $caminho_destino;
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

        // Redirecionar para a página com o parâmetro 'atualizado=true'
        header("Location: editaconta.php?atualizado=true");
        exit();
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
</head>

<body>
    <!-- Modal de Confirmação de Exclusão -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteModalLabel">Deletar Conta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Você tem certeza de que deseja deletar sua conta? Esta ação não pode ser desfeita.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <form action="deletar_conta.php" method="POST">
                        <input type="hidden" name="bt_id_deletar" value="<?php echo $id_usuario; ?>">
                        <button type="submit" class="btn btn-danger">Deletar Conta</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php
    include('../static/menu.php');
    ?>
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
                        <input type="hidden" name="bt_id_alterar" value="<?php echo $id_usuario; ?>">

                        <!-- Upload da imagem de perfil -->
                        <input type="file" name="foto" id="foto" class="form-control" placeholder="Mudar foto de perfil">

                        <!-- Campos de texto -->
                        <input type="text" name="bt_nome" class="input" value="<?php echo $nome_usuario; ?>" placeholder="Nome" required>
                        <input type="email" name="bt_email" class="input" value="<?php echo $email_usuario; ?>" placeholder="Email" required>
                        <input type="text" name="bt_cpf" class="input" value="<?php echo $_SESSION['cpf']; ?>" placeholder="CPF" required>
                        <input type="text" name="bt_telefone" class="input" value="<?php echo $_SESSION['telefone']; ?>" placeholder="Telefone" required>
                        <div class="button-container">
                            <button type="button" class="reset-button" onclick="openDeleteModal()">Deletar Conta</button>
                            <script>
                                function openDeleteModal() {
                                    const deleteModal = new bootstrap.Modal(document.getElementById('confirmDeleteModal'));
                                    deleteModal.show();
                                }
                            </script>
                            <!-- Botão de salvar -->
                            <div class="save-button-container">
                                <button type="submit" class="save-button">Salvar</button>
                            </div>
                        </div>

                </div>




                </form>

                <?php if (isset($_GET['atualizado']) && $_GET['atualizado'] == 'true'): ?>
                    <div class="overlay"></div> <!-- Fundo escurecido -->

                    <div class="card1">
                        <div class="header">
                            <div class="image">
                                <svg aria-hidden="true" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" fill="none">
                                    <path d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" stroke-linejoin="round" stroke-linecap="round"></path>
                                </svg>
                            </div>
                            <div class="content">
                                <span class="title">Seus dados foram alterados!</span>
                                <p class="message">Você será redirecionado para a página de conta em breve.</p>
                            </div>
                        </div>
                    </div>

                    <script>
                        // Redirecionar após 10 segundos
                        setTimeout(function() {
                            window.location.href = "conta.php";
                        }, 5000); // 10000 milissegundos = 10 segundos
                    </script>
                <?php endif; ?>

            </div>
        </div>
    </div>
    </div>

    <!-- Scripts de acessibilidade e rodapé -->
    <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
    <script>
        new window.VLibras.Widget('https://vlibras.gov.br/app');
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-Qg4pyS/B0iGf7A29Hhs6eSYZZFpb77BJPf3CwEYfqLSfdHgfsELaI9HtWw5ERgAc" crossorigin="anonymous"></script>
    </script>
</body>

</html>