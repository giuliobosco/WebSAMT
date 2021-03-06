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
require_once "application/model/user.php";
require_once "application/services/UserService.php";
require_once 'application/model/book.php';
require_once 'application/services/BookService.php';
require_once 'application/model/loan.php';
require_once 'application/services/LoanService.php';

/**
 * Controller for test models and services.
 *
 * @author giuliobosco
 * @version 1.0.4 (2019-04-17 - 2019-04-17)
 */
class test extends Controller {

	/**
	 * Create the controller for test the models and the services.
	 *
	 * @param array $parameters Http URL Request parameters.
	 */
	public function __construct(array $parameters) {
		parent::__construct($parameters);
	}

	/**
	 * Index test page.
	 */
	public function index(): void {
		parent::index(); // TODO: Change the autogenerated stub
	}

	/**
	 * Test the UserService and the user model.
	 */
	public function UserService():void {
		$service = new UserService();

		$service->loadFile();
		var_dump($service->get());

		var_dump($service->get("admin"));
		$user = new user("normal2", "Library", "Normal2", "12345", "Viao adjfaosdj", "2001/01/01", "Normal");
		$service->add($user);
		$service->writeFile();
		$service->loadFile();
		var_dump($service->get());
		$service->remove($user);
		$service->writeFile();
		$service->loadFile();
		var_dump($service->get());
	}

	/**
	 * Test the BookService and the book model.
	 */
	public function BookService():void {
		$service = new BookService();

		$service->loadFile();
		var_dump($service->get());

		var_dump($service->get("10"));

		$book = new book("20", "Libro 2", "Autore", "2019", "1");
		$service->add($book);
		$service->writeFile();
		$service->loadFile();
		var_dump($service->get());

		$service->remove($book);
		$service->writeFile();
		$service->loadFile();
		var_dump($service->get());
	}

	/**
	 * Test the LoanService and the loan model.
	 */
	public function LoanService(): void {
		$service = new LoanService();
		$bookService = new BookService();
		$userService = new UserService();

		var_dump($service->get());

		var_dump($service->get("0"));

		//3;10;admin;2019/04/01;null
		$loan = new loan("3", $bookService->get("10")[0], $userService->get("admin")[0], "2019/04/01", "2019/04/02");
		$service->add($loan);
		$service->writeFile();
		$service->loadFile();
		var_dump($service->get());

		$service->remove($loan);
		$service->writeFile();
		$service->loadFile();
		var_dump($service->get());
	}

}