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
 * @author giuliobosco
 * @version 1.0
 */

$default_rows = 8;

$default_cols = 8;

$default_odd_color = 'white';

$default_even_color = 'black';

if (!($_SERVER['REQUEST_METHOD'] == 'POST' || $_SERVER['REQUEST_METHOD'] == 'GET' && (!empty($_GET) && isset($_GET)))) {
	header('Location: chessboard_form.php');
}

$method = $_SERVER['REQUEST_METHOD'] == 'POST' ? $_POST : $_GET;

if (!isset($method['rows']) || empty($method['cols'])) {
	$method['rows'] = $default_rows;
}
$rows = intval($method['rows']);

if (!isset($method['cols']) || empty($method['cols'])) {
	$method['cols'] = $default_cols;
}
$cols = intval($method['cols']);

if (!isset($method['odd_color']) || empty($method['odd_color'])) {
	$method['odd_color'] = $default_odd_color;
}
$odd_color = strval($method['odd_color']);

if (!isset($method['even_color']) || empty($method['even_color'])) {
	$method['even_color'] = $default_even_color;
}
$even_color = strval($method['even_color']);

?>

<!DOCTYPE html>
<html>
<head>
	<style>
		table, td {
			border:1px solid black;
			border-collapse: collapse;
		}
		td {
			height: 20px;
			width: 20px;
		}
	</style>
	<title>chessboard</title>
</head>
<body>
<table>
	<?php for ($i = 0; $i < $rows; $i++) : ?>
		<tr>
			<?php for ($j = 0; $j < $cols; $j++) : ?>
				<td style="background-color: <?php echo($i % 2 == 0 ? ($j % 2 == 0 ? $odd_color : $even_color) : ($j % 2 == 0 ? $even_color : $odd_color)); ?>;"></td>
			<?php endfor; ?>
		</tr>
	<?php endfor; ?>
</table>
</body>
</html>
