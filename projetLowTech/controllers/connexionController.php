<?php

$template = './views/pages/Connexion.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pseudo = $_POST['pseudo'];
    $password = $_POST['password'];

    $servername = "localhost";
    $username = "root";
    $password_db = "";
    $dbname = "dblowtech";

    $connexion = new mysqli($servername, $username, $password_db, $dbname);

    $sql = "SELECT id FROM users WHERE username = '$pseudo'";
    $recupPseudo = $connexion->query($sql);

    if ($connexion->connect_error) {
        die("Connexion échouée: " . $connexion->connect_error);
    }

    $statement = $connexion->prepare("SELECT id, password FROM users WHERE username = ?");
    $statement->bind_param("s", $pseudo);
    $statement->execute();
    $result = $statement->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row['password'];
        if (password_verify($password, $hashedPassword)) {
            $row = $recupPseudo->fetch_assoc();
            $_SESSION['idUser'] = $row['id'];
            header("Location: index.php?page=profil"); 

            exit;
        } else {
            ?>
            <p>mot de passe invalide</p>
            <?php
        }
    } else {
        ?>
            <p>Vouas ne possédez pas de compte</p>
            <?php
    }

    $statement->close();
    $connexion->close();
}