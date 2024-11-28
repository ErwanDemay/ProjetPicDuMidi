<?php
include("./modeles/TypeMateriel.php");
include("./modeles/DAO/TypeMaterielDAO.php");

if (isset($_GET['action'])){
  $action=filter_var($_GET['action'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
}else {
$action= "consultationMateriel";}

switch ($action) {
  case 'consultationTypeMateriel' : 
    $TypeMaterielDAO = new TypeMaterielDAO();
    $lesTypesMateriels = $TypeMaterielDAO->getLesTypesMateriels();
    include("./vues/v_consultationTypeMateriel.php");
    break;


    case 'ajouterTypeMateriel' : 
      $TypeMaterielDAO = new TypeMaterielDAO();
      $lesTypesMateriels = $TypeMaterielDAO->getLesTypesMateriels();
      include("./vues/formulaires/v_ajoutTypeMateriel.php");
      break;

      case 'TypeMaterielAjoutee' : 
        $TypeMaterielDAO = new TypeMaterielDAO();

        $nom = $_POST['nom'];

        $leTypeMateriel = new TypeMateriel(null,$nom);

        $resultat = $TypeMaterielDAO->addTypeMateriel($leTypeMateriel);


        $lesTypesMateriels = $TypeMaterielDAO->getLesTypesMateriels();
        include("./vues/v_consultationTypeMateriel.php");
        break;

        case 'supprimerTypeMateriel' :
          $id=$_GET['id'];
          $TypeMaterielDAO = new TypeMaterielDAO();
          $TypeMaterielDAO->deleteTypeMateriel($id);
          $lesTypesMateriels = $TypeMaterielDAO->getLesTypesMateriels();
          include("./vues/v_consultationTypeMateriel.php");
          break;         

}