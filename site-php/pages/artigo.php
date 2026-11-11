<?php
// =====================================================================
// ARTIGO ÚNICO - busca pelo SLUG vindo da URL amigável
// Usa CONSULTA PREPARADA (proteção contra SQL Injection).
// =====================================================================
$pdo = getConexao();

$slug = $parametro; // capturado pelo index.php a partir da URL

// Consulta preparada: o valor nunca é concatenado diretamente no SQL
$stmt = $pdo->prepare('SELECT * FROM artigos WHERE slug = :slug LIMIT 1');
$stmt->execute([':slug' => $slug]);
$artigo = $stmt->fetch();

if (!$artigo) {
    http_response_code(404);
    echo '<h1>Artigo não encontrado</h1>';
    echo '<p>O artigo solicitado não existe. <a href="' . $base . '/artigos">Voltar à lista</a>.</p>';
    return;
}
?>
<article class="post">
    <h1><?= htmlspecialchars($artigo['titulo']) ?></h1>
    <p class="meta">
        por <?= htmlspecialchars($artigo['autor']) ?>
        em <?= date('d/m/Y', strtotime($artigo['criado_em'])) ?>
    </p>

    <?php
    // O conteúdo é armazenado com quebras de linha simples;
    // nl2br + htmlspecialchars preservam os parágrafos com segurança.
    echo '<div class="texto">' . nl2br(htmlspecialchars($artigo['conteudo'])) . '</div>';
    ?>

    <p><a class="leia" href="<?= $base ?>/artigos">&larr; Voltar para todos os artigos</a></p>
</article>
