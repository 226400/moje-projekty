#include <time.h>

void setup() {
  // put your setup code here, to run once:
  pinMode(7,OUTPUT);
  pinMode(6,OUTPUT);
  pinMode(5,OUTPUT);
  pinMode(4,OUTPUT);
Serial.begin(9600);
}

void loop() {

  
int wartosc=analogRead(A0);  //zczytaj z rezystora i podaj na pin A0
int temp=analogRead(A1);
Serial.println("jasnosc: ");
Serial.println(wartosc); 
Serial.println("temperatura:");//wypluj wartosc w oknie pomiarowym
Serial.println(temp);  
delay(1000);
//wypluj wartosc w oknie pomiarowym
if (wartosc<55)   //zabezpieczenie przed chwilowym zaslonieicem rezystora
{
  delay(10000);
  wartosc=analogRead(A0);
  }

if (wartosc<55 && analogRead(A2)<55 ) //glowna petla sterowania
{
  digitalWrite(4,HIGH);
  delay(3000);
  Serial.println("temperatura:");
  Serial.println(temp);
  digitalWrite(4,LOW);
  digitalWrite(5,HIGH);
  delay(3000);
    Serial.println("temperatura:");
  Serial.println(temp);
  digitalWrite(5,LOW);
  digitalWrite(6,HIGH);
  delay(3000);
    Serial.println("temperatura:");
  Serial.println(temp);
  digitalWrite(6,LOW);
  digitalWrite(7,HIGH);
  delay(3000);
    Serial.println("temperatura:");
  Serial.println(temp);
  digitalWrite(7,LOW);
  delay(10000);
}
}

