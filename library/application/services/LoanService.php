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
require_once 'application/model/loan.php';
require_once 'BookService.php';
require_once 'UserService.php';

/**
 * Loan Service.
 *
 * @author giuliobosco
 * @version 1.1.1 (2019-04-17 - 2019-05-01)
 */
class LoanService implements service {

	/**
	 * Book csv file separator.
	 */
	private const CSV_SEPARATOR = ";";

	/**
	 * @var array Loans.
	 */
	private $loans = array();

	/**
	 * LoanService constructor.
	 * Load csv file.
	 */
	public function __construct() {
		$this->loadFile();
	}

	/**
	 * Load CSV file in loans.
	 */
	public function loadFile() {
		$this->loans = array();
		$csv_file = fopen(LOANS_CSV_FILE, "r");

		fgetcsv($csv_file);

		while (!feof($csv_file)) {
			$string = fgetcsv($csv_file)[0];
			$string = explode(self::CSV_SEPARATOR, $string);

			if (strlen($string[0]) > 0) {
				$this->addByArray($string);
			}
		}

		fclose($csv_file);
	}

	public function addByArray(array $data): object {
		if (count($data) > 4) {
			$userService = new UserService();
			$bookService = new BookService();
			$object = new loan(strval(data[0]), $bookService->get($data[1])[0], $userService->get($data[2])[0], strval($data[3]), strval($data[4]));
			array_push($this->loans, $object);
			return $object;
		}

		return null;
	}

	public function addByKeyArray(array $data):object {
		$requiredValues = array('id', 'book', 'user', 'loan_date','return_date');
		foreach ($requiredValues as $requiredValue) {
			if (!array_key_exists($requiredValue, $data)) {
				throw new Exception("No required value: $requiredValue");
			}
		}

		return $this->addByArray($data);
	}

	/**
	 * Write loans in csv file.
	 */
	public function writeFile() {
		$csv_file = fopen(LOANS_CSV_FILE, "w");

		$header = "id;book;user;loan_date;return_date;";
		fputcsv($csv_file, array($header));

		foreach ($this->loans as $loan) {
			$line = $loan->getId();
			$line .= self::CSV_SEPARATOR . $loan->getBook()->getIsbn();
			$line .= self::CSV_SEPARATOR . $loan->getUser()->getUsername();
			$line .= self::CSV_SEPARATOR . $loan->getLoanDate();
			$line .= self::CSV_SEPARATOR . $loan->getReturnDate();

			fputcsv($csv_file, array($line));
		}


		fclose($csv_file);
	}

	/**
	 * Add model to list.
	 *
	 * @param object $model Model to add.
	 * @return object Added model.
	 */
	public function add(object $model): object {
		array_push($this->loans, $model);
		return $model;
	}

	/**
	 * Remove model from list.
	 *
	 * @param object $model Model to remove.
	 * @return object Removed model.
	 */
	public function remove(object $model): object {
		$init = array_splice($this->loans, 0, array_search($model, $this->loans));
		$end = array_splice($this->loans, array_search($model, $this->loans) + 1, count($this->loans));
		$this->loans = array_merge($init, $end);
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
			return $this->loans;
		} else {
			foreach ($this->loans as $loan) {
				if ($loan->getId() == $id) {
					return array($loan);
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