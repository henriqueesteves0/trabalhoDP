<?php
// =====================================================================
// TEMPLATE DE CABEÇALHO  (reaproveitamento de código)
// Incluído no topo de TODAS as páginas pelo index.php.
// Alterar o menu ou o visual aqui reflete em todo o site (princípio DRY).
// =====================================================================

// Caminho base para montar links e referências a arquivos estáticos
$base = '/site-php'; // ajuste se publicar em outra pasta/domínio
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal de Artigos | Desenvolvimento Web com PHP</title>
    <link rel="stylesheet" href="<?= $base ?>/public/css/style.css">
</head>
<body>
    <header class="topo">
        <div class="container">
            <a href="<?= $base ?>/" class="logo">Portal&nbsp;de&nbsp;Artigos</a>
            <nav class="menu">
                <a href="<?= $base ?>/">Início</a>
                <a href="<?= $base ?>/artigos">Artigos</a>
                <a href="<?= $base ?>/sobre">Sobre</a>
            </nav>
        </div>
    </header>

    <main class="container conteudo">
