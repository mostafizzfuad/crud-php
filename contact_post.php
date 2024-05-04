<?php
require "./includes/db.php";

if (empty($_POST['visitor_name'])) {
    echo "Where is your name ?";
}
elseif (empty($_POST['visitor_email'])) {
    echo "Where is your email ?";
}
elseif (!filter_var($_POST['visitor_email'], FILTER_VALIDATE_EMAIL)) {
    echo "Please provide a valid email address !!";
} 
elseif (empty($_POST['visitor_message'])) {
    echo "Where is your message ?";
}
else {
    $visitor_name = $_POST['visitor_name'];
    $visitor_email = $_POST['visitor_email'];
    $visitor_message = $_POST['visitor_message'];

    $insert_query = "INSERT INTO contact_messages (visitor_name, visitor_email, visitor_message) VALUES ('$visitor_name', '$visitor_email', '$visitor_message')"; // insert query
    mysqli_query($db_connect, $insert_query);

    header("location: contact.php");
}