<?php
if (empty($opcaoSelecionada))
    
if (isset($_POST['metodo'])) {
    $metodo = $_POST['metodo'];

    switch ($metodo) {
        case 'cartao':
            header("Location: cartao.php");
            break;
        case 'pix':
            header("Location: pix.php");
            break;
        case 'boleto':
            header("Location: boleto.php");
            break;
        default:
            header("Location: metodo_pag.php");
            break;
    }
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escolha Seu Método de Pagamento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/zere.css">
    <link rel="stylesheet" href="../css/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .payment-option {
            margin-bottom: 10px;
        }

        .payment-option input {
            margin-right: 10px;
        }

        .submit-button {
            margin-top: 20px;
        }

        .divo {
            width: 100%;
            padding: 30px;
        }

        .profile-picture-container {
            display: flex;
            justify-content: center;
        }

        .profile-picture {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
        }

        .button-group {
            flex-direction: column;
            align-items: center;
            gap: 5px;
        }

        .form-control {
            width: 100%;
        }

        main {
            padding: 10px;
        }

        .info-title {
            display: inline-block;
            font-weight: bold;
        }


        /* Ajustes para telas maiores */
        @media (min-width: 769px) {
            .profile-picture {
                width: 200px;
                height: 200px;
            }

            .button-group {
                flex-direction: row;
            }

            main {
                padding: 20px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div id="form-container-ctt" class="form-container">
            <form action="metodo_pag.php" method="post">
                <div class="dive">
                    <div class="payment-option">
                        <label>
                            <input type="radio" name="metodo" value="cartao" required>
                            <img src="../Imagens/credit-card.png" alt="" width="35px">
                            Cartão de Crédito
                        </label>
                    </div>
                </div>
                <div class="dive">
                    <div class="payment-option">
                        <label>
                            <input type="radio" name="metodo" value="pix" required>
                            <img src="../imagens/iconepix.png" alt="" width="25px">
                            Pix
                        </label>
                    </div>
                </div>
                <div class="dive">
                    <div class="payment-option">
                        <label>
                            <input type="radio" name="metodo" value="boleto" required>
                            <img src="../imagens/boleto.png" alt="" height="20px">
                            Transferência Bancária
                        </label>
                    </div>
                </div>
                <div class="button-container">
                        <div class="save-button-container">
                            <button type="submit" class="save-button">Salvar</button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</html>