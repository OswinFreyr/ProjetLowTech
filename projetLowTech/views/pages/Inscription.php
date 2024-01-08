<?php


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
?>


<script src="projetLowTech\views\scripts\inscription.js" defer></script>
<form id="signupForm" action="index.php?page=inscription" method="post">
    <div id="step1">
        <h2>Informations personnelles</h2>
        Pseudo : <input type="text" name="username" required><br><br>
        Nom: <input type="text" name="name" required><br><br>
        Prénom: <input type="text" name="firstname" required><br><br>
        Ville: <input type="text" name="city" required><br><br>
        <div class="boutons">
        <button type="button" onclick="nextStep()">Suivant</button>        
    </div>
    </div>

    <div id="step2" style="display : none;">
        <h2>Informations de contact</h2>
        Email: <input type="email" name="mail" required><br><br>
        Téléphone: <input type="tel" name="phone" required><br><br>
        Mot de passe: <input type="password" name="password" required><br><br>
        <div class="boutons">
            <button type="button" onclick="previousStep()">Précédent</button>
            <button type="button" onclick="nextStep()">Suivant</button>
        </div>
        
    </div>

    <div id="step3" style="display : none;">
        <h3>Compétences </h3>

        <input type="checkbox" id="competence1" name="competence[]" value="Compétence 1">
        <label for="competence1">Compétence 1</label><br>

        <input type="checkbox" id="competence2" name="competence[]" value="Compétence 2">
        <label for="competence2">Compétence 2</label><br>
        <button onclick="previousStep()">Précédent</button>
        <input type="submit" value="Créer mon compte">
    </div>
</form>

<script>
    let steps = ["step1", "step2", "step3"];
    let compteur = 0;
    

    function nextStep() {
        document.querySelector("#" + steps[compteur]).style.display = 'none';
        document.querySelector("#" + steps[compteur + 1]).style.display = 'block';
        compteur++;
    }

    function previousStep() {
        document.querySelector("#" + steps[compteur]).style.display = 'none';
        document.querySelector("#" + steps[compteur - 1]).style.display = 'block';
        compteur--;
    }
</script>