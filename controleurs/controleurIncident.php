<?php
include("./modeles/Incident.php");
include("./modeles/DAO/IncidentDAO.php");

if (isset($_GET['action'])){
    $action=filter_var($_GET['action'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
}else {
$action= "consultationMateriel";}

switch ($action){
    case 'consultationMateriel'  :
                       $MaterielDAO = new MaterielDAO();
                       $lesMateriels = $MaterielDAO->getLesMateriels();
                       include("./vues/v_consultationMateriel.php");
                       break;
    case 'modifierMateriel' : 
                       $id=$_GET['id'];
                       $MaterielDAO = new MaterielDAO();
                       $leMateriel = $MaterielDAO->getUnMateriel($id);
                       include("./vues/formulaires/v_modifierMateriel.php");
                       break;
    case 'materielModifiee'  :
                        $MaterielDAO = new MaterielDAO();

                        $id =  $_POST['id'];
                        $nom = $_POST['nom'];
                        $etat = $_POST['etat'];

                        $leMateriel = new Materiel($id, $nom, $etat);

                        $resultat = $MaterielDAO->editMateriel($leMateriel);

                        $lesMateriels = $MaterielDAO->getLesMateriels();
                        include("./vues/v_consultationMateriel.php");
                        break;
    case 'supprimerMateriel' :
                        $id=$_GET['id'];
                        $MaterielDAO = new MaterielDAO();
                        $MaterielDAO->deleteMateriel($id);
                        $lesMateriels = $MaterielDAO->getLesMateriels();
                        include("./vues/v_consultationMateriel.php");
                        break;                        
    /*case 'soireeModifiee'  :
                        $connexionBD = new SoireeDAO();

                        $id = $_POST['id'];
                        
                        $resultat = $connexionBD->deleteSoiree($id);
    
                        $lesSoirees = $connexionBD->getLesSoirees();
                        include("  ./vues/v_consultationSoirees.php");
                        break;*/

    case 'ajouterMateriel' :  
        $MaterielDAO = new MaterielDAO();
        $lesMateriels = $MaterielDAO->getLesMateriels();
        include("./vues/formulaires/v_ajoutmateriel.php");
        break;

    case 'materielAjoutee' : 
        $MaterielDAO = new MaterielDAO();

                       
                        $nom = $_POST['nom'];
                        $etat = $_POST['etat'];

                        $leMateriel = new Materiel(null, $nom, $etat);

                        $resultat = $MaterielDAO->addMateriel($leMateriel);

                        $lesMateriels = $MaterielDAO->getLesMateriels();
                        include("./vues/v_consultationMateriel.php");
                        break;
}