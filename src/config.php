<?php
// Database configuration
$hostname = "localhost"; // Change this if your database is hosted elsewhere
$username = "root";      // Your MySQL username
$password = "";          // Your MySQL password
$database = "user_management"; // The database name you created

$conn = new mysqli($hostname, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
