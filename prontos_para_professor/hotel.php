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
     /* Container principal */
#container {
    display: block; /* Garante que o contêiner principal empilhe elementos */
    margin: 0 auto; /* Centraliza o contêiner */
    padding: 20px; /* Adiciona algum espaçamento interno */
}
    /* Card de Informações do Hotel/Pacote */
    #card-info {
        width: 100%;
        max-width: 700px; /* Mantém a largura máxima */
        margin: 20px auto; /* Centraliza o card com margem superior e inferior */
        padding: 20px; /* Adiciona espaçamento interno */
        text-align: center; /* Centraliza o texto */
        background-color: #f9f9f9; /* Adiciona um fundo claro */
        border-radius: 8px; /* Arredonda os cantos do card */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Sombra para profundidade */
    }


/* Estilos da Galeria */
#gallery {
    width: 100%;
    max-width: 700px;
    text-align: center;
    margin: 20px auto 40px; /* Margem superior e inferior para separação */
}

.gallery-images {
    display: block; /* Garante que as imagens fiquem empilhadas */
}

.gallery-images img {
    width: 100%; /* Cada imagem ocupa toda a largura do contêiner */
    height: auto;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    margin-bottom: 10px; /* Margem inferior entre as imagens */
}

.gallery-images img:hover {
    transform: scale(1.05);
}

/* Detalhes Adicionais */
#details, #reviews, #faq {
    width: 100%;
    max-width: 700px;
    margin: 20px auto; /* Centraliza as seções com margem superior e inferior */
    padding: 20px; /* Adiciona algum espaçamento interno */
}

#details h2 {
    font-size: 1.8em;
    margin-bottom: 10px;
}

#details ul {
    list-style: none;
    padding: 0;
}

#details li {
    margin: 5px 0;
    font-size: 1.1em;
}

/* Avaliações dos Usuários */
#reviews {
    width: 100%;
    max-width: 700px;
    margin-top: 20px;
    margin-bottom: 40px; /* Margem inferior para separação */
}

#reviews h2 {
    font-size: 1.8em;
    margin-bottom: 10px;
}

.review {
    padding: 10px;
    margin-bottom: 10px;
    border-radius: 8px;
    background-color: #f9f9f9;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.review p {
    margin: 0;
}

.review span {
    font-size: 1.2em;
    color: #f5b301; /* Cor das estrelas */
}

/* Perguntas Frequentes */
#faq {
    width: 100%;
    max-width: 700px;
    margin-top: 20px;
}

#faq h2 {
    font-size: 1.8em;
    margin-bottom: 10px;
}

/* Perguntas Frequentes */
.faq-item {
    margin-bottom: 20px; /* Margem inferior para separação */
}
.faq-item h3 {
    font-size: 1.2em;
    color: #333;
    margin-bottom: 5px;
    cursor: pointer;
}

.faq-item p {
    font-size: 1em;
    color: #666;
    display: none; /* Oculta as respostas por padrão */
}

/* Expande o conteúdo ao clicar */
.faq-item h3:hover + p {
    display: block;
}
.carousel {
    position: relative;
    max-width: 700px; /* Largura máxima do carrossel */
    margin: 0 auto; /* Centraliza o carrossel */
    overflow: hidden; /* Oculta imagens que saem do contêiner */
}

.carousel-images {
    display: flex; /* Exibe as imagens em linha */
    transition: transform 0.5s ease; /* Transição suave */
}

.carousel-images img {
    width: 100%; /* Cada imagem ocupa toda a largura do carrossel */
    display: none; /* Oculta todas as imagens inicialmente */
    border: 2px solid rgba(0, 0, 0, 0.1); /* Adiciona uma borda leve */
    border-radius: 10px; /* Arredonda as bordas */
}


.carousel-images img.active {
    display: block; /* Exibe apenas a imagem ativa */
}

.carousel-button {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background-color: rgba(255, 255, 255, 0.7); /* Fundo semi-transparente */
    border: none;
    cursor: pointer;
    font-size: 24px;
    padding: 10px;
    z-index: 1000; /* Coloca o botão acima do carrossel */
}

.prev {
    left: 10px; /* Posição do botão anterior */
}

.next {
    right: 10px; /* Posição do botão seguinte */
}

    </style>
</head>
<body>
    <?php include('../static/menu.php'); ?>
    
    <div id="container">
        <!-- Card de Informações do Hotel/Pacote -->
        <div id="card-info">
            <h1><?php echo htmlspecialchars($pacote['nome'] ?? 'Nome não disponível'); ?></h1>
            <p><?php echo htmlspecialchars($pacote['descricao'] ?? 'Descrição não disponível'); ?></p>
            <p>Valor: R$<?php echo htmlspecialchars(number_format($valor_diaria, 2, ',', '.')); ?></p>
        </div>

        <!-- Mapa do Google Maps -->
        <div id="map-container">
            <?php if (!empty($pacote['localizacao'])): ?>
                <iframe 
                    src="<?php echo htmlspecialchars($pacote['localizacao']); ?>" 
                    width="100%" 
                    height="300" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy"></iframe>
            <?php else: ?>
                <p>Localização não disponível.</p>
            <?php endif; ?>
        </div>
<!-- Galeria de Imagens -->
<div id="gallery">
    <h2>Galeria de Fotos</h2>
    <div class="carousel">
        <div class="carousel-images">
            <img src="../<?php echo $pacote['arquivo_caminho']; ?>" alt="Imagem do hotel" class="active">
            <img src="../Imagens/foto2.jpg" alt="Foto 2 do hotel">
            <img src="../Imagens/foto3.jpg" alt="Foto 3 do hotel">
            <img src="../Imagens/foto4.jpg" alt="Foto 4 do hotel">
            <img src="../Imagens/foto5.jpg" alt="Foto 5 do hotel">
        </div>
        <button class="carousel-button prev" onclick="moveSlide(-1)">&#10094;</button>
        <button class="carousel-button next" onclick="moveSlide(1)">&#10095;</button>
    </div>
</div>
<script>
let currentSlide = 0;

function showSlide(index) {
    const slides = document.querySelectorAll('.carousel-images img');
    if (index >= slides.length) {
        currentSlide = 0; // Volta ao início se ultrapassar
    } else if (index < 0) {
        currentSlide = slides.length - 1; // Volta para o final se for negativo
    } else {
        currentSlide = index;
    }

    slides.forEach((slide, i) => {
        slide.classList.remove('active'); // Remove a classe 'active' de todas as imagens
    });
    slides[currentSlide].classList.add('active'); // Adiciona a classe 'active' à imagem atual
}

function moveSlide(direction) {
    showSlide(currentSlide + direction); // Atualiza o slide atual com base na direção
}

// Exibir o primeiro slide
showSlide(currentSlide);

// Função para avançar automaticamente os slides a cada 5 segundos
setInterval(() => {
    moveSlide(1); // Avança para o próximo slide
}, 5000); // 5000 ms = 5 segundos
</script>


        <!-- Detalhes Adicionais -->
        <section id="details">
            <h2>Detalhes Adicionais</h2>
            <ul>
                <li><strong>Endereço:</strong> <?php echo htmlspecialchars($pacote['endereco'] ?? 'Endereço não disponível'); ?></li>
                <li><strong>Acomodações:</strong> Wi-Fi gratuito, TV a cabo, Ar-condicionado, Café da manhã incluso</li>
                <li><strong>Comodidades:</strong> Academia, Piscina, Restaurante</li>
                <li><strong>Check-in:</strong> 14:00 do dia 01/12/2024</li>
                <li><strong>Check-out:</strong> 12:00 do dia 02/12/2024</li>
            </ul>
        </section>

        <!-- Avaliações dos Usuários -->
        <section id="reviews">
            <h2>Avaliações dos Usuários</h2>
            <div class="review">
                <p>Ótima experiência, recomendo!</p>
                <span>★★★★☆</span>
            </div>
            <div class="review">
                <p>O hotel é muito confortável e bem localizado.</p>
                <span>★★★★★</span>
            </div>
            <div class="review">
                <p>Atendimento excepcional, voltarei com certeza.</p>
                <span>★★★★★</span>
            </div>
        </section>

        <!-- Perguntas Frequentes -->
        <section id="faq">
            <h2>Perguntas Frequentes</h2>
            <div class="faq-item">
                <h3>Qual é a política de cancelamento?</h3>
                <p>Cancele até 24 horas antes do check-in para reembolso total.</p>
            </div>
            <div class="faq-item">
                <h3>O café da manhã está incluído?</h3>
                <p>Sim, o café da manhã está incluído na diária.</p>
            </div>
            <div class="faq-item">
                <h3>Há estacionamento disponível?</h3>
                <p>Sim, temos estacionamento gratuito disponível para os hóspedes.</p>
            </div>
        </section>

    </div>
    <?php
        include('../static/footer.php');
    ?>
</body>
</html>
