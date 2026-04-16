<?php

require_once "conecta.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST["nome"];
    $preco = $_POST["preco"];
    $quantidade = $_POST["quantidade"];
    $id = $_POST["id"];

    $statement = $pdo->prepare("
        UPDATE produtos
        SET
            nome = ?,
            preco = ?,
            quantidade = ?
        WHERE id = ?;
    ");
    $statement->execute([$nome, $preco, $quantidade, $id]);
    header("Location: relatorio.php?msg=sucesso");
    exit;
}

$id = $_GET["id"] ?? 0;

$statement = $pdo->prepare("SELECT * FROM produtos WHERE id = ?");
$statement->execute([$id]);
$p = $statement->fetch();

include_once "header.php";
?>

<h2>Alterar Produto</h2>

<form method="POST">
    <input type="hidden" name="id" value="<?= $p["id"] ?>">
    <input type="text" name="nome" value="<?= $p["nome"] ?>" required><br><br>
    <input type="number" step="0.01" name="preco" value="<?= $p["preco"] ?>" required><br><br>
    <input type="text" name="quantidade" value="<?= $p["quantidade"] ?>" required><br><br>
    <button type="submit">Atualizar</button>
</form>

<?php include_once "footer.php"; ?>