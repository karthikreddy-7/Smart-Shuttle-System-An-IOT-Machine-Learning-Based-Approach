//sender arduino 
#include <SPI.h>
#include <RFID.h>
#define SS_PIN 10
#define RST_PIN 9
RFID rfid(SS_PIN, RST_PIN);
String rfidCard;
void setup() {
  // put your setup code here, to run once:
  Serial.begin(9600);
  SPI.begin();
  rfid.init();
  pinMode(8, OUTPUT);
}

void loop() {
  // put your main code here, to run repeatedly:
   if (rfid.isCard()) {
    if (rfid.readCardSerial()) {
      rfidCard = String(rfid.serNum[0])+ String(rfid.serNum[1]) + String(rfid.serNum[2])+ String(rfid.serNum[3]);
      Serial.println(rfidCard);
      //Serial.println();
      digitalWrite(8,HIGH);
      delay(150);
      digitalWrite(8,LOW);
      delay(2000);
    }
    rfid.halt();
  }

}
