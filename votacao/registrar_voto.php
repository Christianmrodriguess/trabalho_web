<?php
include "../protecao.php";
include "../conexao.php";
?>

<link rel="stylesheet" href="../css/style.css">

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_eleitor = $_POST["id_eleitor"];
    $id_candidato = $_POST["id_candidato"];

    $sql1 = "INSERT INTO votos (id_eleitor, id_candidato) VALUES ($id_eleitor, $id_candidato)";
    $conn->query($sql1);

    $sql2 = "UPDATE eleitores SET votou = 1 WHERE id = $id_eleitor";
    $conn->query($sql2);

    $sql3 = "UPDATE candidatos SET votos = votos + 1 WHERE id = $id_candidato";
    $conn->query($sql3);

    echo '<div class="container">
            <div class="sucesso">Voto registrado com sucesso!</div>
            <a class="botao" href="../index.php">Voltar</a>
        </div>';
}
?>