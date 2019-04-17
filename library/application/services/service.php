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
 * Model service example.
 *
 * @author giuliobosco
 * @version 1.0.1 (2019-04-10 - 2019-04-17)
 */
interface service {

	/**
	 * Add model to list.
	 *
	 * @param object $model Model to add.
	 * @return object Added model.
	 */
	public function add(object $model): object;

	/**
	 * Remove model from list.
	 *
	 * @param object $model Model to remove.
	 * @return object Removed model.
	 */
	public function remove(object $model): object;

	/**
	 * Get model or models.
	 *
	 * @param $id Id of the model or null for array of all models.
	 * @return array Models in array, if only one is at index 0.
	 */
	public function get($id = null): array ;

	/**
	 * Update model in list.
	 *
	 * @param object $model Model to update.
	 * @return object Updated model.
	 */
	public function update(object $model): object;
}