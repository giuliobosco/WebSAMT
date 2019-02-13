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

/**
 * Check if number is prime.
 *
 * @param int $x Number to check.
 * @return bool True if is prime, otherwise false.
 */
function is_prime(int $x):bool{
	if ($x % 2 == 0) {
		if ($x == 2) {
			return true;
		}
		return false;
	}

	for ($i = 3; $i < $x / 2 + 1; $i++) {
		if ($x % $i == 0) {
			return false;
		}
	}

	return true;
}

$prime_numbers = array();
$last_try = 0;
while (count($prime_numbers) < 100) {
	if (is_prime(++$last_try)) {
		array_push($prime_numbers, $last_try);
	}
}

foreach ($prime_numbers as $prime_number) {
	echo ($prime_number . ", ");
}