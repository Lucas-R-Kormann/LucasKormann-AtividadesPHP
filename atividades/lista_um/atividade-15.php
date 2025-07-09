<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calcular IMC</title>
</head>
<body>
    <form method="POST" action="">
        <label for="peso">Digite seu peso em KG</label>
        <input type="number" id="peso" name="peso" required>
        <label for="altura">Digite sua altura em metros</label>
        <input type="number" step="0.010" id="altura" name="altura" required>
        <button type="submit" name="calcIMC">Calcular o IMC</button>
    </form>

    <?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $peso = $_POST["peso"];
    $altura = $_POST["altura"];

    $imc = $peso / ($altura * $altura);

    if ($imc < 19) {
        echo "Você está abaixo do peso ideal.";
    } else if ($imc >= 19 && $imc <= 24) {
        echo "Você está no peso ideal";
    } else if ($imc > 24 && $imc <= 29 ) {
        echo "Você está com sobrepeso.";
    } else if ($imc > 29 && $imc <= 34) {
        echo "Você está com obesidade grau 1.";
    } else if ($imc > 34 && $imc <= 39) {
        echo "Você está com obesidade grau 2.";
    } else if($imc > 39) {
        echo "Você está com obesidade grau 3";
    }
}
?>
</body>
</html>