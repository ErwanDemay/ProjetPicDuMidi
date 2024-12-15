<?php
use PHPUnit\Framework\TestCase;
use function PHPUnit\Framework\assertEquals;
require_once('../modeles/DAO/MaterielDAO.php');
require_once('../modeles/Materiel.php');

class MaterielDAOTests extends TestCase{
    $monDAO = new MaterielDAO();

    /**
     * Test que la fonction getLesMateriels() retourne bien une collection de Matériel
     */
    public function testGetLesMateriels(){

        $lesMateriels = $monDAO->getLesMateriels();
        $this->assertContainsOnlyInstancesOf(MyClass::Materiel, $lesMateriels);
    }

    /**
     * Test que la fonction addMateriel() ajoute bien un matériel
     */
    public function testAddMateriel(){
        $materielAAjouter = new Materiel(156, 'materielDAOTestPHPUnit', 'bon');
        $monDAO->addMateriel($materielAAjouter);

        $lesMateriels = $monDAO->getLesMateriels(); //On récupère tous les matériels
        for ($lesMateriels as $unMateriel){ //On cherche le matériel correspondant à l'id de celui ajouté
            if ($unMateriel->getId() == 156){
                $leMateriel = $unMateriel;
            }
        }
        $this->assertEquals(156, $leMateriel->getId(), 'NOK_AddMateriel');
        $monDAO->deleteMateriel($leMateriel->getId()); //On supprime le matériel pour éviter de pourrir la BDD
    }

    /**
     * Test que la fonction deleteMateriel() supprime bien un matériel
     */
    public function testDeleteMateriel(){
        $materiel = new Materiel(156, 'materielDAOTestPHPUnit', 'bon');
        $monDAO->addMateriel($materiel); //On ajoute le matériel à supprimer

        $monDAO->deleteMateriel($materiel->getId()); //On supprime le matériel

        $resultat = false;
        $lesMateriels = $monDAO->getLesMateriels(); //On récupère tous les matériels
        for ($lesMateriels as $unMateriel){ //On cherche le matériel correspondant à l'id de celui ajouté
            if ($unMateriel->getId() == 156){
                $resultat = true; //Si on trouve l'id supposément supprimer, la variable devient vraie
            }
        }
        $this->assertEquals(false, $resultat, 'NOK_DeleteMateriel');
    }

    /**
     * Test que la fonction editMateriel() modifie bien un matériel
     */
    public function testEditMateriel(){
        $materiel = new Materiel(156, 'materielDAOTestPHPUnit', 'bon');
        $monDAO->addMateriel($materiel); //On ajoute le matériel à supprimer

        $materiel->setNom("test"); //On change le nom du matériel côté client
        $monDAO->editMateriel($materiel); //On change le nom du matériel côté BDD

        $resultat = false;
        $lesMateriels = $monDAO->getLesMateriels(); //On récupère tous les matériels
        for ($lesMateriels as $unMateriel){ //On cherche le matériel correspondant à l'id de celui ajouté
            if ($unMateriel->getNom() == "test"){
                $resultat = true; //Si on trouve un matériel avec le même nom, la variable $resultat devient vraie
            }
        }
        $this->assertEquals(true, $resultat, 'NOK_EditMateriel');

        $monDAO->deleteMateriel($materiel->getId()); //On supprime le matériel
    }

    /**
     * Test que la fonction getUnMateriel() récupère bien un matériel
     */
    public function testGetUnMateriel(){
        $materiel = new Materiel(156, 'materielDAOTestPHPUnit', 'bon');
        $monDAO->addMateriel($materiel); //On ajoute le matériel à récupérer

        $resultat = false;
        $leMateriel = $monDAO->getUnMateriel($materiel->getId()); //On récupère tous les matériels
        if ($leMateriel->getNom() == $materiel->getNom()){ //On cherche si le matériel récupéré à le même nom que celui ajouté
            $resultat = true;
        }
        $this->assertEquals(true, $resultat, 'NOK_GetUnMateriel');

        $monDAO->deleteMateriel($materiel->getId()); //On supprime le matériel
    }
}