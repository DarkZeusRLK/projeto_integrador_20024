<?php
include('static/conexao.php');

if (!isset($_SESSION)) {
    session_start();
}
// Capturar os filtros enviados pelo formulário (GET)
$cidade_filtro = isset($_GET['cidade']) ? $_GET['cidade'] : '';
$preco_filtro = isset($_GET['preco']) ? $_GET['preco'] : '';

// Base da consulta SQL
$consultar_banco = "SELECT * FROM cadastro_hoteis WHERE 1=1";

// Adicionar filtro por cidade, se aplicável
if ($cidade_filtro != '') {
    $consultar_banco .= " AND cidade = '$cidade_filtro'";
}

// Adicionar filtro por preço, se aplicável
if ($preco_filtro != '') {
    if ($preco_filtro == 1) {
        $consultar_banco .= " AND valor_diaria <= 200";
    } elseif ($preco_filtro == 2) {
        $consultar_banco .= " AND valor_diaria > 200 AND valor_diaria <= 400";
    } elseif ($preco_filtro == 3) {
        $consultar_banco .= " AND valor_diaria > 400";
    }
}

// Executar a consulta com filtros
$retorno_consulta = $mysqli->query($consultar_banco) or die($mysqli->error);

$consultar_banco = "SELECT * FROM cadastro_hoteis";
$retorno_consulta = $mysqli->query($consultar_banco) or die($mysqli->error);
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

<!-- Barra de Navegação -->


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
<!-- Cards de Hotéis -->
<div class="container">
    <div class="row"> <!-- Row para agrupar os cards -->
        <?php
        $index = 0; // Índice para garantir IDs únicos para cada carousel
        while ($hoteis = $retorno_consulta->fetch_assoc()) : ?>
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4"> <!-- Definição de colunas responsivas -->
                <div class="card h-100">
                    <div id="carousel<?php echo $index; ?>" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active"> <!-- Primeira imagem ativa -->
                                <img src="<?php echo $hoteis['arquivo_caminho']; ?>" class="d-block w-100" alt="Imagem do hotel">
                            </div>
                        </div>
                    </div>
                    <div class="card-body d-flex flex-column justify-content-between">
                        <h5 class="card-title"><?php echo $hoteis['nome']; ?></h5>
                        <p class="card-text"><?php echo $hoteis['descricao']; ?></p>
                        <p class="card-text"><?php echo $hoteis['valor_diaria']; ?><strong></strong></p>
                        <a href="" class="btn btn-primary mt-auto">Reservar</a>
                    </div>
                </div>
            </div>
        <?php
        $index++; // Incrementa o índice para IDs únicos
        endwhile;
        ?>
    </div>
</div>
    
</div>

<!-- Seção de Avaliações -->
<div class="container my-5">
    <h3 class="text-center">Avaliações dos Hotéis</h3>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">João Silva</h5>
                    <p class="card-text">Ótimo hotel, localização perfeita e ótimo atendimento!</p>
                    <p class="text-warning">★★★★★</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Maria Souza</h5>
                    <p class="card-text">Quarto confortável e ótimo custo-benefício.</p>
                    <p class="text-warning">★★★★☆</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Carlos Pereira</h5>
                    <p class="card-text">Café da manhã excelente, voltarei com certeza!</p>
                    <p class="text-warning">★★★★★</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Rodapé -->
<footer class="bg-light text-center text-lg-start mt-5">
    <div class="container p-4">
        <div class="row">
            <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                <h5 class="text-uppercase">Sobre nós</h5>
                <p>Encontre os melhores hotéis com as melhores ofertas.</p>
            </div>

            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <h5 class="text-uppercase">Links Úteis</h5>
                <ul class="list-unstyled mb-0">
                    <li><a href="#!" class="text-dark">Promoções</a></li>
                    <li><a href="#!" class="text-dark">Contato</a></li>
                    <li><a href="#!" class="text-dark">Termos e Condições</a></li>
                </ul>
            </div>

            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <h5 class="text-uppercase">Redes Sociais</h5>
                <ul class="list-unstyled mb-0">
                    <li><a href="#!" class="text-dark">Facebook</a></li>
                    <li><a href="#!" class="text-dark">Instagram</a></li>
                    <li><a href="#!" class="text-dark">Twitter</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="text-center p-3 bg-dark text-light">
        © 2024 Hotéis
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>