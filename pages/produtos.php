<?php
$titulo_pagina = "Produtos";

// A conexão é reaproveitada: basta incluir o arquivo de configuração
require_once __DIR__ . "/../config/db.php";

$sql = "SELECT id, nome, descricao, preco FROM produtos ORDER BY nome";
$stmt = $pdo->query($sql);
$produtos = $stmt->fetchAll();
?>

<h2>Nossos Produtos</h2>

<?php if (count($produtos) === 0): ?>
    <p>Nenhum produto cadastrado no momento.</p>
<?php else: ?>
    <div class="lista-produtos">
        <?php foreach ($produtos as $produto): ?>
            <div class="card-produto">
                <h3><?php echo htmlspecialchars($produto['nome']); ?></h3>
                <p><?php echo htmlspecialchars($produto['descricao']); ?></p>
                <p class="preco">
                    R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?>
                </p>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
