<?php
use PHPUnit\Framework\TestCase;
use function PHPUnit\Framework\assertEquals;
require_once('../modeles/DAO/SoireeDAO.php');
require_once('../modeles/soiree.php');

class Soiree extends TestCase{
    $soiree = new Soiree(156, 'soireeTestPHPUnit', '9999-11-11', 'salle 24', 'may Allah destroy PHPUnit', 12);

    /**
     * Teste que la fonction getId() retourne correctement l'id d'un objet soirée
     * @param $soiree
     * @return 156
     */
    public function testGetId(){
        $this->assertEquals(156, $soiree->getId(), 'NOK_getId()');
    }

    /**
     * Teste que la fonction getNom() retourne correctement le nom d'un objet soirée
     * @param $soiree
     * @return soireeTestPHPUnit
     */
    public function testGetNom(){
        $this->assertEquals('soireeTestPHPUnit', $soiree->getNom(), 'NOK_getNom()');
    }

    /**
     * Teste que la fonction getDate() retourne correctement la date d'un objet soirée
     * @param $soiree
     * @return soireeTestPHPUnit
     */
    public function testGetDate(){
        $this->assertEquals('999-11-11', $soiree->getDate(), 'NOK_getDate()');
    }

    /**
     * Teste que la fonction getLieu() retourne correctement le lieu d'un objet soirée
     * @param $soiree
     * @return soireeTestPHPUnit
     */
    public function testGetLieu(){
        $this->assertEquals('salle 24', $soiree->getLieu(), 'NOK_getLieu()');
    }
}