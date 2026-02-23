
<?php 

include "db_connect.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
$STMT = mysqli_prepare(
    $conn, "sss",
    $_POST['name'].
    $_POST["email"],
    $_POST["course"]
);

if (mysqli_stmt_execute($STMT)) {
    echo "Student inserted successfully!";
} else {
    echo "Insert failed";
}
}
?>