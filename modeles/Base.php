<?php
class Base {
   protected PDO $db;
 
   protected function __construct() {         
    }

    protected function setConnexionBase(string $nomdb, string $user, string $mdp) {         
	try{
            $serveurBdDistant = '';

            $nomBdDistante = $nomdb;
            $this->db = new PDO("mysql:host=".$serveurBdDistant.";dbname=".$nomBdDistante,$user,$mdp);

            $this->db->query("SET CHARACTER SET utf8");
	}
	catch ( PDOException $erreur){
            die("Erreur de connexion à la base de données ".$erreur->getMessage());
	}
    }
    
    /**
     * methode publique définie pour pouvoir accéder à la méthode query() de la propriété $db qui est privée.
     */
    protected function query(string $sql) {
        return $this->db->query($sql);
    }
    
    protected function exec(string $sql) {
        return $this->db->exec($sql);
    }
}

