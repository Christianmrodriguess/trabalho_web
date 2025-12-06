<?php
include "../protecao.php";
include "../conexao.php";
?>

<link rel="stylesheet" href="../css/style.css">

<?php
$id = $_GET["id"];
$result = $conn->query("SELECT * FROM eleitores WHERE id=$id");
$eleitor = $result->fetch_assoc();
?>

<div class="form-container">
    <h2>Editar Eleitor</h2>

    <a class="botao" href="listar.php">Cancelar</a>

    <form method="POST" class="form-box">
        <label>Nome:</label>
        <input type="text" name="nome" value="<?= $eleitor['nome'] ?>" required>

        <label>CPF:</label>
        <input type="text" name="cpf" maxlength="11" pattern="\d{11}" value="<?= $eleitor['cpf'] ?>" required>

        <button type="submit" class="botao">Atualizar</button>
    </form>
</div>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];

    $sql = "UPDATE eleitores SET nome='$nome', cpf='$cpf' WHERE id=$id";

    if ($conn->query($sql)) {
        header("Location: listar.php");
        exit;
    } else {
        echo "Erro ao atualizar: " . $conn->error;
    }
}
?>