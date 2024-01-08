<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {

$name = $_POST['nom'];
$firstname = $_POST['prenom'];
$ville = $_POST['ville'];
$username = $_POST['username'];
$mail = $_POST['email'];
$phone = $_POST['telephone'];
$motDePasse = $_POST['motdepasse'];

$hashedMdp = password_hash($motdepasse, PASSWORD_DEFAULT);

$servername = "localhost";
$username_db = "root";
$password_db = "";
$dbname = "dblowtech";

$connexion = new mysqli($servername, $username, $password, $dbname);

if ($connexion->connect_error) {
    die("Connexion échouée: " . $connexion->connect_error);
}

$statememnt = $connexion->prepare("INSERT INTO users (username, password,name, firstname,mail, city, creationDate, phone,isMod,isAdmin) VALUES (?, ?,?, ?, ?, ?, ?)");
$statememnt->bind_param("ssssss", $username, $hashedMdp,$name, $firstname,$mail, $city, $creationDate,$phone,$isMod,$isAdmin );

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
?>



<form id="signupForm" action="process.php" method="post">
    <div id="step1">
        <h2>Informations personnelles</h2>
        Nom: <input type="text" id="nom" required><br><br>
        Prénom: <input type="text" id="prenom" required><br><br>
        Ville: <input type="text" id="ville" required><br><br>
        <button onclick="nextStep()">Suivant</button>
    </div>

    <div id="step2" style="display: none;">
        <h2>Informations de contact</h2>
        Email: <input type="email" id="email" required><br><br>
        Téléphone: <input type="tel" id="telephone" required><br><br>
        Mot de passe: <input type="password" id="motdepasse" required><br><br>
        <button onclick="submitForm()">Créer le compte</button>
    </div>

    <div id="step3" style="display: none;">
        <h3>Compétences </h3>

        <input type="checkbox" id="competence1" name="competence[]" value="Compétence 1">
        <label for="competence1">Compétence 1</label><br>

        <input type="checkbox" id="competence2" name="competence[]" value="Compétence 2">
        <label for="competence2">Compétence 2</label><br>
    </div>
</form>