<?php
include('../static/conexao.php');

if (!isset($_SESSION)) {
    session_start();
}

// Verifique se as variáveis de sessão estão definidas
$tipo_usuario = isset($_SESSION['tipo_usuario']) ? $_SESSION['tipo_usuario'] : null;
$nome_usuario = isset($_SESSION['nome']) ? $_SESSION['nome'] : 'Visitante';

// Defina um caminho padrão para a imagem
$foto = 'caminho/para/avatar/padrao.png';

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

// Verificar se o usuário está logado e definir o cookie de primeiro login se não estiver presente
if (isset($_SESSION['nome']) && !isset($_COOKIE['firstLogin'])) {
    setcookie('firstLogin', 'true', time() + (2 * 60), "/");
}

// Obtendo o ID do hotel/pacote via GET
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Consulta para pegar as informações do hotel/pacote
$query = "SELECT * FROM cadastro_hoteis WHERE id_hotel = ?";
$stmt = $conexao->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$pacote = $result->fetch_assoc();

$stmt->close();

// Certifique-se de que 'valor_diaria' seja um número
$valor_diaria = isset($pacote['valor_diaria']) ? floatval($pacote['valor_diaria']) : 0;

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" href="../Imagens/logo (1).png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script defer src="../javascript/script_navbar.js"></script>
    <script defer src="../javascript/alternar_modos.js"></script>
    <script defer src="../javascript/cookie.js"></script>
    <script src="../javascript/configuracoes.js"></script>
    <title>Reservar - IvaíTour</title>
    <style>
        /* Estilos do card */
        #card-info {
            position: relative;
            width: 100%;
            height: 300px;
            background-image: url('../<?php echo htmlspecialchars($pacote['arquivo_caminho'] ?? 'caminho/para/imagem/padrao.jpg'); ?>');
            background-size: cover;
            background-position: center;
            border-radius: 8px;
            overflow: hidden;
        }

        /* Overlay */
        #card-info .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        /* Exibe a sobreposição no hover */
        #card-info:hover .overlay {
            opacity: 1;
        }
    </style>
</head>
<body>
    <?php include('../static/menu.php'); ?>
    <div id="container">
        <!-- Card de Informações do Hotel/Pacote -->
        <div id="card-info">
            <div class="overlay">
                <h1><?php echo htmlspecialchars($pacote['nome'] ?? 'Nome não disponível'); ?></h1>
                <p><?php echo htmlspecialchars($pacote['descricao'] ?? 'Descrição não disponível'); ?></p>
                <p>Valor: R$<?php echo htmlspecialchars(number_format($valor_diaria, 2, ',', '.')); ?></p>
            </div>
        </div>

        <!-- Mapa do Google Maps -->
        <div id="map-container">
            <?php if (!empty($pacote['localizacao'])): ?>
                <iframe 
                    src="<?php echo htmlspecialchars($pacote['localizacao']); ?>" 
                    width="100%" 
                    height="100%" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy"></iframe>
            <?php else: ?>
                <p>Localização não disponível.</p>
            <?php endif; ?>
        </div>
    </div>
    <?php include('../static/footer.php'); ?>
</body>
</html>
