<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "rfl"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set character set to UTF-8 for consistent encoding
$conn->set_charset("utf8");
?>