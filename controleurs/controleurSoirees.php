<?php
include("./modeles/Soiree.php");
include("./modeles/DAO/SoireeDAO.php");

if (isset($_GET['action'])){
    $action=filter_var($_GET['action'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
}else {
$action= "consultationSoirees";}

switch ($action){
    case 'prochainesSoirees'    :
                        $connexionBD = new SoireeDAO();
                        $lesSoirees = $connexionBD->getProchainesLesSoirees();
                        include("./vues/v_consultationProchainesSoirees.php");
                        break;
    case 'consultationSoirees'  :
                       $connexionBD = new SoireeDAO();
                       $lesSoirees = $connexionBD->getLesSoirees();
                       include("./vues/v_consultationSoirees.php");
                       break;
    case 'modifierSoiree' : 
                       $id=$_GET['id'];
                       $connexionBD = new SoireeDAO();
                       $laSoiree = $connexionBD->getUneSoiree($id);
                       include("./vues/formulaires/v_modifierSoiree.php");
                       break;
    case 'soireeModifiee'  :
                        $connexionBD = new SoireeDAO();

                        $id =  $_POST['id'];
                        $nom = $_POST['nom'];
                        $date = $_POST['date'];
                        $lieu = $_POST['lieu'];
                        $description = $_POST['description'];
                        $nbPlaces = $_POST['nbPlaces'];
                        $prix = $_POST['prix'];
                        $heureDebut = $_POST['heureDebut'];

                        $laSoiree = new Soiree($id, $nom, $date, $lieu, $description, $nbPlaces, $prix, $heureDebut);

                        $resultat = $connexionBD->editSoiree($laSoiree);
        
                        header('Location: ./index.php?controleur=soiree');
                        break;
    case 'supprimerSoiree' :
                        $id=$_GET['id'];
                        $connexionBD = new SoireeDAO();
                        $connexionBD->deleteSoiree($id);
                        
                        header('Location: ./index.php?controleur=soiree');
                        break;
    case 'ajouterSoiree' :  
        $connexionBD = new SoireeDAO();
        $lesSoirees = $connexionBD->getLesSoirees();
        include("./vues/formulaires/v_ajoutSoiree.php");
        break;

    case 'soireeAjoutee' : 
                        $connexionBD = new SoireeDAO();

                        $nom = $_POST['nom'];
                        $date = $_POST['date'];
                        $lieu = $_POST['lieu'];
                        $description = $_POST['description'];
                        $nbPlaces = $_POST['nbPlaces'];
                        $prix = $_POST['prix'];
                        $heureDebut = $_POST['heureDebut'];
                        

                        $laSoiree = new Soiree(null, $nom, $date, $lieu, $description, $nbPlaces, $prix, $heureDebut);

                        $resultat = $connexionBD->addSoiree($laSoiree);

                        include("./vues/v_validationAjout.php");
                        break;
}