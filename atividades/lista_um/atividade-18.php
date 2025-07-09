<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificação de qual número é maior</title>
</head>

<body>
    <form method="POST" action="">
        <label for="numeroUm">Digite o primeiro número</label>
        <input type="number" id="numeroUm" name="numeroUm" required>
        <label for="numeroDois">Digite o segundo número</label>
        <input type="number" id="numeroDois" name="numeroDois" required>
        <label for="numeroTres">Digite o terceiro número</label>
        <input type="number" id="numeroTres" name="numeroTres" required>
        <button type="submit" name="verificar_numero">Verificar</button>
    </form>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $numeroUm = $_POST['numeroUm'];
        $numeroDois = $_POST['numeroDois'];
        $numeroTres = $_POST['numeroTres'];

        if ($numeroUm > $numeroDois && $numeroUm > $numeroTres) {
            echo "O número $numeroUm é o maior.";
        } else if ($numeroDois > $numeroUm && $numeroDois > $numeroTres) {
            echo "O número $numeroDois é o maior.";
        } else if ($numeroTres > $numeroUm && $numeroTres > $numeroDois) {
            echo "O número $numeroTres é o maior.";
        }
    }

    ?>

</body>

</html>