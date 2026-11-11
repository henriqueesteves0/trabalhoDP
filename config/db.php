<?php
/**
 * Arquivo de conexão com o banco de dados utilizando PDO.
 * Centralizar a conexão em um único arquivo é, em si, um exemplo de
 * reaproveitamento de código: qualquer página do site que precise
 * consultar o banco simplesmente inclui este arquivo, em vez de
 * repetir os dados de acesso em cada página.
 */

$host   = "localhost";
$dbname = "loja_php";
$user   = "root";
$pass   = "";
$charset = "utf8mb4";

$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";

$opcoes = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $opcoes);
} catch (PDOException $e) {
    die("Erro ao conectar ao banco de dados: " . $e->getMessage());
}
