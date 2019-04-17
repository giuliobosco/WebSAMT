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
require_once 'application/model/user.php';

/**
 * User service.
 *
 * @author giuliobosco
 * @version 1.0.1 (2019-04-17 - 2019-04-17)
 */
class UserService implements service {

	/**
	 * Book csv file separator.
	 */
	private const CSV_SEPARATOR = ";";

	/**
	 * @var array Users.
	 */
	private $users = array();

	/**
	 * UserService constructor.
	 * Load csv file.
	 */
	public function __construct() {
		$this->loadFile();
	}

	/**
	 * Load csv file in users.
	 */
	public function loadFile() {
		$this->users = array();
		$csv_file = fopen(USERS_CSV_FILE, "r");

		fgetcsv($csv_file);

		while (!feof($csv_file)) {
			$string = fgetcsv($csv_file)[0];
			$string = explode(self::CSV_SEPARATOR, $string);

			if (count($string) > 6) {
				$user = new user(
					strval($string[0]),
					strval($string[1]),
					strval($string[2]),
					strval($string[3]),
					strval($string[4]),
					strval($string[5]),
					strval($string[6])
				);

				array_push($this->users, $user);
			}
		}

		fclose($csv_file);
	}

	/**
	 * Write loans in csv file.
	 */
	public function writeFile(){
		$csv_file = fopen(USERS_CSV_FILE, "w");

		$header = "username;first_name;last_name;password;address;born_date;king;";
		fputcsv($csv_file, array($header));

		foreach ($this->users as $user) {
			$line = $user->getUsername();
			$line .= self::CSV_SEPARATOR . $user->getFirstName();
			$line .= self::CSV_SEPARATOR . $user->getLastName();
			$line .= self::CSV_SEPARATOR . $user->getPassword();
			$line .= self::CSV_SEPARATOR . $user->getAddress();
			$line .= self::CSV_SEPARATOR . $user->getBornDate();
			$line .= self::CSV_SEPARATOR . $user->getUserKind();

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
		array_push($this->users, $model);
		return $model;
	}

	/**
	 * Remove model from list.
	 *
	 * @param object $model Model to remove.
	 * @return object Removed model.
	 */
	public function remove(object $model): object {
		$init = array_splice($this->users, 0, array_search($model, $this->users));
		$end = array_splice($this->users, array_search($model, $this->users) + 1, count($this->users));
		$this->users = array_merge($init, $end);
		return $model;
	}

	/**
	 * Get model or models.
	 *
	 * @param $id string Id of the model or null for array of all models.
	 * @return array|null Models in array, if only one is at index 0.
	 */
	public function get($id = null): array {
		if ($id == null) {
			return $this->users;
		} else {
			foreach ($this->users as $user) {
				if ($user->getUsername() == $id) {
					return array($user);
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