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
 * @version 1.0 (2019-05-01 - 2019-05-01)
 */
class users extends Controller {

	public function __construct(array $parameters) {
		parent::__construct($parameters);
		$this->req_model_service();
	}

	private function req_model_service(): void {
		require_once "application/model/user.php";
		require_once "application/services/UserService.php";
	}

	public function index(): void {
		$userService = new UserService();
		$userService->loadFile();

		if (count($this->parameters) > 0) {
			$user = $userService->get($this->parameters[0]);
			$this->req_view("details", $user);
		} else {
			$users = $userService->get();
			$this->req_view("index", $users);
		}
	}

	public function create(): void {
		if (count($_POST) > 0) {
			try {
				$userService = new UserService();
				$userService->loadFile();
				$userService->addByKeyArray($_POST);
				$userService->writeFile();
				header("location:" . URL . "users/index");
			} catch (Exception $e) {
				$this->req_view("create", $_POST, array($e->getMessage()));
			}
		} else {
			$this->req_view("create", array());
		}
	}

	public function delete(): void {
		$userService = new UserService();
		$userService->loadFile();

		if (count($this->parameters) > 0) {
			$user = $userService->get($this->parameters[0]);
			$this->req_view("delete", $user);
			return;
		} else if (count($this->parameters) == 2 && $this->parameters[1] == "confirmed") {
			$user = $userService->get($this->parameters[0]);
			$userService->remove($user[0]);
			$userService->writeFile();
		}

		header("location:".URL."users/index");
	}
}