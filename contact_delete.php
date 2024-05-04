<?php
require "includes/db.php";

$id =  $_GET['id'];
$soft_delete_query = "UPDATE contact_messages SET delete_status = 2 WHERE id = $id";
mysqli_query($db_connect, $soft_delete_query);
header('location: contact_view.php');
