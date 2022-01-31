<ul>
    <li><a href="/?page=bio">Bio</a></li>
    <li><a href="/?page=contact">Contact</a></li>
    <li><a href="/">Home Page</a></li>
    <li><a href="/?page=login">Login</a></li>
    <?php if (isset($_SESSION['statut']) && $_SESSION['statut'] === 'admin'){ ?>
    <li><a href="/?page=admin">Admin</a></li>
    <?php } ?>
</ul>