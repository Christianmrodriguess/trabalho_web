<?php
$conn = mysqli_connect("localhost", "root", "", "votacao");

if (!$conn) {
    die("Conexão não pôde ser estabelecida: " . mysqli_connect_error());
}
?>