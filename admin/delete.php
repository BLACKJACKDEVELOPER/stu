<?php 
session_start();
include "../db.php";
$id = $_GET['id'];
db('DELETE FROM stu_info WHERE id='.$id.';');
header('location: index.php');
 ?>