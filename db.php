<?php
$host = "localhost";
$user = "root";   // default XAMPP username
$pass = "";       // default empty password
$dbname = "shopdb";  // your database name

$conn = mysqli_connect($host, $user, $pass, $dbname);

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>
