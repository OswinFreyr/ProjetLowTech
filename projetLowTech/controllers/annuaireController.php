<?php

require_once('./models/profilManager.php');

$template = './views/pages/annuaire.php';


if(empty($_GET)){
    $users = ProfilManager::getAllProfiles();
}else if(!empty($_GET)){
    $users = ProfilManager::getProfile($_GET['search']);
}