<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php
include("conexao.php");


if (!isset($_GET["id"]) || !is_numeric($_GET["id"])) {
    die("ID inválido!");
}

$id = (int)$_GET["id"];

$sql = "SELECT * FROM jogadores WHERE id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$dado = mysqli_fetch_assoc($result);

if (!$dado) {
    die("Time não encontrado!");
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $posicao = $_POST["posicao"];
    $numero_camisa = $_POST["numero_camisa"];
    $time_id = $_POST["time_id"];

        if ($numero_camisa < 1 || $numero_camisa > 99) {
    echo "<script>
            alert('Por favor, insira um número de 1 a 99');
            window.location.href = 'cadastrar_jogador.php';
          </script>";
    exit();
}
    
    $sql = "UPDATE jogadores SET nome=?, posicao=?, numero_camisa=?, time_id=? WHERE id=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssiii", $nome, $posicao, $numero_camisa, $time_id, $id);
    
    if (mysqli_stmt_execute($stmt)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Erro ao atualizar!";
    }
}

$times = [];
$sql_times = "SELECT id, nome FROM times ORDER BY nome";
$res_times = mysqli_query($conn, $sql_times);
if ($res_times) {
    while ($row = mysqli_fetch_assoc($res_times)) {
        $times[] = $row;
    }
}

?>

 <h1 class="h1">Editar Jogador</h1>

<div class="container-fluid">
    <div class="lista">
        <form method="POST">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome do jogador:</label>
                <input type="text" class="form-control" name="nome" id="nome" 
                       value="<?= htmlspecialchars($dado['nome'] ?? '') ?>" required>
            </div>

            <div class="mb-3">
                <label for="posicao" class="form-label">Posição do jogador:</label>
                <input type="text" class="form-control" name="posicao" id="posicao" 
                       value="<?= htmlspecialchars($dado['posicao'] ?? '') ?>" required>
            </div>

            <div class="mb-3">
                <label for="numero_camisa" class="form-label">Número da camisa:</label>
                <input type="number" class="form-control" name="numero_camisa" id="numero_camisa" 
                       value="<?= htmlspecialchars($dado['numero_camisa'] ?? '') ?>" 
                       min="1" max="99" required>
            </div>

            <div class="mb-3">
                <label for="time_id" class="form-label">Time do jogador:</label>
                <select class="form-select" name="time_id" id="time_id" required>
                    <option value="">Selecione o time</option>
                    <?php foreach ($times as $time): ?>
                        <option value="<?php echo $time['id']; ?>" 
                            <?= ($time['id'] == ($dado['time_id'] ?? '')) ? 'selected' : '' ?>>
                            <?php echo htmlspecialchars($time['nome']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="index.php" class="btn btn-primary">Cancelar</a>
        </form>
    </div>
</div>
</body>
</html>
