<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title><?php echo isset($titulo_pagina) ? $titulo_pagina . " - Loja PHP" : "Loja PHP"; ?></title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<header class="cabecalho">
    <h1>Loja PHP</h1>
    <?php include __DIR__ . "/menu.php"; ?>
</header>

<main class="conteudo">
