<?php

require_once "conecta.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST["id"];

    $statement = $pdo->prepare("
        DELETE FROM produtos WHERE id = ?;
    ");
    $statement->execute([$id]);
    header("Location: relatorio.php?msg=excluido");
    exit;
}
