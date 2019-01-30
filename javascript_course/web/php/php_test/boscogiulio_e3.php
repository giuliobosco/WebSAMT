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

$done = $_POST['done'];
$total = $_POST['total'];
$exp = 1;

if (!($exp > 0 && $exp <= 1)) {
	$done = -1;
}

if ($done > 0 && $total > 0) {
	$note = pow($done / $total, $exp) * 5 + 1;
	$color = '';
	if ($note >= 4) {
		$color = 'green';
	} elseif ($note < 3) {
		$color = 'red';
	} else {
		$color = 'orange';
	}
	$response = '<span style="background-color: yellow; color:'.$color.'">'.$note.'</span>';
} else {
	$response = "<span style=\"color: red\">insert corrrect data</span>";
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
		<h1>Esercizio 3</h1>
	</div>
	
	<div class="col-md-6">
		<p>punti fatti</p>
		<input class="col-md-12" type="number" name="done" placeholder="punti fatti">
	</div>
	
	<div class="col-md-6">
		<p>punti totali</p>
		<input class="col-md-12" type="number" name="total" placeholder="punti totali">
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
