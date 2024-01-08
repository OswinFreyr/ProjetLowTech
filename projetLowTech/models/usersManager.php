<?php


class userController {
    public function passModerator($userId, $isAdmin) {
        if ($isAdmin) {
            $user = User::getUserById($userId);
            $firstname = $user->getDetail("firstname");
            $name = $user->getDetail("name");
            $isMod = $user->getDetail("isMod");
            if ($user && !$isMod) {
                User::setDetail("isMod","true",$userId);
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
                User::setDetail("isMod","false",$userId);
                return "$firstname $name n'est plus modérateur/modératrice.";
            } else {
                return "$firstname $name n'est pas modérateur/modératrice ou n'existe pas.";
            }
        }
        else {
            return "Vous n'avez pas les autorisations nécessaires pour supprimer un modérateur.";
        }
    }

    function addUser($username,$password,$name,$firstname,$city,$creationDate,$phone,$isMod,$isAdmin): void {
        //$created_date = date_format(new DateTime('NOW'), 'Y-m-d H:i:s');
        $sql = "INSERT INTO users (username,password,name,firstname,city,creationDate,phone,isMod,isAdmin) VALUES (:username,:password,:name,:firstname,:city,:creationDate,:phone,:isMod,:isAdmin)";
        $query = dbConnect()->prepare($sql);
        $query->execute([
            ':username' => $username,
            ':password' => $password,
            ':name' => $name,
            ':firstname' => $firstname,
            ':city' => $city,
            ':creationDate' => $creationDate,
            ':phone' => $phone,
            ':isMod' => $isMod,
            ':isAdmin' => $isAdmin
        ]);
      }
      
      function deleteUser($id): void {
        $sql = "DELETE FROM users WHERE id = :id";
        $query = dbConnect()->prepare($sql);
        $query->execute([
        ':id' => $id
        ]);
      }
}