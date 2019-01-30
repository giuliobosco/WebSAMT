/**
 * Control led from button
 * Material: 1 Led, 1 Button;
 * On button push, turn on the led, on new button push turn off the led.
 * On button keep press, keep the button on the last status. The led do not blink.
 *
 * author: Giulio Bosco (giuliobva@samtrevano.ch)
 * version: 1.0
 * date: 12/03/2018
 * shematic: ./onOffLed.fzz
 */

int led = 13;                 // Pin used for the output of the led
int button = 2;               // Pin used for the input of the button
bool statusLed = false;           // Led status

void setup() {                // Setup arduino
    pinMode(led, OUTPUT);     // Setup led pin on output
    pinMode(button, INPUT);   // Setup button pin on input
}

void loop() {
    if (digitalRead(button)) {
        statusLed = !statusLed;
        digitalWrite(led, stausLed);
        while (digitalRead(button)){
            delay(200);
        }
    }
}