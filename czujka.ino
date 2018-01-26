void setup() {
  // put your setup code here, to run once:
  pinMode(2,INPUT);
pinMode(7,OUTPUT);
pinMode(6,OUTPUT);
}

void loop() {
  // put your main code here, to run repeatedly:
  int wartosc=digitalRead(2);
if(wartosc!=0)
{
  digitalWrite(7,HIGH);
 delay(1000);
}
if(wartosc==0)
digitalWrite(7,LOW);

}

