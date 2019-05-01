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

$loans = $data;
?>
<div class="col-md-12">
	<h3>loans</h3>

	<h4>
		<a href="<?php echo URL; ?>loans/create">add new loan</a>
	</h4>

	<table class="table">
		<tr>
			<th>Id</th>
			<th>Book</th>
			<th>User</th>
			<th>Loan date</th>
			<th>Return date</th>
			<th></th>
		</tr>

		<?php foreach ($loans as $loan): ?>
			<tr>
				<td><?php echo $loan->getId(); ?></td>
				<td>
					<a href="<?php echo URL; ?>books/details/<?php echo $loan->getBook()->getIsbn(); ?>">
						<?php echo $loan->getBook()->getTitle(); ?>
					</a>
				</td>
				<td>
					<a href="<?php echo URL; ?>users/details/<?php echo $loan->getUser()->getUsername(); ?>">
						<?php echo $loan->getUser()->getUsername(); ?>
					</a>
				</td>
				<td><?php echo $loan->getLoanDate(); ?></td>
				<td><?php echo $loan->getReturnDate(); ?></td>
				<td>
					<a href="<?php echo URL; ?>loans/index/<?php echo $loan->getId(); ?>">
						Details
					</a>
					|
					<a href="<?php echo URL; ?>loans/delete/<?php echo $loan->getId(); ?>">
						Delete
					</a>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>
</div>
