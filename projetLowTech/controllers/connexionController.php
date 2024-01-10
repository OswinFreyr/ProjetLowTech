<?php
require_once './models/connection.php';

$template = './views/pages/Connexion.php';
$message="";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pseudo = $_POST['pseudo'];
    $password = $_POST['password'];
    // var_dump($pseudo);
    // var_dump($hashedMdp);



    $statement = dbConnect()->prepare("SELECT id,password FROM users WHERE username ='$pseudo'");
    $statement->execute();
    $result = $statement->fetchAll();

    $verif = false;

    if (isset($result)) {
        foreach ($result as $r){
            
            var_dump(password_verify($password,$r['password']));
            if (password_verify($password, $r['password'])) {
                $_SESSION['idUser'] = $r['id'] ;
                $verif = true;
                header("Location: index.php?page=profil"); 
                exit;
            }
            
        }
        if (!$verif){
            $message = "Mot de passe invalide";
        }
        
    } else {

           $message ="Vous ne possédez pas de compte";
            
        
    }

    // $statement->close();
    // $connexion->close();
}
