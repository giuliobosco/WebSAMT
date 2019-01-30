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
 * file: index.php
 */

$response = "response: ";
$str = $_POST['string'];
if (strlen($str) > 0) {
	if (count(explode(' ', $str)) == 1) {
		$str = str_replace('a', '@', $str);
		$str = str_replace('e', '&', $str);
		$str = str_replace('i', '!', $str);
		$str = str_replace('o', 'ç', $str);
		$str = str_replace('u', '?', $str);
		
		$numbers = Array('1', '2', '3', '4', '5', '6', '7', '8', '9', '0');
		$str = str_replace($numbers, '%', $str);
		
		$response = 'response: <span style="color: green;background-color: yellow;">' . $str . '</span>';
	} else {
		$str = strtolower($str);
		$str = str_replace(' ', '', $str);
		
		$response = 'response: <span style="color: white;background-color: blue;">' . $str . '</span>';
	}
} else {
	$response = '<span style="color: red">insert a string</span>';
}
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
	<link rel="stylesheet" type="text/css" href="../../../lib/font/font-awesome.min.css">             <!-- special characters -->
	<link rel="stylesheet" type="text/css" href="../../../lib/css/bootstrap.min.css">                          <!-- Bootstrap -->
	
	<!-- Scripts - JavaScript -->
	<script src="../../../lib/js/jquery.js"></script>                                                          <!--- jQuery ---->
	<script src="../../../lib/js/utility.js"></script>                                                         <!--- Utility --->
</head>
<body>

<form class="col-md-offset-3 col-md-6" action="" method="post">
	<div class="col-md-12">
		<h1>Esercizio 1</h1>
	</div>
	
	<div class="col-md-12">
		<span class="col-md-3">string</span>
		<input class="col-md-9" type="text" name="string">
	</div>
	
	<div class="col-md-12">
		<?php echo $response; ?>
	</div>
	
	<div class="col-md-12">
		<input type="submit" class="pull-right">
	</div>
</form>

</body>
</html>
