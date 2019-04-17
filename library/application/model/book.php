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
 * Library book.
 *
 * @author giuliobosco
 * @version 1.1.2 (2019-04-17 - 2019-04-17)
 */
class book extends model {

	/**
	 * Library book title.
	 *
	 * @var string
	 */
	private $title;

	/**
	 * Library book author.
	 *
	 * @var string
	 */
	private $author;

	/**
	 * Library book year.
	 *
	 * @var string
	 */
	private $year;

	/**
	 * Library book edition.
	 *
	 * @var string
	 */
	private $edition;

	/**
	 * Library book constructor.
	 *
	 * @param $isbn string Library book isbn.
	 * @param $title string Library book title.
	 * @param $author string Library book author.
	 * @param $year string Library book year.
	 * @param $edition string Library book edition.
	 */
	public function __construct($isbn, $title, $author, $year, $edition) {
		parent::__construct($isbn);

		$this->title = $title;
		$this->author = $author;
		$this->year = $year;
		$this->edition = $edition;
	}

	/**
	 * Get the Library book isbn.
	 *
	 * @return int[object Library book isbn.
	 */
	public function getIsbn() {
		return parent::getId();
	}

	/**
	 * Get the Library book title.
	 *
	 * @return mixed Library book title.
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * Get the Library book author.
	 *
	 * @return mixed Library book author.
	 */
	public function getAuthor() {
		return $this->author;
	}

	/**
	 * Get the Library book year.
	 *
	 * @return mixed Library book year.
	 */
	public function getYear() {
		return $this->year;
	}

	/**
	 * Get the Library book edition.
	 *
	 * @return mixed Library book edition.
	 */
	public function getEdition() {
		return $this->edition;
	}

}