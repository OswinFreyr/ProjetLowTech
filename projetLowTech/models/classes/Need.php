<?php
// fichier non utilisé mais gardé dans le cas d'une poursuite de projet 
class Need {
    private $id;
    private $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function saveNeed() {
        $pdo = dbConnect();
        $statement = $pdo->prepare("INSERT INTO needs (name) VALUES (?)");
        $statement->execute([$this->name]);
    }

    public static function deleteNeed($name) {
        $pdo = dbConnect();
        $statement = $pdo->prepare("DELETE FROM needs WHERE name = ?");
        $statement->execute([$name]);
    }
}
