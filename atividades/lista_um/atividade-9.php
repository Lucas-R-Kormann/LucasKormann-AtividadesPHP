<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receber dois números e exibir a soma de todos os números entre eles</title>
</head>
<body>
    <form method="POST" action="">
        <label for="num1">Digite um número</label>
        <input type="number" id="num1" name="num1" required>
        <label for="num2">Digite um número</label>
        <input type="number" id="num2" name="num2" required>
        <button type="submit" name="verificar_amigo">Somar os elementos entre os números informados</button>
    </form>

    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = $_POST["num1"];
    $num2 = $_POST["num2"];

    if (is_numeric($num1) && is_numeric($num2)) {
        $num1 = $num1;
        $num2 = $num2;

        $soma = 0;
        for ($i = min($num1, $num2) + 1; $i < max($num1, $num2); $i++) {
            $soma += $i;
        }

        echo "A soma dos números entre " . min($num1, $num2) . " e " . max($num1, $num2) . " é: " . $soma;
    } else 
        echo "Por favor, insira números válidos.";
    
}
?>
</body>
</html>