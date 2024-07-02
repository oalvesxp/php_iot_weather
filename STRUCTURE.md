## ENTENDENDO AS DECISÕES DE ARQUITETURA E A ESTRUTURA DO PROJETO

### REQUISITOS PARA RODAR O PROJETO
---

#### SETUP DO VSCODE (EXTENSÕES)
* [PHP Inelephense](https://marketplace.visualstudio.com/items?itemName=bmewburn.vscode-intelephense-client)
* [PHP Debug](https://marketplace.visualstudio.com/items?itemName=xdebug.php-debug)
* [SQLite Viewer](https://marketplace.visualstudio.com/items?itemName=qwtel.sqlite-viewer)

#### SETUP DO AMBIENTE LOCAL
* [PHP version 8.2.20](https://www.php.net/downloads.php)
* [Composer version 2.7.4](https://getcomposer.org/download/)

#### COMO RODAR EM AMBIENTE LOCAL?
1. Certifique-se de ter instalado o PHP e Composer
2. Faça o clone do projeto: `git https://github.com/oalvesxp/php_weather.git`
3. Acesse o diretório do projeto e faça o dump do autoload: `composer dump-autoload`
4. Inicie o ambiente local com o comando php: `php -S localhost:8080 -t public/`

#### SETUP DO AMBIENTE EM SERVIDOR
* [PHP version 8.2.20](https://www.php.net/downloads.php)
* [Composer version 2.7.4](https://getcomposer.org/download/)
* [MariaDB version 10.11.6](https://mariadb.org/download)
* [Nginx version: nginx/1.22.1 ](https://nginx.org/en/download.html)

#### COMO RODAR EM UM SERVIDOR?
Sistema Operacional recomendado: `Debian GNU/Linux 12 (bookworm)` </br>

1. Instale todas as dependências listadas acima.
2. Faça o git clone do projeto no diretório `./var/www`: `git https://github.com/oalvesxp/php_weather.git`
3. Acesse o diretório do projeto e faça o dump do autoload: `composer dump-autoload`
4. Crie um vHost no diretório `./etc/nginx/sites-enable/`
    ```
    server {
        listen 80 default_server;
        listen [::]:80 default_server;
        server_name example.com;

        root /var/www/php_weather/public;
        index index.html index.htm index.php;

        location / {
            try_files $uri $uri/ /index.php?$query_string;
        }

        location ~ \.php$ {
            fastcgi_index index.php;
            fastcgi_pass unix:/run/php/php8.2-fpm.sock;
            
            include fastcgi_params;
            fastcgi_split_path_info ^(.+\.php)(/.+)$;
            fastcgi_param PATH_INFO $fastcgi_path_info;
            fastcgi_param PATH_TRANSLATED $document_root$fastcgi_path_info;
            fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        }
    }
    ```
5. Crie o banco WT0010 e execute o `script.sql` para criar as tabelas.
    ```
    CREATE TABLE WT0010;
    sudo mysql -u<user> -p <db_name> < script.sql
    ```

6. Configure o Arduino com o código diponível em `./Arduino/main.ino`
7. Configure o cronjob para coletar as métricas a cada minuto:
    ```
    crontab -e

    * * * * * php /var/www/srvquimico/getJson-sensor01.php && php /var/www/srvquimico/getJson-sensor02.php
    ```

7. Configure o php e o nginx para inicializar com o sistema operacional
    ```
    sudo systemctl enable nginx
    sudo systemctl enable php8.2-fpm
    ```
8. Aponte o seu arquivo hosts para o IP: `XXX.XXX.X.X  example.com`
9. Teste a conexão e navegação

</br>
Todos os links apontam para páginas oficiais de download. </br>
Para sistemas Linux use a o `script.sh` para instalar todos os softwares necessários para subir o servidor.

### ESTRUTURA DO PROJETO
---
* `./config` : Arquivo que monta o sistema de roteamento.
* `./public` : Arquivos públicos que o servidor web terá acesso para entregar a aplicação via HTTP.
    * `./public/assets` : Diretório de estáticos.
* `./src` : Configurações de regras de negócio e persistência de dados.
    * `./src/Controller` : Controladores que serve o arquivo de roteamento.
    * `./src/Domain` : Classes e Interfaces.
        * `<Model>` : Classes de Objetos.
        * `<Repository>` : Interface de Funções.
    * `./src/Infraestructure` : Persistência de Dados.
        * `<Persistence>` : Funções de conexão PDO com o banco de dados.
        * `<Repository>` : Repositório de fuções globais.
* `./views` : Estrutura de páginas HTML.
    * `<partials>` : Estruturas essênciais que se repetem em páginas HTML.

### COMO ME LOCALIZAR NO PROJETO?
---
* Tudo que o servidor Web deve acessar está em `./public`.
* Todas as páginas estão armazenadas em `./views`.
* Os coletores de métricas dos sensores está em `./getJson-*.php`.
* As configurações de comunicação com o banco está `./src/Infraestructure/Persistence`.
    * A configuração de tabelas está em `./script.sql`.
* O arduino terá 3 endpoints:
    * `/` - Página principal de sensores
    * `/sensor01` - Objeto JSON sensor01
    * `/sensor02` - Objeto JSON sensor02

### COMO ADICIONAR PÁGINAS?
---
* Crie uma view para a página.
    * `<?php require_once __DIR__ . '/partials/_head.php'; ?>`
    * `<?php require_once __DIR__ . '/partials/_header.php'; ?>`
        * O conteúdo aqui
    * `<?php require_once __DIR__ . '/partials/_footer.php';`
* Crie um Controller para entregar a view.
    * O arquivo mais básico que pode ser usado é o `Error404Controller.php`
    * Caso a página que está sendo criada necessite de acesso a dados do banco crie um construtor para o Controller para ele receber o repository:
        * `public function __construct(private WeatherSensorDhtRepository $repository) {}`
* Adicione a linha no Routes para carregar o Controller de acordo com o Method e Path: `'GET|/new-page' => NewPageController::class,`
* Acesse o path criado no arquivo de rotas `http://localhost:8080/new-page`
