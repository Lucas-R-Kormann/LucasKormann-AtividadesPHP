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

$sql = "SELECT * FROM times WHERE id=?";
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
    $cidade = $_POST["cidade"];
    
    $sql = "UPDATE times SET nome=?, cidade=? WHERE id=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssi", $nome, $cidade, $id);
    
    if (mysqli_stmt_execute($stmt)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Erro ao atualizar!";
    }
}
?>

<h1 class="h1">Editar time</h1>


<div class="container-fluid">


    <div class="lista">
        <form method="POST">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome do time:</label>
                <input type="text" class="form-control" name="nome" id="nome" 
                       value="<?= htmlspecialchars($dado['nome'] ?? '') ?>" required>
            </div>

            <div class="mb-3">
                <label for="cidade" class="form-label">Cidade do time:</label>
                <input type="text" class="form-control" name="cidade" id="cidade" 
                       value="<?= htmlspecialchars($dado['cidade'] ?? '') ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="lista_times.php" class="btn btn-primary">Cancelar</a>
        </form>
    </div>
</div>
</body>
</html>
