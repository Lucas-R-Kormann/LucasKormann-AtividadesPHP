<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <?php include("conexao.php");

        //logout

        session_start();

        if (isset($_GET['logout'])) {
            session_destroy();
            header("Location: index.php");
            exit;
        }

        $msg = "";
    
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user = $_POST["nome"] ?? "";
    $pass = $_POST["senha"] ?? "";

    $sql = "SELECT id, nome, senha FROM usuarios WHERE nome=? AND senha=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $user, $pass);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $dados = mysqli_fetch_assoc($result);
    $stmt->close();

    if ($dados) {
        $_SESSION["user_id"] = $dados["id"];
        $_SESSION["nome"] = $dados["nome"];
        header("Location: informacoes.php");
        exit;
    } else {
        $msg = "Usuário ou senha incorretos!";
    }
}
    ?>

    <?php if (!empty($_SESSION["user_id"])): 
        header("Location: informacoes.php"); 
    ?>

    <?php else: ?>
    <div class="card">
    <h3>Login</h3>
    <?php if ($msg): ?><p class="msg"><?= $msg ?></p><?php endif; ?>
    <form method="post">
      <input type="text" name="nome" placeholder="Usuário" required>
      <input type="password" name="senha" placeholder="Senha" required>
      <button type="submit">Entrar</button>
    </form>
    <p><small>Dica: admin / 123</small></p>
  </div>
    
<?php endif; ?>

</body>
</html>