<?php
$userdata = getUserData();
?>


<section>
    <div>
        <h2 class="typing_animation">BIO</h2>
    </div>
</section>

<section id="right">
    <div>
        <h2>Infos perso</h2>
        <p>
            <?= $userdata['first_name'] ?> <?= $userdata['name'] ?> <br>
            <?= $userdata['occupation'] ?>
        </p>
    </div>
</section>

<section>
    <div>


<h2 class="typing_animation">Experiences</h2>
    <?php
    foreach ($userdata['experiences'] as $experience) {
        echo "<div>";
        foreach ($experience as $key => $detail) {
            ?>
            <p><?= $key ?> : <?= $detail ?></p>
            <?php
        }
        echo "</div>";
    }
    ?>
    </div>
</section>