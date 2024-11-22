
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
$consultar_banco = "SELECT * FROM hoteis_aracaju";
$retorno_consulta = $conexao->query($consultar_banco) or die($conexao->error);

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
    <?php
        include('../static/menu.php');
    ?>
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
                </a>
            </div>
        <?php
        }
        ?>
        <div id="viagens" class="row mt-4">
            <h1 id="text-index3">Hotéis em Destaque</h1>
            <?php while ($hoteis = $retorno_consulta->fetch_assoc()): ?>
                <div id="hoteis" class="col">
                    <div class="card h-100">
                        <img src="../<?php echo $hoteis['arquivo_caminho']; ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">
                                <?php echo $hoteis['nome']; ?>
                            </h5>
                            <p class="card-text limited-text" id="text">
                                <?php echo $hoteis['descricao']; ?> </p>
                            <div class="collapse" id="collapseText">
                                <p class="card-text mt-3">
                                    <?php echo $hoteis['descricao']; ?> </p>
                            </div>
                            <h5 class="card-text">
                                <?php echo $hoteis['valor_diaria']; ?>
                            </h5>
                            <a class="custom-btn" data-bs-toggle="collapse" href="#collapseText" role="button" aria-expanded="false" aria-controls="collapseText">
                                Ler mais
                            </a>
                            <div class="text-center mt-4">
                                <a href="../user/hotel.php?id=<?php echo $hoteis['id_hotel']; ?>"
                                    class="custom-btn">Reservar Agora</a>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endwhile; ?>
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
        function toggleDropdown(event) {
            event.preventDefault(); // Impedir o comportamento padrão do link
            const dropdown = event.currentTarget.nextElementSibling; // Obter o próximo elemento (dropdown)
            dropdown.style.display = dropdown.style.display === "block" ? "none" : "block"; // Alternar a exibição
        }
    </script>
</body>

</html