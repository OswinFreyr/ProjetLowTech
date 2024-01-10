<?php

$template = './views/pages/Inscription.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {

$name = $_POST['name'];
$firstname = $_POST['firstname'];
$city = $_POST['city'];
$username = $_POST['username'];
$mail = $_POST['mail'];
$phone = $_POST['phone'];
$password = $_POST['password'];

$hashedMdp = password_hash($password, PASSWORD_DEFAULT);

$servername = "localhost";
$username_db = "root";
$password_db = "";
$dbname = "dblowtech";

$connexion = new mysqli($servername, $username_db, $password_db, $dbname);

if ($connexion->connect_error) {
    die("Connexion échouée: " . $connexion->connect_error);
}

$statememnt = $connexion->prepare("INSERT INTO users (username, password,name, firstname,mail, city, creationDate, phone,isMod,isAdmin) VALUES (?, ?,?, ?, ?,?,NOW(),?, false,false)");
$statememnt->bind_param( "sssssss",$username, $hashedMdp,$name, $firstname,$mail, $city,$phone);

if ($statememnt->execute()) {
    echo "Le compte a été créé.";
    if(isset($_SERVER['HTTP_REFERER'])) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        header('Location: home');
    }
    exit;
} else {
    echo "Erreur : " . $connexion->error;
}

$statememnt->close();
$connexion->close();
}