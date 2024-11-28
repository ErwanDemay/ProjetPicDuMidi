<?php

/**
 * génère les informations générales d'un type de matériel
 */
class TypeMateriel {
    /**
     * 
     * @var $id identifiant unique du type de matériel 
     */
    private $id;
    /**
     * Summary of nom
     * @var $nom nom du type de matériel
     */
    private String $nom;

    /**
     * construit un opbjet  type matériel
     * @param mixed $id
     * @param mixed $nom
     */
    public function __construct($id, $nom){
        $this->id = $id;
        $this->nom = $nom;
    }

    /**
     * fonction qui retourne l'identifiant du type de matériel
     * @return int id;
     */
    public function getId(){
        return $this->id;
    }
    /**
     * Fonction qui retourne le nom du type de matériel
     * @return string nom
     */
    public function getNom(){
        return $this->nom;
    }
  
    /**
     * fonction pour changer l'identifiant du type de matériel
     * @param mixed $id
     * @return void
     */
    public function setId($id){
        $this->id = $id;
    }
    /**
     * fonction pour changer le nom du type de matériel
     * @param mixed $nom
     * @return void
     */
    public function setNom($nom){
        $this->nom = $nom;
    }
  }