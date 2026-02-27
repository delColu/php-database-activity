<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Payroll</title>
</head>
<body>
    <h2>Add Payroll</h2>

    <form method="POST" action="insert_payroll.php">
        <label for="emp_id">Employee:</label>
        <select name="emp_id" id="emp_id" required>
            <option value="">Select Employee</option>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <option value="<?php echo $row['emp_id']; ?>">
                    <?php echo $row['name']; ?>
                </option>
            <?php endwhile; ?>
        </select><br><br>

        <label for="original_salary">Original Salary:</label>
        <input type="number" step="0.01" name="original_salary" id="original_salary" required><br><br>

        <input type="submit" value="Add Payroll">
    </form>
</body>
</html>

<?php
include "db_connect.php";
include "insert_payroll.php";

$sql = "SELECT emp_id, name FROM employees";
$result = mysqli_query($conn, $sql);

?>