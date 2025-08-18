
<?php
include("conexao.php");


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

<form method="POST">
    Data da partida: <input type="date" name="data_jogo" value="<?= $dado['data_jogo'] ?>" required><br>
    Gols do time da casa: <input type="number" name="gols_casa" value="<?= $dado['gols_casa'] ?>" required><br>
    Gols do time de fora: <input type="number" name="gols_fora" value="<?= $dado['gols_fora'] ?>" required><br>
    <input type="submit" value="Salvar">
</form>