function nextStep() {
    document.getElementById('step1').style.display = 'none';
    document.getElementById('step2').style.display = 'block';
}

function submitForm() {
    var nom = document.getElementById('nom').value;
    var prenom = document.getElementById('prenom').value;
    var ville = document.getElementById('ville').value;
    var email = document.getElementById('email').value;
    var telephone = document.getElementById('telephone').value;
    var motdepasse = document.getElementById('motdepasse').value;

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'process.php', true);
    // methode par defaut
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onload = function () {
        if (xhr.status === 200) {
            alert('Compte créé avec succès !');
        } else {
            alert('Une erreur est survenue lors de la création du compte.');
        }
    };

    var data = 'nom=' + nom + '&prenom=' + prenom + '&ville=' + ville + '&email=' + email + '&telephone=' + telephone + '&motdepasse=' + motdepasse;
    xhr.send(data);
}