<?php 
include 'db_connect.php';

$sql = "SELECT * FROM departments ORDER BY created_at DESC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Department Records</title>
</head>
<body>
<!-- 
$sql = "CREATE TABLE IF NOT EXISTS departments (
    department_id INT AUTO_INCREMENT PRIMARY KEY,
    department_name VARCHAR(100) NOT NULL,
    dep_head VARCHAR(200) NOT NULL,
    employee_count INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at DATE
) ENGINE=InnoDB"; -->

    <h2>Department Records</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td>ID: <?php echo $row['department_id']; ?></td>
            <td>Name: <?php echo $row['department_name']; ?></td>
            <td>Description: <?php echo $row['dep_description']; ?></td>
            <td>Employee Count: <?php echo $row['employee_count'] ?></td>
            <td>Department Head: <?php echo $row['dep_head'] ?></td>
            <td>Created At: <?php echo $row['created_at']; ?></td>
        </tr>
        <?php endwhile; ?>
    </table>

</body>
</html>
