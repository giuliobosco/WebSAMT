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
 * Library loan.
 *
 * @author giuliobosco
 * @version 1.0.2 (2019-04-17 - 2019-04-17)
 */
class loan extends model {

	/**
	 * Library loan book.
	 *
	 * @var string
	 */
	private $book;

	/**
	 * Library loan user.
	 *
	 * @var string
	 */
	private $user;

	/**
	 * Library loan start date.
	 *
	 * @var string
	 */
	private $loan_date;

	/**
	 * Library loan end date.
	 * If not returned is null.
	 *
	 * @var string|null
	 */
	private $return_date;

	/**
	 * loan constructor.
	 *
	 * @param $id string Library loan id.
	 * @param $book string Library loan book.
	 * @param $user string Library loan user.
	 * @param $loan_date string Library loan start date.
	 * @param null|string $return_date Library loan end date.
	 */
	public function __construct($id, $book, $user, $loan_date, $return_date = null) {
		parent::__construct($id);

		$this->book = $book;
		$this->user = $user;
		$this->loan_date = $loan_date;
		$this->return_date = $return_date;
	}

	/**
	 * Get the Library loan book.
	 *
	 * @return mixed Library loan book.
	 */
	public function getBook() {
		return $this->book;
	}

	/**
	 * Get the Library loan user.
	 *
	 * @return mixed Library loan user.
	 */
	public function getUser() {
		return $this->user;
	}

	/**
	 * Get the Library loan start date.
	 *
	 * @return mixed Library loan start date.
	 */
	public function getLoanDate() {
		return $this->loan_date;
	}

	/**
	 * Get the Library loan end date.
	 *
	 * @return null|string Library loan end date.
	 */
	public function getReturnDate() {
		return $this->return_date;
	}
}