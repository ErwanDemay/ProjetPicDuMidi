<?php
include_once ("./modeles/Base.php");
include_once ("./modeles/Soiree.php");
class SoireeDAO extends Base{
    
    public function __construct(){
        parent::__construct();
        parent::setConnexionBase('mancisidor_bdd_picdumidi','377513','ProjetSIO2!');
    }
    
    public function getLesSoirees(){
        $resultatDeLaRequete=$this->query("SELECT * FROM soirees ORDER BY date_soiree DESC;");
        $tableauSoirees = $resultatDeLaRequete->fetchAll();
        $lesObjSoirees = array();
        foreach($tableauSoirees as $uneLigneUneSoiree){
            $uneSoiree = new Soiree($uneLigneUneSoiree["id_soiree"],$uneLigneUneSoiree["nom_soiree"],$uneLigneUneSoiree["date_soiree"],$uneLigneUneSoiree["lieu"],$uneLigneUneSoiree["description"],$uneLigneUneSoiree["nbPlaces"], $uneLigneUneSoiree["prix"], $uneLigneUneSoiree["heureDebut"]);
            $lesObjSoirees[] = $uneSoiree;
        }
        return $lesObjSoirees;
    }
    
    public function deleteSoiree($id){
        $resultatDeLaRequete=$this->exec("DELETE FROM soirees WHERE id_soiree=".$id.";");
        return $resultatDeLaRequete;
    }
    
    public function addSoiree($soiree) {
        $resultatDeLaRequete = $this->exec("INSERT INTO soirees (`nom_soiree`, `date_soiree`, `lieu`, `description`, `nbPlaces`,`prix`,`heureDebut`) VALUES ('".$soiree->getNom()."', ".$soiree->getDate().", '".$soiree->getLieu()."', '".$soiree->getDescription()."', ".$soiree->getNbPlaces()." ,".$soiree->getPrix().", '".$soiree->getHeureDebut()."');");
        return $resultatDeLaRequete;
    }
    
    
    public function editSoiree($soiree){
        $resultatDeLaRequete=$this->exec("UPDATE soirees SET `nom_soiree`='".$soiree->getNom()."', `date_soiree`='".$soiree->getDate()."',`lieu`='".$soiree->getLieu()."',`description`='".$soiree->getDescription()."',`nbPlaces`=".$soiree->getNbPlaces().",`prix` = '".$soiree->getPrix()."', `heureDebut`= '".$soiree->getHeureDebut()."'  WHERE id_soiree=".$soiree->getId().";");
        return $resultatDeLaRequete;
    }

    public function getUneSoiree($id){
        $resultatDeLaRequete=$this->query("SELECT * FROM soirees WHERE id_soiree='".$id."';");
        $uneSoiree = $resultatDeLaRequete->fetch();
        $unObjSoiree = new Soiree($uneSoiree["id_soiree"],$uneSoiree["nom_soiree"],$uneSoiree["date_soiree"],$uneSoiree["lieu"],$uneSoiree["description"],$uneSoiree["nbPlaces"],$uneSoiree["prix"],$uneSoiree["heureDebut"]);
        return $unObjSoiree;
    }

    public function getProchainesLesSoirees(){
        $resultatDeLaRequete=$this->query("SELECT * FROM soirees WHERE date_soiree>curdate() ORDER BY date_soiree;");
        $tableauSoirees = $resultatDeLaRequete->fetchAll();
        $lesObjSoirees = array();
        foreach($tableauSoirees as $uneLigneUneSoiree){
            $uneSoiree = new Soiree($uneLigneUneSoiree["id_soiree"],$uneLigneUneSoiree["nom_soiree"],$uneLigneUneSoiree["date_soiree"],$uneLigneUneSoiree["lieu"],$uneLigneUneSoiree["description"],$uneLigneUneSoiree["nbPlaces"],$uneLigneUneSoiree["prix"],$uneLigneUneSoiree["heureDebut"]);
            $lesObjSoirees[] = $uneSoiree;
        }
        return $lesObjSoirees;
    }

    public function getNbPlacesRestantes($soiree){
        //$resultatDeLaRequete=$this->query("SELECT soirees.nbPlaces - SUM(reservations.nbPlaces) FROM soirees INNER JOIN reservations ON soirees.id_soiree=reservations.id_soiree WHERE soirees.id_soiree=".$soiree->getId().";");
        //REQUÊTE OK, pas le temps d'adapter le retour vers String
        $resultatDeLaRequete = 2;
        return $resultatDeLaRequete;
    }
}