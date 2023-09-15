<?php
$severName	= "localhost";
$userName	= "root";
$password	= "dbhrd2009";
$dbname		="stu";
$conn	= mysqli_connect("$severName","$userName","$password","$dbname")OR die ("ไม่สามารถติดต่อฐานข้อมูลได้");
mysqli_set_charset($conn,"utf8");


?>