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
        $this->creationDate = new DateTime();
        $this->phone = $phone;
        $this->isMod = $isMod;
        $this->isAdmin = $isAdmin;
    }

    public function saveUser(PDO $pdo) {
        $statement = $pdo->prepare("INSERT INTO users (username, password, name, firstname, city, creationDate, phone, isMod, isAdmin) VALUES (?, ?, ?, ?, ?,?, ?, ?, ?)");
        $statement->execute([$this->username, $this->password, $this->name, $this->firstname, $this->city,$this->creationDate, $this->phone, $this->isMod, $this->isAdmin]);
    }

    public function getDetail($detail){
        return $this->$detail;
    }

    public function setDetail($detail,$value,$pdo,$userId){
        $statement = $pdo->prepare("UPDATE users SET $detail = ? WHERE id = ?");
        $statement->execute([$value,$userId]);
    }

    public static function getUserById($userId, PDO $pdo) {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$userId]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            return new self(
                $user['username'],
                $user['password'],
                $user['name'],
                $user['firstname'],
                $user['city'],
                $user['phone'],
                $user['isMod'],
                $user['isAdmin']
            );
        }
        return null; 
    }
}
