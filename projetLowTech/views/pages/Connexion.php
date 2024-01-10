

<div id="formConnexion">
    <h2>Connexion</h2>
    <form method="post" >
        <label for="username">Pseudo :</label><br>
        <input type="text" name="pseudo"><br><br>
        <label for="tel">Mot de passe :</label><br>
        <input type="password" name="password"><br><br>
        <input class="btn" type="submit" value="Se connecter">
    </form>
    <p><?= $message?></p>
    <div class="btnVersInscription">
        <p>Vous ne possédez pas de compte ? </p>
        <a class="btnLien" href="index.php?page=inscription">Créer un compte</a>
    </div>


</div>

