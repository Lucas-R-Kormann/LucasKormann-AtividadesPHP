<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sequência de Fibonacci</title>
</head>

<body>
    <label for="numero"> Verificar a sequência de fibonnaci:</label>
    <input type="number" id="numero" name="numero" required>
    <button type="submit" name="sequencia_fibonacci">Verificar</button>

    <?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        if (isset($_POST['sequencia_fibonnaci'])) {
            $numero = $_POST['numero'];
            function fibonacci($n)
            {
                $sequencia = [0, 1];
                for ($i = 2; $i < $n; $i++) {
                    $sequencia[$i] = $sequencia[$i - 1] + $sequencia[$i - 2];
                }
                return $sequencia;
            }

            $tamanho_sequencia = $numero; // Exemplo: gerar 10 termos
            $fib_sequence = fibonacci($tamanho_sequencia);

            echo "Sequência de Fibonacci com $tamanho_sequencia termos: ";
        }
    }


    ?>

</body>

</html>