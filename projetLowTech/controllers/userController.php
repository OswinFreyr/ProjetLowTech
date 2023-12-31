<?php
class userController {
        public function passModerator($userId, $isAdmin) {
            if ($isAdmin) {
                $user = User::getUserById($userId);
                $firstname = $user->getDetail("firstname");
                $name = $user->getDetail("name");
                $isMod = $user->getDetail("isMod");
                if ($user && !$isMod) {
                    $user->setDetail("isMod","true",$userId);
                    return "$firstname $name est désormais modérateur/modératrice.";
                } else {
                    return "$firstname $name est déjà modérateur/modératrice ou n'existe pas.";
                }
            }
             else {
                return "Vous n'avez pas les autorisations nécessaires pour créer un modérateur.";
            }
        }


    public function unpassModerator($userId, $isAdmin) {
        if ($isAdmin) {
            $user = User::getUserById($userId);
            $firstname = $user->getDetail("firstname");
            $name = $user->getDetail("name");
            $isMod = $user->getDetail("isMod");
            if ($user && $isMod) {
                $user->setDetail("isMod","false",$userId);
                return "$firstname $name n'est plus modérateur/modératrice.";
            } else {
                return "$firstname $name n'est pas modérateur/modératrice ou n'existe pas.";
            }
        }
         else {
            return "Vous n'avez pas les autorisations nécessaires pour supprimer un modérateur.";
        }
    }

}
