<?php

include '../db.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	$id = intval($_POST['id']);
	$valueUser = strval($_POST['valueUser']);
	// set new Permission to incoming account
	$data = db('UPDATE stu_info SET permission="'.$valueUser.'" WHERE id='.$id.';');
	var_dump($data);
	header('location: users.php');
}


 ?>