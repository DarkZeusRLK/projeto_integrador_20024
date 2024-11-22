<?php
include('../static/conexao.php');
require('../static/protect_adm.php');

if (!isset($_SESSION)) {
    session_start();
}

// Verifica se o ID foi passado via GET
if (isset($_GET['codigo_cadastro'])) {
    $id = $_GET['codigo_cadastro'];

    // Consulta o usuário no banco de dados
    $consulta = "SELECT * FROM cadastro WHERE id_usuario = ?";
    $stmt = $conexao->prepare($consulta);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $usuario = $resultado->fetch_assoc();
    
    if (!$usuario) {
        echo "Usuário não encontrado.";
        exit();
    }
} else {
    echo "ID não fornecido.";
    exit();
}

// Função de deletar conta
if (isset($_POST['btn_deletar'])) {
    $sql_deletar = "DELETE FROM cadastro WHERE id_usuario = ?";
    $stmt_del = $conexao->prepare($sql_deletar);
    $stmt_del->bind_param('i', $id);
    $stmt_del->execute();
    
    header("Location: ../index/index.php");
    exit();
}

// Função de alterar informações
if (isset($_POST['btn_alterar'])) {
    $novo_nome = $_POST['nome'];
    $novo_email = $_POST['email'];

    $sql_alterar = "UPDATE cadastro SET nome = ?, email = ? WHERE id_usuario = ?";
    $stmt_upd = $conexao->prepare($sql_alterar);
    $stmt_upd->bind_param('ssi', $novo_nome, $novo_email, $id);
    $stmt_upd->execute();

    echo "<script>alert('Informações atualizadas com sucesso!');</script>";
    $usuario['nome'] = $novo_nome;
    $usuario['email'] = $novo_email;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Item</title>
    <link href="../css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script defer src="../javascript/dashboard_adm.js"></script>
    <script defer src="../javascript/script_navbar.js"></script>
    <script defer src="../javascript/alternar_modos.js"></script>
    <script defer src="../javascript/cookie.js"></script>

    <script>
        function confirmarDelecao() {
            return confirm('Tem certeza que deseja deletar esta conta? Esta ação não pode ser desfeita.');
        }
    </script>
</head>
<body>
    <?php include('../static/menu.php'); ?>

    <div id="gerenciar-container" class="container mt-5">
        <h1 id="gerenciar-titulo">Gerenciar Item</h1>
        
        <h3 id="info-titulo">Informações do Usuário</h3>
        <?php if ($usuario): ?>
            <p id="usuario-nome"><strong>Nome:</strong> <?php echo htmlspecialchars($usuario['nome']); ?></p>
            <p id="usuario-email"><strong>Email:</strong> <?php echo htmlspecialchars($usuario['email']); ?></p>
            
            <!-- Formulário para Alterar Informações -->
            <h4 id="alterar-titulo">Alterar Informações</h4>
            <form method="POST" id="form-alterar">
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome:</label>
                    <input type="text" id="alterar-nome" name="nome" class="form-control" value="<?php echo htmlspecialchars($usuario['nome']); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" id="alterar-email" name="email" class="form-control" value="<?php echo htmlspecialchars($usuario['email']); ?>" required>
                </div>
                <button type="submit" name="btn_alterar" id="btn-alterar" class="btn btn-primary">Salvar Alterações</button>
            </form>

            <!-- Formulário para Deletar Conta -->
            <form method="POST" id="form-deletar" onsubmit="return confirmarDelecao();" class="mt-4">
                <button type="submit" name="btn_deletar" id="btn-deletar" class="btn btn-danger">Deletar Conta</button>
            </form>
        <?php else: ?>
            <p>Informações do usuário não disponíveis.</p>
        <?php endif; ?>
    </div>
<br>
<br>
<br>
<br>
    <?php include('../static/footer.php'); ?>
</body>
</html>
