<?php
include("conexao.php");

$sql = "SELECT * FROM times"; 
$resultado = mysqli_query($conn, $sql);

echo "<h1>Lista de Times</h1>";

while ($linha = mysqli_fetch_array($resultado)) {
    echo "ID: " . $linha['id'] . "<br>";
    echo "Nome: " . $linha['nome'] . "<br>";
    echo "Cidade: " . $linha['cidade'] . "<br>";
    echo "<a href='editar_time.php?id=" . $linha['id'] . "'>Editar time</a> | ";
    echo "<a href='excluir_time.php?id=" . $linha['id'] . "'>Excluir</a>";
    echo "<br><br>";
}
?>

<a href='cadastrar_time.php'>Cadastrar novo</a>

<?php
include("conexao.php");

$sql = "SELECT * FROM jogadores"; 
$resultado = mysqli_query($conn, $sql);

echo "<h1>Lista de Jogadres</h1>";

while ($linha = mysqli_fetch_array($resultado)) {
    echo "ID: " . $linha['id'] . "<br>";
    echo "Nome: " . $linha['nome'] . "<br>";
    echo "Posição: " . $linha['posicao'] . "<br>";
    echo "Número da camisa: " . $linha['numero_camisa'] . "<br>";
    echo "<a href='editar_jogador.php?id=" . $linha['id'] . "'>Editar informações</a> | ";
    echo "<a href='excluir_jogador.php?id=" . $linha['id'] . "'>Excluir</a>";
    echo "<br><br>";
}
?>

<a href='cadastrar_jogador.php'>Cadastrar novo</a>

<?php
include("conexao.php");

$sql = "SELECT * FROM partidas"; 
$resultado = mysqli_query($conn, $sql);

echo "<h1>Lista de Partidas</h1>";

while ($linha = mysqli_fetch_array($resultado)) {
    echo "ID: " . $linha['id'] . "<br>";
    echo "Data da partida: " . $linha['data_jogo'] . "<br>";
    echo "Gols do time da casa: " . $linha['gols_casa'] . "<br>";
    echo "Gols do time de fora: " . $linha['gols_fora'] . "<br>";
    echo "<a href='editar_partida.php?id=" . $linha['id'] . "'>Editar informações</a> | ";
    echo "<a href='excluir_partida.php?id=" . $linha['id'] . "'>Excluir</a>";
    echo "<br><br>";
}
?>

<a href='cadastrar_partida.php'>Cadastrar novo</a>