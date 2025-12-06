<?php
include "../protecao.php";
include "../conexao.php";
?>

<link rel="stylesheet" href="../css/style.css">

<div class="form-container">
    <h2>Adicionar Eleitor</h2>

    <a class="botao" href="listar.php">Cancelar</a>

    <form method="POST" class="form-box">
        <label>Nome:</label>
        <input type="text" name="nome" required>

        <label>CPF:</label>
        <input type="text" name="cpf" maxlength="11" pattern="\d{11}" required>

        <button type="submit" class="botao">Salvar</button>
        <button type="reset" class="botao">Limpar</button>
    </form>
</div>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];

    $sql = "INSERT INTO eleitores (nome, cpf) VALUES ('$nome', '$cpf')";

    if ($conn->query($sql)) {
        header("Location: listar.php");
        exit;
    } else {
        echo "Erro ao salvar: " . $conn->error;
    }
}
?>