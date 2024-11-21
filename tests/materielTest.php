<?php
use PHPUnit\Framework\TestCase;
use function PHPUnit\Framework\assertEquals;
require_once('../modeles/DAO/MaterielDAO.php');
require_once('../modeles/Materiel.php');

class Materiel extends TestCase{
    $leMateriel = new Materiel(156, 'materielTestPHPUnit', 'bon');

    /**
     * Teste que la fonction getId() retourne correctement l'id d'un objet matériel
     * @param $leMateriel
     * @return 156
     */
    public function testGetId(){
        $this->assertEquals(156, $leMateriel->getId(), 'NOK_getId()');
    }

    /**
     * Teste que la fonction getNom() retourne correctement le nom d'un objet matériel
     * @param $leMateriel
     * @return materielTestPHPUnit
     */
    public function testGetNom(){
        $this->assertEquals('materielTestPHPUnit', $leMateriel->getNom(), 'NOK_getNom()');
    }

    /**
     * Teste que la fonction getDate() retourne correctement la date d'un objet matériel
     * @param $leMateriel
     * @return bon
     */
    public function testGetEtat(){
        $this->assertEquals('bon', $leMateriel->getEtat(), 'NOK_getDate()');
    }
}