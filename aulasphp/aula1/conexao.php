<?php
$usuario = 'root';
$senha = ''; // Use a senha que você configurou
$database = 'sistema'; // Nome do novo banco
$host = 'localhost:4406'; // Confirme se a porta está correta

$mysqli = new mysqli($host, $usuario, $senha, $database);

if($mysqli->connect_error) {
    die("Falha ao conectar ao banco de dados: " . $mysqli->connect_error);
}
?>