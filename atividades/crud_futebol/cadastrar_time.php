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

<form method="POST">
    Cadastrar time
    Nome do time: <input type="text" name="nome"><br>
    Cidade: <input type="text" name="cidade"><br>
    <input type="submit" value="Cadastrar">
</form>



<a href='index.php'>Voltar</a>

