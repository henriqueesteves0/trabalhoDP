-- =====================================================================
-- BANCO DE DADOS DO PORTAL DE ARTIGOS
-- Execute este script no MySQL (phpMyAdmin, MySQL Workbench ou console)
-- =====================================================================

CREATE DATABASE IF NOT EXISTS portal_artigos
    DEFAULT CHARACTER SET utf8mb4
    DEFAULT COLLATE utf8mb4_general_ci;

USE portal_artigos;

DROP TABLE IF EXISTS artigos;

CREATE TABLE artigos (
    id         INT AUTO_INCREMENT PRIMARY KEY,
    titulo     VARCHAR(200)  NOT NULL,
    slug       VARCHAR(200)  NOT NULL UNIQUE,   -- usado nas URLs amigáveis
    resumo     VARCHAR(300)  NOT NULL,
    conteudo   TEXT          NOT NULL,
    autor      VARCHAR(100)  NOT NULL,
    criado_em  DATETIME      NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- ---- Dados de exemplo --------------------------------------------------
INSERT INTO artigos (titulo, slug, resumo, conteudo, autor, criado_em) VALUES
('A importância dos templates',
 'a-importancia-dos-templates',
 'Como o reaproveitamento de código reduz a duplicação e facilita a manutenção de um projeto web.',
 'Em projetos web, cabeçalho, menu e rodapé costumam se repetir em todas as páginas.\nQuando esses trechos são escritos uma única vez em arquivos de template e incluídos com require/include, qualquer alteração passa a ser feita em um só lugar.\nIsso reduz a duplicação de código, diminui erros e segue o princípio DRY (Don''t Repeat Yourself).',
 'Equipe Portal',
 '2025-06-01 09:00:00'),

('O que são sites dinâmicos',
 'o-que-sao-sites-dinamicos',
 'A diferença entre páginas estáticas e dinâmicas e o papel do PHP na geração de conteúdo sob demanda.',
 'Um site estático entrega sempre o mesmo arquivo HTML.\nJá um site dinâmico gera o conteúdo no momento da requisição, executando código no servidor que consulta bancos de dados e monta o HTML final.\nÉ isso que permite personalização, atualização de conteúdo por painéis administrativos e a construção de sistemas interativos.',
 'Equipe Portal',
 '2025-06-03 10:30:00'),

('URLs amigáveis e SEO',
 'urls-amigaveis-e-seo',
 'Por que endereços limpos melhoram a experiência do usuário e o posicionamento nos buscadores.',
 'URLs amigáveis substituem parâmetros técnicos por palavras significativas.\nElas são mais fáceis de ler, memorizar e compartilhar, e ajudam os mecanismos de busca a entender o conteúdo da página.\nNo Apache, o módulo mod_rewrite, configurado no .htaccess, traduz o endereço amigável em uma requisição interna ao index.php.',
 'Equipe Portal',
 '2025-06-05 14:15:00'),

('Conexão com banco de dados em PHP',
 'conexao-com-banco-de-dados-em-php',
 'Por que toda aplicação dinâmica precisa de persistência e como conectar com segurança usando PDO.',
 'Sem banco de dados, a aplicação só exibiria informações fixas.\nA conexão com o banco permite armazenar, recuperar e manipular dados de forma persistente.\nUsando PDO com consultas preparadas, os valores do usuário são vinculados por marcadores e nunca concatenados ao SQL, o que protege contra injeção de SQL.',
 'Equipe Portal',
 '2025-06-08 16:45:00');
