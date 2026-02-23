<?php
include "db_connect.php";

$sql = "Select * from students order by created_at desc";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2>Add Student</h2>

<form method="POST" action="insert_student.php">
    <label for="name">Name: </label>
    <input type="text" name="name" required>

    <label for="email">Email: </label>
    <input type="email" name="email" required>

    <label for="course">Course: </label>
    <input type="text" name="course" required>
    <button type="submit">Save</button>
</form>

    <h1>Student Record</h1>
    <div class="card_container">
        <?php 
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {     
        ?>
    <div class="card">
        <div class="name">
               Name: <?= $row['name']?>
        </div>
        <div class="info">
               ID: <?= $row['id']?>
        </div>
        <div class="info">
           Email: <?= $row['email']?>
        </div>
        <div class="info">
           Course: <?= $row['course']?>
        </div>
        <div class="info">
            <?= $row['created_at']?>
        </div>     
                    <div class="">
                        <a href="edit.php?id=<?$id?>">Edit</a>
                        
                        <form action="delete.php" method="POST">
                            <input type="hidden" name="id" value="<?= $id ?>">
                            <button type="submit" class="btn btn-delete"
                            style="border: none; cursor: pointer; width: 80%"
                            onclick="return confirm('Are you sure you wnt to delete this student?')"
                            >Delete</button>
                        </form>
                    </div>
        <br>   
    </div>
<?php 
            }
      } else {
        echo "<p>No Students found</p>";
      }
      mysqli_close($conn);
?>
    </div>
</body>
</html>

