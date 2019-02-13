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

$text = array("Campa", "cavallo", "che", "l'erba", "cresce", ".");

function is_vowel(string $char): bool {
	$ci = ord(strtoupper($char));

	if ($ci == 65 || $ci == 69 || $ci == 73 || $ci == 79 || $ci == 85) {
		return true;
	}

	return false;
}

function is_consonant(string $char): bool {
	$ci = ord(strtoupper($char));

	if (($ci > 65 && $ci < 69) || ($ci > 69 && $ci < 73) || ($ci > 73 && $ci < 79) || ($ci > 79 && $ci < 85) || ($ci > 85 && $ci < 91)) {
		return true;
	}

	return false;
}

$text = implode(" ", $text);

$vowerl_count = 0;
$consonant_count = 0;
$a_count = 0;
$space_count = 0;

for ($i = 0; $i < strlen($text); $i++) {
	if (is_vowel($text[$i])) {
		$vowerl_count++;

		if ($text[$i] == "a") {
			$a_count++;
		}
	} elseif (is_consonant($text[$i])) {
		$consonant_count++;
	} elseif ($text[$i] == " ") {
		$space_count++;
	}
}

echo($text . "<br>");
echo("Vowels: $vowerl_count<br>");
echo("Consonant: $consonant_count<br>");
echo("A: $a_count<br>");
echo("Spaces: $space_count<br>");