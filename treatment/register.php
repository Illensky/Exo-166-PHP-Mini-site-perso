<?php

// Check if all the usefull inputs are set
if (!isset($_POST['register-submit'], $_POST['password'], $_POST['username'], $_POST['password-repeat'])) {
    header('location: /?page=login&f=1');
    exit();
}

// check the password conformity (should contain at least 1 lowercase, 1 uppercase, 1 number, 1 special char in the limit of 8-15 chars
$uppercase = preg_match('@[A-Z]@', $_POST['password']);
$lowercase = preg_match('@[a-z]@', $_POST['password']);
$number    = preg_match('@[0-9]@', $_POST['password']);

if(!$uppercase || !$lowercase || !$number) {
    header('location: /?page=login&f=2');
    exit();
}

// Check the password length
if (strlen($_POST['password']) > 10 || strlen($_POST['password']) < 2) {
    header('location: /?page=login&f=2');
    exit();
}

// Check password are same
if ($_POST['password'] !== $_POST['password-repeat']) {
    header('location: /?page=login&f=3');
}

// Sanitize username and hash password for register in DB (here it's a JSON file)
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);

// Check the username length
if (strlen($username) > 20 || strlen($username) < 2) {
    header('location: /?page=login&f=4');
    exit();
}

// Get the users log list
$logsJson = file_get_contents('../data/logs.json');
$logs = json_decode($logsJson, true);

// add the current user to the list
$logs['users'][] = [$username,$password];

// re-wright the user logs list
$logsJsonAfterModif = json_encode($logs);
file_put_contents('../data/logs.json', $logsJsonAfterModif);

header('location: /?page=login&f=0');