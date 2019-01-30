/*
 * Copyright 2018  Giulio Bosco (giulio.bosco@samtrevano.ch)
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:
 * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 */
/*
 * project: Web Calculator
 * description:  Web Calculator whit standard and scientific calculator.
 *
 * author:  Giulio Bosco (giulio.bosco@samtrevano.ch)
 * version: 1.0
 * date: 17/03/2018
 *
 * file: app.js
 */


// Grammar:
// expression = term | expression `+` term | expression `-` term
// term = factor | term `*` factor | term `/` factor
// factor = `+` factor | `-` factor | `(` expression `)`
//        | number | functionName factor | factor `^` factor

/**
 * This string contains the calculation to execute.
 * @type {string}
 */
var calculation = "";

/**
 * This number variable contains the position of the character that is being analyzed.
 * @type {number}
 */
var pos = -1;

/**
 * This number variable contains the number of the character that is being analyzed.
 * @type {number}
 */
var ch;

/**
 * Main calculation function.
 * This function needs the calculation as parameter, it has to be a String.
 * The string have to be like the following one: "8+5*2" this string well return 18.
 * @param {string} calc Calculation as string.
 * @return {double} The calculation solved.
 */
function calculator(calc) {
	calculation = calc;
	nextChar();
	var parseValue = parseExpression();
	if (pos < calculation.length) throw new RuntimeException("Unexpected: " + String.fromCharCode(ch));
	
	calculation = "";
	pos = -1;
	return parseValue;
}

/**
 * Switch to the next character to be analyzed.
 */
function nextChar() {
	console.log(ch);
	ch = (++pos < calculation.length) ? calculation.charAt(pos) : -1;
}

/**
 *
 * @param charToEat
 * @returns {boolean}
 */
function eat(charToEat) {
	while (ch == ' ') nextChar();
	if (ch == charToEat) {
		nextChar();
		return true;
	}
	return false;
}

function parseExpression() {
	var parseExpressionValue = parseTerm();
	for (; ;) {
		if (eat('+')) parseExpressionValue += parseTerm(); // addition
		else if (eat('-')) parseExpressionValue -= parseTerm(); // subtraction
		else return parseExpressionValue;
	}
}

function parseTerm() {
	var	parseTermValue = parseFactor();
	for (; ;) {
		if (eat('*')) parseTermValue *= parseFactor(); // multiplication
		else if (eat('/')) parseTermValue /= parseFactor(); // division
		else return parseTermValue;
	}
}

function parseFactor() {
	if (eat('+')) return parseFactor(); // unary plus
	if (eat('-')) return -parseFactor(); // unary minus
	
	var parseFactorValue;
	var	startPos = pos;
	if (eat('(')) { // parentheses
		parseFactorValue = parseExpression();
		eat(')');
	} else if ((ch >= '0' && ch <= '9') || ch == '.') { // numbers
		while ((ch >= '0' && ch <= '9') || ch == '.') nextChar();
		parseFactorValue = parseFloat(calculation.substring(startPos, pos));
	} else if (ch >= 'a' && ch <= 'z') { // functions
		while (ch >= 'a' && ch <= 'z') nextChar();
		var func = calculation.substring(startPos, pos);
		parseFactorValue = parseFactor();
		if (func.equals("sqrt")) parseFactorValue = Math.sqrt(x);
		else if (func.equals("sin")) parseFactorValue = Math.sin(Math.toRadians(x));
		else if (func.equals("cos")) parseFactorValue = Math.cos(Math.toRadians(x));
		else if (func.equals("tan")) parseFactorValue = Math.tan(Math.toRadians(x));
		else throw new RuntimeException("Unknown function: " + func);
	} else {
		throw new RuntimeException("Unexpected: " + String.fromCharCode(ch) + ch);
	}
	
	if (eat('^')) x = Math.pow(parseFactorValue, parseFactor()); // exponentiation
	
	return parseFactorValue;
}

function RuntimeException(s) {
	console.log(s);
}