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
include 'Order.php';

if (!($_SERVER['REQUEST_METHOD'] == 'POST' || $_SERVER['REQUEST_METHOD'] == 'GET' && (!empty($_GET) && isset($_GET)))) {
	header('Location: insert.html');
}

$method = $_SERVER['REQUEST_METHOD'] == 'POST' ? $_POST : $_GET;

if (!isset($method['id']) || empty($method['id'])) {
	header('Location: insert.html');
}
$id = $method['id'];

if (!isset($method['product_name']) || empty($method['product_name'])) {
	header('Location: insert.html');
}
$product_name = $method['product_name'];

if (!isset($method['type']) || empty($method['type'])) {
	header('Location: insert.html');
}
$type = $method['type'];

if (!isset($method['quantity']) || empty($method['quantity'])) {
	header('Location: insert.html');
}
$number = $method['quantity'];

$order = new Order($id, $product_name, $type, $number);
$file_name = "shopping.json";

if (filesize($file_name) == 0) {
	$file = fopen($file_name, "w");
	$file_init = "[ ]";
	fwrite($file, $file_init);
	fclose($file);
}

$file = fopen($file_name, "r");
$data = fread($file, filesize($file_name));
$data = json_decode($data, TRUE);
fclose($file);

array_push($data, $order);

$file = fopen($file_name, "w");
fwrite($file, json_encode($data));
fclose($file);

header('Location: display.php');
