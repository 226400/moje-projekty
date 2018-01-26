void setup() {
  // put your setup code here, to run once:
  pinMode(7,OUTPUT);
  pinMode(6,OUTPUT);
  pinMode(5,OUTPUT);
  pinMode(4,OUTPUT);
Serial.begin(9600);
}

void loop() {
  // put your main code here, to run repeatedly:
 
int wartosc=analogRead(A0);
float voltage=wartosc*(5.0/1023.0);
float wart=voltage;
if (wartosc<55)
{
digitalWrite(7,HIGH);
digitalWrite(6,LOW);
digitalWrite(5,LOW);
digitalWrite(4,LOW);
//delay(100);
}

else if (wartosc>60&&wartosc<99)
{
digitalWrite(7,LOW);
digitalWrite(6,HIGH);
digitalWrite(5,LOW);
digitalWrite(4,LOW);
//delay(100);
}

else if (wartosc>100&&wartosc<145)
{
digitalWrite(7,LOW);
digitalWrite(6,LOW);
digitalWrite(5,HIGH);
digitalWrite(4,LOW);

}

else if (wartosc>150)
{
digitalWrite(7,LOW);
digitalWrite(6,LOW);
digitalWrite(5,LOW);
digitalWrite(4,HIGH);
//delay(100);
}


Serial.println(wartosc);
//delay(1000);
}
