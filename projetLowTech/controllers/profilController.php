<?php

require_once('./models/profilManager.php');

$template = './views/pageProfil.php';

$user = ProfilManager::getProfileByID($id);
$competences = ProfilManager::getCompetences($user['id']);