<?php
include_once ("./modeles/Base.php");
include_once ("./modeles/Materiel.php");
class MaterielDAO extends Base{
    
    public function __construct(){
        parent::__construct();
        parent::setConnexionBase('mancisidor_bdd_picdumidi','377513','ProjetSIO2!');
    }
    
    public function getLesMateriels(){
        $resultatDeLaRequete=$this->query("SELECT * FROM materiel;");
        $tableauMateriels = $resultatDeLaRequete->fetchAll();
        $lesObjMateriels = array();
        foreach($tableauMateriels as $uneLigneUnMateriel){
            $unMateriel = new Materiel($uneLigneUnMateriel["id_materiel"],$uneLigneUnMateriel["nom_materiel"],$uneLigneUnMateriel["etat_materiel"]);
            
            $lesObjMateriels[] = $unMateriel;
        }
        return $lesObjMateriels;
    }
    
    public function deleteMateriel($id){
        $resultatDeLaRequete=$this->exec("DELETE FROM materiel WHERE id_materiel=".$id.";");
        return $resultatDeLaRequete;
    }
    
    public function addMateriel($materiel) {
        $resultatDeLaRequete = $this->exec(
            "INSERT INTO materiel (`nom_materiel`, `etat_materiel`) 
             VALUES ('".$materiel->getNom()."', '".$materiel->getEtat()."');");
        return $resultatDeLaRequete;
    }
    
    
    public function editMateriel($materiel){
        $resultatDeLaRequete=$this->exec("UPDATE materiel SET `nom_materiel`='".$materiel->getNom()."', `etat_materiel`='".$materiel->getEtat()." WHERE id_soiree=".$materiel->getId().";");
        return $resultatDeLaRequete;
    }

    public function estEnPanne($materiel){
        $resultatDeLaRequete = $this->exec("SELECT COUNT(*) FROM materiel INNER JOIN panne on materiel.id_materiel = panne.id_materiel WHERE materiel.id_materiel = ".$materiel->getId().";");
        echo var_dump($resultatDeLaRequete);
    }

    /*
    public function getUneSoiree($id){
        $resultatDeLaRequete=$this->query("SELECT * FROM soirees WHERE id_soiree='".$id."';");
        $uneSoiree = $resultatDeLaRequete->fetch();
        $unObjSoiree = new Soiree($uneSoiree["id_soiree"],$uneSoiree["nom_soiree"],$uneSoiree["date_soiree"],$uneSoiree["lieu"],$uneSoiree["description"],$uneSoiree["nbPlaces"]);
        return $unObjSoiree;
    }
    */
}