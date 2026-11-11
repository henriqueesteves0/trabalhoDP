# Portal de Artigos — Site em HTML, CSS e PHP

Projeto prático do Trabalho de Desenvolvimento Web (JS e PHP). É um site
**dinâmico** que demonstra os quatro conceitos pesquisados no documento:

1. **Templates** (reaproveitamento de código) — `templates/header.php` e `templates/footer.php`
2. **Site dinâmico** — conteúdo lido do banco e gerado em tempo de execução
3. **URLs amigáveis** — reescrita pelo `.htaccess` + roteador no `index.php`
4. **Banco de dados** — conexão **PDO** com consultas preparadas em `config/database.php`

## Estrutura de pastas

```
site-php/
├── .htaccess              # regras de URLs amigáveis (mod_rewrite)
├── index.php              # front controller (roteador)
├── config/
│   └── database.php       # conexão PDO com o MySQL
├── templates/
│   ├── header.php         # cabeçalho reaproveitável
│   └── footer.php         # rodapé reaproveitável
├── pages/
│   ├── home.php           # página inicial
│   ├── artigos.php        # lista de artigos (do banco)
│   ├── artigo.php         # artigo único (busca por slug)
│   ├── sobre.php          # página institucional
│   └── 404.php            # página de erro
├── public/css/style.css   # estilos
└── sql/banco.sql          # script de criação do banco + dados
```

## Como executar (XAMPP / WAMP)

1. Instale o **XAMPP** (ou WAMP) e inicie o **Apache** e o **MySQL**.
2. Copie a pasta `site-php` para dentro de `htdocs` (XAMPP) ou `www` (WAMP).
3. Abra o **phpMyAdmin** (`http://localhost/phpmyadmin`) e importe o arquivo
   `sql/banco.sql` (ou cole e execute o seu conteúdo). Isso cria o banco
   `portal_artigos` com a tabela `artigos` já preenchida.
4. Se necessário, ajuste usuário/senha em `config/database.php`
   (no XAMPP o padrão é usuário `root` e senha em branco).
5. Confirme que o módulo **mod_rewrite** está habilitado no Apache
   (no XAMPP já vem ativo por padrão).
6. Acesse no navegador: **`http://localhost/site-php/`**

## URLs amigáveis disponíveis

| Endereço amigável                                   | O que exibe              |
|-----------------------------------------------------|--------------------------|
| `/site-php/`                                        | Página inicial           |
| `/site-php/artigos`                                 | Lista de todos os artigos|
| `/site-php/artigos/o-que-sao-sites-dinamicos`       | Um artigo específico     |
| `/site-php/sobre`                                   | Página "Sobre"           |

> Observação: se publicar o projeto na raiz do domínio (e não em uma subpasta),
> ajuste a variável `$base` em `templates/header.php` para uma string vazia `''`.

## Requisitos

- PHP 7.4 ou superior (testado com PHP 8)
- MySQL / MariaDB
- Apache com `mod_rewrite` ativo
