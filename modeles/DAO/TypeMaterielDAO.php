<?php
include_once ("./modeles/Base.php");
include_once ("./modeles/TypeMateriel.php");

class TypeMaterielDAO extends Base{

  /**
   * Accès a la bdd alwaydata
   */
  public function __construct(){
    parent::__construct();
    parent::setConnexionBase('mancisidor_bdd_picdumidi','377513','ProjetSIO2!');

  }

  /**
   * fonction qui retourne un tableau avec les types de matériels
   * @return TypeMateriel[]
   */
  public function getLesTypesMateriels() {
    $resultatDeLaRequete =$this->query("SELECT * FROM type_materiel;");
    $tableauTypeMateriel = $resultatDeLaRequete->fetchAll();
    $lesObjTypeMateriels = array();
    foreach($tableauTypeMateriel as $uneLigneTypeMateriel){
      $unTypeMateriel = new TypeMateriel($uneLigneTypeMateriel["id"],$uneLigneTypeMateriel["nom_typeMateriel"]);
      $lesObjTypeMateriels[] = $unTypeMateriel;
    }
    return $lesObjTypeMateriels;
  }

  
  /**
   * fonction qui ajoute un type de matériel grâce a la valeur transmise en paramètre (requête préparée)
   * @param mixed $typeMateriel
   * @return bool
   */
  public function addTypeMateriel($typeMateriel){
    $ordreSQL = "INSERT INTO type_materiel (`nom_typeMateriel`)VALUES (:nom)";

    $reqPreparee = $this->prepare($ordreSQL);  

    $nom = $typeMateriel->getNom(); 

    $reqPreparee->bindParam(':nom',$nom);

    $resultatDeLaRequete = $reqPreparee->execute();

    return $resultatDeLaRequete;
  }



  /**
   * fonction pour supprimer un type de matériel en récupérant son id en paramètre
   * @param mixed $id
   * @return bool
   */
  public function deleteTypeMateriel($id){
    $ordreSQL = "DELETE FROM type_materiel WHERE id= :id";
    
    $reqPreparee = $this->prepare($ordreSQL);

    $reqPreparee->bindParam(':id', $id, PDO::PARAM_INT);

    $resultatDeLaRequete = $reqPreparee->execute();

    return $resultatDeLaRequete;
}

}