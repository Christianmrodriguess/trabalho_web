<?php
include "../protecao.php";
include "../conexao.php";
?>

<link rel="stylesheet" href="../css/style.css">

<div class="container">
    <a class="botao" href="../index.php">Voltar</a>

    <h2>Votação</h2>

    <form method="POST" class="form-box">

        <label>Digite seu CPF:</label>
        <input type="text" name="cpf" maxlength="11" pattern="\d{11}" required>

        <button type="submit" class="botao">Continuar</button>

    </form>
</div>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cpf = $_POST["cpf"];

    $sql = "SELECT * FROM eleitores WHERE cpf='$cpf'";
    $result = $conn->query($sql);

    if ($result->num_rows == 0) {
        echo "<div class='erro'>CPF não encontrado!</div>";
        exit;
    }

    $eleitor = $result->fetch_assoc();

    if ($eleitor["votou"] == 1) {
        echo '<div class="erro">Você já votou!</div>';
        exit;
    }

    $id = $eleitor["id"];

    header("Location: escolher_candidato.php?id=$id");
}
?>