<?php

/**
 * 
 * génère les informations générales d'une soirée
 * 
 * @author groupe
 * 
 */
class Parking {
    /**
     * 
     * @var $id identifiant unique du parking 
     */
    private $id;

    /**
     * Summary of nom
     * @var  $nom nom unique de la soirée
     */
    private  $placeMBR;
    /**
     * Summary of date
     * @var  $date date unique de la soirée
     */
    private  $placeC;

    private $nbPlaces;
   
    
    public function __construct($id, $placeMBR,$placeC,$nbPlaces){
        if($id == null){
            $this->id = null;
        }else{
            $this->id = $id;
        }
        $this->placeMBR = $placeMBR;
        $this->placeC = $placeC;
       $this->nbPlaces = $nbPlaces
        
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
    public function getPlaceMBR(){
        return $this->placeMBR;
    }
    /**
     * la fonction retourne la date de début 
     * @return string date 
     */
    public function getPlaceC(){
        return $this->placeC;
    }

    public function getNbPlaces(){
        return $this->nbPlaces;
    }
    
}
