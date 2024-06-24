# php_weather
Projeto IoT + Web Interface, para o monitoramento de Temperatura e Umidade.

## Componentes e Suprimentos

Equipamentos e Hardware:
* [Arduino Nano ESP32](https://produto.mercadolivre.com.br/MLB-2860521829-placa-esp32-pino-soldado-wifi-bluetooth-com-esp32-wroom-32-_JM#position=8&search_layout=grid&type=item&tracking_id=38ee1974-6d10-4acc-ae0c-271aa996d759)
* [Sensor DHT11](https://produto.mercadolivre.com.br/MLB-1459890252-modulo-sensor-dht11-temperatura-e-umidade-arduino-pic-_JM#position=7&search_layout=grid&type=item&tracking_id=9f56cac8-dba4-4180-a119-0777f05e9439)

## Descrição do Projeto
Este é um projeto para coleta e armazenamento de dados Meteorológicos.

Os dados são registrados pelo Arduino e enviados a base de dados (MySQL) a X minutos, através de uma solicitação POST criada por uma função PHP.

Pré-requisitos:
* [Composer ~> 2.7.6](https://getcomposer.org/download/)
* [PHP ~> 8.3.7](https://www.php.net/downloads)
* [MySQL ~> 8.0.37](https://dev.mysql.com/downloads/)

Todas as dependências do projeto estaram disponíveis no ```composer.json```, para carrega-las basta executar ```composer dump-autoload```.
