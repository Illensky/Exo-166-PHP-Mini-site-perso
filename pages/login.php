<?php
$feedbackClass = "feedback-success";
$errorCodeArray = [
    "You are connected",
    "Missing form data",
    "Invalid password length. (1-20 characters)",
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
}
?>


<section id="register">
    <div>
        <h2 class="typing_animation" >Register</h2>
        <form action="/?page=register" method="post">
            <div>
                <label for="username">Username :</label>
                <input type="text" name="username" id="username" minlength="2" maxlength="10" required>
            </div>
            <div>
                <label for="password">Password :</label>
                <input type="password" name="password" id="password" minlength="2" maxlength="10" required>
            </div>
            <div>
                <label for="password-repeat">Password-repeat :</label>
                <input type="password" name="password-repeat" id="password-repeat" minlength="2" maxlength="10" required>
            </div>
            <input type="submit" value="Confirm" name="register-submit">
        </form>
    </div>
</section>

<section id="login">
    <div>
        <h2 class="typing_animation" >Login</h2>
        <form action="/?page=connexion" method="post">
            <div>
                <label for="username">Username :</label>
                <input type="text" name="username" id="username" minlength="2" maxlength="10" required>
            </div>
            <div>
                <label for="password">Password :</label>
                <input type="password" name="password" id="password" minlength="2" maxlength="10" required>
            </div>
            <input type="submit" value="Confirm" name="login-submit">
        </form>
    </div>
</section>