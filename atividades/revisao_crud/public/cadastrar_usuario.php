<?php
    session_start();

        if (empty($_SESSION["user_id"])){ 
            header("Location: index.php"); 
        }

        include("../includes/conexao.php");
        include("../src/Auth.php");
        include("../src/User.php");

        $msg = "";

        

        $sql = "SELECT * FROM usuarios WHERE id_usuario = :id_usuario";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":id_usuario", $id_usuario);
        $stmt->execute();
        $produtos = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $nome_usuario = $_POST["nome_usuario"];
            $email_usuario = $_POST["email_usuario"];
            $senha_usuario = $_POST["senha_usuario"];

            $hash = password_hash($senha_usuario, PASSWORD_DEFAULT);
            
        

        $sql = "INSERT INTO usuarios(nome_usuario, email_usuario, senha_usuario) VALUES (:nome_usuario, :email_usuario, :senha_usuario)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":nome_usuario", $nome_usuario);
        $stmt->bindParam(":email_usuario", $email_usuario);
        $stmt->bindParam(":senha_usuario", $hash);
        if($stmt->execute()){
        header("Location: pagina_inicial.php");
        exit();
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
        <title>Cadastrar Usuário</title>
    </head>
    <body>
        <h1>Cadastrar Usuário</h1>
        <div>
        <form method="POST">
            <div>
                <label for="nome_usuario">Nome do usuário: </label>
                <input type="text" name="nome_usuario" id="nome_usuario"
                    value="<?=htmlspecialchars($usuarios['nome_usuario'] ?? '')?>" required> 
            </div>
            <br>
            <div>
                <label for="email">Email: </label>
                <input type="email" name="email_usuario" id="email_usuario"
                    value="<?=htmlspecialchars($usuarios['email_usuario'] ?? '')?>" required> 
            </div>
            <br>
            <div>
                <label for="prioridade">Senha: </label>
                <input type="password" name="senha_usuario" id="senha_usuario"
                    value="<?=htmlspecialchars($usuarios['senha_usuario'] ?? '')?>" required> 
            </div>
            <br>
            <button type="submit">Cadastrar</button>
        </form>
    </div>

        
    </body>
    </html>