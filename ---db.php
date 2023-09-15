<?php 

function db($query) {

$server = "localhost";
$username = "root";
$password = "lion4333";
$database = "stu";

// connect together
$conn = new mysqli($server,$username,$password,$database);
$result = $conn->query($query);

if ($conn->error) {
    return $conn->error;
}

return  $result;

}

 ?>