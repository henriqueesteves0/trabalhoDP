<?php
// =====================================================================
// CONEXÃO COM O BANCO DE DADOS (PDO)
// ---------------------------------------------------------------------
// Centraliza a criação da conexão para que todo o sistema reaproveite
// o mesmo objeto. O uso de PDO permite trocar de SGBD com facilidade e,
// principalmente, utilizar CONSULTAS PREPARADAS (proteção contra SQL
// Injection).
// =====================================================================

// ---- Dados de acesso (ajuste conforme o seu ambiente) ----
define('DB_HOST', 'localhost');
define('DB_NAME', 'portal_artigos');
define('DB_USER', 'root');
define('DB_PASS', '');      // senha padrão do XAMPP/WAMP costuma ser vazia
define('DB_CHARSET', 'utf8mb4');

function getConexao(): PDO
{
    // Mantém uma única conexão por requisição (padrão singleton simples)
    static $pdo = null;

    if ($pdo === null) {
        $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET;

        $opcoes = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,     // erros viram exceções
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,          // retorna arrays associativos
            PDO::ATTR_EMULATE_PREPARES   => false,                    // consultas preparadas reais
        ];

        try {
            $pdo = new PDO($dsn, DB_USER, DB_PASS, $opcoes);
        } catch (PDOException $e) {
            // Em produção, registre o erro em log e mostre mensagem genérica
            http_response_code(500);
            exit('Erro ao conectar ao banco de dados. Verifique as configurações.');
        }
    }

    return $pdo;
}
