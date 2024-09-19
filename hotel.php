<?php
include('static/conexao.php'); // Inclui a conexão com o banco de dados

if (!isset($_SESSION)) {
    session_start();
}

// Capturar os filtros enviados pelo formulário (GET)
$cidade_filtro = isset($_GET['cidade']) ? $_GET['cidade'] : '';
$preco_filtro = isset($_GET['preco']) ? $_GET['preco'] : '';

// Base da consulta SQL
$consultar_banco = "SELECT * FROM cadastro_hoteis WHERE 1=1";

// Adicionar filtro por cidade, se aplicável
if (!empty($cidade_filtro)) {
    $cidade_filtro = $mysqli->real_escape_string($cidade_filtro); // Escapar dados para evitar injeção de SQL
    $consultar_banco .= " AND cidade = '$cidade_filtro'";
}

// Adicionar filtro por preço, se aplicável
if (!empty($preco_filtro)) {
    switch ($preco_filtro) {
        case '1':
            $consultar_banco .= " AND valor_diaria <= 200";
            break;
        case '2':
            $consultar_banco .= " AND valor_diaria > 200 AND valor_diaria <= 400";
            break;
        case '3':
            $consultar_banco .= " AND valor_diaria > 400";
            break;
    }
}

// Executar a consulta com filtros
$retorno_consulta = $mysqli->query($consultar_banco);

if (!$retorno_consulta) {
    die('Erro na consulta: ' . $mysqli->error);
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotéis</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/hotel.css">
</head>
<body>

<!-- Título Principal -->
<h2 class="text-center my-4">Hotéis</h2>

<!-- Filtros de Busca -->
<div class="container">
    <div class="row mb-4">
        <form method="GET" action="">
            <div class="col-md-4">
                <select class="form-select" name="cidade" aria-label="Filtrar por cidade">
                    <option value="">Filtrar por cidade</option>
                    <option value="Ivaiporã" <?php echo ($cidade_filtro == 'Ivaiporã') ? 'selected' : ''; ?>>Ivaiporã</option>
                    <option value="São Pedro do Ivaí" <?php echo ($cidade_filtro == 'São Pedro do Ivaí') ? 'selected' : ''; ?>>São Pedro do Ivaí</option>
                    <option value="Apucarana" <?php echo ($cidade_filtro == 'Apucarana') ? 'selected' : ''; ?>>Apucarana</option>
                </select>
            </div>

            <div class="col-md-4">
                <select class="form-select" name="preco" aria-label="Filtrar por preço">
                    <option value="">Filtrar por preço</option>
                    <option value="1" <?php echo ($preco_filtro == '1') ? 'selected' : ''; ?>>Até R$ 200</option>
                    <option value="2" <?php echo ($preco_filtro == '2') ? 'selected' : ''; ?>>R$ 200 a R$ 400</option>
                    <option value="3" <?php echo ($preco_filtro == '3') ? 'selected' : ''; ?>>Acima de R$ 400</option>
                </select>
            </div>

            <div class="col-md-4">
                <button type="submit" class="btn btn-primary w-100">Filtrar</button>
            </div>
        </form>
    </div>
</div>

<!-- Cards de Hotéis -->
<div class="container" id="hoteisContainer">
    <div class="row">
        <?php if ($retorno_consulta->num_rows > 0): ?>
            <?php $index = 0; ?>
            <?php while ($hotel = $retorno_consulta->fetch_assoc()): ?>
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="card h-100">
                        <div id="carousel<?php echo $index; ?>" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="<?php echo htmlspecialchars($hotel['arquivo_caminho']); ?>" class="d-block w-100" alt="Imagem do hotel">
                                </div>
                            </div>
                        </div>
                        <div class="card-body d-flex flex-column justify-content-between">
                            <h5 class="card-title"><?php echo htmlspecialchars($hotel['nome']); ?></h5>
                            <p class="card-text"><?php echo htmlspecialchars($hotel['descricao']); ?></p>
                            <p class="card-text">R$ <?php echo ($hotel['valor_diaria']); ?></p>
                            <a href="#" class="btn btn-primary mt-auto">Reservar</a>
                        </div>
                    </div>
                </div>
                <?php $index++; ?>
            <?php endwhile; ?>
        <?php else: ?>
            <p>Nenhum hotel encontrado.</p>
        <?php endif; ?>
    </div>
</div>

<footer class="bg-light text-center text-lg-start mt-5">
    <div class="text-center p-3 bg-dark text-light">
        © 2024 Hotéis
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
