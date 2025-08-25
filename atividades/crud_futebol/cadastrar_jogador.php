<?php
include("conexao.php");

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

    $sql = "INSERT INTO jogadores (nome, posicao, numero_camisa, time_id) VALUES (?, ?, ?, ?)";
    
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssii", $nome, $posicao, $numero_camisa, $time_id);

    if (mysqli_stmt_execute($stmt)) {
        echo "Jogador cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar " . mysqli_error($conn);
    }
    mysqli_stmt_close($stmt);
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
    Cadastrar jogador<br>
    Nome do jogador: <input type="text" name="nome"><br>
    Posição: <input type="text" name="posicao"><br>
    Número da camisa: <input type="number" name="numero_camisa"><br>
    Time do jogador: 
        <select name="time_id" required>
        <option value="">Selecione o time</option>
        <?php foreach ($times as $time): ?>
        <option value="<?php echo $time['id']; ?>"><?php echo htmlspecialchars($time['nome']); ?></option>
        <?php endforeach; ?>
        </select><br><br>
    <input type="submit" value="Cadastrar">

</form>



<a href='index.php'>Voltar</a>