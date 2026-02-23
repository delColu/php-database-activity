<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection (without selecting DB first)
$conn = mysqli_connect($servername, $username, $password);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create Database
$sql = "CREATE DATABASE IF NOT EXISTS payroll_management_db";
if (mysqli_query($conn, $sql)) {
    echo "Database created successfully.<br>";
} else {
    die("Error creating database: " . mysqli_error($conn));
}
?>