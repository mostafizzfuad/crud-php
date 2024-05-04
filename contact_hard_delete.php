<?php
require "includes/db.php";

$id =  $_GET['id'];
$hard_delete_query = "DELETE FROM contact_messages WHERE id = $id";
mysqli_query($db_connect, $hard_delete_query);
header('location: contact_restore_view.php');
