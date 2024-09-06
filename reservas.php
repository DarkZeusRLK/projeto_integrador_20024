<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/reservas.css">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script defer src="javascript/script_navbar.js"></script>
    <title>Reserva de Passagens</title>
</head>
<body>

<div class="container-fluid">
        <nav class="col-md-3 col-lg-2 sidebar">
            <div class="menu-btn" onclick="toggleSidebar()">&#9776;</div>
            <div class="profile">
                <img id="logo" src="Imagens/logo (1).png" alt="Logo">
                <h1 class="text-title">IvaíTour</h1>
            </div>
            <ul class="nav-links">
                <li><a href="index.php"><i class="fas fa-home"></i><span>Home</span></a></li>
                <li><a href="#services"><i class="fas fa-concierge-bell"></i><span>Serviços</span></a></li>
                <li><a href="user/login.php"><i class="fas fa-users"></i><span>Minha Conta</span></a></li>
                <li><a href="#contact"><i class="fas fa-envelope"></i><span>Contato</span></a></li>
                <?php
                if (isset($_SESSION['id_login'])) {
                ?>
                    <li class="nav-item logout">
                        <a href="#logout" class="nav-link"><i class="fas fa-sign-out-alt"></i><span>Desconectar</span></a>
                    </li>
                <?php
                }
                ?>
            </ul>
        </nav>

        
        
    
        <header>
        <div class="filters">
            <label for="city-filter">Filtrar por cidade:</label>
            <select id="city-filter">
                <option value="todas">Todas</option>
                <option value="cidade1">Cidade 1</option>
                <option value="cidade2">Cidade 2</option>
            </select>

            <label for="price-filter">Filtrar por preço:</label>
            <select id="price-filter">
                <option value="todas">Todas</option>
                <option value="baixo">Preço baixo</option>
                <option value="alto">Preço alto</option>
            </select>

            <label for="alpha-filter">Ordem alfabética:</label>
            <select id="alpha-filter">
                <option value="ascendente">A-Z</option>
                <option value="descendente">Z-A</option>
            </select>
        </div>
    </header>

    <div class="espaco-reservas"></div>

    <main>
        <section class="card-container">
        <div class="card">
    <div class="image-container">
        <img src="Imagens/senhor.jpg" alt="Imagem 2">
        <i class="fas fa-check-circle select-icon"></i>
    </div>
    <div class="card-info">
        <h3>Nome do Hotel</h3>
        <p>Cidade do Hotel</p>
        <p>Valor do Hotel</p>
        
        <!-- Botão personalizado -->
        <button class="location-btn">
            <i class="fas fa-map-marker-alt"></i> DESCUBRA JÁ
        </button>
    </div>
</div>

            <div class="card">
    <div class="image-container">
        <img src="Imagens/senhor.jpg" alt="Imagem 2">
        <i class="fas fa-check-circle select-icon"></i>
    </div>
    <div class="card-info">
        <h3>Nome do Hotel</h3>
        <p>Cidade do Hotel</p>
        <p>Valor do Hotel</p>
        
        <!-- Botão personalizado -->
        <button class="location-btn">
            <i class="fas fa-map-marker-alt"></i> DESCUBRA JÁ
        </button>
    </div>
</div>

<div class="card">
    <div class="image-container">
        <img src="Imagens/senhor.jpg" alt="Imagem 2">
        <i class="fas fa-check-circle select-icon"></i>
    </div>
    <div class="card-info">
        <h3>Nome do Hotel</h3>
        <p>Cidade do Hotel</p>
        <p>Valor do Hotel</p>
        
        <!-- Botão personalizado -->
        <button class="location-btn">
            <i class="fas fa-map-marker-alt"></i> DESCUBRA JÁ
        </button>
    </div>
</div>



<div class="card">
    <div class="image-container">
        <img src="Imagens/senhor.jpg" alt="Imagem 2">
        <i class="fas fa-check-circle select-icon"></i>
    </div>
    <div class="card-info">
        <h3>Nome do Hotel</h3>
        <p>Cidade do Hotel</p>
        <p>Valor do Hotel</p>
        
        <!-- Botão personalizado -->
        <button class="location-btn">
            <i class="fas fa-map-marker-alt"></i> DESCUBRA JÁ
        </button>
    </div>
</div>

<div class="card">
    <div class="image-container">
        <img src="Imagens/senhor.jpg" alt="Imagem 2">
        <i class="fas fa-check-circle select-icon"></i>
    </div>
    <div class="card-info">
        <h3>Nome do Hotel</h3>
        <p>Cidade do Hotel</p>
        <p>Valor do Hotel</p>
        
        <!-- Botão personalizado -->
        <button class="location-btn">
            <i class="fas fa-map-marker-alt"></i> DESCUBRA JÁ
        </button>
    </div>
</div>

<div class="card">
    <div class="image-container">
        <img src="Imagens/senhor.jpg" alt="Imagem 2">
        <i class="fas fa-check-circle select-icon"></i>
    </div>
    <div class="card-info">
        <h3>Nome do Hotel</h3>
        <p>Cidade do Hotel</p>
        <p>Valor do Hotel</p>
        
        <!-- Botão personalizado -->
        <button class="location-btn">
            <i class="fas fa-map-marker-alt"></i> DESCUBRA JÁ
        </button>
    </div>
</div>
        </section>
    </main>



    




        <?php
            include("static/footer.php");
        ?>
    

</body>
</html>
