<?php
use PHPUnit\Framework\TestCase;
use function PHPUnit\Framework\assertEquals;
require_once('../modeles/DAO/SoireeDAO.php');
require_once('../modeles/soiree.php');

class SoireeDAOTests extends TestCase{
    $monDAO = new SoireeDAO();

    /**
     * Test que la fonction getLesSoirees() retourne bien une collection de soirées
     * @param 
     * @return $lesSoirees  collection d'objets Soiree
     */
    public function testGetLesSoirees(){

        $lesSoirees = $monDAO->getLesSoirees();
        $this->assertContainsOnlyInstancesOf(MyClass::Soiree, $lesSoirees);
    }

    /**
     * Test que la fonction addSoiree() retourne bien une collection de soirées
     * @param $soiree  objet soirée créé pour le test
     * @return $lesSoirees  collection d'objets Soiree
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
}