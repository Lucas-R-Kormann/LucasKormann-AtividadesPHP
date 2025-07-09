<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificação de data válida</title>
</head>

<body>
    <form method="POST" action="">
        <label for="dia">Digite um dia</label>
        <input type="number" id="dia" name="dia" required>
        <label for="mes">Digite um mês</label>
        <input type="number" id="mes" name="mes" required>
        <label for="ano">Digite um ano</label>
        <input type="number" id="ano" name="ano" required>
        <button type="submit" name="validar_data">Validar</button>
    </form>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $dia = $_POST['dia'];
        $mes = $_POST['mes'];
        $ano = $_POST['ano'];

        if (checkdate($mes, $dia, $ano)) {
            echo 'Data válida!';
        } else {
            echo 'Data inválida.';
        }
    }

    ?>

</body>

</html>