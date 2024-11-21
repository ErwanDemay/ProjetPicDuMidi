<?php
class Soiree {
    private $id;
    private String $nom;
    private String $date;
    private String $lieu;
    private String $description;
    private int $nbPlaces;

    private String $prix;

    private String $heureDebut;

   
    



    
    public function __construct($id, $nom, $date, $lieu, $description, $nbPlaces, $prix , $heureDebut){
        $this->id = $id;
        $this->nom = $nom;
        $this->date = $date;
        $this->lieu = $lieu;
        $this->description = $description;
        $this->nbPlaces = $nbPlaces;
        $this->prix = $prix;
        $this->heureDebut = $heureDebut;
        
    }

    
    public function getId(){
        return $this->id;
    }
    public function getNom(){
        return $this->nom;
    }
    public function getDate(){
        return $this->date;
    }
    public function getLieu(){
        return $this->lieu;
    }
    public function getDescription(){
        return $this->description;
    }
    public function getNbPlaces(){
        return $this->nbPlaces;
    }

    public function getPrix(){
        return $this->prix;
    }

    public function getHeureDebut(){
        return $this->heureDebut;
    }
}
