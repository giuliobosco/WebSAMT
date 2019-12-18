<?php

require_once "../dao/IDao.php";
require_once "../model/User.php";

class MockUserDao implements IDao {

	public static $data = array();

	public function __construct() {
		self::$data = array(
			new User(1, "Bryan", "Beffa"),
			new User(2, "Gabriele", "Alessi"),
			new User(3, "Giulio", "Bosco")
		);
	}

	function get() {
		return self::$data;
	}

	function getById($id) {
		return self::$data[0];
	}

	function insert($object) {
		array_push(self::$data, $object);
	}

	function update($object) {
		throw new Exception();
	}

	function delete($object) {
		throw new Exception();
	}
}