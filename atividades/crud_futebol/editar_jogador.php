
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

        if ($numero_camisa < 1 || $numero_camisa > 99) {
    echo "<script>
            alert('Por favor, insira um número de 1 a 99');
            window.location.href = 'cadastrar_jogador.php';
          </script>";
    exit();
}
    
    $sql = "UPDATE jogadores SET nome=?, posicao=?, numero_camisa=? WHERE id=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssii", $nome, $posicao, $numero_camisa, $id);
    
    if (mysqli_stmt_execute($stmt)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Erro ao atualizar!";
    }
}
?>

<form method="POST">
    Nome do jogador: <input type="text" name="nome" value="<?= $dado['nome'] ?>" required><br>
    Posição do jogador: <input type="text" name="posicao" value="<?= $dado['posicao'] ?>" required><br>
    Número da camisa: <input type="number" name="numero_camisa" value="<?= $dado['numero_camisa'] ?>" required><br>
    <input type="submit" value="Salvar">
</form>