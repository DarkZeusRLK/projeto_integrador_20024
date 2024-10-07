<?php
include('conexao.php');

if (!isset($_SESSION)) {
    session_start();
}

// Inicialize a variável para armazenar o status da mensagem
$status = '';

if (isset($_POST['nome'])) {
    $email = $_POST['email'];
    $nome = $_POST['nome'];
    $mensagem = $_POST['mensagem'];

    $query = "INSERT INTO mensagem_contato (nome, email, mensagem) VALUES (?, ?, ?)";
    $stmt = $conexao->prepare($query);

    if ($stmt) {
        $stmt->bind_param("sss", $nome, $email, $mensagem);

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

// Verificar o tipo de usuário e incluir o arquivo de proteção correto
if (isset($_SESSION['tipo_usuario'])) {
    if ($_SESSION['tipo_usuario'] === 'administrador') {
        require('protect_adm.php'); // Proteção para administradores
    } elseif ($_SESSION['tipo_usuario'] === 'cliente') {
        require('protect.php'); // Proteção para clientes
    }
}

// Definir variáveis com os valores da sessão
$id_usuario = isset($_SESSION['id_usuario']) ? $_SESSION['id_usuario'] : null;
$nome_usuario = isset($_SESSION['nome']) ? $_SESSION['nome'] : 'Visitante';
$email_usuario = isset($_SESSION['email']) ? $_SESSION['email'] : '';
$cpf_usuario = isset($_SESSION['cpf']) ? $_SESSION['cpf'] : 'Não disponível';
$telefone_usuario = isset($_SESSION['telefone']) ? $_SESSION['telefone'] : 'Não disponível';
$tipo_usuario = isset($_SESSION['tipo_usuario']) ? $_SESSION['tipo_usuario'] : null;
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script defer src="script_navbar.js"></script>
    <script defer src="alternar_modos.js"></script>
    <script defer src="cookie.js"></script>
    <script src="configuracoes.js"></script>
    <link rel="shortcut icon" href="../Imagens/logo (1).png" type="image/x-icon">
    <title>Contato</title>
</head>

<body>  

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
        include('menu.php');
      ?>
   
    <div class="container">
        <!-- Formulário de contato -->
        <form id="form-container-ctt" method="POST" class="form-container">
            <div id="form-ctt">
                <span class="heading">Contato</span>
                <input name="nome" placeholder="Nome" type="text" class="input" required>
                <input name="email" placeholder="Email" id="mail" type="email" class="input" required>
                <textarea placeholder="Escreva sua mensagem..." rows="10" cols="30" id="message" name="mensagem" class="textarea" required></textarea>
                
                <!-- Botão de enviar como 'button' -->
                <div class="button-container">
                    <button type="submit" class="send-button">Enviar</button>
                    <button type="reset" id="reset-btn" class="send-button">Resetar</button>
                </div>
            </div>
        </form>
  <!-- Alerta de sucesso -->
<?php if ($status === 'success'): ?>
    <div class="overlay" id="overlay"></div>
    <div class="container text-center mt-4">
        <div class="card2 mx-auto" style="max-width: 400px;" id="alert-container">
            <svg class="wave" viewBox="0 0 1440 320" xmlns="http://www.w3.org/2000/svg">
                <path d="M0,256L11.4,240C22.9,224,46,192,69,192C91.4,192,114,224,137,234.7C160,245,183,235,206,213.3C228.6,192,251,160,274,149.3C297.1,139,320,149,343,181.3C365.7,213,389,267,411,282.7C434.3,299,457,277,480,250.7C502.9,224,526,192,549,181.3C571.4,171,594,181,617,208C640,235,663,277,686,256C708.6,235,731,149,754,122.7C777.1,96,800,128,823,165.3C845.7,203,869,245,891,224C914.3,203,937,117,960,112C982.9,107,1006,181,1029,197.3C1051.4,213,1074,171,1097,144C1120,117,1143,107,1166,133.3C1188.6,160,1211,224,1234,218.7C1257.1,213,1280,139,1303,133.3C1325.7,128,1349,192,1371,192C1394.3,192,1417,128,1429,96L1440,64L1440,320L1428.6,320C1417.1,320,1394,320,1371,320C1348.6,320,1326,320,1303,320C1280,320,1257,320,1234,320C1211.4,320,1189,320,1166,320C1142.9,320,1120,320,1097,320C1074.3,320,1051,320,1029,320C1005.7,320,983,320,960,320C937.1,320,914,320,891,320C868.6,320,846,320,823,320C800,320,777,320,754,320C731.4,320,709,320,686,320C662.9,320,640,320,617,320C594.3,320,571,320,549,320C525.7,320,503,320,480,320C457.1,320,434,320,411,320C388.6,320,366,320,343,320C320,320,297,320,274,320C251.4,320,229,320,206,320C182.9,320,160,320,137,320C114.3,320,91,320,69,320C45.7,320,23,320,11,320L0,320Z" fill-opacity="1"></path>
            </svg>
            <div class="icon-container">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" stroke-width="0" fill="currentColor" stroke="currentColor" class="icon">
                    <path d="M256 48a208 208 0 1 1 0 416 208 208 0 1 1 0-416zm0 464A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-111 111-47-47c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l64 64c9.4 9.4 24.6 9.4 33.9 0L369 209z"></path>
                </svg>
            </div>
            <div class="message-text-container">
                <p class="message-text">Sucesso! Mensagem enviada!</p>
                <p class="sub-text">Iremos ler sua mensagem logo!</p>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15 15" stroke-width="0" fill="none" stroke="currentColor" class="cross-icon">
                <path fill="currentColor" d="M11.7816 4.03157C12.0062 3.80702 12.0062 3.44295 11.7816 3.2184C11.5571 2.99385 11.193 2.99385 10.9685 3.2184L7.50005 6.68682L4.03164 3.2184C3.80708 2.99385 3.44301 2.99385 3.21846 3.2184C2.99391 3.44295 2.99391 3.80702 3.21846 4.03157L6.68688 7.49999L3.21846 10.9684C2.99391 11.193 2.99391 11.557 3.21846 11.7816C3.44301 12.0061 3.80708 12.0061 4.03164 11.7816L7.50005 8.31316L10.9685 11.7816C11.193 12.0061 11.5571 12.0061 11.7816 11.7816C12.0062 11.557 12.0062 11.193 11.7816 10.9684L8.31322 7.49999L11.7816 4.03157Z" clip-rule="evenodd" fill-rule="evenodd"></path>
            </svg>
        </div>
    </div>
<?php endif; ?>

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
        
        <!-- Plugin VLibras -->
        <div vw class="enabled">
            <div vw-access-button class="active"></div>
            <div vw-plugin-wrapper>
                <div class="vw-plugin-top-wrapper"></div>
            </div>
        </div>
        <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
        <script>
            new window.VLibras.Widget('https://vlibras.gov.br/app');
        </script>
    </div>
    
    <?php include('footer.php'); ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    </html>
