<?php

if (!isset($_POST['submit'], $_POST['message'], $_POST['username'])) {
    header('location: /?page=contact&f=0');
    exit();
}

$message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);

if (strlen($message) > 255 || strlen($message) < 1) {
    header('location: /?page=contact&f=1');
    exit();
}

if (strlen($username) > 20 || strlen($username) < 1) {
    header('location: /?page=contact&f=2');
    exit();
}


$jsonData = json_encode([$message, $username]);
file_put_contents('../data/last_message.json', $jsonData);
header('location: admin.php');