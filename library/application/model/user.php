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

require_once "model.php";

/**
 * Library user.
 *
 * @author giuliobosco
 * @version 1.0.3 (2019-04-17 - 2019-05-01)
 */
class user extends model {

	/**
	 * @var string User first name.
	 */
	private $first_name;

	/**
	 * @var string User last name.
	 */
	private $last_name;

	/**
	 * @var string User password.
	 */
	private $password;

	/**
	 * @var string User full address.
	 */
	private $address;

	/**
	 * @var string User born date.
	 */
	private $born_date;

	/**
	 * @var string User kind (Administrator/Normal).
	 */
	private $user_kind;

	/**
	 * user constructor.
	 * @param $username string User username.
	 * @param $first_name User first name.
	 * @param $last_name User last name.
	 * @param $password User password.
	 * @param $address User address.
	 * @param $born_date User born date.
	 * @param $user_kind User kind.
	 */
	public function __construct($username, $first_name, $last_name, $password, $address, $born_date, $user_kind) {
		parent::__construct($username);

		$this->first_name = $first_name;
		$this->last_name = $last_name;
		$this->password = $password;
		$this->address = $address;
		$this->born_date = $born_date;
		$this->user_kind = $user_kind;
	}

	/**
	 * Get the user username.
	 *
	 * @return string User username.
	 */
	public function getUsername() {
		return parent::getId();
	}

	/**
	 * Get the user first name.
	 *
	 * @return mixed User first name.
	 */
	public function getFirstName() {
		return $this->first_name;
	}

	/**
	 * Get the user last name.
	 *
	 * @return mixed User last name.
	 */
	public function getLastName() {
		return $this->last_name;
	}

	/**
	 * Get the user password.
	 *
	 * @return string User password.
	 */
	public function getPassword() {
		return $this->password;
	}

	/**
	 * Get the user address.
	 *
	 * @return mixed User address.
	 */
	public function getAddress() {
		return $this->address;
	}

	/**
	 * Get the user born date.
	 *
	 * @return mixed User born date.
	 */
	public function getBornDate() {
		return $this->born_date;
	}

	/**
	 * Get the user kind.
	 *
	 * @return mixed User kind.
	 */
	public function getUserKind() {
		return $this->user_kind;
	}

	/**
	 * Check the password of the user.
	 *
	 * @param $password string Password of the user.
	 * @return bool True if password is right, otherwise false.
	 */
	public function isRightPassword($password) {
		return $password == $this->password;
	}
}