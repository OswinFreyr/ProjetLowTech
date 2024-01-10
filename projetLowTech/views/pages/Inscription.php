

<script src="projetLowTech\views\scripts\inscription.js" defer></script>
<form class="formProfil" id="signupForm" action="index.php?page=inscription" method="post">
    <div id="step1">
        <h2>Informations personnelles</h2>
        Pseudo : <input class="inputButtonFromProfil" type="text" name="username" required><br><br>
        Nom: <input class="inputButtonFromProfil"  type="text" name="name" required><br><br>
        Prénom: <input class="inputButtonFromProfil"  type="text" name="firstname" required><br><br>
        Ville: <input class="inputButtonFromProfil"  type="text" name="city" required><br><br>
        <div class="boutons">
        <button class="inputButtonFromProfil"  type="button" onclick="nextStep()">Suivant</button>        
    </div>
    </div>

    <div id="step2" style="display : none;">
        <h2>Informations de contact</h2>
        Email: <input class="inputButtonFromProfil"  type="email" name="mail" required><br><br>
        Téléphone: <input class="inputButtonFromProfil"  type="tel" name="phone" required><br><br>
        Mot de passe: <input class="inputButtonFromProfil"  type="password" name="password" required><br><br>
        <div class="boutons">
            <button class="inputButtonFromProfil" type="button" onclick="previousStep()">Précédent</button>
            <button class="inputButtonFromProfil"  type="button" onclick="nextStep()">Suivant</button>
        </div>
        
    </div>

    <div id="step3" style="display : none;">
        <h3>Compétences </h3>
        <div class="competence">
            <input  type="checkbox" id="competence1" name="competence[]" value="Compétence 1">
            <label for="competence1">Compétence 1</label><br>
        </div>
        

        <div class="competence">
            <input type="checkbox" id="competence2" name="competence[]" value="Compétence 2">
            <label for="competence2">Compétence 2</label><br>
        </div>

        

        <button class="inputButtonFromProfil"  onclick="previousStep()">Précédent</button>
        <input class="inputButtonFromProfil"  type="submit" value="Créer mon compte">
    </div>
</form>
<div class="btnVersInscription">
    <p>Vous possédez déjà un compte ? </p>
    <button class="btnRedir"  > <a href="index.php?page=inscription">Se connecter</a></button>
</div>

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