<?php

require_once('./models/profilManager.php');

$template = './views/pages/annuaire.php';


if(empty($_GET)){
    $users = Profil::getAllProfiles();
}else if(!empty($_GET)){
    $users = Profil::getProfile($_GET['search']);
}