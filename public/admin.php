<?php

require __DIR__ . '/../lib/functions.php';


getPart('header');

$jsonMessage = file_get_contents('../data/last_message.json');
$messageArray = json_decode($jsonMessage);
$message = $messageArray[0];
$username = $messageArray[1];
?>
<div>
    <h3>Username :</h3>
    <div>
        <?= $username ?>
    </div>
    <h3>Message :</h3>
    <div>
        <?= $message ?>
    </div>
</div>
<?php

getPart('footer');