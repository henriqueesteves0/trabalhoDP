<?php
// =====================================================================
// LISTA DE ARTIGOS - todo o conteúdo vem do banco (DINÂMICO)
// =====================================================================
$pdo = getConexao();

$stmt = $pdo->query('SELECT id, titulo, slug, resumo, autor, criado_em
                     FROM artigos ORDER BY criado_em DESC');
$artigos = $stmt->fetchAll();
?>
<h1>Todos os artigos</h1>

<div class="lista-artigos">
    <?php foreach ($artigos as $artigo): ?>
        <article class="item">
            <h2>
                <a href="<?= $base ?>/artigos/<?= htmlspecialchars($artigo['slug']) ?>">
                    <?= htmlspecialchars($artigo['titulo']) ?>
                </a>
            </h2>
            <p class="meta">
                por <?= htmlspecialchars($artigo['autor']) ?>
                em <?= date('d/m/Y', strtotime($artigo['criado_em'])) ?>
            </p>
            <p><?= htmlspecialchars($artigo['resumo']) ?></p>
        </article>
    <?php endforeach; ?>
</div>
