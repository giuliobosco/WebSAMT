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
 * @version 1.0 (2019-03-27 - 2019-03-27)
 */

$instrument = $object;
?>

<div class="col-md-12">
	<h3>Instrument</h3>

	<div>
		<b>
			<a href="<?php echo URL; ?>Instruments/index">Back to list</a>
		</b>
	</div>

	<div class="row">&nbsp;</div>

	<div>
		<table class="table">
			<tr>
				<th>property</th>
				<th>value</th>
			</tr>
			<tr>
				<td>name</td>
				<td><?php echo $instrument->getName(); ?></td>
			</tr>
			<tr>
				<td>model</td>
				<td><?php echo $instrument->getModel(); ?></td>
			</tr>
			<tr>
				<td>type</td>
				<td><?php echo $instrument->getType(); ?></td>
			</tr>
			<tr>
				<td>price</td>
				<td><?php echo $instrument->getPrice(); ?></td>
			</tr>
		</table>
	</div>

	<div>
		<a>DELETE</a>
		|
		<a>EDIT</a>
	</div>
</div>

<div class="clearfix"></div>