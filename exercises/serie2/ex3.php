<!DOCTYPE html>
<html>
<head>
	<title>pitagora</title>
	<style>
		table, td {
			border: 1px solid black;
			border-collapse: collapse;
		}

		td {
			padding: 3px;
		}
	</style>
</head>
<body>

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

$default_rows = 10;

$default_cols = 10;

$default_color = 'white';

if ($_SERVER['REQUEST_METHOD'] == 'POST' || $_SERVER['REQUEST_METHOD'] == 'GET' && (!empty($_GET) && isset($_GET))) :

	$method = $_SERVER['REQUEST_METHOD'] == 'POST' ? $_POST : $_GET;

	if (!isset($method['rows']) || empty($method['cols'])) {
		$method['rows'] = $default_rows;
	}
	$rows = intval($method['rows']);

	if (!isset($method['cols']) || empty($method['cols'])) {
		$method['cols'] = $default_cols;
	}
	$cols = intval($method['cols']);

	if (!isset($method['color']) || empty($method['color'])) {
		$method['color'] = $default_color;
	}
	$color = strval($method['color']);
	?>

	<table>
		<?php for ($i = 0; $i <= $rows; $i++) : ?>
			<tr>
				<?php for ($j = 0; $j <= $cols; $j++) : ?>
					<?php if ($i == 0 && $j == 0) : ?>
						<td style="background-color: <?php echo($color); ?>">0</td>
					<?php elseif ($i == 0): ?>
						<td style="background-color: <?php echo($color); ?>"><?php echo($j); ?></td>
					<?php elseif ($j == 0): ?>
						<td style="background-color: <?php echo($color); ?>"><?php echo($i); ?></td>
					<?php else: ?>
						<td><?php echo($i * $j); ?></td>
					<?php endif; ?>
				<?php endfor; ?>
			</tr>
		<?php endfor; ?>
	</table>

<?php else: ?>
	<form method="post" action="ex3.php">
		<input type="number" name="rows" placeholder="rows">
		<input type="number" name="cols" placeholder="cols">

		<br>

		<input type="text" name="color" placeholder="color">

		<br>

		<input type="submit">
	</form>
<?php endif; ?>

</body>
</html>
