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




    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Lista de Produtos</h1>
    <p><a href="?logout=1">Sair</a></p>
    <?php
        $sql_produtos = "SELECT * FROM produtos";
        $stmt = $conn->prepare($sql_produtos);
        $stmt->execute();

        echo "<ul>"; 

            while($produtos = $stmt->fetch(PDO::FETCH_ASSOC)){
                echo "<li><strong>ID:</strong> " . $produtos['id_produtos'] . "</li>";
                echo "<li><strong>Nome:</strong> " . $produtos['nome_produto'] . "</li>";
                echo "<li><strong>Descrição:</strong> " . $produtos['descricao_produto'] . "</li>";
                echo "<li><strong>Preço:</strong> R$ " . $produtos['preco_produto'] . "</li>";
                echo "<li><strong>Estoque:</strong> " . $produtos['quantidade_estoque'] . " unidades</li>";
                echo "<a class='btn btn-primary ' href='editar_produto.php?id=" . $produtos['id_produtos'] . "'>Editar informações</a>";
                echo "<li>-----------------------</li>";
}
        echo "</ul>";  
    ?>
</body>
</html>