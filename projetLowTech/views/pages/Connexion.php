
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



