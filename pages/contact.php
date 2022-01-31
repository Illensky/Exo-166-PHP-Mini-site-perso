<?php
$feedbackClass = "feedback-success";
$errorCodeArray = [
        "Message sent !",
        "Missing form data",
    "Invalid password. (1-20 alphanumeric characters)",
    "Invalid Message. (1-255 alphanumeric characters)",
    "Message not sent , try again later"
];

if (isset($_GET['f'])) {
$message = $errorCodeArray[(int)$_GET['f']];
if ($_GET['f'] !== "0") {
    $feedbackClass = "feedback-error";
}
?>
<div class="feedback-message <?= $feedbackClass ?>">
    <?= $message ?>
</div>
<?php
}
?>
<section>
    <div>
        <h1 class="typing_animation">Contact</h1>
    </div>
<div>


<p>Leave your message bellow ;)</p>
    <form action="/?page=save" method="post" id="contact-form">
        <div>
            <label for="id-username">Username</label>
            <input type="text" name="username" id="id-username" required minlength="1" maxlength="20">
        </div>
        <div>
            <label for="id-message">Message</label>
            <textarea name="message" id="id-message" required minlength="1" maxlength="255"></textarea>
        </div>
        <div>
            <input type="submit" value="envoyer" name="submit" id="contact-form-submit">
        </div>
    </form>
</div>
</section>
<?php
$jsonMessages = file_get_contents('../data/messages.json');
$messages = json_decode($jsonMessages, true);
$messages = array_reverse($messages);

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
    </section>
    <?php
}