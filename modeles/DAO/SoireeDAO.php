<?php
include_once ("./modeles/Base.php");
include_once ("./modeles/Soiree.php");
class SoireeDAO extends Base{
    
    /**
     * Constructeur initialisant la connection avec le SGBD grâce à la classe Base, héritée
     */
    public function __construct(){
        parent::__construct();
        parent::setConnexionBase('mancisidor_bdd_picdumidi','377513','ProjetSIO2!');
    }
    
    /**
     * Récupère toutes les soirée pour les afficher dans la consultation du gestionnaire
     * @param
     * @return $lesObjSoirees    collection de toutes les soirées sous forme d'objets soiree
     */
    public function getLesSoirees(){
        //Je suis pas sûr qu'on ai besoin de préparer une requête sans paramètres
        $ordreSQL = "SELECT * FROM soirees ORDER BY date_soiree DESC;";
        
        $reqPrepa = $this->prepare($ordreSQL);
        $reqPrepa->execute();
    
        $tableauSoirees = $reqPrepa->fetchAll();
        $lesObjSoirees = array();

        foreach($tableauSoirees as $uneLigneUneSoiree){
            $uneSoiree = new Soiree(
                $uneLigneUneSoiree["id_soiree"],
                $uneLigneUneSoiree["nom_soiree"],
                $uneLigneUneSoiree["date_soiree"],
                $uneLigneUneSoiree["lieu"],
                $uneLigneUneSoiree["description"],
                $uneLigneUneSoiree["nbPlaces"],
                $uneLigneUneSoiree["prix"],
                $uneLigneUneSoiree["heureDebut"]
            );
            $lesObjSoirees[] = $uneSoiree;
        }
    
        return $lesObjSoirees;
    }
    
    /**
     * Supprime du SGBD la soirée dont l'id correspond à celui fourni en paramètre
     * @param $id    identifiant, sensé correspondre à une soirée
     * @return $resultatDeLaRequete    valeur numérique indiquant le nombre de lignes supprimées (0 ou 1)
     */
    public function deleteSoiree($id){
        $ordreSQL = "DELETE FROM soirees WHERE id_soiree = :id";
        
        $reqPrepa = $this->prepare($ordreSQL);
        $reqPrepa->bindParam(':id', $id, PDO::PARAM_INT);
        $resultatDeLaRequete = $reqPrepa->execute();
    
        return $resultatDeLaRequete;
    }
    
    /**
     * Ajoute la soirée passée en paramètre dans le SGBD
     * @param $soirée    objet soirée contenant toutes les informations de la soirée à ajouter, sauf l'id qui s'auto incrémente
     * @return $resultatDeLaRequete    retourne une valeur numérique indiquant si la soirée a bien été ajoutée 
     */
    public function addSoiree($soiree) {
        $ordreSQL = "INSERT INTO soirees (`nom_soiree`, `date_soiree`, `lieu`, `description`, `nbPlaces`, `prix`, `heureDebut`) 
                     VALUES (:nom, :date, :lieu, :description, :nbPlaces, :prix, :heureDebut)";
    
        $reqPrepa = $this->prepare($ordreSQL);
    
        $nom = $soiree->getNom();
        $date = $soiree->getDate();
        $lieu = $soiree->getLieu();
        $description = $soiree->getDescription();
        $nbPlaces = $soiree->getNbPlaces();
        $prix = $soiree->getPrix();
        $heureDebut = $soiree->getHeureDebut();

        $reqPrepa->bindParam(':nom', $nom);
        $reqPrepa->bindParam(':date', $date);
        $reqPrepa->bindParam(':lieu', $lieu);
        $reqPrepa->bindParam(':description', $description);
        $reqPrepa->bindParam(':nbPlaces', $nbPlaces);
        $reqPrepa->bindParam(':prix', $prix);
        $reqPrepa->bindParam(':heureDebut', $heureDebut);

        $resultatDeLaRequete = $reqPrepa->execute();
    
        return $resultatDeLaRequete;
    }
    
    /**
     * Modifie une soirée avec les informations et l'id de l'objet soirée passé en paramètre
     * @param $soiree    objet soirée créé avec l'id de la soirée à modifier et les nouvelles informations
     * @return $resultatDeLaRequete    booléen représentant la bonne exécution de la requête
     */
    public function editSoiree($soiree){

        $ordreSQL = "UPDATE soirees 
                     SET nom_soiree = :nom, 
                         date_soiree = :date, 
                         lieu = :lieu, 
                         description = :description, 
                         nbPlaces = :nbPlaces,
                         prix = :prix,
                         heureDebut = :heureDebut 
                     WHERE id_soiree = :id";
        
        $reqPrepa = $this->prepare($ordreSQL);
        
        $nom = $soiree->getNom();
        $date =  $soiree->getDate();
        $lieu = $soiree->getLieu();
        $description = $soiree->getDescription();
        $nbPlaces = (int)$soiree->getNbPlaces();
        $prix = (float)$soiree->getPrix();
        $heureDebut = $soiree->getHeureDebut();
        $id = $soiree->getId();

        $reqPrepa->bindParam(':nom', $nom);
        $reqPrepa->bindParam(':date', $date);
        $reqPrepa->bindParam(':lieu', $lieu);
        $reqPrepa->bindParam(':description', $description);
        $reqPrepa->bindParam(':nbPlaces', $nbPlaces, PDO::PARAM_INT);
        $reqPrepa->bindParam(':prix', $prix);
        $reqPrepa->bindParam(':heureDebut', $heureDebut);
        $reqPrepa->bindParam(':id', $id, PDO::PARAM_INT);

        $resultatDeLaRequete = $reqPrepa->execute();
    //$reqPrepa->debugDumpParams(); -- requête goatesque qui fait que de me sauver la vie
        return $resultatDeLaRequete;
    }

    /**
     * Récupère les informations d'une seule soirée
     * @param $id    identifiant de la soirée à récupérer
     * @return $unObjSoiree    objet soiree contenant toutes les informations de la soirée correspondant à l'id fourni en paramètre
     */
    public function getUneSoiree($id){
        $ordreSQL = "SELECT * FROM soirees WHERE id_soiree = :id;";

        $reqPrepa = $this->prepare($ordreSQL);

        $reqPrepa->bindValue(':id', $id, PDO::PARAM_INT);

        $reqPrepa->execute();

        $uneSoiree = $reqPrepa->fetch(PDO::FETCH_ASSOC);

        if ($uneSoiree) {
            $unObjSoiree = new Soiree(
                $uneSoiree["id_soiree"],
                $uneSoiree["nom_soiree"],
                $uneSoiree["date_soiree"],
                $uneSoiree["lieu"],
                $uneSoiree["description"],
                $uneSoiree["nbPlaces"],
                $uneSoiree["prix"],
                $uneSoiree["heureDebut"]
            );
            return $unObjSoiree;
        } else {
            return null; 
        }
    }

    /**
     * Récupère toutes les soirées dont la date de début est supérieur à la date actuelle
     * @param
     * @return $lesObjSoiree    collection d'objet contenant toutes les soirées récupérées
     */
    public function getProchainesLesSoirees(){
        //mm remarque que getLesSoirées()
        $ordreSQL = "SELECT * FROM soirees WHERE date_soiree > CURDATE() ORDER BY date_soiree;";
        
        $reqPrepa = $this->prepare($ordreSQL);
        $reqPrepa->execute();
    
        $tableauSoirees = $reqPrepa->fetchAll();
        $lesObjSoirees = array();
        
        foreach ($tableauSoirees as $uneLigneUneSoiree) {
            $uneSoiree = new Soiree(
                $uneLigneUneSoiree["id_soiree"],
                $uneLigneUneSoiree["nom_soiree"],
                $uneLigneUneSoiree["date_soiree"],
                $uneLigneUneSoiree["lieu"],
                $uneLigneUneSoiree["description"],
                $uneLigneUneSoiree["nbPlaces"],
                $uneLigneUneSoiree["prix"],
                $uneLigneUneSoiree["heureDebut"]
            );
            $lesObjSoiree[] = $uneSoiree;
        }
    
        return $lesObjSoiree;
    }

    /**
     * Retourne le nombre de places restantes d'une soirée fourni en paramètre
     * @param $soiree    objet soirée dont on cherche le nombre de places restantes
     * @return $resultatDeLaRequete    entier correspondant au nombre de places restantes
     */
    public function getNbPlacesRestantes($soiree){
        $ordreSQL ="SELECT soirees.nbPlaces - SUM(reservations.nbPlacesReservees) AS placesRestantes
                    FROM soirees
                    INNER JOIN reservations ON soirees.id_soiree = reservations.id_soiree
                    WHERE soirees.id_soiree = :id";
    
        $reqPrepa = $this->prepare($ordreSQL);
        $id = $soiree->getId();
        $reqPrepa->bindParam(':id', $id);
        $reqPrepa->execute();
    
        $resultatDeLaRequete = $reqPrepa->fetch(PDO::FETCH_ASSOC);
    
        if ($resultatDeLaRequete) {
            return $resultatDeLaRequete['placesRestantes'];
        } else {
            return 0;
        }
    }
}