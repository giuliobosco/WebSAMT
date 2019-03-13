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
 * Ingredient, rappresent the ingredient with his name and his price.
 *
 * @author giuliobosco
 * @version 1.0 (2019-03-13 - 2019-03-13)
 */
class Ingredient {

	/**
	 * @var string Name of the ingredient.
	 */
	private $name;

	/**
	 * @var float Price of the ingredient.
	 */
	private $price;

	/**
	 * Ingredient constructor.
	 *
	 * @param string $name Name of the ingredient.
	 * @param float $price Price of the ingredient.
	 */
	public function __construct(string $name, float $price) {
		$this->name = $name;
		$this->setPrice($price);
	}

	/**
	 * Get the name of the ingredient.
	 *
	 * @return string Name of the ingredient.
	 */
	public function getName(): string {
		return $this->name;
	}

	/**
	 * Get the price of the ingredient.
	 *
	 * @return float Price of the ingredient.
	 */
	public function getPrice(): float {
		return $this->price;
	}

	/**
	 * Set the price of the ingredient.
	 *
	 * @param float $price Price of the ingredient.
	 */
	public function setPrice(float $price): void {
		if ($price > 0) {
			$this->price = $price;
		}
	}
}