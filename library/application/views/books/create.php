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
?>

<div class="col-md-12">
	<h3>Books</h3>
	<h4>create new book</h4>
	<div>
		<b>
			<a href="<?php echo URL; ?> books/index">Back to list</a>
		</b>
	</div>

	<div class="row">&nbsp;</div>

	<div>
		<form method="post" action="<?php echo URL; ?>books/create">
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
						<td>Isbn</td>
						<td><input type="number" name="isbn" value="<?php echo $data['isbn']; ?>" required></td>
					</tr>
					<tr>
						<td>Title</td>
						<td><input type="text" name="title" value="<?php echo $data['title']; ?>" required></td>
					</tr>
					<tr>
						<td>Author</td>
						<td><input type="text" name="author" value="<?php echo $data['text']; ?>" required></td>
					</tr>
					<tr>
						<td>Year</td>
						<td><input type="number" name="year" value="<?php echo $data['number']; ?>" required></td>
					</tr>
					<tr>
						<td>Edition</td>
						<td><input type="text" name="edition" value="<?php echo $data['edition']; ?>" required></td>
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
					<td>Isbn</td>
					<td><input type="number" name="isbn" required></td>
				</tr>
				<tr>
					<td>Title</td>
					<td><input type="text" name="title" required></td>
				</tr>
				<tr>
					<td>Author</td>
					<td><input type="text" name="author" required></td>
				</tr>
				<tr>
					<td>Year</td>
					<td><input type="number" name="year" required></td>
				</tr>
				<tr>
					<td>Edition</td>
					<td><input type="text" name="edition" required></td>
				</tr>
				<tr>
					<td><input type="submit"></td>
				</tr>
			</table>
			<?php endif; ?>
		</form>
	</div>
</div>