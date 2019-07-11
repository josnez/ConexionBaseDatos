#include <Ethernet.h>//libreria ethernet
#include <SPI.h>//libreria ethernet
#include <LiquidCrystal_I2C.h>//libreria display

// Configuracion del Ethernet Shield
byte mac[] = {0xDE, 0xAD, 0xBE, 0xEF, 0xFF, 0xEE}; // Direccion MAC
byte ip[] = { 192,168,1,109 }; // Direccion IP del Arduino
byte server[] = { 192,168,1,91 }; // Direccion IP del servidor 192,168,0,14

SFE_BMP180 bmp180;//definimos objeto bmp180
LiquidCrystal_I2C lcd(0x27,16,2);//definimos objeto LiquidCrystal
DHT dht(DHTPIN, DHTTYPE);//Definimos objeto tipo dht
EthernetClient cliente;//objeto del ethernet

void setup() {
  Serial.begin(9600);//Inicializamos comunicación serie
  lcd.init();//iniciamos lcd
  lcd.backlight();//luz de fondo
  lcd.clear();//limpiar
  lcd.setCursor(0,0);
  lcd.print("Hola");
  lcd.setCursor(0,1);
  lcd.print("Iniciando...");
  delay(3000);

  Ethernet.begin(mac, ip); // Inicializamos el Ethernet Shield
  
  pinMode(TRIG, OUTPUT);//pin TRIG como salida
  pinMode(ECHO, INPUT);//pin ECHO como entrada
  
  //comprobamos el funcionamiento del bmp180
  
}

void loop() {
  lcd.clear();
  lcd.setCursor(0,0);
  lcd.print("Leyendo datos");
  lcd.setCursor(0,1);
  lcd.print("espere...");
  
  //codigo para obtener los datos
  //posYJug1 = // Dato del movimiento
  //posYJug2 = 
  //posXbol
  //posYbol

  // Proceso de envio de muestras al servidor
  Serial.println("Envio de dato, conectando...");
  lcd.clear();
  lcd.setCursor(0,0);
  lcd.print("Envio de datos");
  lcd.setCursor(0,0);
  lcd.print("Conectando...");
  
  if (cliente.connect(server, 80)>0) {  // Conexion con el servidor(client.connect(server, 80)>0
    cliente.print("GET /arduino/control/conexionArduino.php?posYJug1_php="); // Enviamos los datos por GET
    cliente.print(posYJug1);
    cliente.print("&hum_php=");
    cliente.print(posYJug2);
    cliente.print("&temp_php=");
    cliente.print(posXbol);
    cliente.print("&dist_php=");
    cliente.print(posYbol);
    cliente.println(" HTTP/1.0");
    cliente.println("User-Agent: Arduino 1.0");
    cliente.println();
    Serial.println("Envio con exito (al archivo controller/index y models/herramienta)");
    lcd.clear();
    lcd.setCursor(0,1);
    lcd.print("Envio con exito");
    delay(1000);
  } else {
    Serial.println("Fallo en la conexion");
    lcd.clear();
    lcd.setCursor(0,0);
    lcd.print("Fallo en la");
    lcd.setCursor(0,1);
    lcd.print("conexion");
    delay(2000);
  }
  if (!cliente.connected()) {
    Serial.println("Desconectando");
    lcd.clear();
    lcd.setCursor(0,0);
    lcd.print("Desconectando");
    delay(1000);
  }
  cliente.stop();
  cliente.flush();
  
  //delay(5000); // Espero un minuto antes de tomar otro movimiento
}
