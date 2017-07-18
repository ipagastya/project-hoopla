<?php 
$servername = "103.200.7.114";
$username = "hooplaid_admin";
$password = "adminhooplaid";
$dbname = "hooplaid_inventory";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>