<?php

require_once "../model/Product.php";
require_once "../dao/IDao.php";

class MockProductDao implements IDao {

	public static $data = array();

	public function __construct() {
		if (count(self::$data) == 0) {
			self::$data = array(new Product(1, "Milk", 5), new Product(2, "Chocolate", 5), new Product(3, "Coffee", 1));
		}
	}

	public function get() {
		return self::$data;
	}

	public function getById($id) {
		return self::$data[0];
	}

	public function insert($object) {
		array_push(self::$data, $object);
	}

	public function update($object) {
		throw new Exception();
	}

	public function delete($object) {
		throw new Exception();
	}
}