<?php
include ("modeles/Base.php");
include ("modeles/Soiree.php");
class SoireeDAO extends Base{
    
    public function __construct(){
        parent::__construct('mancisidor_bdd_picdumidi','377513','ProjetSIO2!');
    }
    
    public function getLesSoirees(){
        $resultatDeLaRequete=$this->query("SELECT * FROM soirees;");
        $tableauSoirees = $resultatDeLaRequete->fetchAll();
        $lesObjSoirees = array();
        foreach($tableauSoirees as $uneLigneUneSoiree){
            $uneSoiree = new Soiree($uneLigneUneSoiree ["id_soiree"],["nom_soiree"],["date_soiree"],["lieu"],["description"],["nbPlaces"]);
            $lesObjSoirees[] = $uneSoiree;
        }
        return $lesObjSoirees;
    }
    
    public function deleteSoiree($id){
        $resultatDeLaRequete=$this->exec("DELETE FROM soirees WHERE id_soiree=".$id->getId().";");
        return $resultatDeLaRequete;
    }
    
    public function addSoiree($soiree){
        $resultatDeLaRequete=$this->exec(" INSERT INTO soirees (`nom_soiree`, `date_soiree`,`lieu`,`description`,`nbPlaces`) VALUES('".$soiree->getNom()."','".$soiree->getDate()."','".$soiree->getLieu()."','".$soiree->getDescription()."'),'".$soiree->getNbPlaces()."';");
        return $resultatDeLaRequete;
    }
    
    public function editSoiree($nom){
        $resultatDeLaRequete=$this->exec(" WHERE nom=".$nom.";");
        return $resultatDeLaRequete;
    }
}