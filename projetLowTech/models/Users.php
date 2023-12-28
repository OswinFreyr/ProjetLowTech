<?php

abstract class Visiteur {
    public function voirAnnonce($annonce) {
    }
}

// Classe Bénévole
class Benevole extends Visiteur {
    private $nom;
    private $prenom;
    private $mail;
    private $adresse;
    private $telephone;
    private $ville;
    private $reponses = []; 
    private $commentaires = [];

    public function __construct($nom, $prenom, $mail, $adresse, $telephone, $ville) {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->mail = $mail;
        $this->adresse = $adresse;
        $this->telephone = $telephone;
        $this->ville = $ville;
    }

    public function repondreAnnonce($annonce) {
        if (!in_array($annonce, $this->reponses)) {
            $this->reponses[] = $annonce;
            $annonce->ajouterBenevoleReponse($this);
        } else {
            echo "Vous avez déjà répondu à cette annonce.";
        }
    }

    public function commenter($annonce, $commentaire) {
        if (!isset($this->commentaires[$annonce])) {
            $this->commentaires[$annonce] = []; 
        }
        $this->commentaires[$annonce][] = $commentaire;
    }
}

// Classe Modérateur
class Moderateur extends Benevole {
    private $annonces = []; 
    private $isModerateur = true;

    public function creerAnnonce($titre, $description, $date, $ville, $competencesNecessaires) {
        
    }

    public function modifierAnnonce($annonce, $nouvellesInfos) {
        
    }

    public function supprimerAnnonce($annonce) {
        
    }
}

class Administrateur extends Moderateur {
    private $isAdmin = true;
    private $moderateurs = [];
    public function ajouterModerateur($nom,$prenom,$mail,$adresse,$telephone,$ville) {
        $moderateur = new Moderateur($nom,$prenom,$mail,$adresse,$telephone,$ville);
        $this->moderateurs[] = $moderateur;
        return $moderateur;
    }
}

?>
