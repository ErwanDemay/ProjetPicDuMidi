<?php
use PHPUnit\Framework\TestCase;
use function PHPUnit\Framework\assertEquals;
require_once('../modeles/DAO/MaterielDAO.php');
require_once('../modeles/Materiel.php');

class MaterielDAOTests extends TestCase{
    $monDAO = new MaterielDAO();

    /**
     * Test que la fonction getLesMateriels() retourne bien une collection de Matériel
     * @param 
     * @return $lesMateriels  collection d'objets Materiel
     */
    public function testGetLesMateriels(){

        $lesMateriels = $monDAO->getLesMateriels();
        $this->assertContainsOnlyInstancesOf(MyClass::Materiel, $lesMateriels);
    }

    /**
     * Test que la fonction addMateriel() ajoute bien un matériel
     * @param $materielAAjouter  objet materiel créé pour le test
     * @return $lesMateriels  collection d'objets Materiel
     */
    public function testAddSoiree(){
        $materielAAjouter = new Materiel(156, 'materielDAOTestPHPUnit', 'bon');
        $monDAO->addSoiree($materielAAjouter);

        $lesMateriels = $monDAO->getLesSoirees();
        for ($lesMateriels as $inMateriel){
            if ($unMateriel->getId() == 156){
                $leMateriel = $unMateriel;
            }
        }
        $this->assertEquals(156, $leMateriel->getId(), 'NOK_AddSoiree');
}
}