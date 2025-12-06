<?php
include "../protecao.php";
include "../conexao.php";
?>

<link rel="stylesheet" href="../css/style.css">

<?php
$id_eleitor = $_GET["id"];

$candidatos = $conn->query("SELECT * FROM candidatos");

if ($candidatos->num_rows == 0) {
    echo '<div class="container">
            <div class="erro">Nenhum candidato disponível para votar!</div>
            <a class="botao" href="../index.php">Voltar</a>
        </div>';
    exit;
}
?>

<div class="container">
    <a class="botao" href="votacao.php">Voltar</a>

    <h2>Escolha seu candidato</h2>

    <form method="POST" action="registrar_voto.php" class="form-box">
        <input type="hidden" name="id_eleitor" value="<?= $id_eleitor ?>">

        <?php while ($c = $candidatos->fetch_assoc()) { ?>
            <label>
                <input type="radio" name="id_candidato" value="<?= $c['id'] ?>" required>
                <?= $c["nome"] ?> (<?= $c["partido"] ?>)
            </label><br>
        <?php } ?>

        <button type="submit" class="botao">Confirmar Voto</button>
    </form>
</div>