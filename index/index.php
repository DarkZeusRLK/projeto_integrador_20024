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

// Conecte-se ao banco de dados de hotéis para exibir as informações
$consultar_banco = "SELECT * FROM cadastro_hoteis";
$retorno_consulta = $conexao->query($consultar_banco) or die($conexao->error);

$consultar_banco2 = "SELECT * FROM pacotes_viagens";
$retorno_consulta2 = $conexao->query($consultar_banco2) or die($conexao->error);

$status = '';

if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $nome = $_POST['nome'];
    $mensagem = $_POST['mensagem'];


    $query = "INSERT INTO mensagem_contato (nome, email, mensagem) VALUES (?, ?, ?)";
    $stmt = $conexao->prepare($query);

    if ($stmt) {
        $stmt->bind_param("sss",  $nome, $email, $mensagem);

        if ($stmt->execute()) {
            // A inserção no banco de dados foi bem-sucedida
            $status = 'success';
        } else {
            // Ocorreu um erro ao inserir no banco de dados
            $status = 'error';
        }

        $stmt->close(); // Feche a instrução preparada
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">


    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script defer src="../javascript/script_navbar.js"></script>
    <script defer src="../javascript/alternar_modos.js"></script>
    <script defer src="../javascript/cookie.js"></script>
    <script src="../javascript/configuracoes.js"></script>
    <link rel="shortcut icon" href="../Imagens/logo (1).png">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />

    <script defer src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>



    <title>Início - IvaíTour</title>
    <style>
        body {
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

        .passagem {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            font-size: 1.2rem;
            border-radius: 0.5rem;
            text-decoration: none;
        }
    </style>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            // Verificar se uma imagem de fundo foi salva no localStorage
            const backgroundImage = localStorage.getItem("backgroundImage");
            if (backgroundImage) {
                document.body.style.backgroundImage = `url(${backgroundImage})`;
            }
        });
        document.addEventListener("DOMContentLoaded", () => {
            // Verificar se um tamanho de fonte foi salvo no localStorage
            const savedFontSize = localStorage.getItem("fontSize");
            if (savedFontSize) {
                // Aplicar o tamanho da fonte salvo
                document.documentElement.style.fontSize = savedFontSize;
            }
        });
    </script>
</head>

<body>


    <div id="carouselExampleDark" class="carousel carousel-dark slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="300">
                <img class="img-fluid" src="../Imagens/Banner avião.png" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="300">
                <img class="img-fluid" src="../Imagens/Banner Turismo.png" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="300">
                <img class="img-fluid"
                    src="../Imagens/Banner para Site Mês dos Pais com Descontos Fotográfico Azul Escuro (1).png"
                    class="d-block w-100" alt="...">
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
        <!-- Mensagem de cookies -->
        <div id="cookie-message" class="card-cookie">
            <svg xml:space="preserve" viewBox="0 0 122.88 122.25" y="0px" x="0px" id="cookieSvg" version="1.1">
                <g>
                    <path
                        d="M101.77,49.38c2.09,3.1,4.37,5.11,6.86,5.78c2.45,0.66,5.32,0.06,8.7-2.01c1.36-0.84,3.14-0.41,3.97,0.95 c0.28,0.46,0.42,0.96,0.43,1.47c0.13,1.4,0.21,2.82,0.24,4.26c0.03,1.46,0.02,2.91-0.05,4.35h0v0c0,0.13-0.01,0.26-0.03,0.38 c-0.91,16.72-8.47,31.51-20,41.93c-11.55,10.44-27.06,16.49-43.82,15.69v0.01h0c-0.13,0-0.26-0.01-0.38-0.03 c-16.72-0.91-31.51-8.47-41.93-20C5.31,90.61-0.73,75.1,0.07,58.34H0.07v0c0-0.13,0.01-0.26,0.03-0.38 C1,41.22,8.81,26.35,20.57,15.87C32.34,5.37,48.09-0.73,64.85,0.07V0.07h0c1.6,0,2.89,1.29,2.89,2.89c0,0.4-0.08,0.78-0.23,1.12 c-1.17,3.81-1.25,7.34-0.27,10.14c0.89,2.54,2.7,4.51,5.41,5.52c1.44,0.54,2.2,2.1,1.74,3.55l0.01,0 c-1.83,5.89-1.87,11.08-0.52,15.26c0.82,2.53,2.14,4.69,3.88,6.4c1.74,1.72,3.9,3,6.39,3.78c4.04,1.26,8.94,1.18,14.31-0.55 C99.73,47.78,101.08,48.3,101.77,49.38L101.77,49.38z M59.28,57.86c2.77,0,5.01,2.24,5.01,5.01c0,2.77-2.24,5.01-5.01,5.01 c-2.77,0-5.01-2.24-5.01-5.01C54.27,60.1,56.51,57.86,59.28,57.86L59.28,57.86z M34.53,49.32c2.77,0,5.01,2.24,5.01,5.01c0,2.77-2.24,5.01-5.01,5.01c-2.77,0-5.01-2.24-5.01-5.01C29.52,51.56,31.76,49.32,34.53,49.32L34.53,49.32z">
                    </path>
                </g>
            </svg>
            <div class="cookieHeading">Este site usa cookies</div>
            <div class="cookieDescription">
                Para uma melhor experiência, usamos cookies em nosso site. Para saber mais, leia nossa <a
                    href="#">Política de Cookies</a>.
            </div>
            <div class="buttonContainer">
                <button id="accept-cookies" class="acceptButton">Aceitar</button>
                <button id="decline-cookies" class="declineButton">Rejeitar</button>
            </div>
        </div>
        <nav class="col-md-3 col-lg-2 sidebar">
            <div class="menu-btn" onclick="toggleSidebar()">&#9776;</div>
            <div class="profile">
                <img id="logo" src="../Imagens/logo (1).png" alt="Logo">
                <h1 class="text-title">IvaíTour</h1>
            </div>
            <ul class="nav-links">
                <li><a href="index.php"><i class="fas fa-home"></i><span>Home</span></a></li>
                <li><a href="#"><i class="fas fa-concierge-bell"></i><span>Serviços</span></a></li>
                <?php if (isset($_SESSION['nome'])): ?>
                    <li><a href="../user/conta.php?id=<?php echo $_SESSION['id_usuario']; ?>"><i
                                class="fas fa-users"></i><span>Minha Conta</span></a></li>
                <?php endif; ?>
                <?php if (!isset($_SESSION['nome'])): ?>
                    <li><a href="../user/login.php"><i class="fas fa-users"></i><span>Minha Conta</span></a></li>
                <?php endif; ?>
                <li><a href="../page/contato.php"><i class="fas fa-envelope"></i><span>Contato</span></a></li>
                <?php if (isset($_SESSION['nome']) && $_SESSION["tipo_usuario"] === 'administrador'): ?>
                    <li><a href="../admin/admin_dashboard.php"><i class="fas fa-tablet-alt"></i><span>Painel Adm</span></a>
                    </li>
                <?php endif; ?>
                <?php if (isset($_SESSION['nome'])): ?>
                    <li class="nav-item logout">
                        <a href="../static/logout.php" class="nav-link"><i
                                class="fas fa-sign-out-alt"></i><span>Desconectar</span></a>
                    </li>
                <?php endif; ?>
                <li class="nav-item">
                    <a href="../page/desenvolvedores.php" class="nav-link" id="settings-icon">
                        <i class="fas fa-code"></i> <!-- Ícone de desenvolvedor -->
                        <span>Desenvolvedores</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="../user/configuracoes.php" class="nav-link" id="settings-icon">
                        <i class="fas fa-cog"></i><span>Configurações</span>
                    </a>
                </li>
            </ul>
        </nav>
        <?php
        if (isset($_SESSION['nome'])) {

        ?>
            <div class="user-profile">
                <span class="username"><b>
                        <?php echo $nome_usuario; ?>
                    </b></span>
                <?php if ($tipo_usuario === 'administrador'): ?>
                    <span id="admin-badge">ADM</span>
                <?php endif; ?>
                <a href="../user/conta.php" class="user-avatar-link">
                    <img src="<?php echo $foto; ?>?<?php echo time(); ?>" alt="Avatar" class="avatar">

            </div>
        <?php
        }
        ?>
        <div class="row mt-4">

            <h1 id="text-index3">Pacotes em Destaque</h1>
            <div class="final_index">
                <h1 id="text-index2">Adquira <span id="animated-text2"></span></h1>
                <!-- Seção de Cruzeiros -->
                <div class="final_index">
                    <!-- Seção de Cruzeiros -->
                    <br>
                    <h1 id="text_cruise">Experimente as melhores viagens do <span class="brasil">Brasil!</span></h1>
                    <div id="cruises">
                        <?php
                        // Inicialize a variável de contagem
                        $contador = 0;

                        // Loop pelos pacotes
                        while ($pacotes = $retorno_consulta2->fetch_assoc()):
                            // Aumente a contagem
                            $contador++;
                            // Defina a imagem de fundo com base na cidade
                            $imagem_fundo = strtolower($pacotes['foto_pacote']) . ".jpg"; // ajuste o caminho e a extensão da imagem conforme necessário
                        ?>
                            <!-- Cruise Card 1 -->
                            <div class="cruise-card" style="background-image: url('<?php echo $pacotes['foto_pacote'];?>');">
                                <div class="cruise-overlay">
                                    <h2 class="cruise-title"><?php echo $pacotes['nome'];?></h2>
                                    <p class="cruise-description"><?php echo $pacotes['descricao'];?></p>
                                    <a href="cruise1-link.html" class="cruise-button">Ver Mais</a>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                    <br>
                </div>
            </div>




            <h1 id="text-index3">Hotéis em Destaque</h1>
            <?php while ($hoteis = $retorno_consulta->fetch_assoc()): ?>
                <div class="col">
                    <div class="card h-100">
                        <img src="../<?php echo $hoteis['arquivo_caminho']; ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">
                                <?php echo $hoteis['nome']; ?>
                            </h5>
                            <p class="card-text">
                                <?php echo $hoteis['descricao']; ?>
                            </p>
                            <h5 class="card-text">R$
                                <?php echo $hoteis['valor_diaria']; ?>
                            </h5>
                            <div class="text-center mt-4">
                                <a href="../user/comprar.php?id=<?php echo $hoteis['id_hotel']; ?>"
                                    class="custom-btn">Reservar Agora</a>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endwhile; ?>
            <br>
            <br>
            <img class="img-fluid" src="../Imagens/Design sem nome (1).png" alt="">
        </div>
        <div class="final_index">
            <h1 id="text-index2">Viva <span id="animated-text"></span></h1>
            <!-- Seção de Cruzeiros -->
            <div class="final_index">
                <!-- Seção de Cruzeiros -->
                <br>
                <h1 id="text_cruise">Faça excursões de cruzeiro por todo o <span class="brasil">Brasil!</span></h1>
                <div id="cruises">

                    <!-- Cruise Card 1 -->
                    <div class="cruise-card" style="background-image: url('../recebidos/11.10.22cruzeiros.png');">
                        <div class="cruise-overlay">
                            <h2 class="cruise-title">Cruzeiro dos Sonhos</h2>
                            <p class="cruise-description">Descubra o melhor do Caribe em uma experiência inesquecível.</p>
                            <a href="cruise1-link.html" class="cruise-button">Ver Mais</a>
                        </div>
                    </div>

                    <!-- Cruise Card 2 -->
                    <div class="cruise-card" style="background-image: url('../recebidos/cruzeiro_2.jpg');">
                        <div class="cruise-overlay">
                            <h2 class="cruise-title">Exploração Mediterrânea</h2>
                            <p class="cruise-description">Navegue pelas águas cristalinas do Mediterrâneo.</p>
                            <a href="cruise2-link.html" class="cruise-button">Ver Mais</a>
                        </div>
                    </div>

                    <!-- Cruise Card 3 -->
                    <div class="cruise-card" style="background-image: url('../recebidos/cruzeiro_3.jpg');">
                        <div class="cruise-overlay">
                            <h2 class="cruise-title">Aventura no Alasca</h2>
                            <p class="cruise-description">Desfrute de paisagens deslumbrantes e aventuras geladas.</p>
                            <a href="cruise3-link.html" class="cruise-button">Ver Mais</a>
                        </div>
                    </div>

                </div>
                <br>
            </div>
        </div>

        <!-- Seção de Blogs -->
        <div id="blogs">
            <!-- Blog Card 1 -->
            <div class="blog-card">
                <img src="../Imagens/banner_programacao_desenvolvimento.png" alt="Blog 1" class="blog-image">
                <div class="blog-content">
                    <h2 class="blog-title">Tecnologia nos Dias Atuais</h2>
                    <p class="blog-description">Uma análise das inovações e tendências tecnológicas que moldam nossa vida cotidiana.</p>
                    <a href="https://g1.globo.com/tecnologia/" class="blog-button">Leia mais</a>
                </div>
            </div>

            <!-- Blog Card 2 -->
            <div class="blog-card">
                <img src="../Imagens/unnamed.jpg" alt="Blog 2" class="blog-image">
                <div class="blog-content">
                    <h2 class="blog-title">Programação Web</h2>
                    <p class="blog-description"> Dicas e tutoriais sobre desenvolvimento web, desde HTML até frameworks modernos.</p>
                    <a href="https://www.tecmundo.com.br/desenvolvimento/noticias" class="blog-button">Leia mais</a>
                </div>
            </div>

            <!-- Blog Card 3 -->
            <div class="blog-card">
                <img src="../Imagens/iet-cientistas-criam-ferramenta-que-vincula-manuscritos-aos-codigos-de-programacao.png" alt="Blog 3" class="blog-image">
                <div class="blog-content">
                    <h2 class="blog-title">Carreira de Programador</h2>
                    <p class="blog-description"> Orientações sobre como construir uma carreira sólida na área de programação e tecnologia.</p>
                    <a href="https://g1.globo.com/tecnologia/noticia/2023/05/09/entenda-se-programacao-ainda-vale-a-pena-profissionais-contam-como-esta-o-setor.ghtml" class="blog-button">Leia mais</a>
                </div>
            </div>
            <div class="blog-card">
                <img src="../Imagens/mulheres-na-tecnologia-blog-v02.webp" alt="Blog 4" class="blog-image">
                <div class="blog-content">
                    <h2 class="blog-title">Mulheres na Tecnologia</h2>
                    <p class="blog-description"> Histórias inspiradoras de mulheres que estão fazendo a diferença no setor de tecnologia.</p>
                    <a href="https://www.cnnbrasil.com.br/tecnologia/mulheres-na-tecnologia/" class="blog-button">Leia mais</a>
                </div>
            </div>
            <div class="blog-card">
                <img src="../Imagens/img-HrbeWi4G1eNRZU0EDOdwPQ4m-min.jpg" alt="Blog 3" class="blog-image">
                <div class="blog-content">
                    <h2 class="blog-title">Uso de I.A na Programação</h2>
                    <p class="blog-description">Explorando como a inteligência artificial está transformando práticas e processos de programação</p>
                    <a href="https://www.cnnbrasil.com.br/economia/negocios/uso-de-inteligencia-artificial-aumenta-e-alcanca-72-das-empresas-diz-pesquisa/#:~:text=O%20interesse%20no%20uso%20da,comparado%20aos%2055%25%20em%202023." class="blog-button">Leia mais</a>
                </div>
            </div>
            <div class="blog-card">
                <img src="../Imagens/1610286864152.jfif" alt="Blog 3" class="blog-image">
                <div class="blog-content">
                    <h2 class="blog-title">Evolução das Inteligências Artificiais</h2>
                    <p class="blog-description">Um olhar sobre a história e o progresso das IAs, desde suas origens até os avanços atuais.</p>
                    <a href="https://jornal.usp.br/ciencias/evolucao-da-inteligencia-artificial-tem-limitado-a-compreensao-sobre-a-humana-alerta-pesquisa/" class="blog-button">Leia mais</a>
                </div>
            </div>
            <br>
        </div>
    </div>


    <?php
    include('../static/footer.php');
    ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Verifique o status da mensagem e exiba o alerta se for sucesso
            const status = "<?php echo $status; ?>"; // Obtenha o status do PHP

            if (status === 'success') {
                const alertContainer = document.getElementById('alert-container');
                const overlay = document.getElementById('overlay');

                // Exibir o alerta
                alertContainer.style.display = 'block';
                overlay.style.display = 'block';

                // Redirecionar após 5 segundos
                setTimeout(function() {
                    window.location.href = 'contato.php';
                }, 5000);
            }
        });
    </script>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <script>
        var typed = new Typed('#animated-text', {
            strings: ['as Melhores experiências', 'as Aventuras inesquecíveis', 'os Momentos incríveis'], // Palavras que vão aparecer
            typeSpeed: 50, // Velocidade para digitar as palavras
            backSpeed: 30, // Velocidade para apagar as palavras
            loop: true, // Faz o efeito repetir
            showCursor: true, // Mostra o cursor piscando
            cursorChar: '|', // Personaliza o caractere do cursor
            startDelay: 500, // Delay antes de começar a digitar
            backDelay: 1500, // Tempo que o texto permanece antes de apagar
        });
    </script>

<script>
        var typed2 = new Typed('#animated-text2', {
            strings: ['os Melhores Pacotes', 'os Momentos Perfeitos', 'os Dias Incríveis'], // Palavras que vão aparecer
            typeSpeed: 50, // Velocidade para digitar as palavras
            backSpeed: 30, // Velocidade para apagar as palavras
            loop: true, // Faz o efeito repetir
            showCursor: true, // Mostra o cursor piscando
            cursorChar: '|', // Personaliza o caractere do cursor
            startDelay: 500, // Delay antes de começar a digitar
            backDelay: 1500, // Tempo que o texto permanece antes de apagar
        });
    </script>


</body>

</html>