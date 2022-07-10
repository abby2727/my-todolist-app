<?php
    include('includes/db.php');

    $id = $_POST['id'];
    $task = $_POST['task'];

    $sql = "UPDATE `task` SET `task_name`='$task' WHERE id = '$id';";
    $conn->query($sql);
    $conn->close();
    header("location: index.php");
?>