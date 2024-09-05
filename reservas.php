<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/reservas.css">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Reserva de Passagens</title>
</head>
<body>


    ><section class="reservation-form">
        <h2>Reserve sua viagem</h2>
        <form action="#" method="POST">
            <label for="from">De:</label>
            <input class="texto-reservas" type="text" id="from" name="from" placeholder="Cidade de origem" required>

            <label for="to">Para:</label>
            <input class="texto-reservas" type="text" id="to" name="to" placeholder="Cidade de destino" required>

            <label for="departure">Data de partida:</label>
            <input class="texto-reservas" type="date" id="departure" name="departure" required>

            <label for="return">Data de retorno:</label>
            <input class="texto-reservas" type="date" id="return" name="return">

            <label for="passengers">Número de passageiros:</label>
            <input class="texto-reservas" type="number" id="passengers" name="passengers" min="1" value="1" required>

            <button type="submit">Reservar</button>
        </form>
    </section>
    

    <?php
    include('static/footer.php');
    ?>

</body>
</html>
