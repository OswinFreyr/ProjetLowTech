<?php

class Profil{
    public static function getAllProfiles(): array {
        $sql = "SELECT * FROM users ORDER BY id ASC";
        $query = dbConnect()->prepare($sql);
        $query->execute();
        $users = $query->fetchAll();
        return $users;
    }
    public static function getProfile($name): array {
        $sql = "SELECT * FROM users WHERE name = :name";
        $query = dbConnect()->prepare($sql);
        $query->execute([
            ':name' => $name
        ]);
        $user = $query->fetchAll();
        return $user;
    }

    public static function getProfileByID($id): array {
        $sql = "SELECT * FROM users WHERE id = :id";
        $query = dbConnect()->prepare($sql);
        $query->execute([
            ':id' => $id
        ]);
        $user = $query->fetchAll();
        return $user;
    }
}