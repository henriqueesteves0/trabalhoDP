<?php
// =====================================================================
// INDEX.PHP  ->  FRONT CONTROLLER (ponto único de entrada)
// ---------------------------------------------------------------------
// Todas as requisições passam por aqui (graças ao .htaccess). Este
// arquivo interpreta a URL AMIGÁVEL e decide qual página exibir,
// caracterizando um site DINÂMICO com roteamento próprio.
// =====================================================================

require_once __DIR__ . '/config/database.php';

// 1) Captura a rota enviada pelo .htaccess (ex.: "artigos/5")
$url = $_GET['url'] ?? '';
$url = trim($url, '/');
$partes = $url === '' ? [] : explode('/', $url);

// 2) Define a página e o parâmetro a partir das partes da URL
$pagina    = $partes[0] ?? 'home';   // primeira parte = seção
$parametro = $partes[1] ?? null;     // segunda parte = id/slug do recurso

// 3) Roteamento: associa cada rota ao arquivo de conteúdo correspondente
switch ($pagina) {
    case '':
    case 'home':
        $arquivo = __DIR__ . '/pages/home.php';
        break;

    case 'artigos':
        // Sem parâmetro -> lista de artigos; com parâmetro -> artigo único
        $arquivo = $parametro === null
            ? __DIR__ . '/pages/artigos.php'
            : __DIR__ . '/pages/artigo.php';
        break;

    case 'sobre':
        $arquivo = __DIR__ . '/pages/sobre.php';
        break;

    default:
        // Rota inexistente -> página 404
        http_response_code(404);
        $arquivo = __DIR__ . '/pages/404.php';
        break;
}

// 4) Renderiza a página dentro dos templates reaproveitáveis
require __DIR__ . '/templates/header.php';
require $arquivo;
require __DIR__ . '/templates/footer.php';
