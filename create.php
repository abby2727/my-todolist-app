<?php
    include('includes/db.php');

    $task = $_POST['task'];
    $sql = "INSERT INTO task(task_name) values('$task')";
    $conn->query($sql);
    $conn->close();
    header("location: index.php");
?>