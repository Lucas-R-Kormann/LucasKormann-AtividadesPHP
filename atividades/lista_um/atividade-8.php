<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contagem de números pares</title>
</head>
<body>
    <form method="POST" action="">
        <label for = "numero"> Exibir os números pares entre 1 e o número informado:</label>
        <input type="number" id="numero" name="numero" required>
        <button type="submit" name="verificar_pares">Verificar</button>
    </form>

        <?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        if (isset($_POST['verificar_pares'])) {
            $numero = $_POST['numero'];
            for($i = 1; $i <= $numero; $i++){
                if($i % 2 == 0){
                    echo"<br>";
                    echo $i . " ";
                };
            };
            };
        };
    ?>

</body>
</html>