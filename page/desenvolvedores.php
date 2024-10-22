<?php
if (!isset($_SESSION)) {
    session_start();
}

// Verifique se as variáveis de sessão estão definidas
$tipo_usuario = isset($_SESSION['tipo_usuario']) ? $_SESSION['tipo_usuario'] : null;
$nome_usuario = isset($_SESSION['nome']) ? $_SESSION['nome'] : 'Visitante';
$foto = isset($_SESSION['arquivo_foto']) ? $_SESSION['arquivo_foto'] : null;
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script defer src="../javascript/script_navbar.js"></script>

    <script defer src="../javascript/cookie.js"></script>
    <link rel="shortcut icon" href="../Imagens/logo (1).png" type="image/x-icon">
    <title>Desenvolvedores - IvaíTour</title>
</head>

<body>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        #imagem_do_grupo_todo{
            width: 90%;
            margin-left: 11%;
        }
        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            position: relative;
            /* Para permitir posicionamento de elementos internos */
            z-index: 1;
            /* Mantém o conteúdo acima da imagem de fundo */
        }

        header {
            text-align: center;
            padding: 20px;
            background-color: rgba(52, 73, 94, 0.8);
            /* Cor de fundo do cabeçalho com transparência */
            color: white;
            border-radius: 8px;
            /* Arredondar os cantos do cabeçalho */
        }

        header h1 {
            font-size: 2.5em;
            margin-bottom: 10px;
        }

        main {
            display: flex;
            flex-direction: column;
            gap: 20px;
            padding: 20px;
        }

        .developer {
            display: flex;
            align-items: center;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            position: relative;
            /* Adiciona um contexto para o triângulo */
        }

        .photo-container {
            position: relative;
            margin-right: 20px;
        }

        .triangle {
            width: 0;
            height: 0;
            border-left: 50px solid transparent;
            border-right: 50px solid transparent;
            border-bottom: 50px solid #34495e;
            /* Cor do triângulo */
            position: absolute;
            top: 0;
            /* Posiciona o triângulo na parte superior do container */
            left: 20px;
            /* Alinha o triângulo com a imagem */
            z-index: 0;
            /* Coloca o triângulo abaixo da imagem */
        }

        .photo {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            /* Bordas arredondadas na imagem */
            border: 4px solid #ffde59;
            /* Borda da imagem */
            position: relative;
            /* Para que a imagem se sobreponha ao triângulo */
            z-index: 1;
            /* Certifica que a imagem fique acima do triângulo */
        }

        .info {
            flex: 1;
            z-index: 1;
            /* Garante que o texto fique acima do triângulo */
        }

        .info h2 {
            color: #34495e;
            /* Cor do nome do desenvolvedor */
        }

        footer {
            text-align: center;
            padding: 10px;
            /* Cor de fundo do rodapé com transparência */
            color: white;
            position: relative;
        }
    </style>
   
        <div class="container-fluid">
            <!-- Mensagem de cookies -->
            <div id="cookie-message" class="card-cookie">
                <svg xml:space="preserve" viewBox="0 0 122.88 122.25" y="0px" x="0px" id="cookieSvg" version="1.1">
                    <g>
                        <path d="M101.77,49.38c2.09,3.1,4.37,5.11,6.86,5.78c2.45,0.66,5.32,0.06,8.7-2.01c1.36-0.84,3.14-0.41,3.97,0.95 c0.28,0.46,0.42,0.96,0.43,1.47c0.13,1.4,0.21,2.82,0.24,4.26c0.03,1.46,0.02,2.91-0.05,4.35h0v0c0,0.13-0.01,0.26-0.03,0.38 c-0.91,16.72-8.47,31.51-20,41.93c-11.55,10.44-27.06,16.49-43.82,15.69v0.01h0c-0.13,0-0.26-0.01-0.38-0.03 c-16.72-0.91-31.51-8.47-41.93-20C5.31,90.61-0.73,75.1,0.07,58.34H0.07v0c0-0.13,0.01-0.26,0.03-0.38 C1,41.22,8.81,26.35,20.57,15.87C32.34,5.37,48.09-0.73,64.85,0.07V0.07h0c1.6,0,2.89,1.29,2.89,2.89c0,0.4-0.08,0.78-0.23,1.12 c-1.17,3.81-1.25,7.34-0.27,10.14c0.89,2.54,2.7,4.51,5.41,5.52c1.44,0.54,2.2,2.1,1.74,3.55l0.01,0 c-1.83,5.89-1.87,11.08-0.52,15.26c0.82,2.53,2.14,4.69,3.88,6.4c1.74,1.72,3.9,3,6.39,3.78c4.04,1.26,8.94,1.18,14.31-0.55 C99.73,47.78,101.08,48.3,101.77,49.38L101.77,49.38z M59.28,57.86c2.77,0,5.01,2.24,5.01,5.01c0,2.77-2.24,5.01-5.01,5.01 c-2.77,0-5.01-2.24-5.01-5.01C54.27,60.1,56.51,57.86,59.28,57.86L59.28,57.86z M34.53,49.32c2.77,0,5.01,2.24,5.01,5.01c0,2.77-2.24,5.01-5.01,5.01c-2.77,0-5.01-2.24-5.01-5.01C29.52,51.56,31.76,49.32,34.53,49.32L34.53,49.32z"></path>
                    </g>
                </svg>
                <div class="cookieHeading">Este site usa cookies</div>
                <div class="cookieDescription">
                    Para uma melhor experiência, usamos cookies em nosso site. Para saber mais, leia nossa <a href="#">Política de Cookies</a>.
                </div>
                <div class="buttonContainer">
                    <button id="accept-cookies" class="acceptButton">Aceitar</button>
                    <button id="decline-cookies" class="declineButton">Rejeitar</button>
                </div>
            </div>
            <?php
            include('../static/menu.php');
            ?>
            <?php if (isset($_SESSION['nome'])): ?>
                <div class="user-profile">
                    <span class="username"><b><?php echo $_SESSION['nome']; ?></b></span>
                    <?php if ($tipo_usuario === 'administrador'): ?>
                        <span id="admin-badge">ADM</span>
                    <?php endif; ?>
                    <a href="../user/conta.php" class="user-avatar-link">
                        <img src="<?php echo $foto; ?>" alt="Avatar" class="avatar">
                    </a>
                </div>
            <?php endif; ?>

            <header>
                <h1>Créditos dos Desenvolvedores</h1>
                <p>Agradecimentos especiais a todos que contribuíram para este projeto!</p>
            </header>
            <img id="imagem_do_grupo_todo" src="../Imagens/Foto_grupo.png.png" alt="">
            <main>
                <div class="developer">
                    <div class="photo-container">
                        <img src="../Imagens/JP.jpg.jpg" alt="Desenvolvedor 1" class="photo">
                    </div>
                    <div class="info">
                        <h2>João Pedro Fernandes de Almeida</h2>
                        <p>Líder e Programador Full-Stack do Projeto, responsável pelo PHP e funcionalidades do sistema.</p>
                    </div>
                </div>
                <div class="developer">
                    <div class="photo-container">
                        <img src="../Imagens/Luiz1.jpg.jpg" alt="Desenvolvedor 2" class="photo">
                    </div>
                    <div class="info">
                        <h2>Luiz Eduardo Rosaeski Bonfim</h2>
                        <p>Programador Front-End, Resp.design slides e responsável por pesquisar conteúdo das páginas.</p>
                    </div>
                </div>
                <div class="developer">
                    <div class="photo-container">
                        <img src="../Imagens/Zere1.jpg.jpg" alt="Desenvolvedor 3" class="photo">
                    </div>
                    <div class="info">
                        <h2>Matheus Henrique Vital</h2>
                        <p>Responsável por Design do projeto,um dos maiores colaboradores por tornar o projeto responsivel.</p>
                    </div>
                </div>
                <div class="developer">
                    <div class="photo-container">
                        <img src="developer4.jpg" alt="Desenvolvedor 4" class="photo">
                    </div>
                    <div class="info">
                        <h2>João Rafael de Carvalho Bissoloti</h2>
                        <p>Breve descrição sobre o desenvolvedor 4. Destaque suas habilidades ou contribuições ao projeto.</p>
                    </div>
                </div>
                <div class="developer">
                    <div class="photo-container">
                        <img src="../Imagens/Joaquim2.jpg.jpg" alt="Desenvolvedor 5" class="photo">
                    </div>
                    <div class="info">
                        <h2>Joaquim Pedro Klima Sagioneti</h2>
                        <p>Maior pesquisador do projeto, ficou responsável por maior parte do conteúdo dos slides e das páginas.</p>
                    </div>
                </div>
            </main>
        </div>
        <?php include('../static/footer.php'); ?>
</body>

</html>