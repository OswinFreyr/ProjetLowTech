<?php 
class User {
    private $id;
    private $username;
    private $password;
    private $name;
    private $firstname;
    private $city;
    private $creationDate;
    private $phone;
    private $isMod;
    private $isAdmin;

    public function __construct($username, $password, $name, $firstname, $city, $phone, $isMod, $isAdmin) {
        $this->username = $username;
        $this->password = $password;
        $this->name = $name;
        $this->firstname = $firstname;
        $this->city = $city;
        $this->phone = $phone;
        $this->isMod = $isMod;
        $this->isAdmin = $isAdmin;
    }

    public function saveUser(PDO $pdo) {
        $statement = $pdo->prepare("INSERT INTO users (username, password, name, firstname, city, phone, isMod, isAdmin) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $statement->execute([$this->username, $this->password, $this->name, $this->firstname, $this->city, $this->phone, $this->isMod, $this->isAdmin]);
    }
}
