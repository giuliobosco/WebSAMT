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

require_once "vendor/autoload.php";

/**
 * @author giuliobosco
 * @version 1.0 (2019-05-29 - 2019-05-29)
 */

/**
 * @param string $string Check html special chars and parse to string.
 * @return string String.
 */
function checkValidInputString(string $string): string {
	$string = htmlspecialchars($string);
	$string = strval($string);
	return $string;
}

if (isset($_POST)) {
	$parameters = array("firstname", "lastname", "borndate", "email", "address[street]", "address[postcode]", "address[city]");
	$checked = array();

	// check all parameters
	foreach ($parameters as $parameter) {
		if (isset($_POST[$parameter]) && !empty($_POST[$parameter])) {
			array_push($checked, checkValidInputString($_POST[$parameter]));
		}
 	}

	// if some parameter aren't good, return to register.html
	if (!count($checked) === count($parameters)) {
		header('location:register.html');
	}

	$notes = null;
	if (isset($_POST["notes"]) && !empty($_POST["notes"])) {
		$notes = checkValidInputString($_POST["notes"]);
	}

	$pdf = new FPDF();
	$pdf->AddPage();
	$pdf->SetFont('Arial','B',32);
	$pdf->Cell(40,10,'Your data');
	$pdf->Ln();
	$pdf->SetFont('Arial', '', 16);

	for ($i = 0; $i < count($parameters); $i++) {
		$pdf->Cell(40, 10, $parameters[$i]);
		$pdf->Cell(40, 10, $checked[$i]);
		$pdf->Ln();
	}

}