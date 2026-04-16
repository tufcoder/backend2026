<?php

$host = "db";
$db = "app_db";
$user = "app_user";
$pass = "app_pass";
$data_source_name = "mysql:host=$host;dbname=$db;charset=utf8mb4";

try {
    $pdo = new PDO($data_source_name, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (PDOException $e) {
    die("Erro de conexão: " . $e->getMessage());
}
