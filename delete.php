<?php
    include('includes/db.php');

    $id = $_GET['id'];
    $sql = "DELETE FROM task WHERE id = '$id'";
    $conn->query($sql);
    $conn->close();
    header("location: index.php");
?>