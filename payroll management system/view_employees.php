<?php 
include 'db_connect.php';

$sql = "SELECT * FROM employees ORDER BY created_at DESC";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Records</title>
</head>
<body>
    <h2>Employee Records</h2>
    <table border="1">

<!-- $sql = "CREATE TABLE IF NOT EXISTS employees (
    emp_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    position VARCHAR(100),
    department_id INT,
    email VARCHAR(100) NOT NULL,
    contact_num VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (department_id) REFERENCES departments(department_id)
        ON DELETE SET NULL
        ON UPDATE CASCADE
) ENGINE=InnoDB"; -->


        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Department</th>
            <th>Email</th>
            <th>Position</th>
            <th>Salary</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?php echo $row['emp_id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['department_id']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['position']; ?></td>
            <td><?php echo $row['salary']; ?></td>
        </tr>
        <?php endwhile; ?>
    </table>

</body>
</html>