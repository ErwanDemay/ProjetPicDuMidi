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

        if($resultatDeLaRequete->fetch() == 0){
            return null;
        }

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
        $req = "UPDATE materiel SET `nom_materiel`='".$materiel->getNom()."', `etat_materiel`='".$materiel->getEtat()."' WHERE materiel.id_materiel=".$materiel->getId().";";
        echo $req;
        $resultatDeLaRequete=$this->exec($req);
        return $resultatDeLaRequete;
    }

    public function getUnMateriel($id){
        $resultatDeLaRequete=$this->query("SELECT * FROM materiel WHERE id_materiel='".$id."';");

        if($reqPrepa->fetch() == 0){
            return null;
        }

        $unMateriel = $resultatDeLaRequete->fetch();
        $unObjMateriel = new Materiel($unMateriel["id_materiel"],$unMateriel["nom_materiel"],$unMateriel["etat_materiel"]);
        return $unObjMateriel;
    }

    public function estEnPanne($materiel){
        $resultatDeLaRequete = $this->exec("SELECT COUNT(*) FROM materiel INNER JOIN panne on materiel.id_materiel = panne.id_materiel WHERE materiel.id_materiel = ".$materiel->getId().";");
        echo var_dump($resultatDeLaRequete);
    }
}