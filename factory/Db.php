<?php

class Db {
	private static $username = "root";
	private static $password = "1234qwer";
	private static $database = "factory";
	private static $hostname = "localhost";

	private static $connection;

	public static function connectToDb() {
		if (!self::$connection) {
			self::$connection = new PDO("mysql:host=".self::$hostname.";dbname=".self::$database.";", self::$username, self::$password);

			self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return self::$connection;
		}
	}
}