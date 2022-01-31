<?php

// Check if all the usefull inputs are set
if (!isset($_POST['register-submit'], $_POST['password'], $_POST['username'], $_POST['password-repeat'])) {
    header('location: /?page=login&f=1');
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

// Sanitaze username and hash password for register in DB (here it's a JSON file)
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