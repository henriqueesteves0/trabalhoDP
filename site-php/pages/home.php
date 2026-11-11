<?php
// =====================================================================
// PÁGINA INICIAL - exibe os últimos artigos cadastrados (DINÂMICO)
// =====================================================================
$pdo = getConexao();

// Consulta os 3 artigos mais recentes
$stmt = $pdo->query('SELECT id, titulo, slug, resumo, autor, criado_em
                     FROM artigos ORDER BY criado_em DESC LIMIT 3');
$ultimos = $stmt->fetchAll();
?>
<section class="hero">
    <h1>Bem-vindo ao Portal de Artigos</h1>
    <p>Um site dinâmico em PHP, com conexão a banco de dados, URLs amigáveis
       e reaproveitamento de código por templates.</p>
    <a class="botao" href="<?= $base ?>/artigos">Ver todos os artigos</a>
</section>

<h2>Últimas publicações</h2>
<div class="grade">
    <?php foreach ($ultimos as $artigo): ?>
        <article class="card">
            <h3>
                <!-- URL AMIGÁVEL: /artigos/slug-do-artigo -->
                <a href="<?= $base ?>/artigos/<?= htmlspecialchars($artigo['slug']) ?>">
                    <?= htmlspecialchars($artigo['titulo']) ?>
                </a>
            </h3>
            <p class="meta">por <?= htmlspecialchars($artigo['autor']) ?></p>
            <p><?= htmlspecialchars($artigo['resumo']) ?></p>
            <a class="leia" href="<?= $base ?>/artigos/<?= htmlspecialchars($artigo['slug']) ?>">Leia mais &rarr;</a>
        </article>
    <?php endforeach; ?>
</div>
