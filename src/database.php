<?php

require_once('config.php');

class DataBase extends Config {

	protected static $sql = null;

	public static function connect() {

		self::$sql = new mysqli(DATABASE_HOST, DATABASE_USERNAME, DATABASE_PASSWORD, DATABASE_DBNAME);
		self::tables();

		return self::$sql;

	}

	public static function close () {
		return self::$sql->close();
	}

	public static function query ($query="") {
		return self::$sql->query($query);
	}

	public static function tables () {
		$tables = self::$tables;

		foreach ($tables as $key => $value) {
			$tname = $value["name"];
			$tquery = $value["query"];
			self::query("CREATE TABLE IF NOT EXISTS `$tname` ($tquery) CHARACTER SET utf8");
		}

		return self::$sql;
	}

	public static function fetch ($query) {
		$return = array();
		$i = 0;
		while($row = mysqli_fetch_array($query)) {
			$return[$i] = $row;
			$i++;
		}

		return $return;
	}

}

