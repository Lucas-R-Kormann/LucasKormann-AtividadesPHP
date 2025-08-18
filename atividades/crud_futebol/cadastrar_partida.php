<?php
include("conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data_jogo = $_POST["data_jogo"];
    $gols_casa = $_POST["gols_casa"];
    $gols_fora = $_POST["gols_fora"];

    $sql = "INSERT INTO times (data_jogo, gols_casa, gols_fora) VALUES ('$data_jogo', '$gols_casa', '$gols_fora')";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        echo "Jogador cadastrado com sucesso!";
    }else
        echo "Erro ao cadastrar!";
}


?>

<form method="POST">
    Cadastrar partida
    Data da partida: <input type="date" name="data_jogo"><br>
    Gols do time da casa: <input type="number" name="gols_casa"><br>
    Gols do time de fora: <input type="number" name="gols_fora"><br>
    <input type="submit" value="Cadastrar">
</form>



<a href='index.php'>Voltar</a>