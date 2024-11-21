<?php
include('../static/conexao.php');
require('../static/protect_adm.php');

if (!isset($_SESSION)) {
    session_start();
}

// Verifica se o ID foi passado via GET
if (isset($_GET['codigo_hotel'])) {
    $id = $_GET['codigo_hotel'];

    // Consulta o usuário no banco de dados
    $consulta = "SELECT * FROM cadastro_hoteis WHERE id_hotel = ?";
    $stmt = $conexao->prepare($consulta);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $usuario = $resultado->fetch_assoc();
    
    if (!$usuario) {
        echo "Usuário não encontrado.";
        exit();
    }

    // Atribuindo os dados do usuário a $hoteis
    $hoteis = [
        'nome' => $usuario['nome'],
        'breve_descricao' => $usuario['breve_descricao'],
        'descricao' => $usuario['descricao'],
        'cidades' => isset($usuario['cidades']) ? $usuario['cidades'] : '',
        'valor_diaria' => isset($usuario['valor_diaria']) ? $usuario['valor_diaria'] : ''
    ];
} else {
    echo "ID não fornecido.";
    exit();
}

// Função de deletar conta
if (isset($_POST['btn_deletar'])) {
    $sql_deletar = "DELETE FROM cadastro_hoteis WHERE id_hotel = ?";
    $stmt_del = $conexao->prepare($sql_deletar);
    $stmt_del->bind_param('i', $id);
    $stmt_del->execute();
    
    header("Location: ../index/index.php");
    exit();
}

// Função de alterar informações
if (isset($_POST['btn_alterar'])) {
    $novo_nome = $_POST['nome'];
    $novo_valor= $_POST['valor_diaria'];
    $nova_breve_descricao = $_POST['breve_descricao'];
    $nova_descricao = $_POST['descricao'];
    $nova_cidade = $_POST['cidade'];

    $sql_alterar = "UPDATE cadastro_hoteis SET nome = ?, valor_diaria = ?, breve_descricao = ?, descricao = ?, cidade = ? WHERE id_hotel = ?";
    $stmt_upd = $conexao->prepare($sql_alterar);
    $stmt_upd->bind_param('sssssi', $novo_nome, $novo_valor, $nova_breve_descricao, $nova_descricao, $nova_cidade, $id); // CORRIGIR AQUI, ESTÁ DANDO ERRO //
    $stmt_upd->execute();

    echo "<script>alert('Informações atualizadas com sucesso!');</script>";
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
    <link rel="shortcut icon" href="../Imagens/logo (1).png" type="image/x-icon">

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
        
        <h3 id="info-titulo">Informações do Hotel</h3>
        <?php if ($usuario): ?>
            <p id="usuario-nome"><strong>Nome:</strong> <?php echo htmlspecialchars($hoteis['nome']); ?></p>
            
            <!-- Formulário para Alterar Informações -->
            <h4 id="alterar-titulo">Alterar Informações</h4>
            <form method="POST" id="form-alterar">
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome:</label>
                    <input type="text" id="alterar-nome" name="nome" class="form-control" value="<?php echo htmlspecialchars($hoteis['nome']); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="breve_descricao" class="form-label">Breve Descrição:</label>
                    <input type="text" id="alterar-breve-descricao" name="breve_descricao" class="form-control" value="<?php echo htmlspecialchars($hoteis['breve_descricao']); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="descricao" class="form-label">Descrição:</label>
                    <input type="text" id="alterar-descricao" name="descricao" class="form-control" value="<?php echo htmlspecialchars($hoteis['descricao']); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="cidade" class="form-label">Cidade:</label>
                    <input type="text" id="alterar-cidade" name="cidade" class="form-control" value="<?php echo htmlspecialchars($hoteis['cidades']); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="valor_diaria" class="form-label">Valor Diária:</label>
                    <input type="text" id="alterar-valor" name="valor_diaria" class="form-control" value="<?php echo htmlspecialchars($hoteis['valor_diaria']); ?>" required>
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

    <?php include('../static/footer.php'); ?>
</body>
</html>
