<?php

/**
 * génère un objet utilisateur
 * 
 * @author VictorLabeille
 */
class Utilisateur {
    /**
     * @var $id identifiant unique de chaque utilisateur 
     */
    private $id;

    /**
     * @var  $nom nom unique de l'utilisateur
     */
    private $nom;
    /**
     * @var  $prenom prenom unique de l'utilisateur
     */
    private $prenom;
    /**
     * @var  $email email unique de l'utilisateur
     */
    private $email;
    /**
     * le mot de passe étant hashé, salé et poivré, il ne me semble pas dangereux de l'avoir dans l'application web
     * @var $motDePasse description unique de la soirée
     */
    private $motDePasse;
    /**
     * @var $habilitation niveau d'habilitation définissant les accès possible à l'utilisateur
     */
    private $habilitation;

    /**
     * Construit un objet soirée    
     * @param mixed $id
     * @param mixed $nom
     * @param mixed $prenom
     * @param mixed $email
     * @param mixed $motDePasse
     * @param mixed $habilitation
     */
    public function __construct($id, $nom, $prenom, $email, $motDePasse, $habilitation){
        if($id == null){
            $this->id = null;
        }else{
            $this->id = $id;
        }
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->motDePasse = $motDePasse;
        if($habilitation == null){
            $this->habilitation = null;
        }else{
            $this->habilitation = $habilitation;
        }
        
    }

    /**
     * fonction qui retourne l'identifiant 
     * @return int $id
     */
    public function getId(){
        return $this->id;
    }
    /**
     * fonction qui retourne le nom 
     * @return $nom
     */
    public function getNom(){
        return $this->nom;
    }
     /**
     * fonction qui retourne le prenom 
     * @return $prenom
     */
    public function getPrenom(){
        return $this->prenom;
    }
     /**
     * fonction qui retourne l'email 
     * @return $email
     */
    public function getEmail(){
        return $this->email;
    }
     /**
     * fonction qui retourne le mot de passe 
     * @return $motDePasse
     */
    public function getMotDePasse(){
        return $this->motDePasse;
    }
     /**
     * fonction qui retourne l'habilitation
     * @return $habilitation
     */
    public function getHabilitation(){
        return $this->habilitation;
    }
}
