<?php
/*
 * Copyright 2018 Giulio Bosco (giuliobva@gmail.com)
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:
 * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 */
/*
 * project: lib
 * description: lib
 *
 * author: Giulio Bosco (giuliobva@gmail.com)
 * version: 1.0
 * date: 28.05.2018
 *
 * file: string_helper.php
 */

$vowels = ['a','e','i','o','u','A','E','I','O','U'];

function is_vowel($char) {
	global $vowels;
	
	for ($i = 0; $i < count($vowels); $i++) {
		if ($char == $vowels[$i]) {
			return true;
		}
	}
	return false;
}

function str_removeSpecialChars($string) {
	$string = str_replace(' ', '', $string); // Replaces all spaces with hyphens.
	
	return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}

?>