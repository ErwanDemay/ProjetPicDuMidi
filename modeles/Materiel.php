<?php
class Materiel {
    private $id;
    private String $nom;
    private String $etat;
    
    public function __construct($id, $nom, $etat){
        $this->id = $id;
        $this->nom = $nom;
        $this->etat = $etat;
    }

    
    public function getId(){
        return $this->id;
    }
    public function getNom(){
        return $this->nom;
    }
    public function getEtat(){
        return $this->etat;
    }

    public function setId($id){
        $this->id = $id;
    }
    public function setNom($nom){
        $this->nom = $nom;
    }
    public function setEtat($etat){
        $this->etat = $etat;
    }
}