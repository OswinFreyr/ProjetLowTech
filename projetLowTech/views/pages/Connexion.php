

<div id="formConnexion">
    <h2>Connexion</h2>
    <form class="formProfil" method="post" >
        <label for="username">Pseudo :</label><br>
        <input class="inputButtonFromProfil" type="text" name="pseudo"><br><br>
        <label for="tel">Mot de passe :</label><br>
        <input class="inputButtonFromProfil" type="password" name="password"><br><br>
        <input class="inputButtonFromProfil" class="btn" type="submit" value="Se connecter">
    </form>
    <p><?= $message?></p>
    <div class="btnVersInscription">
        <p>Vous ne possédez pas de compte ? </p>
        <button class="btnRedir" ><a href="index.php?page=inscription">Créer un compte</a></button>
    </div>


</div>

