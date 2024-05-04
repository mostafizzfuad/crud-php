<?php
require "includes/db.php";

$id =  $_GET['id'];
$update_query = "UPDATE contact_messages SET status = 2 WHERE id = $id";
mysqli_query($db_connect, $update_query);
header('location: contact_view.php');