<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="">
        <label for = "numero"> Verifica se o número é perfeito:</label>
        <input type="number" id="numero" name="numero" required>
        <button type="submit" name="verificar_numero">Verificar</button>
</body>

<?php

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if (isset($_POST['verificar_numero'])) {
                $numero = $_POST['numero'];

                function somaDivisores($numero)
                {
                    $soma = 0;
                    for ($i = 1; $i <= $numero / 2; $i++) {
                        if ($numero % $i == 0) {
                            $soma += $i;
                        }
                    }
                    return $soma;
                }

                function ehPerfeito($numero)
                {
                    $soma = somaDivisores($numero);                  

                    return ($soma == $numero);
                }

                echo "<br>";
                
                if (ehPerfeito($numero)) {
                    echo "$numero é perfeito.";
                } else {
                    echo "$numero não é perfeito.";
                }
            };
                };

        ?>

</html>