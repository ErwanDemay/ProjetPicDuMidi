<?php
class Base {
   protected PDO $db;
 
   protected function __construct() {         
    }

    protected function setConnexionBase(string $nomdb, string $user, string $mdp) {         
	try{
            $serveurBdDistant = 'mysql-mancisidor.alwaysdata.net';

            $nomBdDistante = $nomdb;
            $this->db = new PDO("mysql:host=".$serveurBdDistant.";dbname=".$nomBdDistante,$user,$mdp);

            $this->db->query("SET CHARACTER SET utf8");
	}
	catch ( PDOException $erreur){
            die("Erreur de connexion à la base de données ".$erreur->getMessage());
	}
    }
    
    protected function query(string $sql) {
        return $this->db->query($sql);
    }
    
    protected function exec(string $sql) {
        return $this->db->exec($sql);
    }

    protected function prepare(string $sql) {
        return $this->db->prepare($sql);
    }
}

