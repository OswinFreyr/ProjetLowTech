<?php

class Need {
    private $id;
    private $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function saveNeed(PDO $pdo) {
        $statement = $pdo->prepare("INSERT INTO needs (name) VALUES (?)");
        $statement->execute([$this->name]);
    }
}
