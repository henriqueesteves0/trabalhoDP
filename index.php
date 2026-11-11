<?php
/**
 * index.php funciona como "front controller" do site: todas as
 * requisições reescritas pelo .htaccess chegam até aqui através do
 * parâmetro "pagina". Esse padrão evita que cada página precise
 * repetir o cabeçalho, o menu e o rodapé (reaproveitamento de
 * código) e permite que a URL exibida ao usuário seja amigável,
 * como "/produtos" em vez de "/index.php?pagina=produtos".
 */

$pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 'home';

// Lista branca de páginas permitidas, por segurança
$paginas_validas = ['home', 'produtos', 'sobre', 'contato'];

if (!in_array($pagina, $paginas_validas)) {
    http_response_code(404);
    $pagina = '404';
}

$arquivo_pagina = __DIR__ . "/pages/{$pagina}.php";

include __DIR__ . "/includes/header.php";

if (file_exists($arquivo_pagina)) {
    include $arquivo_pagina;
} else {
    echo "<h2>Página não encontrada</h2>";
    echo "<p>O conteúdo solicitado não existe.</p>";
}

include __DIR__ . "/includes/footer.php";
