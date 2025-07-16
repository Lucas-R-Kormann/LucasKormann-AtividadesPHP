<?php

include 'db.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'&& (isset($_POST["create"]))){
        $name = $_POST['name'];
        $email = $_POST['email'];

        $sql = "INSERT INTO usuario (name, email) VALUE ('$name', '$email')";

        if($conn -> query($sql) === true){
            echo "Novo registro no Banco!";

        } else {
            echo "Erro: " . $sql . "<br>";
        };
        $conn -> close();
    };

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
</head>
<body>

    <form method="POST" action="create.php">
        <label for="name">Nome:</label>
        <input type="text" name="name" required>
        <label for="email">E-mail:</label>
        <input type="email" name="email" required>

        <input type="submit" name="create" value="Adicionar">

    </form>

    <div id="tabela_de_consulta">
        
        <?php

            include "read.php"

        ?>


    </div>
    
</body>
</html>