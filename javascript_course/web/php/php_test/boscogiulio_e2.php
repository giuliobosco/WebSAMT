<?php
/*
 * Copyright 2018 Giulio Bosco (giuliobva@gmail.com)
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:
 * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 */
/*
 * project: 307-js
 * description: SAMT I2AA - Modulo 307 - Implementare funzioni di controllo
 *
 * author: Giulio Bosco (giuliobva@gmail.com)
 * version: 1.0
 * date: 05.06.2018
 *
 * file: boscogiulio_e2.php
 */

$response = "response: ";

$cols = $_POST['cols'];
$rows = $_POST['rows'];

$cols_color = $_POST['cols-color'];
$rows_color = $_POST['rows-color'];

$letters = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'L', 'M', 'N', 'O', 'P', 'Q', 'S', 'T', 'U', 'V', 'Z');

$response = '<table>';
for ($i = 1; $i <= $rows; $i++) {
	$response .= '<tr>';
	
	for ($j = 1; $j <= $cols; $j++) {
		if ($i % 2 == 0 && $j % 2 == 1) {
			if ($i % 5 == 0 && $j % 5 == 0) {
				$response .= '<td style="background-color: violet; color: yellow">' . $letters[$i] . $j . '</td>';
			} else {
				$response .= '<td style="background-color: ' . $cols_color . '">' . $letters[$i] . $j . '</td>';
			}
		} else {
			if ($i % 5 == 0 && $j % 5 == 0) {
				$response .= '<td style="background-color: violet; color: yellow">' . $letters[$i] . $j . '</td>';
			} else {
				$response .= '<td>' . $letters[$i] . $j . '</td>';
			}
		}
	}
	
	$response .= '</tr>';
}
$response .= '</table>';

$t_w = 100 / $cols;
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta property="og:type" content="website">
	<meta name="keywords" content="<keywords>">
	<meta property="og:title" content="<title>">
	<meta name="description" content="<description>">
	<meta property="og:description" content="<descriptio>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<!-- pages title -->
	<title>Bosco Giulio &vert; Test 4 - Modulo 307 &vert; Esercizio 1</title>
	
	<!-- stylesheet - CSS -->
	<link rel="stylesheet" type="text/css" href="../../../lib/font/font-awesome.min.css">
	<!-- special characters -->
	<link rel="stylesheet" type="text/css" href="../../../lib/css/bootstrap.min.css">
	<!-- Bootstrap -->
	
	<style>
		.result {
			background-color: <?php echo $rows_color ?>;
		}
		
		table, tr{
			width: 100%;
		}
		
		table tr td {
			width: <?php $t_w ?>%;
			
			border: 1px solid black;
			border-collapse: collapse;
			padding: 10px;
		}
	</style>
	
	<!-- Scripts - JavaScript -->
	<script src="../../../lib/js/jquery.js"></script>
	<!--- jQuery ---->
	<script src="../../../lib/js/utility.js"></script>
	<!--- Utility --->
</head>
<body>

<form class="col-md-offset-3 col-md-6" action="" method="post">
	<div class="col-md-12">
		<h1>Esercizio 2</h1>
	</div>
	
	<div class="col-md-6">
		<p>insert the number of rows</p>
		<input class="col-md-12" type="number" name="rows" placeholder="rows">
	</div>
	
	<div class="col-md-6">
		<p>insert the number of colums</p>
		<input class="col-md-12" type="number" name="cols" placeholder="colums">
	</div>
	
	<div class="col-md-6">
		<p>insert color 1</p>
		<select name="rows-color" class="col-md-12">
			<option value="green">green</option>
			<option value="blue">blue</option>
			<option value="red">red</option>
			<option value="yellow">yellow</option>
			<option value="white">white</option>
			<option value="black">black</option>
			<option value="orange">orange</option>
		</select>
	</div>
	
	<div class="col-md-6">
		<p>insert color 2</p>
		<select name="cols-color" class="col-md-12">
			<option value="green">green</option>
			<option value="blue">blue</option>
			<option value="red">red</option>
			<option value="yellow">yellow</option>
			<option value="white">white</option>
			<option value="black">black</option>
			<option value="orange">orange</option>
		</select>
	</div>
	
	<div class="col-md-12">
		<input type="submit" class="pull-right">
	</div>
	
	<div class="col-md-12 result">
		<?php echo $response; ?>
	</div>
</form>

</body>
</html>
