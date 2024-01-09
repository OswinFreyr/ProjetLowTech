<?php

require_once('./models/profilManager.php');

$template = './views/partials/carteProfil.php';

$user = ProfilManager::getProfileByID($id);
