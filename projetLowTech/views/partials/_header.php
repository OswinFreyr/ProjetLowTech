<?php
$utilisateurConnecte = false; 

if (isset($_SESSION['utilisateur'])) {
    $utilisateurConnecte = true;
}

if ($utilisateurConnecte) {
    echo '<a href="index.php?page=profil">Profil</a>';
} else {
    echo '<a href="index.php?page=connexion">Profil</a>';
}

?>



<header>
    <ul>
        <li id="logo"> <img src="" alt="logo LowTech"> </li>
        <li id="nomEntreprise"> <a href="index.php?page=home">LowTech Bordeaux</a> </li>
    </ul>
    <ul>
        <li id="partenaires"> <a href="index.php?page=partenaires">Partenaires</a> </li>
        <li id="annonces"> <a href="index.php?page=annonces">Annonces</a> </li>
        <li id="benevoles"> <a href="index.php?page=annuaire">Bénévoles</a> </li>
        <li id="connexion"> 
            <a href="index.php?page=connexion">Se connecter</a>
            <a href="index.php?page=inscription">S'inscrire</a>
            <!-- <a href="index.php?page=profil">Mon compte</a> -->
            <!-- <form method="POST">  A METTRE SUR LA PAGE D'INSCRIPTION
                <label for="name">Nom :</label><br>
                <input type="text" id="name" name="name" required><br>
                <label for="password">Mot de passe :</label><br>
                <input type="password" id="password" name="password" required><br>
                <label for="address">Adresse :</label><br>
                <input type="text" id="address" name="address" required><br>
                <label for="email">Email :</label><br>
                <input type="email" id="email" name="email" required><br>
                <label for="tel">Téléphone :</label><br>
                <input type="text" id="tel" name="tel" required><br>
                <input type="submit" value="Créer un compte">
            </form>  -->
        </li>
    </ul>
</header>