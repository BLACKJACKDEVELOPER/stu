<?php

include "db.php";

$sql = "SELECT * FROM stu_info;";
$data = mysqli_query($conn,$sql);

while ($row = mysqli_fetch_array($data)) {
    var_dump($row["fullname"]);
}

?>