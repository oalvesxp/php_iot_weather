sudo apt update
sudo apt install -y nginx php8.2-fpm php8.2-cgi php8.2-cli php-mbstring mariadb-server-10.5 curl git unzip

curl -sS https://getcomposer.org/installer -o composer-setup.php

HASH=$(curl -sS https://composer.github.io/installer.sig)
php -r "if (hash_file('sha384', 'composer-setup.php') === '$HASH') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
sudo php composer-setup.php --install-dir=/usr/local/bin --filename=composer
rm composer-setup.php

composer --version
echo "Dependências instaladas com sucesso!"
