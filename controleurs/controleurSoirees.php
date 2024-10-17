<?php
include ("modeles/SoireeDAO.php");
if (isset($_GET['action'])){
    $action=filter_var($_GET['action'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
}else {
$action= "gestionSoirees";}
    

switch ($action){
    case 'gestionSoirees'  :
                       $connexionBD = new SoireeDAO();
                       $lesSoirees = $connexionBD->getLesSoirees();
                       include("vues/v_gestionSoirees.php");
                       break;
    case 'modifierSoiree' : 
                       $id=$_GET['id'];
                       $connexionBDDev = new DeveloppeurDAO();
                       $laSoiree = $connexionBD->getUneSoiree($id);
                       include("vues/v_modifierSoiree.php");
                       break;
}

