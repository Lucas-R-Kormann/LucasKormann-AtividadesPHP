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
<html>
<head>
    <title>Cadastrar Partida</title>
</head>
<body>
    <h2>Cadastrar Partida</h2>
    <form method="POST">
        Data da partida: <input type="date" name="data_jogo" required><br><br>
        
        Time da casa: 
        <select name="time_casa_id" required>
            <option value="">Selecione o time</option>
            <?php foreach ($times as $time): ?>
                <option value="<?php echo $time['id']; ?>"><?php echo htmlspecialchars($time['nome']); ?></option>
            <?php endforeach; ?>
        </select><br><br>
        
        Gols do time da casa: <input type="number" name="gols_casa" min="0" required><br><br>
        
        Time visitante: 
        <select name="time_fora_id" required>
            <option value="">Selecione o time</option>
            <?php foreach ($times as $time): ?>
                <option value="<?php echo $time['id']; ?>"><?php echo htmlspecialchars($time['nome']); ?></option>
            <?php endforeach; ?>
        </select><br><br>
        
        Gols do time visitante: <input type="number" name="gols_fora" min="0" required><br><br>
        
        <input type="submit" value="Cadastrar Partida">
    </form>

    <br>
    <a href='index.php'>Voltar</a>
</body>
</html>