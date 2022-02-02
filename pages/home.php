<?php
$feedbackClass = "feedback-success";
$errorCodeArray = [
    "You are connected",
    "Missing form data",
    "Invalid password format. (1-20 characters, 1 uppercase, 1 lowercase, 1 number, 1 special char)",
    "Password-repeat and password should be the same",
    "Invalid username length. (1-20 alphanumeric characters)",
    "Invalid username or password."
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
}?>
<section>
    <div>
    <h2 class="typing_animation" >HOME</h2>
        <p>
            Hello and welcome on my WebSite, here you can contact me and read my bio. Enjoy it ;)
        </p>
    </div>
</section>