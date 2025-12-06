<?php
session_start();
?>

<link rel="stylesheet" href="css/style.css">

<div class="form-container">
    <h2>Login</h2>

    <form method="POST" class="form-box">
        <label>Nome:</label>
        <input type="text" name="nome" required>

        <label>Email:</label>
        <input type="text" name="email" required>

        <label>Senha:</label>
        <input type="password" name="senha" required>

        <button type="submit" class="botao">Entrar</button>
    </form>
</div>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "conexao.php";

    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $sql = "SELECT * FROM usuarios WHERE nome='$nome' AND email='$email' AND senha='$senha'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $_SESSION["logado"] = true;
        header("Location: index.php");
        exit;
    } else {
        echo "<p style='color:red; text-align:center;'>Usuário ou senha incorretos!</p>";
    }
}
?>