<?php

session_start();

if (isset($_GET['d']) && $_GET['d'] === '1') {
    $_SESSION = [];
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
    session_destroy();
}

/* on affiche  les erreurs, si vous avez une erreur 500, regardez dans votre console */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
/* nous verrons plus tard comment se passer de ces 3 lignes */


// on inclue le fichier qui contient nos fonctions
require __DIR__ . '/../lib/functions.php';

// l'exemple avec le header, à vous de jouer pour le reste
getPart('header');

getContent();

getPart('footer');
