<?php
use PHPUnit\Framework\TestCase;
use function PHPUnit\Framework\assertEquals;
require_once('../modeles/DAO/UtilisateurDAO.php');
require_once('../modeles/Utilisateur.php');

class Utilisateur extends TestCase{
    $Utilisateur = new Utilisateur(263, 'nom', 'prenom', 'email', 'motDePasse', 1);

    /**
     * Teste que la fonction getId() retourne correctement l'id d'un objet Utilisateur
     * @param $Utilisateur
     * @return 156
     */
    public function testGetId(){
        $this->assertEquals(263, $Utilisateur->getId(), 'NOK_getId()');
    }

    /**
     * Teste que la fonction getNom() retourne correctement le nom d'un objet Utilisateur
     * @param $Utilisateur
     * @return UtilisateurTestPHPUnit
     */
    public function testGetNom(){
        $this->assertEquals('nom', $Utilisateur->getNom(), 'NOK_getNom()');
    }

    /**
     * Teste que la fonction getPrenom() retourne correctement le prénom d'un objet Utilisateur
     * @param $Utilisateur
     * @return UtilisateurTestPHPUnit
     */
    public function testGetPrenom(){
        $this->assertEquals('prenom', $Utilisateur->getPrenom(), 'NOK_getPrenom()');
    }

    /**
     * Teste que la fonction getEmail() retourne correctement le prénom d'un objet Utilisateur
     * @param $Utilisateur
     * @return UtilisateurTestPHPUnit
     */
    public function testGetEmail(){
        $this->assertEquals('email', $Utilisateur->getEmail(), 'NOK_getEmail()');
    }

    /**
     * Teste que la fonction getMotDePasse() retourne correctement le prénom d'un objet Utilisateur
     * @param $Utilisateur
     * @return UtilisateurTestPHPUnit
     */
    public function testGetMotDePasse(){
        $this->assertEquals('motDePasse', $Utilisateur->getMotDePasse(), 'NOK_getMotDePasse()');
    }

    /**
     * Teste que la fonction getHabilitation() retourne correctement le prénom d'un objet Utilisateur
     * @param $Utilisateur
     * @return UtilisateurTestPHPUnit
     */
    public function testGetHabilitation(){
        $this->assertEquals(1, $Utilisateur->getHabilitation(), 'NOK_getHabilitation()');
    }
}