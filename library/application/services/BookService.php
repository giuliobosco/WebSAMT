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

require_once 'service.php';
require_once 'application/model/book.php';

/**
 * Book Service.
 *
 * @author giuliobosco
 * @version 1.0.4 (2019-04-17 - 2019-05-01)
 */
class BookService implements service {

	/**
	 * Book csv file separator.
	 */
	private const CSV_SEPARATOR = ";";

	/**
	 * @var array Books.
	 */
	private $books = array();

	/**
	 * BookService constructor.
	 * Load csv file.
	 */
	public function __construct() {
		$this->loadFile();
	}

	/**
	 * Load CSV file in books.
	 */
	public function loadFile() {
		$this->books = array();
		$csv_file = fopen(BOOKS_CSV_FILE, "r");

		fgetcsv($csv_file);

		while (!feof($csv_file)) {
			$string = fgetcsv($csv_file)[0];
			$string = explode(self::CSV_SEPARATOR, $string);

			if (strlen($string[0]) > 0) {
				$s = $this->addByArray($string);
			}
		}

		fclose($csv_file);
	}

	/**
	 * Write books in csv file.
	 */
	public function writeFile() {
		$csv_file = fopen(BOOKS_CSV_FILE, "w");

		$header = "isbn;title;author;year;edition;";
		fputcsv($csv_file, array($header));

		foreach ($this->books as $book) {
			$line = $book->getIsbn();
			$line .= self::CSV_SEPARATOR . $book->getTitle();
			$line .= self::CSV_SEPARATOR . $book->getAuthor();
			$line .= self::CSV_SEPARATOR . $book->getYear();
			$line .= self::CSV_SEPARATOR . $book->getEdition();

			fputcsv($csv_file, array($line));
		}

		fclose($csv_file);
	}

	/**
	 * Add model by array.
	 *
	 * @param array $data Array of data.
	 * @return object Added object, null if array not valid.
	 */
	public function addByArray(array $data): object {
		if (count($data) > 4) {
			$object = new book($data[0], $data[1], $data[2], $data[3], $data[4]);
			array_push($this->books, $object);
			return $object;
		}

		return null;
	}

	/**
	 * Add model by array with key.
	 *
	 * @param array $data
	 * @return object
	 * @throws Exception
	 */
	public function addByKeyArray(array $data):object {
		$requiredValues = array('isbn', 'title', 'author', 'year', 'edition');
		foreach ($requiredValues as $requiredValue) {
			if (!isset($data[$requiredValue])) {
				throw new Exception("No required value: $requiredValue");
			}
		}

		return $this->addByArray(array_values($data));
	}


	/**
	 * Add model to list.
	 *
	 * @param object $model Model to add.
	 * @return object Added model.
	 */
	public function add(object $model): object {
		array_push($this->books, $model);
		return $model;
	}

	/**
	 * Remove model from list.
	 *
	 * @param object $model Model to remove.
	 * @return object Removed model.
	 */
	public function remove(object $model): object {
		$init = array_splice($this->books, 0, array_search($model, $this->books));
		$end = array_splice($this->books, array_search($model, $this->books) + 1, count($this->books));
		$this->books = array_merge($init, $end);
		return $model;
	}

	/**
	 * Get model or models.
	 *
	 * @param $id Id of the model or null for array of all models.
	 * @return array Models in array, if only one is at index 0.
	 */
	public function get($id = null): array {
		if ($id == null) {
			return $this->books;
		} else {
			foreach ($this->books as $book) {
				if ($book->getId() == $id) {
					return array($book);
				}
			}
		}

		return null;
	}

	/**
	 * Update model in list.
	 *
	 * @param object $model Model to update.
	 * @return object Updated model.
	 */
	public function update(object $model): object {
		// TODO: Implement update() method.
	}
}