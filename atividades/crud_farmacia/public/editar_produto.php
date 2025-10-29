<?php
session_start();

if (empty($_SESSION["user_id"])){ 
    header("Location: index.php"); 
}

include("../includes/conexao.php");
include("../src/Auth.php");
include("../src/User.php");

$msg = "";

if (isset($_GET['id'])) {
    $id_produtos = $_GET['id'];
} else {
    die("ID do produto não especificado!");
}
$sql = "SELECT * FROM produtos WHERE id_produtos = :id_produtos";
$stmt = $conn->prepare($sql);
$stmt->bindParam(":id_produtos", $id_produtos);
$stmt->execute();
$produtos = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$produtos) {
    die("Produto não encontrado!");
}
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $nome = $_POST["nome_produto"];
    $descricao = $_POST["descricao_produto"];
    $preco = $_POST["preco_produto"];
    $quantidade = $_POST["quantidade_estoque"];

    $sql = "UPDATE produtos SET nome_produto=:nome_produto, descricao_produto=:descricao_produto, preco_produto=:preco_produto, quantidade_estoque=:quantidade_estoque WHERE id_produtos=:id_produtos";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":nome_produto", $nome);
    $stmt->bindParam(":descricao_produto", $descricao);
    $stmt->bindParam(":preco_produto", $preco);
    $stmt->bindParam(":quantidade_estoque", $quantidade);
    $stmt->bindParam(":id_produtos", $id_produtos);
    
    if($stmt->execute()){
        header("Location: pagina_inicial.php");
        exit();
    } else {
        $msg = "Erro ao atualizar!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar produtos</title>
</head>
<body>
    <h1>Editar Produto</h1>
    <?php if ($msg): ?>
        <p><?php echo $msg; ?></p>
    <?php endif; ?>  
    <div>
        <form method="POST">
            <div>
                <label for="nome_produto">Nome do produto: </label>
                <input type="text" name="nome_produto" id="nome_produto"
                    value="<?= htmlspecialchars($produtos['nome_produto'] ?? '') ?>" required> 
            </div>
            <div>
                <label for="descricao_produto">Descrição do produto: </label>
                <input type="text" name="descricao_produto" id="descricao_produto"
                    value="<?= htmlspecialchars($produtos['descricao_produto'] ?? '') ?>" required> 
            </div>
            <div>
                <label for="preco_produto">Preço do produto: </label>
                <input type="text" name="preco_produto" id="preco_produto"
                    value="<?= htmlspecialchars($produtos['preco_produto'] ?? '') ?>" required> 
            </div>
            <div>
                <label for="quantidade_estoque">Quantidade do produto: </label>
                <input type="text" name="quantidade_estoque" id="quantidade_estoque"
                    value="<?= htmlspecialchars($produtos['quantidade_estoque'] ?? '') ?>" required> 
            </div>
            <div>
                <button type="submit">Atualizar Produto</button>
                <a href="pagina_inicial.php">Cancelar</a>
            </div>
        </form>
    </div>
</body>
</html>