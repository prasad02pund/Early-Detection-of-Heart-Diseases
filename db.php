<?php
$host = "localhost:3306";  // Change to your database host if needed
$user = "root";       // Database username
$pass = "";           // Database password (leave empty if none)
$dbname = "safe_heart"; // Database name

// Create connection
$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
