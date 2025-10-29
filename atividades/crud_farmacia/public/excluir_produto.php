<?php
include("../includes/conexao.php");

if (isset($_GET['id'])) {
    $id_produtos = $_GET['id'];
} else {
    die("ID do produto não especificado!");
}

$id = (int)$_GET["id"];

$sql = "DELETE FROM produtos WHERE id_produtos = :id_produtos ";
$stmt = $conn->prepare($sql);
$stmt->bindParam(":id_produtos", $id_produtos);
if ($stmt->execute()) {
    header("Location: index.php");
    exit();
}

?>