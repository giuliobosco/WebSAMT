<?php

require_once "../dao/IDao.php";
require_once "../model/User.php";
require_once "../Db.php";

class DbUserDao implements IDao {

	function get() {
		$db = Db::connectToDb();
		$statement = $db->prepare("SELECT * FROM user");
		$statement->execute();
		return $statement->fetchAll(PDO::FETCH_ASSOC);
	}

	function getById($id) {
		$db = Db::connectToDb();
		$statement = $db->prepare("SELECT * FROM user WHERE id=:id");
		$statement->bindParam(':id', $id, PDO::PARAM_INT);
		$statement->execute();
		return $statement->fetch(PDO::FETCH_ASSOC);
	}

	function insert($object) {
		$db = Db::connectToDb();
		$statement = $db->prepare("INSERT INTO user (name, surname) VALUES (:name, :surname)");
		$statement->bindParam(':name', $object->getName(), PDO::PARAM_STR);
		$statement->bindParam(':surname', $object->getSurname(), PDO::PARAM_STR);
		$statement->execute();
	}

	function update($object) {
		// TODO: Implement update() method.
	}

	function delete($object) {
		// TODO: Implement delete() method.
	}
}