#include "DHT.h"
#include "WiFi.h"
#include "WebServer.h"

/** Declarando portas e modelo do sensor */
#define DHT1PIN 32
#define DHT2PIN 33
#define DHTTYPE DHT11

/** Credenciais do WiFi */
const char* ssid = "nome_da_rede";
const char* password = "senha";
byte mac[6];

// Network
IPAddress local_IP(172, 15, 0, 23);
IPAddress gateway(172, 15, 0, 253);
IPAddress subnet(255, 255, 255, 0);
IPAddress primaryDNS(8, 8, 8, 8);
IPAddress secondaryDNS(4, 4, 4, 4);

/** Webserver */
WebServer server(1280);

/** Declarando sensores */
DHT dht1(DHT1PIN, DHTTYPE);
DHT dht2(DHT2PIN, DHTTYPE);

void setup() {
  Serial.begin(9600);

  /** Configurações de Rede */
  if (!WiFi.config(local_IP, gateway, subnet, primaryDNS, secondaryDNS)) {
    Serial.println("A configuração do STA falhou...");
  }

  /** Configurações do WiFi */
  WiFi.mode(WIFI_STA);
  WiFi.begin(ssid, password);
  Serial.println("\nConectando ");

  while(WiFi.status() != WL_CONNECTED){
      Serial.print(".");
      delay(2000);
  }

  Serial.println("\nConectato a rede WiFi");
  Serial.print("Local ESP32 IP: ");
  Serial.println(WiFi.localIP());

  WiFi.macAddress(mac);
  Serial.print("MAC: ");
  Serial.print(mac[5],HEX);
  Serial.print(":");
  Serial.print(mac[4],HEX);
  Serial.print(":");
  Serial.print(mac[3],HEX);
  Serial.print(":");
  Serial.print(mac[2],HEX);
  Serial.print(":");
  Serial.print(mac[1],HEX);
  Serial.print(":");
  Serial.println(mac[0],HEX);

  /** Inicializando os sensores */
  dht1.begin();
  dht2.begin();

  /** Subindo Webserver */
  server.on("/", htmlServer);
  server.on("/sensor01", dht01);
  server.on("/sensor02", dht02);
  server.onNotFound(handle_NotFound);
  
  server.begin();
  Serial.println("HTTP server started");

}

void loop() {
  server.handleClient();
}

void htmlServer() {
  /** Sensor Pintura */
  float s1t = dht1.readTemperature();
  float s1h = dht1.readHumidity();
  
  /** Sensor Verniz */
  float s2t = dht2.readTemperature();
  float s2h = dht2.readHumidity();

  /** Opção HTML */
  String html = SendHTML(s1t, s1h, s2t, s2h);
  server.send(200, "text/html", html);
}

void dht01() {
  /** Sensor Pintura */
  float s1t = dht1.readTemperature();
  float s1h = dht1.readHumidity();

  /** Opção Json */
  String json = SendDht01(s1t, s1h);
  server.send(200, "application/json", json);
}

void dht02() {
  /** Sensor Verniz */
  float s2t = dht2.readTemperature();
  float s2h = dht2.readHumidity();

  /** Opção Json */
  String json = SendDht02(s2t, s2h);
  server.send(200, "application/json", json);
}

/** Falhou a conexão */
void handle_NotFound(){
  server.send(404, "text/plain", "ERROR 404 - Not found");
}

String SendHTML(float s01t,float s01h,float s02t,float s02h){
  String ptr = "<!DOCTYPE html>\n";
  ptr += "<html lang=\"pt-br\">\n";
  ptr += "  <head>\n";
  ptr += "    <meta charset=\"utf-8\">\n";
  ptr += "    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, user-scalable=no\">\n";
  ptr += "    <title>ESP32 Weather Report</title>\n";
  ptr += "    <style>\n";
  ptr += "      html { font-family: Helvetica; display: inline-block; margin: 0px auto; text-align: center;}\n";
  ptr += "      body { margin-top: 50px;}\n";
  ptr += "      h1 {color: #444444; margin: 50px auto 30px;}\n";
  ptr += "      p { font-size: 24px; color: #444444; margin-bottom: 10px;}\n";
  ptr += "    </style>\n";
  ptr += "  </head>\n";
  ptr += "  <body>\n";
  
  ptr += "     <div id=\"pintura\">\n";
  ptr += "       <h1>ESP32 Weather Report: Pintura</h1>\n";
  ptr += "       <p>Temperatura: ";
  ptr += (float)s01t;
  ptr += "       °C</p>\n";
  ptr += "       <p>Umidade: ";
  ptr += (float)s01h;
  ptr += "       %</p>\n";
  ptr += "     </div>\n";
  
  ptr += "     <div id=\"verniz\">\n";
  ptr += "       <h1>ESP32 Weather Report: Verniz</h1>\n";
  ptr += "       <p>Temperatura: ";
  ptr += (float)s02t;
  ptr += "       °C</p>\n";
  ptr += "       <p>Umidade: ";
  ptr += (float)s02h;
  ptr += "       %</p>\n";
  ptr += "     </div>\n";

  ptr += "   </body>\n";
  ptr += "</html>\n";
  return ptr;
}

String SendDht01(float s01t,float s01h){
  String json = "{";
  json += "\"temperatura\": \"" + String(s01t) + "\", \"umidade\": \"" + String(s01h) + "\"";
  json += "}";

  return json;
}

String SendDht02(float s02t,float s02h){
  String json = "{";
  json += "\"temperatura\": \"" + String(s02t) + "\", \"umidade\": \"" + String(s02h) + "\"";
  json += "}";
  
  return json;
}
