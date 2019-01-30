/*
 * Author: Giulio Bosco (giulio.bosco@samtrevano.ch)
 */

int upButton = 3;               // Button in pull-up pin
int downButton = 2;             // Button in pull-down pin

int potentiometer = 0;          // Potentiometer pin

int upLed = 13;                 // Led for pull-up button pin
int downLed = 12;               // Led for pull-down button pin
int potentiometerLed = 11;      // Potentiometer pin


void setup() {
    // put your setup code here, to run once:
    pinMode(upButton, INPUT);     // setup upButton pin to use as input
    pinMode(downButton, INPUT);   // setup downButton pin to use ase input

    pinMode(upLed, OUTPUT);       // setup upLed pin to use as output
    pinMode(downLed, OUTPUT);     // setup downLed pin to use as output
    pinMode(potentiometerLed, OUTPUT); // setup potentiometerLed to use as output
}

void loop() {
    // put your main code here, to run repeatedly:
    if (digitalRead(upButton)) {
        digitalWrite(upLed,HIGH);
    } else {
        digitalWrite(upLed,LOW);
    }

    if (digitalRead(downButton)) {
        digitalWrite(downLed,HIGH);
    } else {
        digitalWrite(downLed,LOW);
    }

    int potentiometerIN = analogRead(potentiometer);
    analogWrite(potentiometerLed, potentiometerIN);
}