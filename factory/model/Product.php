<?php

class Product {

	private $id;
	private $name;
	private $price;

	public function __construct($id, $name, $price) {
		$this->id = $id;
		$this->name = $name;
		$this->price = $price;
	}

	/**
	 * @return mixed
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @param mixed $id
	 */
	public function setId($id): void {
		$this->id = $id;
	}

	/**
	 * @return mixed
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * @param mixed $name
	 */
	public function setName($name): void {
		$this->name = $name;
	}

	/**
	 * @return mixed
	 */
	public function getPrice() {
		return $this->price;
	}

	/**
	 * @param mixed $price
	 */
	public function setPrice($price): void {
		$this->price = $price;
	}
}