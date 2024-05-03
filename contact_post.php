<?php
// print_r($_POST);

// echo "Name : " . $_POST['visitor_name'] . "<br>";
// echo "Email : " . $_POST['visitor_email'] . "<br>";
// echo "Message : " . $_POST['visitor_message'] . "<br>";

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
    echo "Thanks for your submission !!";
}