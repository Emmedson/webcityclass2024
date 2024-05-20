<?php

$host = "localhost";
$user = "root";
$passwor = "";
$dbname = "phpdb";

$connect = mysqli_connect($host, $user, $passwor, $phpdb);
if(!$connect){
    die ("Connection failed:" . mysqli_connect_error());
}
else echo("Connected Successfully");

// CREATE THE DATABASE //

$sql = "CREATE DATABASE phpdb";

if ($connect->query($sql) === TRUE) {
    echo ("Database Created Successfully");
} 
else die ("Connection failed:" . mysqli_connect_error());

?>