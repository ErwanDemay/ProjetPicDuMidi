<?php

$utilisateurDAO = new UtilisateurDAO();

if (isset($_GET['action'])){
    $action=filter_var($_GET['action'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
}else {
    $action= "defaut";
}   

switch ($action){
    case 'defaut'               :
                        if ($utilisateurDAO->estConnecte()){ //si un utilisateur est connecté alors on va sur le profil, sinon sur la page de login
                            $action="profil";
                        }else {
                            $action= "login";
                        }
                        break;
    case 'login'                :
                        include("./vues/formulaires/v_login.php");
                        break;
    case 'signup'               :
                        include("./vues/formulaires/v_signup.php");
                        break;
    case 'signupEncours'        :
                        $nom = $_POST['nom'];
                        $prenom = $_POST['prenom'];
                        $email = $_POST['email'];
                        $motDePasse = $_POST['motDePasse'];

                        $existeDeja = $utilisateurDAO->existeDeja($email);

                        if(($existeDeja) == 0){
                            $lUtilisateur = new Utilisateur(null, $nom, $prenom, $email, $motDePasse, null);

                            $resultat = $utilisateurDAO->addUtilisateur($lUtilisateur);
                            header("./index.php/controleur=utilisateurs&action=profil");
                        }else{
                            echo "<h1 style='color:white;'>Un compte existe déjà avec cette adresse email.</h1>";
                        }
                        break;
    case 'profil'               :
                        include("./vues/v_profilUtilisateur.php");
                        break;
}