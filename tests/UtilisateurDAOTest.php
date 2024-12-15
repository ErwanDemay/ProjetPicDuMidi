<?php
use PHPUnit\Framework\TestCase;
use function PHPUnit\Framework\assertEquals;
require_once('../modeles/DAO/UtilisateurDAO.php');
require_once('../modeles/Utilisateur.php');

class UtilisateurDAOTests extends TestCase{
    $monDAO = new UtilisateurDAO();

    /**
     * Test que la fonction getLesUtilisateurs() retourne bien une collection de Utilisateurs
     */
    public function testGetLesUtilisateurs(){
        $lesUtilisateurs = $monDAO->getLesUtilisateurs();
        $this->assertContainsOnlyInstancesOf(MyClass::Utilisateur, $lesUtilisateurs);
    }

    /**
     * Test que la fonction addUtilisateur() retourne bien une collection de Utilisateurs
     */
    public function testAddUtilisateur(){
        $UtilisateurAAjouter = new Utilisateur(156, 'UtilisateurDAOTestPHPUnit', '9999-11-11', 'salle 24', 'may Allah destroy PHPUnit', 12);
        $monDAO->addUtilisateur($UtilisateurAAjouter);

        $lesUtilisateurs = $monDAO->getLesUtilisateurs();
        for ($lesUtilisateurs as $uneUtilisateur){
            if ($uneUtilisateur->getId() == 156){
                $laUtilisateur = $uneUtilisateur;
            }
        }
        $this->assertEquals(156, $laUtilisateur->getId(), 'NOK_AddUtilisateur');
    }

    /**
     * Test que la fonction deleteUtilisateur() supprime bien un utilisateur
     */
    public function testDeleteUtilisateur(){
        $Utilisateur = new Utilisateur(156, 'UtilisateurDAOTestPHPUnit', 'bon');
        $monDAO->addUtilisateur($Utilisateur); //On ajoute l'utilisateur à supprimer

        $monDAO->deleteUtilisateur($Utilisateur->getId()); //On supprime l'utilisateur

        $resultat = false;
        $lesUtilisateurs = $monDAO->getLesUtilisateurs(); //On récupère tous les Utilisateurs
        for ($lesUtilisateurs as $unUtilisateur){ //On cherche l'utilisateur correspondant à l'id de celui ajouté
            if ($unUtilisateur->getId() == 156){
                $resultat = true; //Si on trouve l'id supposément supprimer, la variable devient vraie
            }
        }
        $this->assertEquals(false, $resultat, 'NOK_DeleteUtilisateur');
    }

    /**
     * Test que la fonction editUtilisateur() modifie bien un utilisateur
     */
    public function testEditUtilisateur(){
        $Utilisateur = new Utilisateur(156, 'UtilisateurDAOTestPHPUnit', 'bon');
        $monDAO->addUtilisateur($Utilisateur); //On ajoute l'utilisateur à supprimer

        $Utilisateur->setNom("test"); //On change le nom de l'utilisateur côté client
        $monDAO->editUtilisateur($Utilisateur); //On change le nom de l'utilisateur côté BDD

        $resultat = false;
        $lesUtilisateurs = $monDAO->getLesUtilisateurs(); //On récupère tous les Utilisateurs
        for ($lesUtilisateurs as $unUtilisateur){ //On cherche l'utilisateur correspondant à l'id de celui ajouté
            if ($unUtilisateur->getNom() == "test"){
                $resultat = true; //Si on trouve un soirée avec le même nom, la variable $resultat devient vraie
            }
        }
        $this->assertEquals(true, $resultat, 'NOK_EditUtilisateur');

        $monDAO->deleteUtilisateur($Utilisateur->getId()); //On supprime l'utilisateur
    }

    /**
     * Test que la fonction getUnUtilisateur() récupère bien un utilisateur
     */
    public function testGetUnUtilisateur(){
        $Utilisateur = new Utilisateur(156, 'UtilisateurDAOTestPHPUnit', 'bon');
        $monDAO->addUtilisateur($Utilisateur); //On ajoute l'utilisateur à récupérer

        $resultat = false;
        $leUtilisateur = $monDAO->getUnUtilisateur($Utilisateur->getId()); //On récupère tous les Utilisateurs
        if ($leUtilisateur->getNom() == $Utilisateur->getNom()){ //On cherche si l'utilisateur récupéré à le même nom que celui ajouté
            $resultat = true;
        }
        $this->assertEquals(true, $resultat, 'NOK_GetUnUtilisateur');

        $monDAO->deleteUtilisateur($Utilisateur->getId()); //On supprime l'utilisateur
    }
}