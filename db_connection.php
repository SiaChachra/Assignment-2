<?php
$hostname = "172.31.22.43";
$username = "Sia200547582";
$password = "GECtJ9cwE1";
$database = "Sia200547582";

$connection = mysqli_connect($hostname, $username, $password, $database);

if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>
