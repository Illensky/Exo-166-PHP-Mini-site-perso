<ul>
    <li><a href="/?page=bio">Bio</a></li>
    <li><a href="/?page=contact">Contact</a></li>
    <li><a href="/">Home Page</a></li>
    <?php if (!isset($_SESSION['statut'], $_SESSION['username'])) { ?>
    <li><a href="/?page=login">Log In / Off</a></li>
    <?php }
    else { ?>
    <li><a href="/?d=1">Log In / Off</a></li>
    <?php }
    if (isset($_SESSION['statut']) && $_SESSION['statut'] === 'admin'){ ?>
    <li><a href="/?page=admin">Admin</a></li>
    <?php } ?>
</ul>