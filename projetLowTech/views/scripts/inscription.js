// let steps = ["step1", "step2", "step3"];
// let compteur = 0;

// export function nextStep() {
//     document.querySelector("#", steps[i]).style.display = 'none';
//     document.querySelector("#", steps[i + 1]).style.display = 'block';
//     if (i < 3) {
//         i++;
//     }
// }

// function submitForm() {
//     var nom = document.getElementById('name').value;
//     var prenom = document.getElementById('firstname').value;
//     var ville = document.getElementById('city').value;
//     var email = document.getElementById('mail').value;
//     var telephone = document.getElementById('phone').value;
//     var motdepasse = document.getElementById('password').value;

//     var xhr = new XMLHttpRequest();
//     xhr.open('POST', 'process.php', true);
//     // methode par defaut
//     xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
//     xhr.onload = function () {
//         if (xhr.status === 200) {
//             alert('Compte créé avec succès !');
//         } else {
//             alert('Une erreur est survenue lors de la création du compte.');
//         }
//     };

//     var data = 'nom=' + nom + '&prenom=' + prenom + '&ville=' + ville + '&email=' + email + '&telephone=' + telephone + '&motdepasse=' + motdepasse;
//     xhr.send(data);
// }