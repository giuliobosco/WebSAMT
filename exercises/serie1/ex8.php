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

$array = array(
	123=>array("Mario","Gulb","Locarno"),
	222=>array("Teresa","Lupar","Bellinzona"),
	332=>array("Teo","Muzzo","Lugnao")
);

?>
<!DOCTYPE html>
<html>
<head>
	<style>
		table, tr, th, td {
			border: 1px solid black;
			border-collapse: collapse;
		}
	</style>
</head>
<body>
<table>
	<tr>
		<th>CID</th>
		<th>Nome</th>
		<th>Cognome</th>
		<th>Citta</th>
	</tr>
	<?php foreach ($array as $key => $value) { ?>
		<tr>
			<td><?php echo($key); ?></td>
			<?php foreach ($value as $item) { ?>
				<td><?php echo($item); ?></td>
			<?php } ?>
		</tr>
	<?php } ?>
</table>
</body>
</html>
