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

require_once "controller.php";

/**
 * @author giuliobosco
 * @version 1.0.3 (2019-05-01 - 2019-05-01)
 */
class books extends Controller {
	public function __construct(array $parameters) {
		parent::__construct($parameters);
		$this->req_model_service();
	}

	public function req_model_service():void {
		require_once "application/model/book.php";
		require_once "application/services/BookService.php";
	}

	public function index():void {
		$bookService = new BookService();
		$bookService->loadFile();

		if (count($this->parameters) > 0) {
			$book = $bookService->get($this->parameters[0]);
			$this->req_view("details", $book);
		} else {
			$books = $bookService->get();
			$this->req_view("index", $books);
		}
	}

	public function create(): void {
		if (count($_POST) > 0) {
			try {
				$bookService = new BookService();
				$bookService->loadFile();
				$bookService->addByKeyArray($_POST);
				$bookService->writeFile();
				$this->index();
			} catch (Exception $e) {
				$this->req_view("create", $_POST, array($e->getMessage()));
			}
		} else {
			$this->req_view("create", array());
		}
	}
}