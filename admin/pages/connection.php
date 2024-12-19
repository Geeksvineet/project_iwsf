<?php
// Database connection
$servername = "localhost";  // Change this to your server details
$username = "root";         // Change this to your database username
$password = "";             // Change this to your database password
$dbname = "iwsf"; // Your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>