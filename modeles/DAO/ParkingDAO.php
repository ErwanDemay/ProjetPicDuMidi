<?php
include_once ("./modeles/Base.php");
include_once ("./modeles/Parking.php");
class ParkingDAO extends Base{
    
    /**
     * Constructeur initialisant la connection avec le SGBD grâce à la classe Base, héritée
     */
    public function __construct(){
        parent::__construct();
        parent::setConnexionBase('mancisidor_bdd_picdumidi','377513','ProjetSIO2!');
    }
    
    /**
     * Récupère tout les parkings pour les afficher dans la consultation du gestionnaire
     * @param
     * @return $lesObjParking    collection de tout les parkings sous forme d'objets parking
     */
    public function getLesParkings(){
        //Je suis pas sûr qu'on ai besoin de préparer une requête sans paramètres
        $ordreSQL = "SELECT * FROM parking ;";
        
        $reqPrepa = $this->prepare($ordreSQL);
        $reqPrepa->execute();
    
        $tableauParking = $reqPrepa->fetchAll();
        $lesObjParking = array();

        foreach($tableauParking as $uneLigneUnParking){
            $unParking = new Parking(
                $uneLigneUnParking["id_parking"],
                $uneLigneUnParking["place_mbr"],
                $uneLigneUnParking["place_c"],
                $uneLigneUnParking["nb_places"],
            );
            $lesObjParking[] = $unParking;
        }
    
        return $lesObjParking;
    }
    
    

   
}