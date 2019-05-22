<?php

/**
 * Class table
 *
 * @author giuliobosco
 * @version 1.0 (2019-05-15 - 2019-05-22)
 */
class Table {
	private $matrix;

	private $matrixCounter;

	public function unserializeMatrix($string) {
		$this->matrix = unserialize($string);
	}

	public function serializeMatrix() {
		return serialize($this->matrix);
	}

	public function unserialzieMatrixCounter($string) {
		$this->matrixCounter = unserialize($string);
	}

	public function serializematrixCounter() {
		return serialize($this->matrixCounter);
	}

	public function init($rows, $cols) {
		$this->matrix = array();
		for ($i = 0; $i < $rows; $i++) {
			array_push($this->matrix, array());
			for ($j = 0; $j < $cols; $j++) {
				try {
					array_push($this->matrix[$i], random_int(0, 3));
				} catch (Exception $e) {
				}
			}
		}

		$this->matrixCounter = array();
		for ($i = 0; $i < count($this->matrix); $i++) {
			array_push($this->matrixCounter, array());
			for ($j = 0; $j < count($this->matrix[$i]); $j++) {

				array_push($this->matrixCounter[$i], 0);

			}
		}
	}

	public function setValue($row, $col, $val) {
		if ($row < count($this->matrix) && $col < count($this->matrix[0])) {
			if ($this->matrixCounter[$row][$col] < 4) {
				if ($val < 10 && $val >= $this->matrix[$row][$col]) {
					$this->matrix[$row][$col] = $val;
					$this->matrixCounter[$row][$col]++;
				}
			}
		}
	}

	public function getMatrix() {
		return $this->matrix;
	}

}