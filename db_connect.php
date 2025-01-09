<?php
// Connection to MySQL
$host = "localhost";
$username = "root";
$password = ""; // Leave this blank if your root user has no password
$dbname = "carwash";
$port = 3307;

// Connect to MySQL
$conn = mysqli_connect($host, $username, $password, $dbname, $port);

if (!$conn) {
    die("Could not connect: " . mysqli_connect_error());
}
//echo "<b>Successfully connected to the database</b>";
?>
