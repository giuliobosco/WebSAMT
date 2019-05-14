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
 * PHP MVC Application.
 *
 * @author giuliobosco
 * @version 1.0.4 (2019-03-13 - 2019-03-20)
 */
class Application {

	/**
	 * @var string Controller to load.
	 */
	private $url_controller;

	/**
	 * @var string Action to execute on the controller.
	 */
	private $url_action;

	/**
	 * @var array Parameters for the action.
	 */
	private $url_parameters;

	/**
	 * @var Controller Controller of the url.
	 */
	private $controller;

	function __construct() {
		// split the url in attributes
		$this->splitUrl();

		if (file_exists('./application/controllers/' . $this->url_controller . '.php')) {
			// check if the controller exists and require it
			require './application/controllers/' . $this->url_controller . '.php';

			// create the controller
			$this->controller = new $this->url_controller($this->url_parameters);
			if (method_exists($this->controller, $this->url_action)) {
				// check if the action exists
				$this->controller->{$this->url_action}();
			} else {
				// if the action doesn't exists open the index of the controller
				$this->controller->index();
			}
		} else {
			require "./application/controllers/home.php";       // require the home controller
			$home = new Home(Array());                          // create a new home controller
			$home->index();                                     // open the index of the home
		}
	}

	/**
	 * Split the url, in the attributes of the url controller, action and parameters.
	 */
	private function splitUrl() {
		// check that the url exists in the HTTP GET request.
		if (isset($_GET['url'])) {
			$url = rtrim($_GET['url'], '/');            // trim in between the '/'
			$url = filter_var($url, FILTER_SANITIZE_URL); // sanitize url
			$url = explode('/', $url);                 // expolode in arrays in between '/'

			if (count($url) > 0) {
				// check if the url contains at least 2 elements
				$this->url_controller = $url[0];                // set the controller
				if (count($url) > 1) {
					$this->url_action = $url[1];                    // set the controller action
				}

				$parameters = array();                          // create array for parameters

				// for each parameter copy in parameters array
				for ($i = 2; $i < count($url); $i++) {
					array_push($parameters, $url[$i]);
				}

				$this->url_parameters = $parameters;            // copy array in url_parameters
			} else {
				// if url doesn't contains enough parameters set all attributes to null
				$this->url_controller = null;
				$this->url_action = null;
				$this->url_parameters = null;
			}
		}
	}
}