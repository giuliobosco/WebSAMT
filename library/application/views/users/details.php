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
	$user = $data[0];
	?>

	<div class="col-md-12">
		<h3>user</h3>

		<div>
			<b>
				<a href="<?php echo URL; ?>users/index">Back to list</a>
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
					<td>Username</td>
					<td><?php echo $user->getUsername(); ?></td>
				</tr>
				<tr>
					<td>First name</td>
					<td><?php echo $user->getFirstName(); ?></td>
				</tr>
				<tr>
					<td>Last name</td>
					<td><?php echo $user->getLastName(); ?></td>
				</tr>
				<tr>
					<td>Address</td>
					<td><?php echo $user->getAddress(); ?></td>
				</tr>
				<tr>
					<td>Born date</td>
					<td><?php echo $user->getBornDate(); ?></td>
				</tr>
				<tr>
					<td>User Kind</td>
					<td><?php echo $user->getUserKind(); ?></td>
				</tr>
			</table>
		</div>

		<div>
			<a class="btn" href="<?php echo URL; ?>users/delete/<?php echo $user->getUsername(); ?>">DELETE</a>
		</div>
	</div>

	<div class="clearfix"></div>

<?php endif; ?>