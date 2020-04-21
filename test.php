<?php
$server = "localhost:3307";
$user = "root";
$pass = "admin";
$db = "db_templateproject_1_0";
$conn = mysqli_connect($server, $user, $pass, $db) or die("cannot connect db");

$q = "select * from ";
?>