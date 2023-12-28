<?php

abstract class Visiteur {
    public function voirAnnonce($annonce) {
        return $annonce;
    }
}

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

        $db = new PDO('mysql:host=127.0.0.1;dbname=dblowtech', 'root', '');
        $query = "INSERT INTO benevoles (nom, prenom, mail, adresse, telephone, ville) VALUES (:nom, :prenom, :mail, :adresse, :telephone, :ville)";
        $statement = $db->prepare($query);
        $statement->bindParam(':nom', $this->nom);
        $statement->bindParam(':prenom', $this->prenom);
        $statement->bindParam(':mail', $this->mail);
        $statement->bindParam(':adresse', $this->adresse);
        $statement->bindParam(':telephone', $this->telephone);
        $statement->bindParam(':ville', $this->ville);
        $result = $statement->execute();
        if ($result) {
            echo "Nouveau bénévole ajouté avec succès!";
            // return $db->lastInsertId();
        } else {
            echo "Erreur lors de l'ajout du bénévole.";
            // return null;
        }
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

    public function getCommentairesAnnonce($annonce) {
        if (isset($this->commentaires[$annonce])) {
            return $this->commentaires[$annonce];
        }
        return [];
    }
}


class Moderateur extends Benevole {
    private $annonces = []; 
    private $isModerateur = true;

    public function creerAnnonce($titre, $description, $date, $ville, $competencesNecessaires) {
        $db = new PDO('mysql:host=127.0.0.1;dbname=dblowtech', 'root', '');
        $query = "INSERT INTO annonces (titre, description, date, ville, competences_necessaires) VALUES (:titre, :description, :date, :ville, :competences)";
        $statement = $db->prepare($query);
        $statement->bindParam(':titre', $titre);
        $statement->bindParam(':description', $description);
        $statement->bindParam(':date', $date);
        $statement->bindParam(':ville', $ville);
        $statement->bindParam(':competences', $competencesNecessaires);
        $result = $statement->execute();

        if ($result) {
            echo "Annonce créée avec succès.";
            return $db->lastInsertId();
        } else {
            echo "Erreur lors de la création de l'annonce.";
            return null;
        }
    }

    public function modifierAnnonce($annonceId, $titre,$description,$date,$ville,$competences) {
        $db = new PDO('mysql:host=127.0.0.1;dbname=dblowtech', 'root', '');
        $query = "UPDATE annonces SET titre = :titre, description = :description, date = :date, ville = :ville, competences_necessaires = :competences WHERE id = :annonceId";
        $statement = $db->prepare($query);
        $statement->bindParam(':titre', $titre['titre']);
        $statement->bindParam(':description', $description['description']);
        $statement->bindParam(':date', $date['date']);
        $statement->bindParam(':ville', $ville['ville']);
        $statement->bindParam(':competences', $competences['competencesNecessaires']);
        $statement->bindParam(':annonceId', $annonceId);
        $result = $statement->execute();

        if ($result) {
            echo "Annonce modifiée avec succès.";
        } else {
            echo "Erreur lors de la modification de l'annonce.";
        }
    }

    public function supprimerAnnonce($annonceId) {
        $db = new PDO('mysql:host=127.0.0.1;dbname=dblowtech', 'root', ''); 
        $query = "DELETE FROM annonces WHERE id = :annonceId";
        $statement = $db->prepare($query);
        $statement->bindParam(':annonceId', $annonceId);
        $result = $statement->execute();

        if ($result) {
            echo "Annonce supprimée avec succès.";
        } else {
            echo "Erreur lors de la suppression de l'annonce.";
        }
    }
}

class Administrateur extends Moderateur {
    private $isAdmin = true;
    private $moderateurs = [];
    public function ajouterModerateur($nom,$prenom,$mail,$adresse,$telephone,$ville) {
        $db = new PDO('mysql:host=127.0.0.1;dbname=dblowtech', 'root', '');
        $query = "INSERT INTO moderateurs (nom, prenom, mail, adresse, telephone, ville) VALUES (:nom, :prenom, :mail, :adresse, :telephone, :ville)";
        $statement = $db->prepare($query);

        $statement->bindParam(':nom', $nom);
        $statement->bindParam(':prenom', $prenom);
        $statement->bindParam(':mail', $mail);
        $statement->bindParam(':adresse', $adresse);
        $statement->bindParam(':telephone', $telephone);
        $statement->bindParam(':ville', $ville);
        $result = $statement->execute();

        if ($result) {
            echo "Nouveau modérateur ajouté avec succès!";
            return $db->lastInsertId();
        } else {
            echo "Erreur lors de l'ajout du modérateur.";
            return null;
        }
    }
    
}

?>
