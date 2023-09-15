<?php
// $severName	= "localhost";
// $userName	= "root";
// $password	= "dbhrd2009";
// $dbname		="stu";
// $conn	= mysqli_connect("$severName","$userName","$password","$dbname")OR die ("ไม่สามารถติดต่อฐานข้อมูลได้");
// mysqli_set_charset($conn,"utf8");

class db {
    public $query;
    public $severName = "localhost";
    public $userName = "root";
    public $password = "dbhrd2009";
    public $dbname	= "stu";
    public $connecter;
    public $result;
    function __construct($qr) {
        $this->query = $qr;
        $this->connecter = mysqli_connect($this->severName,$this->userName,$this->password,$this->dbname);
        mysqli_set_charset($this->connecter,"utf8");
        $this->result = mysqli_query($this->connecter,$this->query);
    }
    // get all data 
    public function fetch_assoc() {
        return mysqli_fetch_array($this->result);
    }
    //get one data
    public function fetch_one() {
        return mysqli_fetch_assoc($this->result);
    }
    // get length of data
    public function num_rows() {
        return mysqli_num_rows($this->result);
    }
}

?>