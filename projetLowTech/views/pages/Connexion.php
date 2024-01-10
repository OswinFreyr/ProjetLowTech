<?php
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
            echo "Connexion réussie ";
            $row = $recupPseudo->fetch_assoc();
            $_SESSION['idUser'] = $row['id'];
            header("Location: index.php?page=profil"); 

            exit;
        } else {
            echo "Mot de passe invalide.";
        }
    } else {
        echo "Vous ne possédez pas de compte.";
    }

    $statement->close();
    $connexion->close();
}
?>


<h2>Connexion</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    Pseudo : <input type="text" name="pseudo"><br><br>
    Mot de passe : <input type="password" name="password"><br><br>
    <input type="submit" value="Se connecter">
</form>
<div class="btnVersInscription">
    <h2>Vous ne possédez pas de compte ? </h2>
    <a href="index.php?page=inscription">Créer un compte</a>
</div>



