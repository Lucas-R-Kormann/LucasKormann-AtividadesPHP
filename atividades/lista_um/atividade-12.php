<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificar quantidade de vogais</title>
</head>

<body>
    <form method="POST" action="">
        <label for="palavra"> Verificar a quantidade de vogais de uma palavra:</label>
        <input type="text" id="palavra" name="palavra" required>
        <button type="submit" name="quantidade_vogais">Verificar</button>
    </form>

    <?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        if (isset($_POST['quantidade_vogais'])) {
            $palavra = $_POST['palavra'];

            function verificar_vogais($palavra)
            {
                $palavra = strtolower($palavra);
                $vogais = ['a', 'e', 'i', 'o', 'u'];
                $contador = 0;

                for ($i = 0; $i < strlen($palavra); $i++) {
                    if (in_array($palavra[$i], $vogais)) {
                        $contador++;
                    };
                };
                echo $contador . ' vogais';
            };
            echo verificar_vogais($palavra);
        };
    };
    ?>

</body>

</html>