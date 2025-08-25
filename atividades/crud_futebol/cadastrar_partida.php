<?php
include("conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data_jogo = $_POST["data_jogo"];
    $gols_casa = $_POST["gols_casa"];
    $gols_fora = $_POST["gols_fora"];
    $time_casa_id = $_POST["time_casa_id"];
    $time_fora_id = $_POST["time_fora_id"];

    if ($time_casa_id == $time_fora_id) {
        echo "Erro: O time da casa e o time visitante não podem ser o mesmo!";
    } else {
        $sql = "INSERT INTO partidas (time_casa_id, time_fora_id, data_jogo, gols_casa, gols_fora) 
                VALUES (?, ?, ?, ?, ?)";
        
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "iisii", $time_casa_id, $time_fora_id, $data_jogo, $gols_casa, $gols_fora);
        
        if (mysqli_stmt_execute($stmt)) {
            echo "Partida cadastrada com sucesso!";
        } else {
            echo "Erro ao cadastrar: " . mysqli_error($conn);
        }
        mysqli_stmt_close($stmt);
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

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Cadastrar Partida</title>
</head>
<body>
    <div class="container-fluid mt-4">
        <div class="titulo">
            <h1 class="h1 text-center">Cadastrar Partida</h1>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <form method="POST" class="card p-4 shadow">
                    <div class="mb-3">
                        <label for="data_jogo" class="form-label">Data da partida:</label>
                        <input type="date" class="form-control" name="data_jogo" id="data_jogo" required>
                    </div>

                    <div class="mb-3">
                        <label for="time_casa_id" class="form-label">Time da casa:</label>
                        <select class="form-select" name="time_casa_id" id="time_casa_id" required>
                            <option value="">Selecione o time</option>
                            <?php foreach ($times as $time): ?>
                                <option value="<?php echo $time['id']; ?>"><?php echo htmlspecialchars($time['nome']); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="gols_casa" class="form-label">Gols do time da casa:</label>
                        <input type="number" class="form-control" name="gols_casa" id="gols_casa" min="0" required>
                    </div>

                    <div class="mb-3">
                        <label for="time_fora_id" class="form-label">Time visitante:</label>
                        <select class="form-select" name="time_fora_id" id="time_fora_id" required>
                            <option value="">Selecione o time</option>
                            <?php foreach ($times as $time): ?>
                                <option value="<?php echo $time['id']; ?>"><?php echo htmlspecialchars($time['nome']); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="gols_fora" class="form-label">Gols do time visitante:</label>
                        <input type="number" class="form-control" name="gols_fora" id="gols_fora" min="0" required>
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="submit" class="btn btn-primary">Cadastrar Partida</button>
                        <a href='index.php' class="btn btn-secondary">Voltar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>