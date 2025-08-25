
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

<form method="POST">
    Nome do jogador: <input type="text" name="nome" value="<?= $dado['nome'] ?>" required><br>
    Posição do jogador: <input type="text" name="posicao" value="<?= $dado['posicao'] ?>" required><br>
    Número da camisa: <input type="number" name="numero_camisa" value="<?= $dado['numero_camisa'] ?>" required><br>
      Time do jogador: 
        <select name="time_id" required>
        <option value="">Selecione o time</option>
        <?php foreach ($times as $time): ?>
        <option value="<?php echo $time['id']; ?>"><?php echo htmlspecialchars($time['nome']); ?></option>
        <?php endforeach; ?>
        </select><br><br>
    <input type="submit" value="Salvar">
</form>