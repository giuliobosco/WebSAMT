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
 * @version 1.0.2 (2019-05-01 - 2019-05-01)
 */

$books = $data;
?>
<div class="col-md-12">
	<h3>books</h3>
	<h4>
		<a href="<?php echo URL; ?>books/create">add new book</a>
	</h4>

	<table class="table">
		<tr>
			<th>Isbn</th>
			<th>Title</th>
			<th>Author</th>
			<th>Year</th>
			<th>Edition</th>
			<th></th>
		</tr>

		<?php foreach ($books as $book): ?>
			<tr>
				<td><?php echo($book->getIsbn()); ?></td>
				<td><?php echo($book->getTitle()); ?></td>
				<td><?php echo($book->getAuthor()); ?></td>
				<td><?php echo($book->getYear()); ?></td>
				<td><?php echo($book->getEdition()); ?></td>
				<th>
					<a href="<?php echo URL; ?>books/index/<?php echo $book->getId(); ?>">
						Detail
					</a>
					|
					<a href="<?php echo URL; ?>books/delete/<?php echo $book->getId(); ?>">
						Delete
					</a>
				</th>
			</tr>
		<?php endforeach; ?>
	</table>
</div>
