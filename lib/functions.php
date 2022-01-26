<?php

/* 
vous ajouterez ici les fonctions qui vous sont utiles dans le site,
je vous ai créé la première qui est pour le moment incomplète et qui devra contenir
la logique pour choisir la page à charger
*/

function getContent() {
	if(!isset($_GET['page'])){
		include __DIR__.'/../pages/home.php';
	}
	elseif(isset($_GET['page']) && $_GET['page'] == "bio") {

        include __DIR__.'/../pages/bio.php';
        getUserData();
    }
	elseif(isset($_GET['page']) && $_GET['page'] == "contact") {

        include __DIR__.'/../pages/contact.php';
    }
}

function getPart($name) {
	include __DIR__ . '/../parts/'. $name . '.php';
}

function getUserData () {
    $userDataStr = file_get_contents('../data/user.json');
    $userData = json_decode($userDataStr);
    foreach ($userData as $key => $data) {
        if (is_array($data)) {
            foreach ($data as $arrayKey => $arrayData) {
                echo "Experience ".($arrayKey +1)."<br>";
                foreach ($arrayData as $experienceKey => $experience) {
                    echo $experienceKey." => ".$experience."<br>";
                }
            }
        }
        else {
            echo $key." => ".$data."<br>";
        }
    }
}