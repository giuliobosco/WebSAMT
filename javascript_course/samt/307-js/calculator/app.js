/*
 * Copyright 2018 Giulio Bosco (giuliobva@gmail.com)
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:
 * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 */
/*
 * project: <project-name> ([<project-git-url>])
 * description: <project-description>
 *
 * author: Giulio Bosco (giuliobva@gmail.com)
 * version: 1.0
 * date: <date>
 *
 * file: app.js
 */

var calcule = "";

var classic = true;

function addFactor(i) {
	if (i == '=') runCalcule();
	else {
		calcule += i;
		$('#calcule-display').val(calcule);
	}
}

function runCalcule() {
	calcule = calcule.substring(0,calcule.length);
	$('#calcule-display').val(calculator(String(calcule)));
	calcule = "";
}

function selectClassic() {
	if (!classic) {
		$('#sin').remove();
		classic = true;
	}
}

function selectScientific() {
	if (classic) {
		$('<input>').addClass('button full-button')
			.val('sin')
			.attr('onclick', 'addFactor("sin")')
			.attr('type', 'button')
			.attr('id', 'sin')
			.appendTo('.top-buttons');
		classic = false;
	}
}

function changeCalcule(string) {
	$('#calcule-display').val(calculator(string));
}

function AC() {
	calcule = "";
	$('#calcule-display').val(calcule);
}