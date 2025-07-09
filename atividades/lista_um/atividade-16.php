<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informar se a pessoa pode votar</title>
</head>

<body>
    <form method="POST" action="">
        <label for="nome">Digite seu nome</label>
        <input type="text" id="nome" name="nome" required>
        <label for="idade">Digite sua idade</label>
        <input type="number" id="idade" name="idade" required>
        <button type="submit" name="verificar_voto">Verificar</button>
    </form>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $idade = $_POST['idade'];
        $nome = $_POST['nome'];

        if ($idade >= 16) {
            echo "Você pode votar $nome.";
        } else {
            echo "Você não pode votar $nome.";
        }
    }

    ?>

</body>

</html>