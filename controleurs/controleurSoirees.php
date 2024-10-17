<?php
include("../modeles/Soiree.php");
include("../modeles/DAO/SoireeDAO.php");

if (isset($_GET['action'])){
    $action=filter_var($_GET['action'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
}else {
$action= "consultationSoirees";}
 
switch ($action){
    case 'consultationSoirees'  :
                       $connexionBD = new SoireeDAO();
                       $lesSoirees = $connexionBD->getLesSoirees();
                       include("../vues/v_consultationSoirees.php");
                       break;
    case 'modifierSoiree' : 
                       $id=$_GET['id'];
                       $connexionBDDev = new SoireeDAO();
                       $laSoiree = $connexionBD->getUneSoiree($id);
                       include("../vues/v_modifierSoiree.php");
                       break;
    case 'soireeModifiee'  :
                        $connexionBD = new SoireeDAO();

                        $id = $_POST['id'];
                        $nom = $_POST['nom'];
                        $date = $_POST['date'];
                        $lieu = $_POST['lieu'];
                        $description = $_POST['description'];
                        $nbPlaces = $_POST['nbPlaces'];

                        $laSoiree = new Soiree($id, $nom, $date, $lieu, $description, $nbPlaces);

                        $resultat = $connexionBD->editSoiree($laSoiree);

                        $lesSoirees = $connexionBD->getLesSoirees();
                        include("../vues/v_consultationSoirees.php");
                        break;
    case 'soireeModifiee'  :
                        $connexionBD = new SoireeDAO();

                        $id = $_POST['id'];
                        
                        $resultat = $connexionBD->deleteSoiree($id);
    
                        $lesSoirees = $connexionBD->getLesSoirees();
                        include("../vues/v_consultationSoirees.php");
                        break;
}