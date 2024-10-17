<?php
include_once ("Base.php");
include_once ("DAO/Soiree.php");
class SoireeDAO extends Base{
    
    public function __construct(){
        parent::__construct();
    }
    
    //Modèle pour la structure
    /*public function getLesDeveloppeurs(){
        $this->setConnexionSelonRole("consultation");
        $resultatDeLaRequete=$this->query("SELECT * FROM Developpeur;");
        $tableauDeveloppeurs = $resultatDeLaRequete->fetchAll();
        $lesObjDeveloppeurs = array();
        foreach($tableauDeveloppeurs as $uneLigneUnDeveloppeur){
            $unDeveloppeur = new Developpeur($uneLigneUnDeveloppeur["id"],$uneLigneUnDeveloppeur["prenom"],$uneLigneUnDeveloppeur["nom"]);
            $lesObjDeveloppeurs[] = $unDeveloppeur;
        }
        return $lesObjDeveloppeurs;
    }*/
}