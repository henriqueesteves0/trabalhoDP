<?php
// =====================================================================
// PÁGINA SOBRE - conteúdo institucional (estático dentro do template)
// =====================================================================
?>
<h1>Sobre o projeto</h1>
<p>Este portal foi desenvolvido como atividade prática da disciplina de
   <strong>Desenvolvimento Web (JS e PHP)</strong>. Ele demonstra, na prática,
   os quatro conceitos estudados no documento de pesquisa:</p>

<ul class="lista-conceitos">
    <li><strong>Templates:</strong> o cabeçalho e o rodapé ficam em
        <code>templates/header.php</code> e <code>templates/footer.php</code>,
        reaproveitados por todas as páginas.</li>
    <li><strong>Site dinâmico:</strong> os artigos são lidos do banco de dados
        e renderizados em tempo de execução pelo PHP.</li>
    <li><strong>URLs amigáveis:</strong> endereços como
        <code>/artigos/o-que-sao-sites-dinamicos</code> são reescritos pelo
        <code>.htaccess</code> e interpretados pelo <code>index.php</code>.</li>
    <li><strong>Banco de dados:</strong> a conexão usa <strong>PDO</strong> com
        consultas preparadas, em <code>config/database.php</code>.</li>
</ul>
