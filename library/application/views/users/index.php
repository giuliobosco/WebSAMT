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

$users = $data;
?>
<div class="col-md-12">
	<h3>users</h3>

	<h4>
		<a href="<?php echo URL; ?>users/create">add new user</a>
	</h4>

	<table class="table">
		<tr>
			<th>Username</th>
			<th>First name</th>
			<th>Last name</th>
			<th>Address</th>
			<th>Born date</th>
			<th>User kind</th>
			<th></th>
		</tr>

		<?php foreach ($users as $user): ?>
			<tr>
				<td><?php echo $user->getUsername(); ?></td>
				<td><?php echo $user->getFirstName(); ?></td>
				<td><?php echo $user->getLastName(); ?></td>
				<td><?php echo $user->getAddress(); ?></td>
				<td><?php echo $user->getBornDate(); ?></td>
				<td><?php echo $user->getUserKind(); ?></td>
				<td>
					<a href="<?php echo URL; ?>users/index/<?php echo $user->getUsername(); ?>">
						Details
					</a>
					|
					<a href="<?php echo URL; ?>users/delete/<?php echo $user->getUsername(); ?>">
						Delete
					</a>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>
</div>
