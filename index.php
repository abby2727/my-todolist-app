<?php include('includes/header.php'); ?>

<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body p-4">
                    <div class="text-center">
                        <h3>
                            <a class="text-success text-decoration-none" href="index.php">To-Do List App</a>
                        </h3>
                    </div>

                    <!-- Form (CREATE)-->
                    <form action="create.php" method="POST" class="m-4">
                        <div class="row">
                            <div class="col-md-10">
                                <input type="text" name="task" id="task" class="form-control" placeholder="Input task here..." required>
                            </div>
                            <div class="col-md-2">
                                <input type="submit" name="submit" class="btn btn-success" value="Save">
                            </div>
                        </div>
                    </form>

                    <!-- READ -->
                    <div class="px-5">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Task</th>
                                    <th>Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include('includes/db.php');

                                $query = $conn->query("SELECT * FROM `task` ORDER BY `id` ASC");
                                $count = 1;

                                while ($fetch = $query->fetch_array()) {
                                ?>
                                    <?php
                                    $id = isset($_GET['id']) ? $_GET['id'] : '';
                                    if ($fetch['id'] == $id) {
                                    ?>
                                        <form action="update.php" method="POST" class="form-inline">
                                            <td><?php echo $count++ ?></td>
                                            <td> <input class="form-control text-center" type="text" name="task" value=" <?php echo $fetch['task_name'] ?> " /> </td>
                                            <td><?php echo $fetch['status'] ?></td>
                                            <td class="text-center"> <button type="submit" class="btn btn-sm btn-warning">Update</button> </td>
                                            <input type="hidden" name="id" value=" <?php echo $fetch['id'] ?> " />
                                        </form>
                                    <?php } else { ?>
                                        <tr>
                                            <td><?php echo $count++ ?></td>

                                            <?php
                                            if ($fetch['status'] == "Done") {
                                                echo "<td style='text-decoration: line-through;'>" . $fetch['task_name'] . "</td>";
                                            } else {
                                                echo "<td>" . $fetch['task_name'] . "</td>";
                                            }
                                            ?>

                                            <td><?php echo $fetch['status'] ?></td>

                                            <td class="text-center" colspan="3">
                                                <?php
                                                if ($fetch['status'] != "Done") {
                                                    echo
                                                    '<a href="done_task.php?id=' . $fetch['id'] . '" class="btn btn-sm btn-success">
                                                        Done
                                                    </a>';
                                                } else {
                                                    echo
                                                    '<a href="undone_task.php?id=' . $fetch['id'] . '" class="btn btn-sm btn-secondary">
                                                        Undone
                                                    </a>';
                                                }
                                                ?>
                                                <a href="index.php?id=<?php echo $fetch['id'] ?>" class="btn btn-sm btn-primary">Edit</a>
                                                <a href="delete.php?id=<?php echo $fetch['id'] ?>" class="btn btn-sm btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>