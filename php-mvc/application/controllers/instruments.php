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

require "controller.php";

/**
 * @author giuliobosco
 * @version 1.0.1 (2019-03-20 - 2019-03-27)
 */
class instruments extends Controller {

	/**
	 * Instruments constructor.
	 * @param array $parameters Parameters of the controller.
	 */
	public function __construct(array $parameters) {
		parent::__construct($parameters);
	}

	public function req_instrument(): void {
		require "application/model/instrument.php";
	}

	/**
	 * Instruments index, instruments list.
	 */
	public function index(): void {
		$this->requireHeader();

		$this->req_instrument();

		$instruments = instrument::getInstruments();

		if (count($this->parameters) > 0) {
			$instrument = array($instruments[$this->parameters[0]])[0];
			$this->req_view("detail", $instrument);
		} else {
			$this->req_view("index", $instruments);
		}

		$this->requireFooter();
	}

	public function delete(): void {
		$this->req_instrument();

		if (count($this->parameters) > 0) {
			$instrument_id = $this->parameters[0];
			instrument::removeFromCsv($instrument_id);
		}

		$this->index();
	}
}