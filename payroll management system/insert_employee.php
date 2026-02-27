<?php
include "db_connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $position = $_POST['position'];
    $department = $_POST['department'];

    $sql = "INSERT INTO employees (name, position, department) VALUES ('$name', '$position', '$department')";
    
    if (mysqli_query($conn, $sql)) {
        echo "Employee added successfully.";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>