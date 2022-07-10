<?php
    include('includes/db.php');

    $sql = "SELECT * FROM task ORDER BY id ASC";
    $result = $conn->query($sql);
    $count = 1;

    while ($row = $result->fetch_assoc()) {
        $id = isset($_GET['id']) ? $_GET['id'] : '';
        if ($row['id'] == $id) {
            echo '<form method="POST" action="update.php" class="form-inline">';
            echo "<td class='text-center'>" . $count++ . "</td>";
            echo '<td> <input class="form-control text-center" type="text" name="task" value="' . $row['task_name'] . '" /> </td>';
            echo '<td class="text-center"> <button type="submit" class="btn btn-sm btn-warning">Update</button> </td>';
            echo '<input type="hidden" name="id" value="' . $row['id'] . '" />';
            echo '</form>';
        } else {
            echo "<tr class='text-center'>";
            echo "<td>" . $count++ . "</td>";
            echo "<td>" . $row['task_name'] . "</td>";
            echo
                '<td> 
                    <a class="btn btn-sm btn-primary" href="index.php?id=' . $row['id'] . '" role="button">Edit</a>
                    <a class="btn btn-sm btn-danger" href="delete.php?id=' . $row['id'] . '" role="button">Delete</a>
                </td>';
                
            echo "<tr>";
        }
    }
    $conn->close();
?>