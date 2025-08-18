<?php
include("conexao.php");

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

    $sql = "INSERT INTO jogadores (nome, posicao, numero_camisa) VALUES ('$nome', '$posicao', '$numero_camisa')";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        echo "Jogador cadastrado com sucesso!";
    }else
        echo "Erro ao cadastrar!";
}


?>

<form method="POST">
    Cadastrar jogador<br>
    Nome do jogador: <input type="text" name="nome"><br>
    Posição: <input type="text" name="posicao"><br>
    Número da camisa: <input type="number" name="numero_camisa"><br>
    <input type="submit" value="Cadastrar">
</form>



<a href='index.php'>Voltar</a>