<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Converter Celsius para Farenheit</title>
</head>

<body>
    <form method="POST" action="">
        <label for="numero"> Converter graus Celsius para Farenheit:</label>
        <input type="number" id="temperatura" name="temperatura" required>
        <button type="submit" name="converter_temp">Converter</button>
    </form>

    <?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        if (isset($_POST['converter_temp'])) {
            $temperaturaC = $_POST['temperatura'];

            function converter($temperaturaC)
            {

                $temperaturaF = ($temperaturaC * 1.8) + 32;

                echo " A temperatura em Farenheit é $temperaturaF";
            };
            echo converter($temperaturaC);
        };
    };
    ?>

</body>

</html>