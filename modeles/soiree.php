<?php
class Soiree {
    private int $id;
    private String $nom;
    private String $date;
    private String $lieu;
    private String $description;
    private int $nbPlaces;
    
    
    public function __construct($id, $nom, $date, $lieu, $description, $nbPlaces){
        private int $id;
        $this->nom = $nom;
        $this->date = $date;
        $this->lieu = $lieu;
        $this->description = $description;
        $this->nbPlaces = $nbPlaces;
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
    public function getDescription(){
        return $this->description;
    }
    public function getNbPlaces(){
        return $this->nbPlaces;
    }
}
