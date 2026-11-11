-- Criação do banco de dados utilizado pelo site
CREATE DATABASE IF NOT EXISTS loja_php CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE loja_php;

-- Tabela de produtos exibida dinamicamente na página "produtos"
CREATE TABLE IF NOT EXISTS produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    descricao VARCHAR(255),
    preco DECIMAL(10,2) NOT NULL
);

-- Dados de exemplo
INSERT INTO produtos (nome, descricao, preco) VALUES
('Teclado Mecânico', 'Teclado mecânico com iluminação RGB', 249.90),
('Mouse Gamer', 'Mouse com sensor óptico de alta precisão', 89.90),
('Monitor 24"', 'Monitor Full HD IPS de 24 polegadas', 799.00),
('Headset USB', 'Headset com microfone destacável', 129.90);
