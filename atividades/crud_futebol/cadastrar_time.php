<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php
include("conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $cidade = $_POST["cidade"];

    $sql = "INSERT INTO times (nome, cidade) VALUES ('$nome', '$cidade')";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        echo "Time cadastrado com sucesso!";
    }else
        echo "Erro ao cadastrar!";
}


?>

<div class="container-fluid mt-4">
        <div class="titulo">
            <h1 class="h1 text-center">Cadastrar Time</h1>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="POST" class="card p-4 shadow">
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome do time:</label>
                        <input type="text" class="form-control" name="nome" id="nome" required>
                    </div>

                    <div class="mb-3">
                        <label for="cidade" class="form-label">Cidade:</label>
                        <input type="text" class="form-control" name="cidade" id="cidade" required>
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="submit" class="btn btn-primary me-md-2">Cadastrar</button>
                        <a href='index.php' class="btn btn-secondary">Voltar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>




</body>
</html>

