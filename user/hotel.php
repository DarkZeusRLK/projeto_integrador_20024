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

// Verifique se há um resultado
if ($result_user->num_rows > 0) {
    $row_user = $result_user->fetch_assoc();
    if (!empty($row_user['arquivo_foto'])) {
        // Defina o novo caminho da imagem do banco de dados
        $foto = $row_user['arquivo_foto'];
    }
}
$stmt->close();

// Verificar se o usuário está logado e definir o cookie de primeiro login se não estiver presente
if (isset($_SESSION['nome']) && !isset($_COOKIE['firstLogin'])) {
    setcookie('firstLogin', 'true', time() + (2 * 60), "/"); // Define o cookie para expirar em 2 minutos
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

// Verifica se o pacote foi encontrado
if (!$pacote) {
    echo "<h2>Pacote não encontrado.</h2>";
    exit;
}


$stmt->close();

// Certifique-se de que 'valor_diaria' seja um número
$valor_diaria = isset($pacote['valor_diaria']) ? floatval($pacote['valor_diaria']) : 0; // 0 se não definido

// Verifique se o valor foi definido corretamente
if ($valor_diaria <= 0) {
    $valor_diaria = 0; // Define um valor padrão caso o valor_diaria não seja válido
}

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
</head>
<body>
    <?php include('../static/menu.php'); ?>
    <div id="container">
        <!-- Card de Informações do Hotel/Pacote -->
        <div id="card-info">
            <div id="image" style="background-image: url('../<?php echo htmlspecialchars($pacote['arquivo_caminho']); ?>');"></div>
            <h1 id="title"><?php echo htmlspecialchars($pacote['nome']); ?></h1>
            <p id="description"><?php echo $pacote['descricao']; ?></p>
            <p id="price">Valor: R$<?php echo htmlspecialchars(number_format($valor_diaria, 2, ',', '.')); ?></p>
        </div>

        <!-- Mapa do Google Maps -->
        <div id="map-container">
            <iframe 
                src="<?php echo htmlspecialchars($pacote['localizacao']);?>" 
                width="100%" 
                height="100%" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy"></iframe>
        </div>
    </div>
    <?php include('../static/footer.php'); ?>
</body>
</html>
