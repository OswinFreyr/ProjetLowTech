<?php

require_once './models/connection.php';

class needManager {

    public function addNeed ($userId,$name){
        $user = User::getUserById($userId);
        $isMod = $user->getDetail("isMod");
        $isAdmin = $user->getDetail("isAdmin");
        if ($user && ($isMod || $isAdmin)) {
            $need = new Need($name);
            $need->saveNeed();
            return "Le besoin $name a été créé.";
        } else {
            return "Vous n'avez pas les autorisations nécessaires pour créer un besoin.";
        }
    }

    public function deleteANeed($userId,$name){
        $user = User::getUserById($userId);
        $isMod = $user->getDetail("isMod");
        $isAdmin = $user->getDetail("isAdmin");
        if ($user && ($isMod || $isAdmin)) {
            Need::deleteNeed($name);
            return "Le besoin $name a été supprimé.";
        } else {
            return "Vous n'avez pas les autorisations nécessaires pour supprimer un besoin.";
        }
    }

}