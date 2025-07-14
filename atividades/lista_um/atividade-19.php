<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificar a senha</title>
</head>

<body>
    <form method="POST" action="">
        <label for="senha"> Digite sua senha:</label>
        <input type="text" id="senha" name="senha" required>
        <button type="submit" name="verificar_senha">Verificar</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['verificar_senha'])) {
            $senha = $_POST['senha'];

            $uppercase  =  preg_match('@[A-Z]@',  $senha);
            $lowercase  =  preg_match('@[a-z]@',  $senha);
            $number     =  preg_match('@[0-9]@',  $senha);
            $specialChars  =  preg_match('@[^\w]@',  $senha);

            if (! $uppercase  || ! $lowercase  || ! $number  || ! $specialChars  ||  strlen($senha) <  8) {
                echo  'A senha deve ter pelo menos 8 caracteres e deve incluir pelo menos uma letra maiúscula, um número e um caractere especial.';
            } else {
                echo  'Senha forte.';
            }
        }
    }
    ?>

</body>

</html>