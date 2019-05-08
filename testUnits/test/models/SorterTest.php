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
require_once "../../src/models/Sorter.php";

use PHPUnit\Framework\TestCase;

/**
 * @author giuliobosco
 * @version 1.0 (2019-05-08 - 2019-05-08)
 */
class SorterTest extends TestCase {

	/**
	 * Test Sorter Sort method.
	 */
	public function testSort() {
		$array = [4,1,6,1,7,8,2];

		$sorter = new Sorter($array);
		$sorted = $sorter->sort();

		sort($array);

		$isSame = true;
		for ($i = 0; $i < count($array) && $isSame; $i++) {
			$isSame = $array[$i] == $sorted[$i];
		}

		$this->assertTrue($isSame);
	}

	/**
	 * Test original array must be unaltered.
	 */
	public function testOriginalArrayUnaltered() {
		$array = [4,1,6,1,7,8,2];

		$arrayBck = [];
		foreach ($array as $item) {
			array_push($arrayBck, $item);
		}

		$sorter = new Sorter($array);
		$sorter->sort();

		$isSame = true;
		for ($i = 0; $i < count($array) && $isSame; $i++) {
			$isSame = $array[$i] == $arrayBck[$i];
		}

		$this->assertTrue($isSame);
	}

	/**
	 * Test Sorter original array must be unaltered.
	 */
	public function testSorterOriginalArrayUnaltered() {
		$array = [4,1,6,1,7,8,2];

		$sorter = new Sorter($array);
		$sorter->sort();

		$sorterOriginal = $sorter->getToSort();

		$isSame = true;
		for ($i = 0; $i < count($array) && $isSame; $i++) {
			$isSame = $sorterOriginal[$i] == $array[$i];
		}

		$this->assertTrue($isSame);
	}
}