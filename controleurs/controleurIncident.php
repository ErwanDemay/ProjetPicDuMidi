<?php
include("./modeles/Incident.php");
include("./modeles/DAO/IncidentDAO.php");

if (isset($_GET['action'])){
    $action=filter_var($_GET['action'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
}else {
$action= "consultationIncident";}

switch ($action){
    case 'consultationIncident'  :
                       $IncidentDAO = new IncidentDAO();
                       $lesIncidents = $IncidentDAO->getLesIncidents();
                       include("./vues/v_consultationIncident.php");
                       break;
    case 'modifierIncident' : 
                       $id=$_GET['id'];
                       $IncidentDAO = new IncidentDAO();
                       $leIncident = $IncidentDAO->getUnIncident($id);
                       include("./vues/formulaires/v_modifierIncident.php");
                       break;
    case 'IncidentModifiee'  :
                        $IncidentDAO = new IncidentDAO();

                        $id =  $_POST['id'];
                        $nom = $_POST['nom'];
                        $etat = $_POST['etat'];

                        $leIncident = new Incident($id, $nom, $etat);

                        $resultat = $IncidentDAO->editIncident($leIncident);

                        $lesIncidents = $IncidentDAO->getLesIncidents();
                        include("./vues/v_consultationIncident.php");
                        break;
    case 'supprimerIncident' :
                        $id=$_GET['id'];
                        $IncidentDAO = new IncidentDAO();
                        $IncidentDAO->deleteIncident($id);
                        $lesIncidents = $IncidentDAO->getLesIncidents();
                        include("./vues/v_consultationIncident.php");
                        break;                        
    /*case 'soireeModifiee'  :
                        $connexionBD = new SoireeDAO();

                        $id = $_POST['id'];
                        
                        $resultat = $connexionBD->deleteSoiree($id);
    
                        $lesSoirees = $connexionBD->getLesSoirees();
                        include("  ./vues/v_consultationSoirees.php");
                        break;*/

    case 'ajouterIncident' :  
        $IncidentDAO = new IncidentDAO();
        $lesIncidents = $IncidentDAO->getLesIncidents();
        include("./vues/formulaires/v_ajoutIncident.php");
        break;

    case 'IncidentAjoutee' : 
        $IncidentDAO = new IncidentDAO();

                       
                        $nom = $_POST['nom'];
                        $etat = $_POST['etat'];

                        $leIncident = new Incident(null, $nom, $etat);

                        $resultat = $IncidentDAO->addIncident($leIncident);

                        $lesIncidents = $IncidentDAO->getLesIncidents();
                        include("./vues/v_consultationIncident.php");
                        break;
}