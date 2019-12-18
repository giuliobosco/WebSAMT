<?php

class User {
    private $id;
    private $name;
    private $surname;

    function __constructor(int $id, string $name, string $surname) {
        $this->id = $id;
        $this->name = $name;
        $this->surname = $surname;
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
	public function getSurname() {
		return $this->surname;
	}

	/**
	 * @param mixed $surname
	 */
	public function setSurname($surname): void {
		$this->surname = $surname;
	}
}