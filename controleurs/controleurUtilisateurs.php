<?php
include("./modeles/Utilisateur.php");
include("./modeles/DAO/UtilisateurDAO.php");

if (isset($_GET['action'])){
    $action=filter_var($_GET['action'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
}else {
$action= "";}

switch ($action){
    case 'signup'    :
                        /*$connexionBD = new UtilisateurDAO();
                        $lesSoirees = $connexionBD->getProchainesLesSoirees();*/
                        include("./vues/formulaires/v_signup.php");
                        break;
    case 'login'    :
                        /*$connexionBD = new UtilisateurDAO();
                        $lesSoirees = $connexionBD->getProchainesLesSoirees();*/
                        include("./vues/formulaires/v_login.php");
                        break;
    case 'profil'    :
                        /*$connexionBD = new UtilisateurDAO();
                        $lesSoirees = $connexionBD->getProchainesLesSoirees();*/
                        include("./vues/v_profilUtilisateur.php");
                        break;
}