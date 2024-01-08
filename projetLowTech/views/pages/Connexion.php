<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mail = $_POST['mail'];
    $password = $_POST['password'];

    $servername = "localhost";
    $username = "root";
    $password_db = "";
    $dbname = "dblowtech";

    $connexion = new mysqli($servername, $username, $password_db, $dbname);

    if ($connexion->connect_error) {
        die("Connexion échouée: " . $connexion->connect_error);
    }

    $statement = $connexion->prepare("SELECT id, password FROM users WHERE email = ?");
    $statement->bind_param("s", $mail);
    $statement->execute();
    $result = $statement->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row['password'];
        if (password_verify($password, $hashedPassword)) {
            echo "Connexion réussie ";
            if(isset($_SERVER['HTTP_REFERER'])) {
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            } else {
                header('Location: home');
            }
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
    Email: <input type="text" name="email"><br><br>
    Mot de passe: <input type="password" name="password"><br><br>
    <input type="submit" value="Se connecter">
</form>


