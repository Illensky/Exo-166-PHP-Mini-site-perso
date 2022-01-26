<?php

$errorCodeArray = [
        "Missing form data",
    "Invalid password. (1-20 alphanumeric characters)",
    "Invalid Message. (1-255 alphanumeric characters)",
];

if (isset($_GET['f'])) {
$message = $errorCodeArray[(int)$_GET['f']];
?>
<div class="feedback-message">
    <?= $message ?>
</div>
<?php
}
?>
<section>
    <div>
        <h1 class="typing_animation">Contact</h1>
    </div>


    <form action="/save.php" method="post" id="contact-form">
        <div>
            <label for="id-username">Nom d'utilisateur</label>
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
</section>