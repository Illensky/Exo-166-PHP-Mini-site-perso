<?php
if (!isset($_SESSION['statut'], $_SESSION['username'])) {
?>


<section id="register">
    <div>
        <h2 class="typing_animation" >Register</h2>
        <form action="/?page=register" method="post">
            <div>
                <label for="login-username">Username :</label>
                <input type="text" name="username" id="login-username" minlength="2" maxlength="10" required>
            </div>
            <div>
                <label for="login-password">Password :</label>
                <input type="password" name="password" id="login-password" minlength="2" maxlength="10" required>
            </div>
            <div>
                <label for="password-repeat">Password-repeat :</label>
                <input type="password" name="password-repeat" id="password-repeat" minlength="2" maxlength="10" required>
            </div>
            <input type="submit" value="Confirm" name="register-submit" id="register-submit">
        </form>
    </div>
</section>

<section id="login">
    <div>
        <h2 class="typing_animation" >Login</h2>
        <form action="/?page=connexion" method="post">
            <div>
                <label for="register-username">Username :</label>
                <input type="text" name="username" id="register-username" minlength="2" maxlength="10" required>
            </div>
            <div>
                <label for="register-password">Password :</label>
                <input type="password" name="password" id="register-password" minlength="2" maxlength="10" required>
            </div>
            <input type="submit" value="Confirm" name="login-submit" id="login-submit">
        </form>
        <p>Don't have an account ? <span id="to-register">Click Here</span></p>
    </div>
</section>

<?php }
