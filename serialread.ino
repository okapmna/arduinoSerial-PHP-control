int led1 = 18;
int led2 = 19;
int led3 = 12;
int led4 = 13;

// LedSet
bool led1St = false;
bool led2St = false;

// led1, led3 merupakan led set led1St
// led2, led4 merupakan led set led2St

int buzPin = 23;


bool lockLed = true;

// Time variabel
unsigned long preMill = 0;
const long timer = 300;


unsigned long buzzerOffTime = 0;


void setup(){
  pinMode(led1, OUTPUT);
  pinMode(led2, OUTPUT);
  pinMode(led3, OUTPUT);
  pinMode(led4, OUTPUT);
  digitalWrite(led1, LOW);
  digitalWrite(led2, LOW);
  digitalWrite(led3, LOW);
  digitalWrite(led4, LOW);


  pinMode(buzPin, OUTPUT);
  digitalWrite(buzPin, LOW);

  Serial.begin(9600);
}

void loop(){

  unsigned long curMill = millis();
  char input;
  if(Serial.available() > 0){
    input = Serial.read();
    char lock = input;
    if(lock == 'l'){
      lockLed = true;
      led1St = false;
      led2St = false;
      Serial.println("di Lock");

      digitalWrite(buzPin, HIGH);
      buzzerOffTime = millis() + 300;
    }
    if(lock == 'u'){
      lockLed = false;
      Serial.println("di Unlock");

      digitalWrite(buzPin, HIGH);
      buzzerOffTime = millis() + 800;
      
    }
  }

  digitalWrite(buzPin, millis() < buzzerOffTime ? HIGH : LOW);



if (!lockLed) {
  if (input == '1') {
    led1St = true;
    led2St = false;
    preMill = curMill;
    Serial.println("Led 1 Blink");
  } else if (input == '2') {
    led1St = false;
    led2St = true;
    preMill = curMill;
    Serial.println("Led 2 Blink");
  }
}



  if(led1St){
    if(curMill - preMill >= timer){
    preMill = curMill;
    digitalWrite(led1, !digitalRead(led1));
    digitalWrite(led3, !digitalRead(led3));
    digitalWrite(led2, LOW);
    digitalWrite(led4, LOW);
    }
  }else{
    digitalWrite(led1, LOW);
    digitalWrite(led3, LOW);
  }

  if(led2St){
    if(curMill - preMill >= timer){
    preMill = curMill;
    digitalWrite(led2, !digitalRead(led2));
    digitalWrite(led4, !digitalRead(led4));
    digitalWrite(led1, LOW);
    digitalWrite(led3, LOW);
    }
  }else {
    digitalWrite(led2, LOW);
    digitalWrite(led4, LOW);
  }
}
