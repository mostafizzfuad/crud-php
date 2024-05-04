<?php
require "includes/db.php";

$id =  $_GET['id'];
$delete_query = "DELETE FROM contact_messages WHERE id = $id";
mysqli_query($db_connect, $delete_query);
header('location: contact_view.php');
