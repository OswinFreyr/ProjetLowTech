<?php
session_start();
require_once('./models/profilManager.php');

$template = './views/pages/pageProfil.php';



if (isset($_SESSION['idUser'])) {
    $user = ProfilManager::getProfileByID($_SESSION['idUser']);
    $competences = ProfilManager::getCompetences($user['2']);
    var_dump("sessions");
    // 2 remplace id
    echo "Bonjour, ".$_SESSION['idUser']."!";
} else {
    header("Location: index.php?page=connexion"); 
    var_dump("pas sessions");
    echo "pas sessions";
    exit();
}

