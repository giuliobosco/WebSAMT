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
 * Sorter, example for test units.
 *
 * @author giuliobosco
 * @version 1.0 (2019-05-08 - 2019-05-08)
 */
class Sorter {

	/**
	 * @var array Array to sort.
	 */
	private $toSort;

	/**
	 * Sorter constructor.
	 * @param array $toSort Array to sort.
	 */
	public function __construct(array $toSort) {
		$this->toSort = $toSort;
	}

	/**
	 * @return array Array to sort.
	 */
	public function getToSort(): array {
		return $this->toSort;
	}

	/**
	 * @return array Sorted array.
	 */
	public function sort(): array {
		$array = $this->getToSort();
		sort($array);
		return $array;
	}
}