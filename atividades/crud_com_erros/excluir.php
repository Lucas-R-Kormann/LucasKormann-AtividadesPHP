<?php
// Exclusão com risco de SQL Injection e sem confirmação
include("conexao.php");

if (!isset($_GET["id"]) || !is_numeric($_GET["id"])) {
    die("ID inválido!");
}

$id = (int)$_GET["id"];

$sql = "DELETE FROM usuarios WHERE id = ?";
$stmt = mysqli_prepare($conn, $sql);
header("Location: index.php");
?>