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
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID No</th>
                                <th>Visitor Name</th>
                                <th>Visitor Email</th>
                                <th>Visitor Message</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($datas as $data) : ?>
                                <tr>
                                    <td><?= $data['id'] ?></td>
                                    <td><?= $data['visitor_name'] ?></td>
                                    <td><?= $data['visitor_email'] ?></td>
                                    <td><?= $data['visitor_message'] ?></td>
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