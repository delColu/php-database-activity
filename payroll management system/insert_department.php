<?php
include "db_connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get form values
    $department_name = $_POST['department_name'];
    $dep_head = $_POST['dep_head'];
    $employee_count = $_POST['employee_count'];
    $dep_description = $_POST['dep_description'];

    // Prepare statement
    $stmt = mysqli_prepare(
        $conn,
        "INSERT INTO departments (department_name, dep_head, employee_count, dep_description) VALUES (?, ?, ?, ?)"
    );

    // Bind parameters
    mysqli_stmt_bind_param(
        $stmt,
        "ssis",   // s = string, i = integer
        $department_name,
        $dep_head,
        $employee_count,
        $dep_description
    );

    // Execute
    if (mysqli_stmt_execute($stmt)) {
        echo "Department created successfully!";
    } else {
        echo "Insert failed: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    // Redirect
    header("Location: view_departments.php");
    exit;
}

?>