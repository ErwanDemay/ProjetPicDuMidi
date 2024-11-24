<?php

/**
 * 
 * génère les informations générales d'une soirée
 * 
 * @author groupe
 * 
 */
class Soiree {
    /**
     * 
     * @var $id identifiant unique de la soirée 
     */
    private $id;

    /**
     * Summary of nom
     * @var  $nom nom unique de la soirée
     */
    private  $nom;
    /**
     * Summary of date
     * @var  $date date unique de la soirée
     */
    private  $date;
    /**
     * Summary of lieu
     * @var  $lieu lieu unique de la soirée
     */
    private  $lieu;
    /**
     * Summary of description
     * @var  $description description unique de la soirée
     */
    private  $description;

    /**
     * Summary of nbPlaces
     * @var  $nbPlaces le nombre de places de la soirée
     */
    private  $nbPlaces;
    /**
     * Summary of prix
     * @var  $prix  prix de la soirée
     */
    private  $prix;
    /**
     * Summary of  heureDebut
     * @var  $heureDebut heure de début de la soirée
     */

    private  $heureDebut;

    /**
     * Construit un objet soirée    
     * @param mixed $id
     * @param mixed $nom
     * @param mixed $date
     * @param mixed $lieu
     * @param mixed $description
     * @param mixed $nbPlaces
     * @param mixed $prix
     * @param mixed $heureDebut
     */
    public function __construct($id, $nom, $date, $lieu, $description, $nbPlaces, $prix , $heureDebut){
        if($id == null){
            $this->id = null;
        }else{
            $this->id = $id;
        }
        $this->nom = $nom;
        $this->date = $date;
        $this->lieu = $lieu;
        $this->description = $description;
        $this->nbPlaces = $nbPlaces;
        $this->prix = $prix;
        $this->heureDebut = $heureDebut;
        
    }

    /**
     * fonction qui retourne l'identifiant 
     */
    public function getId(){
        return $this->id;
    }
    /**
     * fonction qui retourne le nom de la soirée
     * @return string nom
     */
    public function getNom(){
        return $this->nom;
    }
    /**
     * la fonction retourne la date de début 
     * @return string date 
     */
    public function getDate(){
        return $this->date;
    }
    /**
     * fonction qui retourne le lieu de la soirée
     * @return string lieu
     */
    public function getLieu(){
        return $this->lieu;
    }
    /**
     * fonction qui retourne la description de la soirée
     * @return string description
     */
    public function getDescription(){
        return $this->description;
    }
    /**
     * fonction qui retourne le nombre de places de la soirée
     * @return int nbPlaces
     */
    public function getNbPlaces(){
        return $this->nbPlaces;
    }
    /**
     * fonction qui retourne le prix de la soirée
     * @return int prix
     */
    public function getPrix(){
        return $this->prix;
    }
    /**
     * fonction qui retourne l'heure de début de la soirée
     * @return string heureDebut
     */
    public function getHeureDebut(){
        return $this->heureDebut;
    }
}
