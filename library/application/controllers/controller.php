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
 * PHP MVC Controller base.
 *
 * @author giuliobosco
 * @version 1.0.4 (2019-03-13 - 2019-03-27)
 */
class Controller {

	/**
	 * @var array Parameters of the controller.
	 */
	protected $parameters;

	/**
	 * Controller constructor.
	 *
	 * @param array $parameters Paramters of the controller.
	 */
	public function __construct(array $parameters) {
		$this->parameters = $parameters;
	}

	/**
	 * Controller index.
	 */
	public function index():void {
		echo ("<h1>it works!</h1>");
	}

	/**
	 * Require the header.
	 */
	public function requireHeader():void {
		require "application/views/_template/header.html";
	}

	/**
	 * Require the footer.
	 */
	public function requireFooter():void {
		require "application/views/_template/footer.html";
	}

	/**
	 * Require a view of the controller.
	 * In the view must be used object for read data.
	 *
	 * @param string $view_name View name.
	 * @param $data array Object with data for the view.
	 */
	public function req_view(string $view_name, array $data):void {
		require "application/views/" . get_class($this) . "/" . $view_name . ".php";
	}
}