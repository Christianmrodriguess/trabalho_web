<?php
include "../protecao.php";
include "../conexao.php";
?>

<link rel="stylesheet" href="../css/style.css">

<div class="container">
    <h2>Adicionar Candidato</h2>

    <a class="botao" href="listar.php">Cancelar</a>

    <form method="POST" class="form-box">
        <label>Nome:</label>
        <input type="text" name="nome" required>

        <label>Partido:</label>
        <input type="text" name="partido" required>

        <button type="submit" class="botao">Salvar</button>
        <button type="reset" class="botao">Limpar</button>
    </form>
</div>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $partido = $_POST["partido"];

    $sql = "INSERT INTO candidatos (nome, partido) VALUES ('$nome', '$partido')";

    if ($conn->query($sql)) {
        header("Location: listar.php");
        exit;
    } else {
        echo "Erro ao salvar: " . $conn->error;
    }
}
?>