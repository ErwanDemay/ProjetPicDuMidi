<?php
use PHPUnit\Framework\TestCase;
use function PHPUnit\Framework\assertEquals;
require_once('../modeles/DAO/SoireeDAO.php');
require_once('../modeles/soiree.php');

class SoireeDAOTests extends TestCase{
    $monDAO = new SoireeDAO();

    /**
     * Test que la fonction getLesSoirees() retourne bien une collection de soirées
     */
    public function testGetLesSoirees(){
        $lesSoirees = $monDAO->getLesSoirees();
        $this->assertContainsOnlyInstancesOf(MyClass::Soiree, $lesSoirees);
    }

    /**
     * Test que la fonction addSoiree() retourne bien une collection de soirées
     */
    public function testAddSoiree(){
        $soireeAAjouter = new Soiree(156, 'soireeDAOTestPHPUnit', '9999-11-11', 'salle 24', 'may Allah destroy PHPUnit', 12);
        $monDAO->addSoiree($soireeAAjouter);

        $lesSoirees = $monDAO->getLesSoirees();
        for ($lesSoirees as $uneSoiree){
            if ($uneSoiree->getId() == 156){
                $laSoiree = $uneSoiree;
            }
        }
        $this->assertEquals(156, $laSoiree->getId(), 'NOK_AddSoiree');
    }

    /**
     * Test que la fonction deleteSoiree() supprime bien une soirée
     */
    public function testDeleteSoiree(){
        $Soiree = new Soiree(156, 'SoireeDAOTestPHPUnit', 'bon');
        $monDAO->addSoiree($Soiree); //On ajoute la soirée à supprimer

        $monDAO->deleteSoiree($Soiree->getId()); //On supprime le soirée

        $resultat = false;
        $lesSoirees = $monDAO->getLesSoirees(); //On récupère tous les soirées
        for ($lesSoirees as $unSoiree){ //On cherche le soirée correspondant à l'id de celui ajouté
            if ($unSoiree->getId() == 156){
                $resultat = true; //Si on trouve l'id supposément supprimer, la variable devient vraie
            }
        }
        $this->assertEquals(false, $resultat, 'NOK_DeleteSoiree');
    }

    /**
     * Test que la fonction editSoiree() modifie bien une soirée
     */
    public function testEditSoiree(){
        $Soiree = new Soiree(156, 'SoireeDAOTestPHPUnit', 'bon');
        $monDAO->addSoiree($Soiree); //On ajoute la soirée à supprimer

        $Soiree->setNom("test"); //On change le nom du soirée côté client
        $monDAO->editSoiree($Soiree); //On change le nom du soirée côté BDD

        $resultat = false;
        $lesSoirees = $monDAO->getLesSoirees(); //On récupère tous les soirées
        for ($lesSoirees as $unSoiree){ //On cherche le soirée correspondant à l'id de celui ajouté
            if ($unSoiree->getNom() == "test"){
                $resultat = true; //Si on trouve un soirée avec le même nom, la variable $resultat devient vraie
            }
        }
        $this->assertEquals(true, $resultat, 'NOK_EditSoiree');

        $monDAO->deleteSoiree($Soiree->getId()); //On supprime le soirée
    }

    /**
     * Test que la fonction getUnSoiree() récupère bien une soirée
     */
    public function testGetUnSoiree(){
        $Soiree = new Soiree(156, 'SoireeDAOTestPHPUnit', 'bon');
        $monDAO->addSoiree($Soiree); //On ajoute la soirée à récupérer

        $resultat = false;
        $leSoiree = $monDAO->getUnSoiree($Soiree->getId()); //On récupère tous les soirées
        if ($leSoiree->getNom() == $Soiree->getNom()){ //On cherche si le soirée récupéré à le même nom que celui ajouté
            $resultat = true;
        }
        $this->assertEquals(true, $resultat, 'NOK_GetUnSoiree');

        $monDAO->deleteSoiree($Soiree->getId()); //On supprime le soirée
    }
}