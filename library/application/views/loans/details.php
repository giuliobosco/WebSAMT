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
	$loan = $data[0];
	?>

	<div class="col-md-12">
		<h3>loan</h3>

		<div>
			<b>
				<a href="<?php echo URL; ?>loans/index">Back to list</a>
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
					<td>Id</td>
					<td><?php echo $loan->getId(); ?></td>
				</tr>
				<tr>
					<td>Book</td>
					<td>
						<a href="<?php echo URL; ?>books/details/<?php echo $loan->getBook()->getIsbn(); ?>">
							<?php echo $loan->getBook()->getTitle(); ?>
						</a>
					</td>
				</tr>
				<tr>
					<td>User</td>
					<td>
						<a href="<?php echo URL; ?>users/details/<?php echo $loan->getUser()->getUsername(); ?>">
							<?php echo $loan->getUser()->getUsername(); ?>
						</a>
					</td>
				</tr>
				<tr>
					<td>Loan date</td>
					<td><?php echo $loan->getLoanDate(); ?></td>
				</tr>
				<tr>
					<td>Return date</td>
					<td><?php echo $loan->getReturnDate(); ?></td>
				</tr>
			</table>
		</div>

		<div>
			<a class="btn" href="<?php echo URL; ?>loans/delete/<?php echo $loan->getId(); ?>">DELETE</a>
		</div>
	</div>

	<div class="clearfix"></div>

<?php endif; ?>