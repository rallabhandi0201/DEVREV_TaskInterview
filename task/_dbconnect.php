<?php
$server = "localhost";
$username = "root";
$password = "Sairam@0201";
$database = "task";

$conn = mysqli_connect($server, $username, $password, $database);
if (!$conn){
    die("Error". mysqli_connect_error());
}
?>
