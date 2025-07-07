<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exibir todos os divisores de um número</title>
</head>

<body>
    <form method="POST" action="">
        <label for="numero">Exibe todos os divisores de um número:</label>
        <input type="number" id="numero" name="numero" required>
        <button type="submit" name="exibir_divisores">Exibir Divisores</button>
    </form>

    <?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        if (isset($_POST['exibir_divisores'])) {
            $numero = $_POST['numero'];
            for($i = 1; $i <= $numero; $i++){
                if($numero % $i == 0){
                    echo $i . " ";
                };
            };
            };
        };
    ?>

</body>

</html>