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
 * @version 1.0.1 (2019-05-01 - 2019-05-01)
 */
?>

<div class="col-md-12">
	<h3>Books</h3>
	<h4>create new user</h4>
	<div>
		<b>
			<a href="<?php echo URL; ?> books/index">Back to list</a>
		</b>
	</div>

	<div class="row">&nbsp;</div>

	<div>
		<form method="post" action="<?php echo URL; ?>users/create">
			<?php if (count($errors) > 0):?>
				<div class="row">
					<p style="color: #ff0000"><?php echo $errors; ?></p>
				</div>
				<table class="table">
					<tr>
						<th>property</th>
						<th>value</th>
					</tr>
					<tr>
						<td>Username</td>
						<td><input type="text" name="username" value="<?php echo $data['username']; ?>" required></td>
					</tr>
					<tr>
						<td>First name</td>
						<td><input type="text" name="first_name" value="<?php echo $data['first_name']; ?>" required></td>
					</tr>
					<tr>
						<td>Last name</td>
						<td><input type="text" name="last_name" value="<?php echo $data['last_name']; ?>" required></td>
					</tr>
					<tr>
						<td>Password</td>
						<td><input type="password" name="password" value="<?php echo $data['password']; ?>" required></td>
					</tr>
					<tr>
						<td>address</td>
						<td><input type="text" name="address" value="<?php echo $data['address']; ?>" required></td>
					</tr>
					<tr>
						<td>Born date</td>
						<td><input type="text" name="born_date" value="<?php echo $data['born_date']; ?>" required></td>
					</tr>
					<tr>
						<td>User Kind</td>
						<td><input type="text" name="kind" value="<?php echo $data['kind']; ?>" required></td>
					</tr>
					<tr>
						<td><input type="submit"></td>
					</tr>
				</table>
			<?php else: ?>
				<table class="table">
					<tr>
						<th>property</th>
						<th>value</th>
					</tr>
					<tr>
						<td>Username</td>
						<td><input type="text" name="username" required></td>
					</tr>
					<tr>
						<td>First name</td>
						<td><input type="text" name="first_name" required></td>
					</tr>
					<tr>
						<td>Last name</td>
						<td><input type="text" name="last_name" required></td>
					</tr>
					<tr>
						<td>Password</td>
						<td><input type="password" name="password" required></td>
					</tr>
					<tr>
						<td>address</td>
						<td><input type="text" name="address" required></td>
					</tr>
					<tr>
						<td>Born date</td>
						<td><input type="text" name="born_date" required></td>
					</tr>
					<tr>
						<td>User Kind</td>
						<td><input type="text" name="kind" required></td>
					</tr>
					<tr>
						<td><input type="submit"></td>
					</tr>
				</table>
			<?php endif; ?>
		</form>
	</div>
</div>