<?php

require_once('./models/profilManager.php');

$template = './views/pages/annuaire.php';

$competencesPerUser = array();
// $search = $_GET['search'];

if(empty($_GET)){
    $users = ProfilManager::getAllProfiles();
}else if(!empty($_GET)){
    $users = ProfilManager::getProfile($_GET['search']);
}
foreach($users as $user){
    $competencesPerUser[$user['id']] = ProfilManager::getCompetences($user['id']);
}