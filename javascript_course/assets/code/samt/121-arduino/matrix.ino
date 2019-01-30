const int ROWS[8] = {38,40,42,44,46,48,50,52};
const int COLS[8] = {39,41,43,45,47,49,51,53};

void setup() {
  for (int i = 38; i < 54; i++) {
    if (i % 2 == 0) {
      pinMode(i, OUTPUT);
      digitalWrite(i, LOW);
    } else {
      pinMode(i, OUTPUT);
      digitalWrite(i, HIGH);
    }
  }
  Serial.begin(9600);

}

void loop() {

  onMatrix(9,7);
  delay(2000);
  offMatrix(9,7);
  delay(2000);
}

/**
 * Turn leds on matrix.
 * The coordinates of the leds in the matrix must to be in the array COLS and ROWS.
 * First parameter is for the rows, if the value is bigger than the ROWS array size turn on all the ROWS.
 * Second parameter is for the colums, if the value is bigger than the COLS array size turn on all the COLS.
 */
void onMatrix(int r, int c) {
  if (2 * r >= sizeof(ROWS) && 2 * c < sizeof(COLS)) {
    for (int i = 0; i < sizeof(COLS); i++) {
      digitalWrite(ROWS[i], HIGH);
    }
    digitalWrite(COLS[c], LOW);
  }
  if (2 * c >= sizeof(COLS) && 2 * r < sizeof(ROWS)) {
    for (int i = 0; i < sizeof(COLS); i++) {
      digitalWrite(COLS[i], LOW);
    }
    digitalWrite(ROWS[r], HIGH);
  }
  if (2 * r < sizeof(ROWS) && 2 * c < sizeof(COLS)) {
    digitalWrite(COLS[c], LOW);
    digitalWrite(ROWS[c], HIGH);
  }
  if (2 * r >= sizeof(ROWS) && 2 * c >= sizeof(COLS)) {
    for (int i = 0; i < sizeof(ROWS); i++) {
      digitalWrite(ROWS[i], HIGH);
    }
    for (int i = 0; i < sizeof(COLS); i++) {
      digitalWrite(COLS[i], LOW);
    }
  }
}

void offMatrix(int r, int c) {
  if (2 * r >= sizeof(ROWS)) {
    for (int i = 0; i < sizeof(ROWS); i++) {
      digitalWrite(ROWS[i], LOW);
    }
    digitalWrite(COLS[c], HIGH);
  }
  if (2 * c >= sizeof(COLS)) {
    for (int i = 0; i < sizeof(COLS); i++) {
      digitalWrite(COLS[i], HIGH);
    }
    digitalWrite(ROWS[r], LOW);
  }
  if (2 * r < sizeof(ROWS) && 2 * c < sizeof(COLS)) {
    digitalWrite(COLS[c], LOW);
    digitalWrite(ROWS[c], LOW);
  }
}
