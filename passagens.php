<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="css/ctt.css">
    <title>Passagens</title>
</head>
<body>
    <?php
        include('static/menu.php');
    ?>
    
    

    <div class="card">
        <h2 id="h2-passagens">Passagens</h2>
        <form>
            <label for="nome">Nome Completo:</label>
            <input type="text" id="nome" name="nome" maxlength="50" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" maxlength="50" required>

            <label for="destino">Destino:</label>
            <input type="text" id="destino" name="destino" maxlength="50" required>

            <label for="data-ida">Data de Ida:</label>
            <input type="date" id="data-ida" name="data-ida" required>

            <label for="data-volta">Data de Volta:</label>
            <input type="date" id="data-volta" name="data-volta" required>

            <label for="classe">Classe:</label>
            <select id="classe" name="classe" required>
                <option value="economica">Econômica</option>
                <option value="executiva">Executiva</option>
                <option value="primeira">Primeira Classe</option>
            </select>

            <button id="button-passagens" type="submit">Comprar Passagem</button>
        </form>
    </div>
    <br>
    <br>

    <?php
        include('static/footer.php');
    ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</html>