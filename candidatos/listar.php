<?php
include "../protecao.php";
include "../conexao.php";
?>

<link rel="stylesheet" href="../css/style.css">
<div class="container">

    <h2>Candidatos</h2>

    <a class="botao" href="adicionar.php">Adicionar Candidato</a>
    <a class="botao" href="../index.php">Voltar</a>

    <form method="GET">
        <input type="text" name="busca" placeholder="Buscar por nome">
        <button type="submit">Buscar</button>
    </form>

    <?php
    $busca = "";
    if (isset($_GET["busca"])) {
        $busca = $_GET["busca"];
        $sql = "SELECT * FROM candidatos WHERE nome LIKE '%$busca%'";
    } else {
        $sql = "SELECT * FROM candidatos";
    }

    $result = $conn->query($sql);

    echo "<table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Partido</th>
                <th>Votos</th>
                <th>Ações</th>
            </tr>";

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['nome']}</td>
                    <td>{$row['partido']}</td>
                    <td>{$row['votos']}</td>
                    <td>
                        <a class='acao' href='editar.php?id={$row['id']}'>Editar</a>
                        <a class='acao' href='excluir.php?id={$row['id']}'>Excluir</a>
                    </td>
                </tr>";
        }
    }
    echo "</table>";
    ?>

</div>