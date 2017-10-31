<?php 
error_reporting(1);
$dir = "";

require_once("./src/config.php");


$officeProp = 0;
$ratingProp = 1;

if(isset($_GET["office"])) {
	$officeProp = intval($_GET["office"]);
}

if(isset($_GET["rating"])) {
	$ratingProp = $_GET["rating"];
}

require_once(Config::getTemplates()."index.html");