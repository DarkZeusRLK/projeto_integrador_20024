<?php
include('static/conexao.php');

if (!isset($_SESSION)) {
    session_start();
}

$consultar_banco = "SELECT * FROM cadastro_hoteis";
$retorno_consulta = $conexao->query($consultar_banco) or die($mysqli->error);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script defer src="javascript/script_navbar.js"></script>
    <title>Início - IvaíTour</title>
    <style>
        body {
            background-color: #fff;
            background-image: url("Imagens/Vegetação2.gif");
            background-repeat: no-repeat;
            background-position: center center;
            background-size: 100%;
            background-position-y: -40%;
            text-align: center;
        }
        .card {
            border: 1px solid #ddd;
            border-radius: 0.5rem;
            overflow: hidden;
        }
        .card img {
            width: 100%;
            height: auto;
        }
        .custom-btn {
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 0.25rem;
            padding: 0.75rem 1.25rem;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 1rem;
        }
        .custom-btn:hover {
            background-color: #0056b3;
            text-decoration: none;
        }
        .passagem {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            font-size: 1.2rem;
            border-radius: 0.5rem;
            text-decoration: none;
        }
    </style>
</head>

<body>
<div id="carouselExampleDark" class="carousel carousel-dark slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="300">
      <img class="img-fluid" src="Imagens/Banner para Site Mês dos Pais com Descontos Fotográfico Azul Escuro.png" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
      </div>
    </div>
    <div class="carousel-item" data-bs-interval="300">
      <img class="img-fluid" src="Imagens/Banner para Site Mês dos Pais com Descontos Fotográfico Azul Escuroo.png" class="d-block w-100" alt="..." >
      <div class="carousel-caption d-none d-md-block">
      </div>
    </div>
    <div class="carousel-item" data-bs-interval="300">
      <img class="img-fluid" src="Imagens/Banner para Site Mês dos Pais com Descontos Fotográfico Azul Escuro (1).png" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Anterior</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Próximo</span>
  </button>
</div>
    <div class="container-fluid">
        <nav class="col-md-3 col-lg-2 sidebar">
            <div class="menu-btn" onclick="toggleSidebar()">&#9776;</div>
            <div class="profile">
                <img id="logo" src="Imagens/logo (1).png" alt="Logo">
                <h1 class="text-title">IvaíTour</h1>
            </div>
            <ul class="nav-links">
                <li><a href="#home"><i class="fas fa-home"></i><span>Home</span></a></li>
                <li><a href="#services"><i class="fas fa-concierge-bell"></i><span>Serviços</span></a></li>
                <?php if (isset($_SESSION['nome'])) : ?>
                    <li><a href="user/minha_conta.php"><i class="fas fa-users"></i><span>Minha Conta</span></a></li>
            <?php endif; ?>
            <?php if (!isset($_SESSION['nome'])) : ?>
                    <li><a href="user/login.php"><i class="fas fa-users"></i><span>Minha Conta</span></a></li>
            <?php endif; ?>
                <li><a href="#contact"><i class="fas fa-envelope"></i><span>Contato</span></a></li>
                <?php
                if (isset($_SESSION['nome'])) {
                ?>
                    <li class="nav-item logout">
                        <a href="static/logout.php" class="nav-link"><i class="fas fa-sign-out-alt"></i><span>Desconectar</span></a>
                    </li>
                <?php
                }
                ?>
            </ul>
        </nav>
        <main class="col-md-10 col-lg-10     main-content">

            <a class="passagem" href="passagem.php">Reserve sua Passagem</a>
    
            <div class="row mt-4">
                 <h1 id="text-index2">Hotéis em Destaque</h1>
                <?php while ($hoteis = $retorno_consulta->fetch_assoc()) : ?>
                    <div id="cards" class="col-md-3 mb-2">
                        <div class="card h-100">
                            <img src="<?php echo $hoteis['arquivo_caminho']; ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $hoteis['nome']; ?></h5>
                                <p class="card-text"><?php echo $hoteis['descricao']; ?></p>
                                <h5 class="card-text"><?php echo $hoteis['valor_diaria']; ?></h5>
                                <div class="text-center mt-4">
                                    <a href="user/comprar.php?id=<?php echo $hoteis['id_hotel']; ?>" class="btn custom-btn">Comprar Agora</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
            
        </main>
    </div>
    <?php
                    include('static/footer.php');
                ?>
</body>

</html>
