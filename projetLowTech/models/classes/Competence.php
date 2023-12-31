<?php

class Competence {
    private $id;
    private $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function saveCompetence() {
        $pdo = dbConnect();
        $statement = $pdo->prepare("INSERT INTO competences (name) VALUES (?)");
        $statement->execute([$this->name]);
    }

    public static function deleteCompetence($name) {
        $pdo = dbConnect();
        $statement = $pdo->prepare("DELETE FROM posts WHERE id = ?");
        $statement->execute([$name]);
    }
}
