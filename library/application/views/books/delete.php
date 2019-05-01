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
 * @version 1.0 (2019-05-01 - 2019-05-01)
 */


if (count($data) > 0):
	$book = $data[0];
	?>

	<div class="col-md-12">
		<h3>Delete book</h3>

		<div>
			<b>
				<a href="<?php echo URL; ?>books/index">Back to list</a>
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
					<td>Isbn</td>
					<td><?php echo $book->getIsbn(); ?></td>
				</tr>
				<tr>
					<td>Title</td>
					<td><?php echo $book->getTitle(); ?></td>
				</tr>
				<tr>
					<td>Author</td>
					<td><?php echo $book->getAuthor(); ?></td>
				</tr>
				<tr>
					<td>Year</td>
					<td><?php echo $book->getYear(); ?></td>
				</tr>
				<tr>
					<td>Edition</td>
					<td><?php echo $book->getEdition(); ?></td>
				</tr>
			</table>
		</div>

		<div>
			<a style="color: #ffffff;background-color: #ff0000" class="btn"
			   href="<?php echo URL; ?>books/delete/<?php echo $book->getIsbn(); ?>/confirmed">DELETE</a>
			<a class="btn">Cancel</a>
		</div>
	</div>

	<div class="clearfix"></div>

<?php endif; ?>