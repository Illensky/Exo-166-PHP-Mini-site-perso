<?php
$jsonMessages = file_get_contents('../data/messages.json');
$messages = json_decode($jsonMessages, true);

if (isset($_POST['delete'],$_GET['m'])) {
    unset($messages[(int)$_GET['m']]);
    $messageJsonListAfterModif = json_encode($messages);
    file_put_contents('../data/messages.json', $messageJsonListAfterModif);
}
foreach ($messages as $key => $message) {
    ?>
    <section>
        <div>
            <h2>Username :</h2>
            <p>
                <?= $message[0] ?>
            </p>
        </div>
        <div>
            <h2>Message :</h2>
            <p>
                <?= $message[1] ?>
            </p>
        </div>
        <form action="/?page=admin&m=<?= $key ?>" method="post">
            <input type="submit" id="delete" name="delete" value="Delete">
        </form>
    </section>
    <?php
}