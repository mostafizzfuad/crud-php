<?php
require "./includes/header.php";
require "./includes/db.php";

$read_query = "SELECT * FROM contact_messages WHERE delete_status = 2";
$datas = mysqli_query($db_connect, $read_query); // datas from database

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <!-- card -->
            <div class="card text-white">
                <div class="card-header bg-danger text-center">
                    <h2>Contact Restore View</h2>
                </div>
                <div class="card-body text-primary">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID No</th>
                                <th>Visitor Name</th>
                                <th>Visitor Email</th>
                                <th>Visitor Message</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($datas as $data) :
                            ?>
                                <tr>
                                    <td><?= $data['id'] ?></td>
                                    <td><?= $data['visitor_name'] ?></td>
                                    <td><?= $data['visitor_email'] ?></td>
                                    <td><?= $data['visitor_message'] ?></td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                            <a href="./contact_restore.php?id=<?= $data['id'] ?>" type="button" class="btn btn-success btn-sm">Restore</a>
                                            <a href="./contact_hard_delete.php?id=<?= $data['id'] ?>" type="button" class="btn btn-danger btn-sm">Delete</a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            <!-- noting to show message -->
                            <?php if ($datas->num_rows == 0) :  ?>
                                <tr>
                                    <td colspan="50" class="text-center text-danger">Nothing to show</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require "./includes/footer.php" ?>