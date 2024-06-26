<?php 
class User {
    private $id;
    private $username;
    private $password;
    private $name;
    private $firstname;
    private $mail;
    private $city;
    private $creationDate;
    private $phone;
    private $isMod;
    private $isAdmin;

    public function __construct($username, $password, $name, $firstname,$mail, $city, $phone, $isMod, $isAdmin) {
        $this->username = $username;
        $this->password = $password;
        $this->name = $name;
        $this->firstname = $firstname;
        $this->mail = $mail;
        $this->city = $city;
        $this->creationDate = new DateTime();
        $this->phone = $phone;
        $this->isMod = false;
        $this->isAdmin = false;
    } 

    public function saveUser() {
        $pdo = dbConnect();
        $statement = $pdo->prepare("INSERT INTO users (username, password, name, firstname,mail, city, creationDate, phone, isMod, isAdmin) VALUES (?, ?, ?, ?, ?,?, ?, ?, ?)");
        $statement->execute([$this->username, $this->password, $this->name, $this->firstname,$this->mail, $this->city,$this->creationDate, $this->phone, $this->isMod, $this->isAdmin]);
    }

    public function getDetail($detail){
        return $this->$detail;
    }

    public static function setDetail($detail,$value,$userId){
        $pdo = dbConnect();
        $statement = $pdo->prepare("UPDATE users SET $detail = ? WHERE id = ?");
        $statement->execute([$value,$userId]);
    }

    public static function getUserById($userId) {
        $pdo = dbConnect();
        $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$userId]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            return new self(
                $user['username'],
                $user['password'],
                $user['name'],
                $user['firstname'],
                $user['mail'],
                $user['city'],
                $user['phone'],
                $user['isMod'],
                $user['isAdmin']
            );
        }
        return null; 
    }
}
