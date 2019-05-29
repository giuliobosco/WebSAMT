<?php /*
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
 * PHP MVC Home controller.
 *
 * @author giuliobosco
 * @version 1.0.2 (2019-03-13 - 2019-03-20)
 */

require_once "application/services/UserService.php";
require_once "application/controllers/users.php";
require_once "application/helper/LibrarySession.php";
require_once "controller.php";

class home extends Controller {

	/**
	 * Home constructor.
	 * @param array $parameters Parameters of the controller.
	 */
	public function __construct(array $parameters) {
		parent::__construct($parameters);
	}

	/**
	 * Require the index of the home controller.
	 */
	public function index(): void {
		$this->requireHeader();
		require "application/views/home/index.html";
		$this->requireFooter();
	}

	/**
	 * Test parameters.
	 */
	public function parameters(): void {
		$this->requireHeader();
		require "application/views/home/parameters.php";
		$this->requireFooter();
	}

	public function login(): void {
		if ($_POST) {
			if (isset($_POST['username']) && isset($_POST['password'])) {
				if (empty($_POST['username'])) {
					$this->req_view("login", $_POST, array("insert username and password"));
					return;
				}

				if (empty($_POST['password'])) {
					$this->req_view("login", array(), array("insert username and password"));
					return;
				}

				$username = strval(htmlspecialchars($_POST['username']));
				$password = strval(htmlspecialchars($_POST['password']));

				if (UserService::userExists($username, $password)) {
					LibrarySession::setCookie($username);
				} else {
					$this->req_view("login", $_POST, array("wrong username or password"));
				}
			}
			return;
		}

		$this->req_view("login", array());
	}
}

//setcookie('times', '',time() - 1);
//setcookie('username', '', time() - 1);