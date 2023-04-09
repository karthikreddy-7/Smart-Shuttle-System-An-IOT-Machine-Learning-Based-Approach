//receiver arduino
#include <LiquidCrystal_I2C.h>
#include <ESP8266WebServer.h>
#include <ESP8266HTTPClient.h>
int lcdColumns = 16;
int lcdRows = 2;
LiquidCrystal_I2C lcd(0x3F, lcdColumns, lcdRows);
const char* ssid = "iPhone 13";
const char* password = "chinnu0201";
HTTPClient http; //--> Declare object of class HTTPClient
WiFiClient client;
void setup() {
  // put your setup code here, to run once:
  lcd.init();
  lcd.backlight();
  Serial.begin(9600);
  WiFi.begin(ssid, password); //--> Connect to your WiFi router
  Serial.println("");
  while (WiFi.status() != WL_CONNECTED) {
    lcd.setCursor(0,0);
    lcd.print("WiFi connecting..");
    Serial.println("WiFi connecting");
  }
  lcd.clear();
  lcd.print("WiFI connected");
  delay(2000);
  Serial.println("");
  Serial.print("Successfully connected to : ");
  Serial.println(ssid);
  lcd.clear();
  lcd.print("connected to:");
  lcd.setCursor(0,1);
  lcd.print(ssid);
  Serial.print("IP address: ");
  Serial.println(WiFi.localIP());
  delay(2000);

}

void loop() {
  // put your main code here, to run repeatedly:
  char buffer[20]="";
  lcd.clear();
  lcd.setCursor(0,0);
  lcd.print("scan");
  lcd.setCursor(0,1);
  lcd.print("the tag:");
  delay(1000);
  if (Serial.available()>0){
    String str;
    str=Serial.readStringUntil('\n');
    Serial.println(str);
    lcd.clear();
    lcd.print("tag UID is:");
    lcd.setCursor(0,1);
    lcd.print(str);
    delay(1000);
    HTTPClient http;    //Declare object of class HTTPClient
    String UIDresultSend, postData;
    UIDresultSend = str;
    //Post Data
    postData = "UIDresult=" + UIDresultSend;
    http.begin(client,"http://172.20.10.5/buspass/getUID.php");  //Specify request destination
    http.addHeader("Content-Type", "application/x-www-form-urlencoded"); //Specify content-type header
    int httpCode = http.POST(postData);   //Send the request
    String payload = http.getString();    //Get the response payload
    lcd.clear();
    lcd.setCursor(0,0);
    lcd.println(payload);
    delay(3000);
    Serial.println(httpCode);   //Print HTTP return code
    Serial.println(payload);    //Print request response payload
    http.end();  //Close connection
  }
  

}
