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

require_once "../../vendor/autoload.php";
require_once "../../src/models/Calculator.php";

use PHPUnit\Framework\TestCase;

/**
 * @author giuliobosco
 * @version 1.0 (2019-05-08 - 2019-05-14)
 */
class CalculatorTest extends TestCase {

	/**
	 * @dataProvider perfectSquareProvider
	 */
	public function testPerfectSquare($sqrt, $x) {
		$calculator = new Calculator();
		$this->assertEquals($sqrt, $calculator->sqrt($x));
	}

	public function perfectSquareProvider() {
		$array = array();

		for ($i = 1; $i < 11; $i++) {
			array_push($array, array($i, $i * $i));
		}

		return $array;
	}

	/**
	 * @dataProvider negativeNumbersProvider
	 */
	public function testNegativesNumber($x) {
		$calculator = new Calculator();
		$this->expectException(InvalidArgumentException::class);
		$calculator->sqrt($x);;
	}

	public function negativeNumbersProvider() {
		return [[-1], [-2], [-3], [-4]];
	}
}
