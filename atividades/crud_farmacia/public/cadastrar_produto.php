<?php
    session_start();

    include("../includes/conexao.php");
    include("../src/Auth.php");
    include("../src/User.php");

    $auth = new Auth();
    $user = new User($conn);

    $currentUser = $user->getUserById($_SESSION['user_id']);


        if (isset($_GET['logout'])) {
            session_destroy();
            header("Location: index.php");
            exit;
        }
        if (!$auth->isLoggedIn()) {
            header("Location: index.php");
            exit;
        }

   if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if (empty($_POST["nome_produto"]) || empty($_POST["descricao_produto"]) || empty($_POST["preco_produto"]) || empty($_POST["quantidade_estoque"])) {
        echo "Todos os campos são obrigatórios!";
        exit;
    }
    
    $nome = $_POST["nome_produto"];
    $descricao = $_POST["descricao_produto"];
    $preco = $_POST["preco_produto"];
    $quantidade = $_POST["quantidade_estoque"];

    $sql = "INSERT INTO produtos (nome_produto, descricao_produto, preco_produto, quantidade_estoque) 
            VALUES (:nome_produto, :descricao_produto, :preco_produto, :quantidade_estoque)";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":nome_produto", $nome);
    $stmt->bindParam(":descricao_produto", $descricao);
    $stmt->bindParam(":preco_produto", $preco);
    $stmt->bindParam(":quantidade_estoque", $quantidade);

    if($stmt->execute()) {
        echo "Produto cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Produto</title>
</head>
<body>
    <h1>Cadastrar produto</h1>

    <div>
        <form method="POST">
            <div>
                <label for="nome_produto"></label>
                <input type="text" name="nome_produto" placeholder="Nome do produto" required>
            </div>
            <br>
            <div>
                <label for="descricao_produto"></label>
                <input type="text" name="descricao_produto" placeholder="Descrição do produto" required>
            </div>
            <br>
            <div>
                <label for="preco_produto"></label>
                <input type="text" name="preco_produto" placeholder="Preço do produto" required>
            </div>
            <br>
            <div>
                <label for="quantidade_estoque"></label>
                <input type="text" name="quantidade_estoque" placeholder="Quantia em estoque" required>
            </div>
            <br>
            <button type="submit">Cadastrar</button>
        </form>
    </div>
</body>
</html>