<?php

$serverName = "localhost";
$userName = "root";
$password = "root";

$dbName = "crud_system";

$conn = new mysqli($serverName, $userName, $password, $dbName);

if ($conn -> connect_error){
    die("Conexão falhou " .  $conn -> connect_error);
};
?>