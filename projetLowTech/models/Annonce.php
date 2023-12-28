<?php

class Annonce {
    private $id;
    private $titre;
    private $description;
    private $date;
    private $ville;
    private $competencesNecessaires = [];
    private $createur;
    private $benevoles = [];

    private $commentaires = [];

    public function __construct($titre, $description, $date, $ville, $competencesNecessaires, $createur) {
        $this->titre = $titre;
        $this->description = $description;
        $this->date = $date;
        $this->ville = $ville;
        $this->competencesNecessaires = $competencesNecessaires;
        $this->createur = $createur;
    }


    public function getDetail($detail) {
        return $this->{$detail};
    }

    public function getAllDetails() {
        $details = array(
            'titre' => $this->titre,
            'description' => $this->description,
            'date' => $this->date,
            'ville' => $this->ville,
            'competencesNecessaires' => $this->competencesNecessaires,
            'createur' => $this->createur
        );
    
        return $details;
    }
    

    public function setDetail($detail,$value) {
        $this->$detail = $value;
    }

    public function ajouterBenevoleReponse($benevole) {
        if (!in_array($benevole, $this->benevoles)) {
            $this->benevoles[] = $benevole;
        } else {
            echo "Ce bénévole a déjà répondu à cette annonce.";
        }
    }
}

?>
