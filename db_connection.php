<?php
$servername = "localhost";
$username = "root";  // Replace with your MySQL username
$password = "123456";      // Replace with your MySQL password
$dbname = "gravix_db"; // Replace with your database name

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

