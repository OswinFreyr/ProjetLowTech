<?php

require_once('./models/profilManager.php');

$template = './views/carteProfil.php';

$user = ProfilManager::getProfileByID($id);
