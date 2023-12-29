<?php

class Competence {
    private $id;
    private $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function saveCompetence(PDO $pdo) {
        $statement = $pdo->prepare("INSERT INTO competences (name) VALUES (?)");
        $statement->execute([$this->name]);
    }
}
