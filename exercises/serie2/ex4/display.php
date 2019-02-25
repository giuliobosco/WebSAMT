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

$file_name = "shopping.json";

if (filesize($file_name) == 0) {
	header('Location: insert.html');
}

$file = fopen($file_name, "r");
$data = fread($file, filesize($file_name));
fclose($file);

$data = json_decode($data);
?>
<!DOCTYPE html>
<html>
<head>
	<title>display</title>
</head>
<body>
<table>
	<tr>
		<th>Id</th>
		<th>product</th>
		<th>product type</th>
		<th>quantity</th>
	</tr>
	<?php foreach ($data as $key => $value): ?>
		<tr>
			<td><?php echo($value->id); ?></td>
			<td><?php echo($value->name); ?></td>
			<td><?php echo($value->type); ?></td>
			<td><?php echo($value->quantity); ?></td>
		</tr>
	<?php endforeach; ?>
</table>
</body>
</html>
