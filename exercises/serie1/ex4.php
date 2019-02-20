<?php
/*
 * The MIT License
 *
 * Copyright 2018 giuliobosco.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */
/**
 * @author giuliobosco
 * @version 1.0
 */

$proverb = "Campa cavallo che l'erba cresce.";

// all upper case
echo(strtoupper($proverb) . "<br>");
// all lower case
echo(strtolower($proverb) . "<br>");

// print even letters
for ($i = 0; $i < strlen($proverb); $i++) {
	if ($i % 2 == 0) echo($proverb[$i]);
}
echo("<br>");

// print odd letters
for ($i = 0; $i < strlen($proverb); $i++) {
	if ($i % 2 == 1) echo($proverb[$i]);
}
echo("<br>");

$only_u = $proverb;
str_replace("a", "u", $only_u);
str_replace("A", "u", $only_u);
str_replace("e", "u", $only_u);
str_replace("E", "u", $only_u);
str_replace("i", "u", $only_u);
str_replace("I", "u", $only_u);
str_replace("o", "u", $only_u);
str_replace("O", "u", $only_u);
str_replace("U", "u", $only_u);
echo($only_u);
echo("<br>");

function is_vowel(string $s):bool {
	if ($s == "A" ||
		$s == "a" ||
		$s == "E" ||
		$s == "e" ||
		$s == "I" ||
		$s == "i" ||
		$s == "O" ||
		$s == "o" ||
		$s == "U" ||
		$s == "U") {
		return true;
	}
	return false;
}

$colors = "";
for ($i = 0; $i < strlen($proverb); $i++) {
	$s = $proverb[$i];
	if (is_vowel($s)) {
		$colors .= '<span style="color:red">';
	} else {
		$colors .= '<span style="color:blue">';
	}

	$colors .= $s . '</span>';
}
echo($colors);
echo("<br>");

$reverse = "";
for ($i = strlen($proverb) - 1; $i >= 0; $i--) {
	$reverse .= $proverb[$i];
}
echo($reverse);
echo("<br>");
