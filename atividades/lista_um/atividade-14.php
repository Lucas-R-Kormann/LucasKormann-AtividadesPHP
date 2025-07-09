<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificar se o ano é bissexto</title>
</head>

<body>
    <form method="POST" action="">
        <label for="numero"> Verificar se o ano é bissexto:</label>
        <input type="number" id="ano" name="ano" required>
        <button type="submit" name="verificar_bissexto">Converter</button>
    </form>

    <?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        if (isset($_POST['verificar_bissexto'])) {
            $ano = $_POST['ano'];

            function bissexto($ano)
            {
                if ($ano % 4 == 0 || $ano % 400 == 0) {
                    echo "O ano é bissexto.";
                } else {
                    echo "O ano não é bissexto";
                };
            };
            echo bissexto($ano);
        };
    };
    ?>

</body>

</html>