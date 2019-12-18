<?php

require_once "../dao/IDao.php";
require_once "../model/User.php";

class MockUserDao implements IDao {

	public static $data = array();

	public function __construct() {
		if (count(self::$data) == 0) {
			self::$data = array(new User(1, "Bryan", "Beffa"), new User(2, "Gabriele", "Alessi"), new User(3, "Giulio", "Bosco"));
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