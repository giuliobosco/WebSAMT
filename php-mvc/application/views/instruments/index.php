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
 * @version 1.0 (2019-03-20 - 2019-03-20)
 */
?>

<h2>Instruments</h2>
<h3>Instruments list</h3>
<table>
	<tr>
		<th>Name</th>
		<th>Model</th>
		<th>Type</th>
		<th>Price</th>
	</tr>
	<?php foreach ($instruments as $instrument): ?>
		<tr>
			<td><?php echo ($instrument->getName()); ?></td>
			<td><?php echo ($instrument->getModel()); ?></td>
			<td><?php echo ($instrument->getType()); ?></td>
			<td><?php echo ($instrument->getPrice()); ?></td>
		</tr>
	<?php endforeach; ?>
</table>
