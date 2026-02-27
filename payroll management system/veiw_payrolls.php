<?php 
include 'db_connect.php';

$sql = "SELECT * FROM payrolls ORDER BY created_at DESC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payroll Records</title>
</head>
<body>

<!-- $sql = "CREATE TABLE IF NOT EXISTS payroll (
    id INT AUTO_INCREMENT PRIMARY KEY,
    emp_id INT NOT NULL,
    original_salary DECIMAL(10,2) NOT NULL,
    absent_deductions decimal(10,2),
    actual_salary decimal(10,2),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (emp_id) REFERENCES employees(emp_id)
        ON DELETE CASCADE
        ON UPDATE CASCADE
) ENGINE=InnoDB"; -->

    <h2>Payroll Records</h2>
    <?php if (mysqli_num_rows($result) > 0): ?>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Employee ID</th>
                <th>Salary</th>
                <th>Created At</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['id']); ?></td>
                    <td><?php echo htmlspecialchars($row['emp_id']); ?></td>
                    <td><?php echo htmlspecialchars($row['original_salary']); ?></td>
                    <td><?php echo htmlspecialchars($row['created_at']); ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <p>No payroll records found.</p>
    <?php endif; ?>
</body>
</html>