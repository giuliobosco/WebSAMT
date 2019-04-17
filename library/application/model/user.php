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
 * @version 1.0 (2019-04-17 - 2019-04-17)
 */
class user extends model {

	private $first_name;

	private $last_name;

	private $password;

	private $address;

	private $born_date;

	private $user_kind;

	public function __construct(int $username, $first_name, $last_name, $password, $address, $born_date, $user_kind) {
		parent::__construct($username);

		$this->first_name = $first_name;
		$this->last_name = $last_name;
		$this->password = $password;
		$this->address = $address;
		$this->born_date = $born_date;
		$this->user_kind = $user_kind;
	}

	public function getUsername() {
		return parent::getId();
	}

	/**
	 * @return mixed
	 */
	public function getFirstName() {
		return $this->first_name;
	}

	/**
	 * @return mixed
	 */
	public function getLastName() {
		return $this->last_name;
	}

	/**
	 * @return mixed
	 */
	public function getAddress() {
		return $this->address;
	}

	/**
	 * @return mixed
	 */
	public function getBornDate() {
		return $this->born_date;
	}

	/**
	 * @return mixed
	 */
	public function getUserKind() {
		return $this->user_kind;
	}

}