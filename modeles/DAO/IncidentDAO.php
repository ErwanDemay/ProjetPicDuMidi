<?php
include_once ("./modeles/Base.php");
include_once ("./modeles/Incident.php");
class IncidentDAO extends Base{
    
    public function __construct(){
        parent::__construct();
        parent::setConnexionBase('mancisidor_bdd_picdumidi','377513','ProjetSIO2!');
    }
    
    public function getLesIncidents(){
        $resultatDeLaRequete=$this->query("SELECT * FROM Incident;");
        $tableauIncidents = $resultatDeLaRequete->fetchAll();
        $lesObjIncidents = array();
        foreach($tableauIncidents as $uneLigneUnIncident){
            $unIncident = new Incident($uneLigneUnIncident["id_Incident"],$uneLigneUnIncident["nom_Incident"],$uneLigneUnIncident["etat_Incident"]);
            
            $lesObjIncidents[] = $unIncident;
        }
        return $lesObjIncidents;
    }
    
    public function deleteIncident($id){
        $resultatDeLaRequete=$this->exec("DELETE FROM Incident WHERE id_Incident=".$id.";");
        return $resultatDeLaRequete;
    }
    
    public function addIncident($Incident) {
        $resultatDeLaRequete = $this->exec(
            "INSERT INTO Incident (`nom_Incident`, `etat_Incident`) 
             VALUES ('".$Incident->getNom()."', '".$Incident->getEtat()."');");
        return $resultatDeLaRequete;
    }
    
    
    public function editIncident($Incident){
        $req = "UPDATE Incident SET `nom_Incident`='".$Incident->getNom()."', `etat_Incident`='".$Incident->getEtat()."' WHERE Incident.id_Incident=".$Incident->getId().";";
        echo $req;
        $resultatDeLaRequete=$this->exec($req);
        return $resultatDeLaRequete;
    }

    public function getUnIncident($id){
        $resultatDeLaRequete=$this->query("SELECT * FROM Incident WHERE id_Incident='".$id."';");
        $unIncident = $resultatDeLaRequete->fetch();
        $unObjIncident = new Incident($unIncident["id_Incident"],$unIncident["nom_Incident"],$unIncident["etat_Incident"]);
        return $unObjIncident;
    }

    public function estEnPanne($Incident){
        $resultatDeLaRequete = $this->exec("SELECT COUNT(*) FROM Incident INNER JOIN panne on Incident.id_Incident = panne.id_Incident WHERE Incident.id_Incident = ".$Incident->getId().";");
        echo var_dump($resultatDeLaRequete);
    }

    /*
    public function getUneSoiree($id){
        $resultatDeLaRequete=$this->query("SELECT * FROM soirees WHERE id_soiree='".$id."';");
        $uneSoiree = $resultatDeLaRequete->fetch();
        $unObjSoiree = new Soiree($uneSoiree["id_soiree"],$uneSoiree["nom_soiree"],$uneSoiree["date_soiree"],$uneSoiree["lieu"],$uneSoiree["description"],$uneSoiree["nbPlaces"]);
        return $unObjSoiree;
    }
    */
}