<?php
class Incident {
    private $id;
    private String $nom;
    private String $personne;
    
    public function __construct($id, $nom, $personne){
        $this->id = $id;
        $this->nom = $nom;
        $this->personne;
    }

    
    public function getId(){
        return $this->id;
    }
    public function getNom(){
        return $this->nom;
    }
    public function getPersonne(){
        return $this->personne;
    }

    public function setId($id){
        $this->id = $id;
    }
    public function setNom($nom){
        $this->nom = $nom;
    }
    public function setPersonne($personne){
        $this->personne = $personne;
    }
}