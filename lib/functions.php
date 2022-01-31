<?php

/* 
vous ajouterez ici les fonctions qui vous sont utiles dans le site,
je vous ai créé la première qui est pour le moment incomplète et qui devra contenir
la logique pour choisir la page à charger
*/

function getAccessLevel ():bool {
    if (isset($_SESSION['statut']) && $_SESSION['statut'] === 'admin') {
        return true;
    }
    return false;
}

function getContent() {
	if(!isset($_GET['page'])){
		include __DIR__.'/../pages/home.php';
	}
	elseif(isset($_GET['page']) && $_GET['page'] == "bio") {

        include __DIR__.'/../pages/bio.php';
    }
	elseif(isset($_GET['page']) && $_GET['page'] == "contact") {

        include __DIR__.'/../pages/contact.php';
    }
    elseif(isset($_GET['page']) && $_GET['page'] == "login") {

        include __DIR__.'/../pages/login.php';
    }
    elseif(isset($_GET['page']) && $_GET['page'] == "save") {

        include __DIR__.'/../treatment/save.php';
    }
    elseif(isset($_GET['page']) && $_GET['page'] == "register") {

        include __DIR__.'/../treatment/register.php';
    }
    elseif(isset($_GET['page']) && $_GET['page'] == "connexion") {

        include __DIR__.'/../treatment/connexion.php';
    }
    elseif(isset($_GET['page']) && $_GET['page'] == "admin" && getAccessLevel()) {

        include __DIR__.'/../admin/admin.php';
    }
    elseif(isset($_GET['page']) && $_GET['page'] == "admin" && !getAccessLevel()) {

        include __DIR__.'/../pages/home.php';
    }
}

function getPart($name) {
	include __DIR__ . '/../parts/'. $name . '.php';
}

function getUserData () {
    $userDataStr = file_get_contents('../data/user.json');
    return json_decode($userDataStr, true);
}