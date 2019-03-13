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

require "Ingredient.php";

/**
 * Starter, represent an plate, so a name and al list of ingredients.
 *
 * @author giuliobosco
 * @version 1.0 (2019-03-13 - 2019-03-13)
 */
class Starter {
	/**
	 * @var string Name of the starter.
	 */
	private $name;

	/**
	 * @var array Ingredients of the starter.
	 */
	private $ingredients;

	/**
	 * Get the name of the starter.
	 *
	 * @return string Name of the starter.
	 */
	public function getName(): string {
		return $this->name;
	}

	/**
	 * Get the ingredients of the starter.
	 *
	 * @return array Ingredients of the starter.
	 */
	public function getIngredients(): array {
		return $this->ingredients;
	}

	/**
	 * Starter constructor.
	 *
	 * @param string $name Name of the starter.
	 * @param array $ingredients Ingredients of the starter.
	 */
	public function __construct(string $name, array $ingredients) {
		$this->name = $name;
		$this->ingredients = $ingredients;
	}

	/**
	 * Get the total price of the starter.
	 * Sum the price of all the ingredients.
	 *
	 * @return float Total price of the starter.
	 */
	public function getTotalPrice():float {
		$total = 0;

		foreach ($this->ingredients as $ingredient) {
			$total += $ingredient->getPrice();
		}

		return $total;
	}
}