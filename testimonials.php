<?php 
require_once("./src/database.php");

DataBase::connect();

$testimonials = DataBase::query("SELECT * FROM `testimonials`");
$testimonials = DataBase::fetch($testimonials);

require_once(Config::getTemplates()."testimonials.html");


DataBase::close();


?>