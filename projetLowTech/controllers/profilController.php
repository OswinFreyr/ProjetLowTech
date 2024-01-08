<?php

require_once('./models/profilManager.php');

$template = './views/pageProfil.php';

$user = Profil::getProfileByID($id);