<?php

require_once('./models/annuaireManager.php');

$template = './views/pages/annuaire.php';


if(empty($_GET)){
    Annuaire::getAllProfiles();
}else if(!empty($_GET) /*&& empty()*/){
    Annuaire::getProfile($_GET['search']);
}else if(!empty($_GET) /*&& !empty()*/){
    
}