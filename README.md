# IOT WEATHER DASHBOARD
Projeto IoT com interface Web (Dashboard) para monitorar em tempo real as variações de temperatura e umidade.

## COMPONENTES E SUPRIMENTOS

Equipamentos e Hardware:
* [Arduino Nano ESP32](https://produto.mercadolivre.com.br/MLB-2860521829-placa-esp32-pino-soldado-wifi-bluetooth-com-esp32-wroom-32-_JM#position=8&search_layout=grid&type=item&tracking_id=38ee1974-6d10-4acc-ae0c-271aa996d759)
* [Sensor DHT11](https://produto.mercadolivre.com.br/MLB-1459890252-modulo-sensor-dht11-temperatura-e-umidade-arduino-pic-_JM#position=7&search_layout=grid&type=item&tracking_id=9f56cac8-dba4-4180-a119-0777f05e9439)

### ESTRUTURA DO PROJETO
---
* [Licença MIT](LICENSE)
* [Documentação da Estrutura](STRUCTURE.md)

### DESCRIÇÃO DO PROJETO
Este é um projeto para coleta e armazenamento de dados Meteorológicos.</br>
Os dados são captados sensor DHT e expostos pelo arduino em 3 endpoints (/, /sensor01, /sensor02). O PHP coleta essas informações a cada X minutos e registra os dados na base MySQL ou SQLite.

### ESCOPO DO PROJETO
---
Esse projeto foi inciado com uma necessidade interna de monitorar a temperatura e umidade de 2 salas de uma fábrica. </br>
Estas salas trabalham com produtos quimicos variam sua formula de acordo com a variação climática.</br>

O objetivo desse projeto é ter um histórico para minimizar as falhas de produção devido as variações climáticas.
