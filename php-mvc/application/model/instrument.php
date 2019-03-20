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
 * @version 1.0.2 (2019-03-20 - 2019-03-20)
 */
class instrument {

	public const CSV_SEPARATOR = ";";

	/**
	 * @var int Id of the instrument.
	 */
	private $id;

	/**
	 * @var string Name of the instrument.
	 */
	private $name;

	/**
	 * @var string Model of the instrument.
	 */
	private $model;

	/**
	 * @var string Type of the instrument.
	 */
	private $type;

	/**
	 * @var float Price of the instrument.
	 */
	private $price;

	/**
	 * instrument constructor.
	 *
	 * @param int $id Id of the instrument.
	 * @param string $name Name of the instrument.
	 * @param string $model Model of the instrument.
	 * @param string $type Type of the instrument.
	 * @param float $price Price of the instrument.
	 */
	public function __construct(int $id, string $name, string $model, string $type, float $price) {
		$this->name = $name;
		$this->model = $model;
		$this->type = $type;
		$this->price = $price;
	}

	/**
	 * @return int Id of the instrument.
	 */
	public function getId(): int {
		return $this->id;
	}

	/**
	 * Get the name of the instrument.
	 *
	 * @return string Name of the instrument.
	 */
	public function getName(): string {
		return $this->name;
	}

	/**
	 * Get the model of the instrument.
	 *
	 * @return string Model of the instrument.
	 */
	public function getModel(): string {
		return $this->model;
	}

	/**
	 * Get the type of the instrument.
	 *
	 * @return string Type of the instrument.
	 */
	public function getType(): string {
		return $this->type;
	}

	/**
	 * Get the price of the instrument.
	 *
	 * @return float Price of the instrument.
	 */
	public function getPrice(): float {
		return $this->price;
	}

	/**
	 * Write the instrument to the CSV.
	 */
	public function writeToCsv(): void {
		// create string for the csv.
		$csv_line = $this->id;
		$csv_line .= self::CSV_SEPARATOR . $this->name;
		$csv_line .= self::CSV_SEPARATOR . $this->model;
		$csv_line .= self::CSV_SEPARATOR . $this->type;
		$csv_line .= self::CSV_SEPARATOR . $this->price;

		// open file csv for write line
		$csv_file = fopen(INSTRUMENTS_CSV_FILE, "w");

		// write on csv
		fputcsv($csv_file, array($csv_line));

		// close file csv
		fclose($csv_file);
	}

	/**
	 * Get the instruments in the csv file.
	 *
	 * @return array Instruments.
	 */
	public static function getInstruments(): array {
		// open csv file
		$csv_file = fopen(INSTRUMENTS_CSV_FILE, "r");
		// create array for csv data
		$csv_data = array();

		// read first line of csv (header line)
		fgetcsv($csv_file);

		// read all csv file lines
		while (!feof($csv_file)) {
			// read the line
			$string = fgetcsv($csv_file)[0];
			// explode string in array
			$strings = explode(self::CSV_SEPARATOR, $string);
			// create instrument from array
			if (count($strings) > 4) {
				$instrument = new instrument(
					intval($strings[0]),
					strval($strings[1]),
					strval($strings[2]),
					strval($strings[3]),
					intval($strings[4])
				);
				// push instrument in data array
				array_push($csv_data, $instrument);
			}
		}

		// close csv file
		fclose($csv_file);

		// return csv data
		return $csv_data;
	}
}