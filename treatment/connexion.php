<?php
// Check if all the usefull inputs are set
if (!isset($_POST['login-submit'], $_POST['password'], $_POST['username'])) {
    header('location: /?f=1');
    exit();
}

// Check the password length
if (strlen($_POST['password']) > 10 || strlen($_POST['password']) < 2) {
    header('location: /?f=2');
    exit();
}

// Sanitize username for compare with DB (here it's a JSON file)
$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);

// Check the username length
if (strlen($username) > 20 || strlen($username) < 2) {
    header('location: /?f=4');
    exit();
}

// Get the users log list
$logsJson = file_get_contents('../data/logs.json');
$logs = json_decode($logsJson, true);

if ($username === $logs['admin'][0] && $_POST['password'] === $logs['admin'][1]) {
    $_SESSION['statut'] = "admin";
    $_SESSION['username'] = $username;
    header('location: /?f=0');
    exit();
}

foreach ($logs['users'] as $userLog) {
    if ($userLog[0] === $username && password_verify($_POST['password'], $userLog[1])) {
        $_SESSION['statut'] = "user";
        $_SESSION['username'] = $username;
        header('location: /?f=0');
        exit();
    }
}

header('location: /?f=5');
exit();
