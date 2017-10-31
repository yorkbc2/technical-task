<?php 



define("DATABASE_HOST", "localhost");
define("DATABASE_USERNAME", "ct82251_index");
define("DATABASE_PASSWORD", "sanekv2013");
define("DATABASE_DBNAME", "ct82251_index");

class Config {

	public static $dir = "src";
	public static $tables = array(
		array(
			"name" => 'testimonials',
			'query' => "
			id INT NOT NULL AUTO_INCREMENT,
			office VARCHAR(255) NOT NULL,
			rating INT(55) NOT NULL,
			positive TEXT NOT NULL,
			negative TEXT NOT NULL,
			PRIMARY KEY (id)
			"
		)
	);

	public static function getSrc() {
		return self::$dir;
	}

	public static function getTemplates () {
		return self::$dir."/templates/";
	}

	public static function getOffices() {
		require_once("data/offices.php");
		return $offices;
	}

	public static function getScript ($string="") {

		return "src"."/templates/scripts/".$string;


	}

}