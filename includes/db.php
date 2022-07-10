<?php 
    $conn = new mysqli("localhost", "root", "", "my-todolist-app");
    if (!$conn) {
        echo "Database connection failed";
    }
?>