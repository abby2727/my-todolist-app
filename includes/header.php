<?php include('includes/db.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Final To-Do List</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">

    <style>
        input[type=checkbox]:checked+p {
            color: red;
            text-decoration: line-through;
        }
    </style>
</head>

<body>