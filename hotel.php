<?php
include('static/conexao.php');

if (!isset($_SESSION)) {
    session_start();
}

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
        <div class="col-md-4">
            <select class="form-select" aria-label="Filtrar por cidade">
                <option selected>Filtrar por cidade</option>
                <option value="1">Ivaiporã</option>
                <option value="2">São Pedro do Ivaí</option>
                <option value="3">Apucarana</option>
            </select>
        </div>
        <div class="col-md-4">
            <select class="form-select" aria-label="Filtrar por preço">
                <option selected>Filtrar por preço</option>
                <option value="1">Até R$ 200</option>
                <option value="2">R$ 200 a R$ 400</option>
                <option value="3">Acima de R$ 400</option>
            </select>
        </div>
        <div class="col-md-4">
            <button class="btn btn-primary w-100">Filtrar</button>
        </div>
    </div>
</div>


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
                        <button class="carousel-control-prev" type="button" data-bs-target="#carousel<?php echo $index; ?>" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carousel<?php echo $index; ?>" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
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