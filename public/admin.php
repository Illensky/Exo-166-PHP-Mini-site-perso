<?php

require __DIR__ . '/../lib/functions.php';


getPart('header');

$jsonMessage = file_get_contents('../data/last_message.json');
$messageArray = json_decode($jsonMessage);
$message = $messageArray[0];
$username = $messageArray[1];
?>
<section>
    <div>
        <h2>Username :</h2>
        <p>
            <?= $username ?>
        </p>
    </div>
</section>
<section>
    <div>
        <h2>Message :</h2>
        <p>
            <?= $message ?>
        </p>
    </div>
</section>


<?php

getPart('footer');