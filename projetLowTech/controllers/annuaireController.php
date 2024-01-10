<?php

require_once('./models/profilManager.php');

$template = './views/pages/annuaire.php';

$competencesPerUser = array();

if(empty($_GET['search'])){
    $users = ProfilManager::getAllProfiles();
}else if(!empty($_GET['search'])){
    $users = ProfilManager::getProfile($_GET['search']);
}
foreach($users as $user){
    $competencesPerUser[$user['id']] = ProfilManager::getCompetences($user['id']);
}