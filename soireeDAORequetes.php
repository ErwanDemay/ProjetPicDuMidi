<?php
include ("modeles/Base.php");
include ("modeles/soiree.php");
class SoireeDAO extends Base{
    
    public function __construct(){
        parent::__construct('mancisidor_bdd_picdumidi','377513','ProjetSIO2!');
    }
    
    public function getLesSoirees(){
        $resultatDeLaRequete=$this->query("SELECT * FROM soirees;");
        $tableauSoirees = $resultatDeLaRequete->fetchAll();
        $lesObjSoirees = array();
        foreach($tableauSoirees as $uneLigneUneSoiree){
            $uneSoiree = new Soiree($uneLigneUneSoiree["id_soiree"],$uneLigneUneSoiree["nom_soiree"],$uneLigneUneSoiree["date_soiree"],$uneLigneUneSoiree["lieu"],$uneLigneUneSoiree["description"],$uneLigneUneSoiree["nbPlaces"]);
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
    
    public function editSoiree($soiree){
        $resultatDeLaRequete=$this->exec("UPDATE soirees SET `nom_soiree`, `date_soiree`,`lieu`,`description`,`nbPlaces`='".$soiree->getNom()."','".$soiree->getDate()."','".$soiree->getLieu()."','".$soiree->getDescription()."'),'".$soiree->getNbPlaces()."'WHERE id='".$soiree->getId()."';");
        return $resultatDeLaRequete;
    }

    public function getUneSoiree($id){
        $resultatDeLaRequete=$this->query("SELECT * FROM soirees WHERE id='".$id."';");
        $uneSoiree = $resultatDeLaRequete->fetch();
        $unObjSoiree = new Soiree($uneSoiree["id_soiree"],$uneSoiree["nom_soiree"],$uneSoiree["date_soiree"],$uneSoiree["lieu"],$uneSoiree["description"],$uneSoiree["nbPlaces"]);
        return $unObjSoiree;
    }





}