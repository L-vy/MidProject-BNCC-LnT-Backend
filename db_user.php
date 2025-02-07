<?php
$host = "localhost";  // Change if using a remote database
$user = "root";       // MySQL username (default is 'root' for XAMPP)
$pass = "";           // MySQL password (default is empty in XAMPP)
$dbname = "login_system"; // Your database name

$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>


