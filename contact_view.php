<?php
require "./includes/header.php";
require "./includes/db.php";

$read_query = "SELECT * FROM contact_messages";
$datas = mysqli_query($db_connect, $read_query); // datas from database

// mysqli_fetch_assoc($datas);

// foreach ($datas as $data) {
//     print_r($data['visitor_name']);
// }
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
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
                                        <?php
                                        if ($data['status'] == 1) :
                                        ?>
                                            <a href="./contact_read.php?id=<?= $data['id'] ?>" class="btn btn-success btn-sm">Mark As Read</a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require "./includes/footer.php" ?>