<?php

if (!isset($_POST['submit'], $_POST['message'], $_POST['username'])) {
    header('location: /?page=contact&f=1');
    exit();
}

$message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);

if (strlen($message) > 255 || strlen($message) < 1) {
    header('location: /?page=contact&f=2');
    exit();
}

if (strlen($username) > 20 || strlen($username) < 1) {
    header('location: /?page=contact&f=3');
    exit();
}


// Get the message list
$messageListJson = file_get_contents('../data/messages.json');
$messageList = json_decode($messageListJson, true);

// add the current message to the list
$messageList[] = [$username,$message];

// re-wright the message list
$messageListJsonAfterModif = json_encode($messageList);
file_put_contents('../data/messages.json', $messageListJsonAfterModif);

// send me a mail
$to = "alexis.laroche.02240@gmail.com";
$subject = "Here is a message on your website";
$message = "From : ".$username."\r\n"."Message : ".$message."\r\n"."\r\n"."\r\n"."Vous pouvez le modérer en suivant ce lien : 
https://illensky.go.yj.fr/?page=admin";
$message = wordwrap($message, 70, "\r\n");

if (!mail($to, $subject, $message)){
    header('location: /?page=contact&f=4');
    exit();
};

header('location: /?page=contact&f=0');