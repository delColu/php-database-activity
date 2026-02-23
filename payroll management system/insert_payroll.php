<?php 
include "db_connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get form values
    $emp_id = $_POST['emp_id'];
    $payment = $_POST['payment'];

    // Prepare statement
    $stmt = mysqli_prepare(
        $conn,
        "INSERT INTO payroll (emp_id, payment) VALUES (?, ?)"
    );

    // Bind parameters
    mysqli_stmt_bind_param(
        $stmt,
        "id",   // i = integer, d = decimal
        $emp_id,
        $payment
    );

    // Execute
    if (mysqli_stmt_execute($stmt)) {
        echo "Payroll created successfully!";
    } else {
        echo "Insert failed: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    // Redirect
    header("Location: view_payroll.php");
    exit;
}
?>