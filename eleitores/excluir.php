<?php
include "../protecao.php";
include "../conexao.php";
?>

<?php
$id = $_GET["id"];
$conn->query("DELETE FROM eleitores WHERE id=$id");
header("Location: listar.php");
?>