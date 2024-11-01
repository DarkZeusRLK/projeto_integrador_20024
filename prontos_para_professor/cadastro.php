<?php
include('../static/conexao.php'); // Certifique-se de que o caminho está correto

// Inicialize a variável para armazenar o status da mensagem
$status = '';

// Função para sanitizar dados
function sanitize_input($data)
{
    return htmlspecialchars(stripslashes(trim($data)));
}

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = sanitize_input($_POST['bt_email']);
    $senha = sanitize_input($_POST['bt_senha']);
    $nome = sanitize_input($_POST['bt_nome']);
    $telefone = sanitize_input($_POST['bt_telefone']);
    $cpf = sanitize_input($_POST['bt_cpf']);
    $genero = sanitize_input($_POST['bt_genero']);

    $caminho_imagem = "../Imagens/avatar2.png";
    $tipo_usuario = "cliente"; // Definindo o tipo de usuário como "cliente"

    // Verifique se a variável $conexao está definida
    if (isset($conexao)) {
        // Verifique se o email já está cadastrado
        $verificar_email = "SELECT * FROM cadastro WHERE email = ?";
        $stmt_verificar = $conexao->prepare($verificar_email);

        // Verifica se a preparação foi bem-sucedida
        if ($stmt_verificar === false) {
            die('Erro ao preparar consulta: ' . $conexao->error); // Exibe o erro do MySQL
        }

        $stmt_verificar->bind_param("s", $email);
        $stmt_verificar->execute();
        $result = $stmt_verificar->get_result();

        if ($result->num_rows > 0) {
            // Email já cadastrado, retorne uma mensagem de erro específica
            $status = "Email já cadastrado!";
        } else {
            // Criptografa a senha
            $senha_hashed = password_hash($senha, PASSWORD_DEFAULT);

            // Insira os dados no banco de dados
            $query = "INSERT INTO cadastro (nome, email, senha, telefone, cpf, genero, tipo_usuario,  arquivo_foto) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conexao->prepare($query);

            // Verifica se a preparação foi bem-sucedida
            if ($stmt === false) {
                die('Erro ao preparar consulta: ' . $conexao->error); // Exibe o erro do MySQL
            }

            $stmt->bind_param("ssssssss", $nome, $email, $senha_hashed, $telefone, $cpf, $genero, $tipo_usuario, $caminho_imagem);

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
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script defer src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script defer src="../javascript/script_navbar.js"></script>
    <script defer src="../javascript/configuracoes.js"></script>
    <script defer src="../javascript/alternar_modos.js"></script>
    <link rel="shortcut icon" href="../Imagens/logo (1).png" type="image/x-icon">
    <title> Cadastro - IvaíTour</title>
</head>

<body>

    <body>
        <div class="container-fluid">
            <?php
            include('../static/menu.php');
            ?>
            <div class="container d-flex justify-content-center">
                <form class="form2" action="" method="post">
                    <h1>Crie sua conta em nosso Site</h1>
                    <div class="flex-column">
                        <label>Email </label>
                    </div>
                    <div class="inputForm">
                        <svg height="20" viewBox="0 0 32 32" width="20" xmlns="http://www.w3.org/2000/svg">
                            <g id="Layer_3" data-name="Layer 3">
                                <path d="m30.853 13.87a15 15 0 0 0 -29.729 4.082 15.1 15.1 0 0 0 12.876 12.918 15.6 15.6 0 0 0 2.016.13 14.85 14.85 0 0 0 7.715-2.145 1 1 0 1 0 -1.031-1.711 13.007 13.007 0 1 1 5.458-6.529 2.149 2.149 0 0 1 -4.158-.759v-10.856a1 1 0 0 0 -2 0v1.726a8 8 0 1 0 .2 10.325 4.135 4.135 0 0 0 7.83.274 15.2 15.2 0 0 0 .823-7.455zm-14.853 8.13a6 6 0 1 1 6-6 6.006 6.006 0 0 1 -6 6z"></path>
                            </g>
                        </svg>
                        <input type="text" name="bt_email" class="input" placeholder="Insira seu Email">
                    </div>

                    <div class="flex-column">
                        <label>Senha </label>
                    </div>
                    <div class="inputForm">
                        <svg height="20" viewBox="-64 0 512 512" width="20" xmlns="http://www.w3.org/2000/svg">
                            <path d="m336 512h-288c-26.453125 0-48-21.523438-48-48v-224c0-26.476562 21.546875-48 48-48h288c26.453125 0 48 21.523438 48 48v224c0 26.476562-21.546875 48-48 48zm-288-288c-8.8125 0-16 7.167969-16 16v224c0 8.832031 7.1875 16 16 16h288c8.8125 0 16-7.167969 16-16v-224c0-8.832031-7.1875-16-16-16zm0 0"></path>
                            <path d="m304 224c-8.832031 0-16-7.167969-16-16v-80c0-52.929688-43.070312-96-96-96s-96 43.070312-96 96v80c0 8.832031-7.167969 16-16 16s-16-7.167969-16-16v-80c0-70.59375 57.40625-128 128-128s128 57.40625 128 128v80c0 8.832031-7.167969 16-16 16zm0 0"></path>
                        </svg>
                        <input type="password" name="bt_senha" class="input" placeholder="Insira sua Senha">
                    </div>

                    <div class="flex-column">
                        <label>Nome </label>
                    </div>
                    <div class="inputForm">
                        <svg height="20" viewBox="0 0 32 32" width="20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16 0a16 16 0 1 0 16 16A16 16 0 0 0 16 0zm0 6a4.5 4.5 0 1 1 -4.5 4.5A4.5 4.5 0 0 1 16 6zm0 21.93A11.93 11.93 0 0 1 8.72 23.5c.01-2.72 5.45-4.21 7.28-4.21s7.27 1.49 7.28 4.21A11.93 11.93 0 0 1 16 27.93z"></path>
                        </svg>
                        <input type="text" name="bt_nome" class="input" placeholder="Insira seu Nome">
                    </div>
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
                                    <p class="message-text">Cadastro Criado com Sucesso!</p>
                                    <p class="sub-text">Você será redirecionado para página de login em breve.</p>
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15 15" stroke-width="0" fill="none" stroke="currentColor" class="cross-icon">
                                    <path fill="currentColor" d="M11.7816 4.03157C12.0062 3.80702 12.0062 3.44295 11.7816 3.2184C11.5571 2.99385 11.193 2.99385 10.9685 3.2184L7.50005 6.68682L4.03164 3.2184C3.80708 2.99385 3.44301 2.99385 3.21846 3.2184C2.99391 3.44295 2.99391 3.80702 3.21846 4.03157L6.68688 7.49999L3.21846 10.9684C2.99391 11.193 2.99391 11.557 3.21846 11.7816C3.44301 12.0061 3.80708 12.0061 4.03164 11.7816L7.50005 8.31316L10.9685 11.7816C11.193 12.0061 11.5571 12.0061 11.7816 11.7816C12.0062 11.557 12.0062 11.193 11.7816 10.9684L8.31322 7.49999L11.7816 4.03157Z" clip-rule="evenodd" fill-rule="evenodd"></path>
                                </svg>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="flex-column">
                        <label>Telefone </label>
                    </div>
                    <div class="inputForm">
                        <svg height="20" viewBox="0 0 24 24" width="20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20 16.52a2.15 2.15 0 0 1 -1.3-.46l-2.36-1.86a2.07 2.07 0 0 0 -2.74.16l-1.31 1.33A15.39 15.39 0 0 1 6.31 8.34l1.32-1.32a2.09 2.09 0 0 0 .15-2.74l-1.86-2.36a2.14 2.14 0 0 1 -.47-1.3A2.22 2.22 0 0 1 4.69 0 4.7 4.7 0 0 0 2.6.35 2.32 2.32 0 0 0 1 1.53C.35 2.84-.73 8.85 4.62 14.2S21.17 23.65 22.48 23a2.31 2.31 0 0 0 1.18-1.56A4.63 4.63 0 0 0 24 19.31a2.24 2.24 0 0 1 -2.22-2.79z"></path>
                        </svg>
                        <input type="text" id="telefoneInput" name="bt_telefone" class="input" placeholder="Insira seu Telefone" maxlength="15" oninput="formatarTelefone()" required>
                    </div>

                    <div class="flex-column">
                        <label>CPF</label>
                    </div>
                    <div class="inputForm">
                        <svg height="20" viewBox="0 0 24 24" width="20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20 16.52a2.15 2.15 0 0 1 -1.3-.46l-2.36-1.86a2.07 2.07 0 0 0 -2.74.16l-1.31 1.33A15.39 15.39 0 0 1 6.31 8.34l1.32-1.32a2.09 2.09 0 0 0 .15-2.74l-1.86-2.36a2.14 2.14 0 0 1 -.47-1.3A2.22 2.22 0 0 1 4.69 0 4.7 4.7 0 0 0 2.6.35 2.32 2.32 0 0 0 1 1.53C.35 2.84-.73 8.85 4.62 14.2S21.17 23.65 22.48 23a2.31 2.31 0 0 0 1.18-1.56A4.63 4.63 0 0 0 24 19.31a2.24 2.24 0 0 1 -2.22-2.79z"></path>
                        </svg>
                        <input type="text" id="cpfInput" name="bt_cpf" class="input" placeholder="Insira seu CPF" maxlength="14" oninput="formatarCPF()" required>
                    </div>
                    <div class="mb-3">
                        <label for="bt_genero" class="form-label">Gênero</label>
                        <select name="bt_genero" id="bt_genero" class="form-control" required>
                            <option value="Masculino">Masculino</option>
                            <option value="Feminino">Feminino</option>
                        </select>
                    </div>

                    <input class="button-submit" type="submit" value="Cadastrar">
                    <p class="p">Já possui uma conta? <a href="login.php">Faça Login</a></p>
                </form>

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
                                window.location.href = 'login.php';
                            }, 5000);
                        }
                    });
                </script>
            </div>
        </div>
            <br>
            <br>
            <?php
            include("../static/footer.php");
            ?>
    </body>
    <script src="../javascript/zere.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</html>