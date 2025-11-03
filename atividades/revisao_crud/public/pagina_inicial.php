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
        <title>Página Inicial</title>
    </head>
    <body>
        <h1>Lista de Tarefas</h1>

        <?php
            $sql_tarefas = "SELECT t.*, u.nome_usuario 
                FROM tarefas t 
                INNER JOIN usuarios u ON t.id_usuario = u.id_usuario";
            $stmt = $conn->prepare($sql_tarefas);
            $stmt->execute();

            echo "<ul>";

                while ($tarefas = $stmt->fetch(PDO::FETCH_ASSOC)){
                    echo "<li><strong>ID:</strong>" . $tarefas['id_tarefa'] . "</li>";
                    echo "<li><strong>Descrição da tarefa:</strong>" . $tarefas['descricao_tarefa'] . "</li>";
                    echo "<li><strong>Nome do setor:</strong>" . $tarefas['nome_setor'] . "</li>";
                    echo "<li><strong>Prioridade:</strong>" . $tarefas['prioridade'] . "</li>";
                    echo "<li><strong>Status:</strong>" . $tarefas['status'] . "</li>";
                    echo "<li><strong>Data de cadastro:</strong>" . $tarefas['data_cadastro'] . "</li>";
                    echo "<li><strong>Usuário responsável:</strong>" . $tarefas['nome_usuario'] . "</li>";
                    echo "<a href='editar_tarefas.php?id=" . $tarefas['id_tarefa'] . "'>Editar tarefa</a>";
                    echo "<br>";
                    echo "<br>";
                }
        ?>

                
        <p><a href="cadastrar_tarefa.php">Cadastrar tarefa</a></p>
        
        <p><a href="cadastrar_usuario.php">Cadastrar Usuário</a></p>
        
        <p><a href="?logout=1">Sair</a></p>
    </body>
    </html>