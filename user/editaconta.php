<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="img/logo2.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="icon" href="Imagens/icon.png">
    <link rel="stylesheet" href="../css/zere.css">
    <title>Minha Conta</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>


@media (max-width: 768px) {
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




        body, html {
            height: 100%;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .divo {
            width: 700px; /* ajuste conforme necessário */
            padding: 20px;
        }
        .button-group {
            display: flex;
            justify-content: center;
            gap: 10px; /* espaçamento entre os botões */
        }
        .escuro {
            position: relative; /* Necessário para posicionar o ícone no canto inferior */
            padding: 20px;
        }
        .edit-icon {
            position: absolute;
            bottom: 10px; /* Ajuste conforme necessário */
            right: 10px; /* Ajuste conforme necessário */
            color: white; /* Cor do ícone */
            padding: 12px;
            border-radius: 50%;
            cursor: pointer;
            font-size: 4px; /* Tamanho do ícone */
        }
        .edit-icon:hover {
            background: #0056b3; /* Cor de fundo ao passar o mouse */
        }
    </style>
</head>

<body>
    <div class="divo">
        <div class="container profile-container">
            <div class="text-center mb-4">
                <div class="profile-picture-container">
                    <label for="foto">
                        <img class='profile-picture' src='../Imagens/avatar2.png' alt='Foto de perfil'>
                        <div class="edit-icon">
                            <i class="fas fa-pencil-alt"></i>
                        </div>
                    </label>
                </div>
                <h1 class="mt-3">Olá</h1>
            </div>

            <form action="upload_imagem.php" method="post" enctype="multipart/form-data" class="mb-4" id="uploadForm">
                <input type="file" name="foto" id="foto" class="form-control" placeholder="Mudar foto de perfil" required>
                <div class="button-group">
                    <input id="but1" type="submit" value="Envie a sua foto" class="btn btn-primary">
                </div>
            </form>
            <h2 class="mb-3">Minhas informações:</h2>
            <main class="escuro">
                <h5><span class="info-title">Nome:</span></h5>
                <h5><span class="info-title">Endereço:</span></h5>
                <h5><span class="info-title">Email:</span></h5>
                <h5><span class="info-title">CPF:</span></h5>
                <div class="account-section">
                </div>
                <a href="editar_info.php" class="edit-icon">
                    <i class="fas fa-pencil-alt"></i>
                </a>
            </main>
            <a id="but1" href="alterar.php" class="btn btn-primary">Salvar </a>
        </div>
    </div>

</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</html>
