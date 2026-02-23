<?php
include "db_connect.php";

/* ===============================
   CREATE DEPARTMENTS TABLE
================================= */
$sql = "CREATE TABLE IF NOT EXISTS departments (
    department_id INT AUTO_INCREMENT PRIMARY KEY,
    department_name VARCHAR(100) NOT NULL,
    dep_head VARCHAR(200) NOT NULL,
    employee_count INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at DATE
) ENGINE=InnoDB";

if (mysqli_query($conn, $sql)) {
    echo "Table 'departments' created successfully<br>";
} else {
    echo "Error creating table 'departments': " . mysqli_error($conn) . "<br>";
}


/* ===============================
   CREATE EMPLOYEES TABLE
================================= */
$sql = "CREATE TABLE IF NOT EXISTS employees (
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
) ENGINE=InnoDB";

if (mysqli_query($conn, $sql)) {
    echo "Table 'employees' created successfully<br>";
} else {
    echo "Error creating table 'employees': " . mysqli_error($conn) . "<br>";
}


/* ===============================
   CREATE PAYROLL TABLE
================================= */
$sql = "CREATE TABLE IF NOT EXISTS payroll (
    id INT AUTO_INCREMENT PRIMARY KEY,
    emp_id INT NOT NULL,
    original_salary DECIMAL(10,2) NOT NULL,
    absent_deductions decimal(10,2),
    actual_salary decimal(10,2),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (emp_id) REFERENCES employees(emp_id)
        ON DELETE CASCADE
        ON UPDATE CASCADE
) ENGINE=InnoDB";

if (mysqli_query($conn, $sql)) {
    echo "Table 'payroll' created successfully";
} else {
    echo "Error creating table 'payroll': " . mysqli_error($conn);
}

mysqli_close($conn);
?>