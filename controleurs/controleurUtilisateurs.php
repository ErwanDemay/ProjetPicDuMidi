<?php

$utilisateurDAO = new UtilisateurDAO();

if (isset($_GET['action'])){
    $action=filter_var($_GET['action'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
}else {
    $action= "defaut";
}   

//la fonction unserialize($_SESSION['utilisateurConnecte']) est appliqué au cas par cas car il ne faut pas qu'elle soit appelé avant la connection

switch ($action){
    case 'defaut'               :
                        $estConnecte = $utilisateurDAO->estConnecte();
                        if ($estConnecte == false){ //si un utilisateur n'est pas connecté alors on va sur la page de login, sinon sur le profil
                            header("Location: ./index.php?controleur=utilisateurs&action=login");
                        }else {
                            header("Location: ./index.php?controleur=utilisateurs&action=profil");
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
                            
                            header("Location: ./index.php?controleur=utilisateurs&action=login");
                        }else{
                            echo "<h1 style='color:white;'>Un compte existe déjà avec cette adresse email.</h1>";
                        }
                        break;
    case 'loginEncours'        :
                        $email = $_POST['email'];
                        $motDePasse = $_POST['motDePasse'];

                        $connectionUtilisateur = $utilisateurDAO->verifConnection($email, $motDePasse);
                        if($connectionUtilisateur == false){
                            echo "<h1 style='color:white;'>Il y a une erreur dans l'adrese email ou le mot de passe</h1>";
                        }else{
                            $_SESSION['utilisateurConnecte'] = serialize($connectionUtilisateur);
                            header("Location: ./index.php?controleur=utilisateurs&action=profil");
                        }
                        break;
    case 'logout'               :
                        if(isset($_SESSION['utilisateurConnecte'])){
                            unset($_SESSION['utilisateurConnecte']);
                        }
                        header("Location: ./index.php?controleur=utilisateurs&action=login");
                        break;
    case 'profil'               :
                        $utilisateurConnecte = unserialize($_SESSION['utilisateurConnecte']);
                        include("./vues/v_profilUtilisateur.php");
                        break;
    case 'consultationGestionnaire':
                        if($_SESSION['utilisateurConnecte']){ //si un utilisateur est connecté, on passe au deuxième if
                            $utilisateurConnecte = unserialize($_SESSION['utilisateurConnecte']); //on récupère l'utilisateur connecté pour demander son habilitation dans la condition qui suit
                            if($utilisateurConnecte->getHabilitation() < 2){ //si le niveau d'habilitation est inférieur à 2 (donc 0 ou 1), on renvoi l'utilisateur à l'accueil
                                header('Location: ./index.php');
                            }
                        }else{ //si il n'y a pas d'utilisateur connecté, on renvoi à l'accueil
                            header('Location: ./index.php');
                        }

                        $utilisateurConnecte = unserialize($_SESSION['utilisateurConnecte']);
                        $lesUtilisateurs = $utilisateurDAO->getLesUtilisateurs();
                        include("./vues/v_consultationUtilisateurs.php");
                        break;
    case 'modifierUtilisateurGestionnaire':
                        $id=$_GET['id'];
                        $lUtilisateur = $utilisateurDAO->getUnUtilisateur($id);
                        include("./vues/formulaires/v_modifierUtilisateur.php");
                        break;
    case 'modifierUtilisateurGestionnaireEncours':
                        $id = $_POST['id'];
                        $nom = $_POST['nom'];
                        $prenom = $_POST['prenom'];
                        $email = $_POST['email'];
                        $motDePasse = $_POST['motDePasse'];
                        $habilitation = $_POST['habilitation'];

                        $lUtilisateur = new Utilisateur($id, $nom, $prenom, $email, $motDePasse, $habilitation); //objet contenant les nouvelles informations de l'utilisateur

                        $resultat = $utilisateurDAO->editUtilisateur($lUtilisateur);

                        header('Location: ./index.php?controleur=utilisateurs&action=consultationGestionnaire');//on renvoi per la page de consultation pour éviter de l'afficher de façon par propre avec un simple include
                        break;
    case 'supprimerUtilisateurGestionnaire':
                        $id=$_GET['id'];
                        $utilisateurDAO->deleteUtilisateur($id);

                        header('Location: ./index.php?controleur=utilisateurs&action=consultationGestionnaire');
                        break;
}