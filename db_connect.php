<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "eshop";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}
?>
