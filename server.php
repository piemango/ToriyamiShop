<?php
$servername = "";
$username = "pimthr33ln_toriyami";
$password = "@Nielong1";
$dbname = "pimthr33ln_toriyami";

$conn = mysqli_connect($servername, $username, $password, $dbname);
mysqli_set_charset($conn, "utf8");
if(!$conn){
    die("Connection failed" . mysqli_connect_errno());
 }
?>