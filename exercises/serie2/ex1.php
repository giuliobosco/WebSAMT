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

$test = "";

function resolver_sqrt(float $a, float $b, float $c): float {
	return sqrt($b ** 2 - 4 * $a * $c);
}

function resolver_x1(float $a, float $b, float $c): float {
	return (-$b + resolver_sqrt($a, $b, $c)) / 2 * $a;
}

function resolver_x2(float $a, float $b, float $c): float {
	return (-$b - resolver_sqrt($a, $b, $c)) / 2 * $a;
}

function resolver($method) {

	if (!isset($method['a']) || empty($method['a'])) {
		$method['a'] = 0;
	}

	if (!isset($method['b']) || empty($method['b'])) {
		$method['b'] = 0;
	}

	if (!isset($method['c']) || empty($method['c'])) {
		$method['c'] = 0;
	}

	$a = floatval($method['a']);
	$b = floatval($method['b']);
	$c = floatval($method['c']);

	return array('a' => $a, 'b' => $b, 'c' => $c, 'x1' => resolver_x1($a, $b, $c), 'x2' => resolver_x2($a, $b, $c));
}

?>
<!DOCTYPE html>
<html>
<body>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' || $_SERVER['REQUEST_METHOD'] == 'GET' && (!empty($_GET) && isset($_GET))) :
	$results = resolver($_SERVER['REQUEST_METHOD'] == 'POST' ? $_POST : $_GET);
	?>
	<p>
		Equation: <?php echo($results['a']); ?>x<sup>2</sup> + <?php echo($results['b']); ?>x
		+ <?php echo($results['c']); ?> = 0
	</p>
	<p>
		x1 = <?php echo($results['x1']); ?><br>
		x2 = <?php echo($results['x2']); ?>
	</p>
<?php
else:

	?>
	<form method="post" action="ex1.php">
		<h2>Second degreee equation resolver</h2>
		<input type="number" name="a" placeholder="A">
		<input type="number" name="b" placeholder="B">
		<input type="number" name="c" placeholder="C">

		<input type="submit">
	</form>
<?php endif; ?>

</body>
</html>