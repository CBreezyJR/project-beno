<?php


$servername = "localhost";
$username = "db2php";
$password = "";

// Creating connection
$conn = mysqli_connect($servername, $username, $password);

// Checking connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";



?>