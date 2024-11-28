<?php
include_once ("./modeles/Base.php");
include_once ("./modeles/Materiel.php");
class MaterielDAO extends Base{
    
    public function __construct(){
        parent::__construct();
        parent::setConnexionBase('mancisidor_bdd_picdumidi','377513','ProjetSIO2!');
    }
    
    public function getLesMateriels(){
        $ordreSQL="SELECT * FROM materiel;";

        $resultatDeLaRequete=$this->prepare($ordreSQL);
        $resultatDeLaRequete->execute();

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
        $ordreSQL="DELETE FROM materiel WHERE id_materiel=:id";
        $resultatDeLaRequete=$this->prepare($ordreSQL);
        
        $resultatDeLaRequete->bindParam(':id', $id, PDO::PARAM_INT);
        $resultatDeLaRequete = $resultatDeLaRequete->execute();

        return $resultatDeLaRequete;
    }
    
    public function addMateriel($materiel) {
        $ordreSQL="INSERT INTO materiel (`nom_materiel`, `etat_materiel`) VALUES (:nom , :etat)";
        $resultatDeLaRequete = $this->prepare($ordreSQL);
        
        $nom = $materiel->getNom();
        $etat = $materiel->getEtat();

        $resultatDeLaRequete->bindParam(':nom', $nom);
        $resultatDeLaRequete->bindParam(':etat', $etat);

        $resultatDeLaRequete = $resultatDeLaRequete->execute();

        return $resultatDeLaRequete;
    }
    
    public function editMateriel($materiel){
        $ordreSQL="UPDATE materiel SET `nom_materiel`=:nom, `etat_materiel`=:etat WHERE materiel.id_materiel=:id";
        $resultatDeLaRequete=$this->prepare($ordreSQL);

        $nom = $materiel->getNom();
        $etat = $materiel->getEtat();
        $id = $materiel->getId();

        $resultatDeLaRequete->bindParam(':nom', $nom);
        $resultatDeLaRequete->bindParam(':etat', $etat);
        $resultatDeLaRequete->bindParam(':id', $id);

        $resultatDeLaRequete = $resultatDeLaRequete->execute();

        return $resultatDeLaRequete;
    }

    public function getUnMateriel($id){
        $ordreSQL = "SELECT * FROM materiel WHERE id_materiel=:id;";
        $resultatDeLaRequete=$this->prepare($ordreSQL);

        $reqPrepa->bindParam(':id', $id, PDO::PARAM_INT);

        $resultatDeLaRequete = $resultatDeLaRequete->execute();

        $unMateriel = $resultatDeLaRequete->fetch();
        $unObjMateriel = new Materiel($unMateriel["id_materiel"],$unMateriel["nom_materiel"],$unMateriel["etat_materiel"]);
        return $unObjMateriel;
    }

    /*public function estEnPanne($materiel){
        $resultatDeLaRequete = $this->exec("SELECT COUNT(*) FROM materiel INNER JOIN panne on materiel.id_materiel = panne.id_materiel WHERE materiel.id_materiel = ".$materiel->getId().";");
        echo var_dump($resultatDeLaRequete);
    }*/
}