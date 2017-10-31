<?php 

require_once('src/database.php');

DataBase::connect();

$data = [
	"rating" => $_POST["rating"],
	"office" => $_POST["office"],
	"commentPositive" => $_POST["commentPositive"],
	"commentNegative" => $_POST["commentNegative"]
];

$query= DataBase::query("INSERT INTO `testimonials` (rating, office, positive, negative) VALUES
	('".$data['rating']."', '".$data['office']."', '".$data['commentPositive']."', '".$data['commentNegative']."')");

if ($query) {
	echo 1;
}
else {
	
}

DataBase::close();