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
                       if($_SESSION['utilisateurConnecte']){
                           $utilisateurConnecte = unserialize($_SESSION['utilisateurConnecte']);
                           if($utilisateurConnecte->getHabilitation() < 2){
                               header('Location: ./index.php');
                           }
                       }else{
                           header('Location: ./index.php');
                       }

                       $connexionBD = new SoireeDAO();
                       $lesSoirees = $connexionBD->getLesSoirees();
                       include("./vues/v_consultationSoirees.php");
                       break;
    case 'modifierSoiree' : 
                       if($_SESSION['utilisateurConnecte']){
                           $utilisateurConnecte = unserialize($_SESSION['utilisateurConnecte']);
                           if($utilisateurConnecte->getHabilitation() < 2){
                               header('Location: ./index.php');
                           }
                       }else{
                           header('Location: ./index.php');
                       }

                       $id=$_GET['id'];
                       $connexionBD = new SoireeDAO();
                       $laSoiree = $connexionBD->getUneSoiree($id);
                       include("./vues/formulaires/v_modifierSoiree.php");
                       break;
    case 'soireeModifiee'  :
                        if($_SESSION['utilisateurConnecte']){
                            $utilisateurConnecte = unserialize($_SESSION['utilisateurConnecte']);
                            if($utilisateurConnecte->getHabilitation() < 2){
                                header('Location: ./index.php');
                            }
                        }else{
                            header('Location: ./index.php');
                        }

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
                        if($_SESSION['utilisateurConnecte']){
                            $utilisateurConnecte = unserialize($_SESSION['utilisateurConnecte']);
                            if($utilisateurConnecte->getHabilitation() < 2){
                                header('Location: ./index.php');
                            }
                        }else{
                            header('Location: ./index.php');
                        }

                        $id=$_GET['id'];
                        $connexionBD = new SoireeDAO();
                        $connexionBD->deleteSoiree($id);
                        
                        header('Location: ./index.php?controleur=soiree');
                        break;
    case 'ajouterSoiree' :  
                        if($_SESSION['utilisateurConnecte']){
                            $utilisateurConnecte = unserialize($_SESSION['utilisateurConnecte']);
                            if($utilisateurConnecte->getHabilitation() < 2){
                                header('Location: ./index.php');
                            }
                        }else{
                            header('Location: ./index.php');
                        }

                        $connexionBD = new SoireeDAO();
                        $lesSoirees = $connexionBD->getLesSoirees();
                        include("./vues/formulaires/v_ajoutSoiree.php");
                        break;

    case 'soireeAjoutee' : 
                        if($_SESSION['utilisateurConnecte']){
                            $utilisateurConnecte = unserialize($_SESSION['utilisateurConnecte']);
                            if($utilisateurConnecte->getHabilitation() < 2){
                                header('Location: ./index.php');
                            }
                        }else{
                            header('Location: ./index.php');
                        }

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
        case 'reserverSoiree' :
                            $id=$_GET['id'];
                            $connexionBD = new SoireeDAO();
                            $laSoiree = $connexionBD->getUneSoiree($id);
                            include("./vues/formulaires/v_reservationSoiree.php");
                            break;
        case 'soireeReservee' :
                            $idSoiree=$_POST['idSoiree'];
                            $idUtilisateur=$_POST['idUtilisateur'];
                            $nbPlaces= (int) $_POST['nbPlacesReservees']; //Cast en int car sinon c'est considéré comme un string et ça fait échouer la condition de la méthode reserverSoiree()
                            $connexionBD = new SoireeDAO();
                            $resultatDeLaRequete = $connexionBD->reserverSoiree($idSoiree, $idUtilisateur, $nbPlaces);
   
                            if($resultatDeLaRequete == true){ //Pour mettre le bouton sous le texte, un <br> ne suffit, la gestion du contenu en CSS bloque
                                                              //Pour éviter de me risquer à retravailler le CSS, j'utilise un tableau, c'est pas propre mais qu'est-ce que ça marche bien
                                echo "<table>".
                                     "<tr> <td> <h1 style='color:white;'>Soirée réservée !</h1> </td> </tr>".
                                     "<tr> <td style='text-align: center;'> <a href='/index.php'><button class='boutons'>Retour accueil</button></a> </td> </tr>".
                                     "</table>";
                            }else{
                                echo "<h1 style='color:white;'>Il ne reste pas assez de places.</h1>";
                            }
                            break;
}