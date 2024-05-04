<?php
require "./includes/header.php";
require "./includes/db.php";

$read_query = "SELECT * FROM contact_messages WHERE delete_status = 1";
$datas = mysqli_query($db_connect, $read_query); // datas from database

// total count
$total_count_query = "SELECT COUNT(*) AS total_message FROM contact_messages";
$total_count_from_db = mysqli_query($db_connect, $total_count_query);
$total_messages = mysqli_fetch_assoc($total_count_from_db);
// print_r($total_messages['total_message']);

// unread count
$unread_count_query = "SELECT COUNT(*) AS unread_message FROM contact_messages WHERE status = 1";
$unread_count_from_db = mysqli_query($db_connect, $unread_count_query);
$unread_messages = mysqli_fetch_assoc($unread_count_from_db);
// print_r($unread_messages['unread_message']);

// read count
$read_count_query = "SELECT COUNT(*) AS read_message FROM contact_messages WHERE status = 2";
$read_count_from_db = mysqli_query($db_connect, $read_count_query);
$read_messages = mysqli_fetch_assoc($read_count_from_db);
// print_r($read_messages['read_message']);

// soft delete count
$softDelete_count_query = "SELECT COUNT(*) AS softDelete_message FROM contact_messages WHERE delete_status = 2";
$softDelete_count_from_db = mysqli_query($db_connect, $softDelete_count_query);
$softDelete_messages = mysqli_fetch_assoc($softDelete_count_from_db);
// print_r($softDelete_messages['softDelete_message']);

?>

<div class="container">
    <div class="row mt-4">
        <div class="col-md-3 text-center">
            <h2>Total: <?= $total_messages['total_message'] ?></h2>
        </div>
        <div class="col-md-3 text-center">
            <h2>Soft Delete: <?= $softDelete_messages['softDelete_message'] ?></h2>
        </div>
        <div class="col-md-3 text-center">
            <h2>Unread: <?= $unread_messages['unread_message'] ?></h2>
        </div>
        <div class="col-md-3 text-center">
            <h2>Read: <?= $read_messages['read_message'] ?></h2>
        </div>

        <div class="col-md-12 mt-4">
            <!-- card -->
            <div class="card text-white">
                <div class="card-header bg-primary text-center">
                    <h2>Contact View</h2>
                </div>
                <div class="card-body text-primary">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Serial No</th>
                                <th>ID No</th>
                                <th>Visitor Name</th>
                                <th>Visitor Email</th>
                                <th>Visitor Message</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $serial = 1;
                            foreach ($datas as $data) :
                            ?>
                                <tr class="<?php if ($data['status'] == 1) {
                                                echo "table-primary";
                                            } ?>">
                                    <td><?= $serial++ ?></td>
                                    <td><?= $data['id'] ?></td>
                                    <td><?= $data['visitor_name'] ?></td>
                                    <td><?= $data['visitor_email'] ?></td>
                                    <td><?= $data['visitor_message'] ?></td>
                                    <td>
                                        <?php if ($data['status'] == 1) : ?>
                                            <a href="./contact_read.php?id=<?= $data['id'] ?>" class="btn btn-success btn-sm">Mark As Read</a>
                                        <?php endif; ?>
                                        <a href="./contact_delete.php?id=<?= $data['id'] ?>" class="btn btn-danger btn-sm">Soft Delete</a>
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
                    <a href="./contact_restore_view.php" class="btn btn-info btn-sm">Click to Restore</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require "./includes/footer.php" ?>