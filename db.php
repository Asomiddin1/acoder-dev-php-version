<?php
$localhost = 'localhost';
$username = 'root';
$password = 'password';
$database = 'acoderBackend';
// Create connection
$conn = mysqli_connect($localhost, $username, $password, $database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
