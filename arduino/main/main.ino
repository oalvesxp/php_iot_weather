#include "DHT.h"
#include "WiFi.h"

/** Declarando portas e modelo do sensor */
#define DHT1PIN 4
#define DHT2PIN 5
#define DHTTYPE DHT11

/** Credenciais do WiFi */
const char* ssid = "nome-da-rede";
const char* password = "senha";

/** Declarando sensores */
DHT dht1(DHT1PIN, DHTTYPE);
DHT dht2(DHT2PIN, DHTTYPE);

void setup() {
  Serial.begin(9600);

  /** Configurações do WiFi */
  WiFi.mode(WIFI_STA);
  WiFi.begin(ssid, password);
  Serial.println("\nConectando");

  while(WiFi.status() != WL_CONNECTED){
      Serial.print(".");
      delay(1000);
  }

  Serial.println("\nConectato a rede WiFi");
  Serial.print("Local ESP32 IP: ");
  Serial.println(WiFi.localIP());

  /** Inicializando os sensores */
  dht1.begin();
  dht2.begin();
}

void loop() {
  /** Sensor de temperatura da Pintura 01 */
  float s01h = dht1.readHumidity();
  float s01t = dht1.readTemperature();

  /** Sensor de temperatura da Verniz 01 */
  float s02h = dht2.readHumidity();
  float s02t = dht2.readTemperature();

  // Check if any reads failed and exit early (to try again).
  if (isnan(s01h) || isnan(s01t)) {
    Serial.println(F("Não foi possível ler o sensor: Pintura 01"));
  }

  if (isnan(s02h) || isnan(s02t)) {
    Serial.println(F("Não foi possível ler o sensor: Verniz 01"));
  }

  Serial.print(F("\nPintura 01 - "));
  Serial.print(F("Humidity: "));
  Serial.print(s01h);
  Serial.print(F("%  Temperature: "));
  Serial.print(s01t);
  Serial.print(F("°C \n"));
  
  Serial.print(F("Verniz 01 - "));
  Serial.print(F("Humidity: "));
  Serial.print(s02h);
  Serial.print(F("%  Temperature: "));
  Serial.print(s02t);
  Serial.print(F("°C \n"));

  delay(1000);

}
