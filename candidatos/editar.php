<?php
include "../protecao.php";
include "../conexao.php";
?>

<link rel="stylesheet" href="../css/style.css">

<?php
$id = $_GET["id"];
$result = $conn->query("SELECT * FROM candidatos WHERE id=$id");
$candidato = $result->fetch_assoc();
?>

<div class="form-container">
    <h2>Editar Candidato</h2>

    <a class="botao" href="listar.php">Cancelar</a>

    <form method="POST" class="form-box">
        <label>Nome:</label>
        <input type="text" name="nome" value="<?= $candidato['nome'] ?>" required>

        <label>Partido:</label>
        <input type="text" name="partido" value="<?= $candidato['partido'] ?>" required>

        <button type="submit" class="botao">Atualizar</button>
    </form>
</div>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $partido = $_POST["partido"];

    $sql = "UPDATE candidatos SET nome='$nome', partido='$partido' WHERE id=$id";

    if ($conn->query($sql)) {
        header("Location: listar.php");
        exit;
    } else {
        echo "Erro ao atualizar: " . $conn->error;
    }
}
?>