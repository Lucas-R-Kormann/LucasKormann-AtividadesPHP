<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificar Força da Senha</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .error { color: red; }
        .success { color: green; }
        input { padding: 8px; margin: 5px 0; }
    </style>
</head>
<body>
    <h2>Verificar Força da Senha</h2>
    <form method="POST" action="">
        <label for="senha">Digite sua senha:</label>
        <input type="password" id="senha" name="senha" required>
        <button type="submit" name="verificar_senha">Verificar</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['verificar_senha'])) {
        $senha = $_POST['senha'];
        $errors = [];
        
        // Verificações individuais
        if (!preg_match('@[A-Z]@', $senha)) {
            $errors[] = "Pelo menos 1 letra maiúscula";
        }
        
        if (!preg_match('@[a-z]@', $senha)) {
            $errors[] = "Pelo menos 1 letra minúscula";
        }
        
        if (!preg_match('@[0-9]@', $senha)) {
            $errors[] = "Pelo menos 1 número";
        }
        
        if (!preg_match('@[^\w]@', $senha)) {
            $errors[] = "Pelo menos 1 caractere especial";
        }
        
        if (strlen($senha) < 8) {
            $errors[] = "Mínimo de 8 caracteres";
        }
        
        // Exibir resultados
        if (count($errors)) {
            echo '<div class="error"><h3>Senha fraca. Faltam:</h3><ul>';
            foreach ($errors as $error) {
                echo "<li>$error</li>";
            }
            echo '</ul></div>';
        } else {
            echo '<div class="success"><h3>Senha forte! ✔️</h3></div>';
        }
    }
    ?>
</body>
</html>