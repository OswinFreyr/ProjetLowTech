<?php 

require_once './models/connection.php';

Class Annuaire {

    static function getAllProfiles(): array {
        $sql = "SELECT * FROM users ORDER BY id ASC";
        $query = dbConnect()->prepare($sql);
        $query->execute();
        $users = $query->fetchAll();
        return $users;
    }
    static function getProfile($name): array {
        $sql = "SELECT * FROM users WHERE name = :name";
        $query = dbConnect()->prepare($sql);
        $query->execute([
            ':name' => $name
        ]);
        $user = $query->fetchAll();
        return $user;
    }
}