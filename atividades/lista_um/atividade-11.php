<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificar palíndromo</title>
</head>

<body>
    <form method="POST" action="">
        <label for="numero"> Verificar se a palavra é um palíndromo:</label>
        <input type="text" id="palavra" name="palavra" required>
        <button type="submit" name="palindromo">Verificar</button>
    </form>

        <?php

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if (isset($_POST['palindromo'])) {
                $palavra = $_POST['palavra'];

                function verificar_palindromo($palavra)
                {
                    if ($palavra == strrev($palavra)) {
                        echo 'A palavra é um palíndromo.';
                    } else {
                        echo 'A palavra não é um palíndromo';
                    };
                };
                echo '<br>';
                echo verificar_palindromo($palavra);
            };
        };
        ?>

</body>

</html>