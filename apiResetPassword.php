<?php 

include "db.php";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
	$token = $_POST['token'];
	$email = $_POST['email'];

	//save call db
	db('INSERT INTO resetpasswords(token,email) VALUES ("'.$token.'","'.$email.'");');
	echo '{
		"status":true
	}';
}

 ?>