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

$times = [];
$sql_times = "SELECT id, nome FROM times ORDER BY nome";
$res_times = mysqli_query($conn, $sql_times);
if ($res_times) {
    while ($row = mysqli_fetch_assoc($res_times)) {
        $times[] = $row;
    }
}


if (!isset($_GET["id"]) || !is_numeric($_GET["id"])) {
    die("ID inválido!");
}

$id = (int)$_GET["id"];

$sql = "SELECT * FROM partidas WHERE id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$dado = mysqli_fetch_assoc($result);

if (!$dado) {
    die("Partida não encontrada!");
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data_jogo = $_POST["data_jogo"];
    $gols_casa = $_POST["gols_casa"];
    $gols_fora = $_POST["gols_fora"];
    
    $sql = "UPDATE partidas SET data_jogo=?, gols_casa=?, gols_fora=? WHERE id=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "siii", $data_jogo, $gols_casa, $gols_fora, $id);
    
    if (mysqli_stmt_execute($stmt)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Erro ao atualizar!";
    }
}
?>

<h1 class="h1">Editar Partida</h1>

<div class="container-fluid">

    <div class="lista">
        <form method="POST">
            <div class="mb-3">
                <label for="data_jogo" class="form-label">Data da partida:</label>
                <input type="date" class="form-control" name="data_jogo" id="data_jogo" 
                       value="<?= htmlspecialchars($dado['data_jogo'] ?? '') ?>" required>
            </div>

            <div class="mb-3">
                <label for="time_casa_id" class="form-label">Time da casa:</label>
                <select class="form-select" name="time_casa_id" id="time_casa_id" required>
                    <option value="">Selecione o time da casa</option>
                    <?php foreach ($times as $time): ?>
                        <option value="<?php echo $time['id']; ?>" 
                            <?= ($time['id'] == ($dado['time_casa_id'] ?? '')) ? 'selected' : '' ?>>
                            <?php echo htmlspecialchars($time['nome']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="time_fora_id" class="form-label">Time visitante:</label>
                <select class="form-select" name="time_fora_id" id="time_fora_id" required>
                    <option value="">Selecione o time visitante</option>
                    <?php foreach ($times as $time): ?>
                        <option value="<?php echo $time['id']; ?>" 
                            <?= ($time['id'] == ($dado['time_fora_id'] ?? '')) ? 'selected' : '' ?>>
                            <?php echo htmlspecialchars($time['nome']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="gols_casa" class="form-label">Gols do time da casa:</label>
                <input type="number" class="form-control" name="gols_casa" id="gols_casa" 
                       value="<?= htmlspecialchars($dado['gols_casa'] ?? '') ?>" 
                       min="0" required>
            </div>

            <div class="mb-3">
                <label for="gols_fora" class="form-label">Gols do time visitante:</label>
                <input type="number" class="form-control" name="gols_fora" id="gols_fora" 
                       value="<?= htmlspecialchars($dado['gols_fora'] ?? '') ?>" 
                       min="0" required>
            </div>

            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="lista_partidas.php" class="btn btn-primary">Cancelar</a>
        </form>
    </div>
</div>
</body>
</html>
