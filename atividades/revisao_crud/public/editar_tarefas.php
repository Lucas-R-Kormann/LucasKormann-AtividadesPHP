<?php
    session_start();

        if (empty($_SESSION["user_id"])){ 
            header("Location: index.php"); 
        }

        include("../includes/conexao.php");
        include("../src/Auth.php");
        include("../src/User.php");

        $msg = "";

        $sql_usuarios = "SELECT id_usuario, nome_usuario FROM usuarios ORDER BY nome_usuario";
        $stmt_usuarios = $conn->prepare($sql_usuarios);
        $stmt_usuarios->execute();
        $usuarios = $stmt_usuarios->fetchAll(PDO::FETCH_ASSOC);

        $id_tarefa = $_GET['id'] ?? $_POST['id_tarefa'] ?? null;

        if (!$id_tarefa) {
        die("ID da tarefa não especificado!");
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $descricao = $_POST["descricao_tarefa"] ?? "";
            $setor = $_POST["nome_setor"] ?? "";
            $prioridade = $_POST["prioridade"] ?? "";
            $status = $_POST["status"] ?? "";
            $usuario = $_POST["id_usuario"] ?? "";

        $sql = "UPDATE tarefas SET descricao_tarefa=:descricao_tarefa, nome_setor=:nome_setor, prioridade=:prioridade, status=:status, id_usuario=:id_usuario WHERE id_tarefa=:id_tarefa";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":id_tarefa", $id_tarefa);
        $stmt->bindParam(":descricao_tarefa", $descricao);
        $stmt->bindParam(":nome_setor", $setor);
        $stmt->bindParam(":prioridade", $prioridade);
        $stmt->bindParam(":status", $status);
        $stmt->bindParam(":id_usuario", $usuario);
        if($stmt->execute()){
        header("Location: pagina_inicial.php");
        exit();
    } else {
        echo "Erro ao atualizar!";
    }
}
?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Editar Tarefa</title>
    </head>
    <body>
        <h1>Editar Tarefa</h1>
        <div>
        <form method="POST">
            <div>
                <label for="descricao">Descrição da tarefa: </label>
                <input type="text" name="descricao_tarefa" id="descricao_tarefa"
                    value="<?=htmlspecialchars($tarefas['descricao_tarefa'] ?? '')?>" required> 
            </div>
            <br>
            <div>
                <label for="setor">Nome do setor: </label>
                <input type="text" name="nome_setor" id="nome_setor"
                    value="<?=htmlspecialchars($tarefas['nome_setor'] ?? '')?>" required> 
            </div>
            <br>
            <div>
                <label for="prioridade">Prioridade: </label>
            <select name="prioridade" id="prioridade" required>
                <option value="">Selecione a prioridade</option>
                <option value="baixa" <?= (isset($tarefas['prioridade']) && $tarefas['prioridade'] == 'baixa') ? 'selected' : '' ?>>Baixa</option>
                <option value="media" <?= (isset($tarefas['prioridade']) && $tarefas['prioridade'] == 'media') ? 'selected' : '' ?>>Média</option>
                <option value="alta" <?= (isset($tarefas['prioridade']) && $tarefas['prioridade'] == 'alta') ? 'selected' : '' ?>>Alta</option>
            </select>
        </div>
        <br>
        <div>
            <label for="status">Status: </label>
            <select name="status" id="status" required>
                <option value="">Selecione o status</option>
                <option value="a fazer" <?= (isset($tarefas['status']) && $tarefas['status'] == 'a fazer') ? 'selected' : '' ?>>A fazer</option>
                <option value="fazendo" <?= (isset($tarefas['status']) && $tarefas['status'] == 'fazendo') ? 'selected' : '' ?>>Fazendo</option>
                <option value="pronto" <?= (isset($tarefas['status']) && $tarefas['status'] == 'pronto') ? 'selected' : '' ?>>Pronto</option>
            </select>
            </div>
            <br>
            <div>
            <div>
                <label for="id_usuario">Usuário responsável: </label>
                <select name="id_usuario" id="id_usuario" required>
                    <option value="">Selecione um usuário</option>
                    <?php foreach ($usuarios as $usuario): ?>
                        <option value="<?= $usuario['id_usuario'] ?>" 
                            <?= (isset($tarefas['id_usuario']) && $tarefas['id_usuario'] == $usuario['id_usuario']) ? 'selected' : '' ?>>
                            <?= htmlspecialchars($usuario['nome_usuario']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
</div>
            <br>
            <button type="submit">Salvar</button>
        </form>
    </div>

        
    </body>
    </html>