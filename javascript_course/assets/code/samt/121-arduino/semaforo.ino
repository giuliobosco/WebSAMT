int autoRosso = 7;        // Del rosso del semaforo delle automobili
int autoArancio = 6;      // Del arancione del semaforo delle automobili
int autoVerde = 5;        // Del verde del semaforo delle automobili

int pedoneRosso = 12;     // Del rosso del semaforo dei pedoni
int pedoneArancio = 11;   // Del arancione del semaforo dei pedoni
int pedoneVerde = 10;     // Del verde del semaforo dei pedoni

int bottone = 2;          // Bottone per i pedoni
int ledBottone = 13;      // Led di segnalazione dei pedoni

bool pedoniTurn = false;  // Turno dei pedoni
bool lastTurnAuto = false;// Ultimo turni fatto da automobili
void setup() {
   pinMode(autoRosso, OUTPUT);
   pinMode(autoArancio, OUTPUT);
   pinMode(autoVerde, OUTPUT);

   pinMode(pedoneRosso, OUTPUT);
   pinMode(pedoneArancio, OUTPUT);
   pinMode(pedoneVerde, OUTPUT);

   pinMode(bottone, INPUT);
   pinMode(ledBottone, OUTPUT);

}

void loop() {
    if (pedoniTurn && lastTurnAuto) {
        pedoneVoid();
    } else {
        autoVoid();
    }
}

void clearLights() {
    digitalWrite(autoRosso, LOW);
    digitalWrite(autoArancio, LOW);
    digitalWrite(autoVerde, LOW);

    digitalWrite(pedoneRosso, LOW);
    digitalWrite(pedoneArancio, LOW);
    digitalWrite(pedoneVerde, LOW);
}

void autoVoid() {
    clearLights();
    digitalWrite(pedoneRosso, HIGH);

    digitalWrite(autoRosso, HIGH);
    delayTime(5000);
    digitalWrite(autoArancio, HIGH);
    delayTime(5000);
    digitalWrite(autoRosso, LOW);
    digitalWrite(autoArancio, LOW);
    digitalWrite(autoVerde, HIGH);

    delayTime(10000);

    digitalWrite(autoVerde, LOW);
    digitalWrite(autoArancio, HIGH);
    delayTime(5000);
    digitalWrite(autoArancio, LOW);
    digitalWrite(autoRosso, HIGH);

    lastTurnAuto = true;
}

void pedoneVoid() {
    digitalWrite(ledBottone, LOW);
    clearLights();
    digitalWrite(autoRosso, HIGH);

    digitalWrite(pedoneRosso, HIGH);
    delayTime(7500);
    digitalWrite(pedoneRosso, LOW);
    digitalWrite(pedoneVerde, HIGH);
    delayTime(10000);
    digitalWrite(pedoneVerde, LOW);
    digitalWrite(pedoneArancio, HIGH);
    delayTime(7500);
    digitalWrite(pedoneArancio, LOW);
    digitalWrite(pedoneRosso, HIGH);

    lastTurnAuto = false;
    pedoniTurn = false;
}

void delayTime(int dt) {
    dt /= 10;
    for (int i = 0; i < dt; i++) {
        delay(10);
        if (digitalRead(bottone) && lastTurnAuto) {
            pedoniTurn = true;
            digitalWrite(ledBottone, HIGH);
        }
    }
}