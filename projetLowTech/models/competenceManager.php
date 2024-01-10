<?php

require_once './models/connection.php';

class CompetenceManager {

    public function addCompetence ($userId,$name){
        $user = User::getUserById($userId);
        $isMod = $user->getDetail("isMod");
        $isAdmin = $user->getDetail("isAdmin");
        if ($user && ($isMod || $isAdmin)) {
            $competence = new Competence($name);
            $competence->saveCompetence();
            return "La compétence $name a été créée.";
        } else {
            return "Vous n'avez pas les autorisations nécessaires pour créer une compétence.";
        }
    }

    public function deleteACompetence($userId,$name){
        $user = User::getUserById($userId);
        $isMod = $user->getDetail("isMod");
        $isAdmin = $user->getDetail("isAdmin");
        if ($user && ($isMod || $isAdmin)) {
            Competence::deleteCompetence($name);
            return "La compétence $name a été supprimée.";
        } else {
            return "Vous n'avez pas les autorisations nécessaires pour supprimer une compétence.";
        }
    }

}