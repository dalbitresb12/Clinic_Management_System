<?php
$servername = getenv('MYSQL_HOST') ?: "localhost";
$username = getenv('MYSQL_USER') ?: "root";
$password = getenv('MYSQL_PASSWORD') ?: "";
$dbname = getenv('MYSQL_DATABASE') ?: "clinic_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
