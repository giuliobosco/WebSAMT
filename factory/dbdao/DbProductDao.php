<?php

require_once "../dao/IDao.php";
require_once "../model/Product.php";
require_once "../Db.php";

class DbProductDao implements IDao {

	function get() {
		$db = Db::connectToDb();
		$statement = $db->prepare("SELECT * FROM product");
		$statement->execute();
		return $statement->fetchAll(PDO::FETCH_ASSOC);
	}

	function getById($id) {
		$db = Db::connectToDb();
		$statement = $db->prepare("SELECT * FROM product WHERE id=:id");
		$statement->bindParam(':id', $id, PDO::PARAM_INT);
		$statement->execute();
		return $statement->fetch(PDO::FETCH_ASSOC);
	}

	function insert($object) {
		$db = Db::connectToDb();
		$statement = $db->prepare("INSERT INTO product (name, price) VALUES (:name, :price)");
		$statement->bindParam(':name', $object->getName(), PDO::PARAM_STR);
		$statement->bindParam(':price', $object->getPrice(), PDO::PARAM_INT);
		$statement->execute();
	}

	function update($object) {
		// TODO: Implement update() method.
	}

	function delete($object) {
		// TODO: Implement delete() method.
	}
}