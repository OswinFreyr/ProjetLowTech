<?php

require_once './config/database.php';

class ProfilManager{
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

    public static function getCompetences($userId): array{
        $sql = "SELECT * FROM users_competences ORDER BY id ASC WHERE user_id = $userId";
        $query = dbConnect()->prepare($sql);
        $query->execute();
        $list = $query->fetchAll();
        $listId = $list['id'];
        $sql2 = "SELECT * FROM competences ORDER BY id ASC WHERE $listId = id";
        $query2 = dbConnect()->prepare($sql2);
        $query2->execute();
        $competences = $query2->fetchAll();
        return $competences;
    }
}