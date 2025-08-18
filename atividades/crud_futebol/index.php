<?php
include("conexao.php");

$sql = "SELECT * FROM times"; 
$resultado = mysqli_query($conn, $sql);

echo "<h1>Lista de Times</h1>";

while ($linha = mysqli_fetch_array($resultado)) {
    echo "ID: " . $linha['id'] . "<br>";
    echo "Nome: " . $linha['nome'] . "<br>";
    echo "Email: " . $linha['email'] . "<br>";
    echo "<a href='editar.php?id=" . $linha['id'] . "'>Editar</a> | ";
    echo "<a href='excluir.php?id=" . $linha['id'] . "'>Excluir</a>";
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
    echo "Email: " . $linha['email'] . "<br>";
    echo "<a href='editar.php?id=" . $linha['id'] . "'>Editar</a> | ";
    echo "<a href='excluir.php?id=" . $linha['id'] . "'>Excluir</a>";
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
    echo "Nome: " . $linha['nome'] . "<br>";
    echo "Email: " . $linha['email'] . "<br>";
    echo "<a href='editar.php?id=" . $linha['id'] . "'>Editar</a> | ";
    echo "<a href='excluir.php?id=" . $linha['id'] . "'>Excluir</a>";
    echo "<br><br>";
}
?>

<a href='cadastrar_partida.php'>Cadastrar novo</a>