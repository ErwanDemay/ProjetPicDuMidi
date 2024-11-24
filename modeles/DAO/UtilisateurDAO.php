<?php
include_once ("./modeles/Base.php");
class UtilisateurDAO extends Base{
    
    /**
     * Constructeur initialisant la connection avec le SGBD grâce à la classe Base, héritée
     */
    public function __construct(){
        parent::__construct();
        parent::setConnexionBase('mancisidor_bdd_picdumidi','377513','ProjetSIO2!');
    }

    /**
     * vérifie si un utilisateur est connecté et si il existe dans le SGBD
     * @param
     * @return $estConnecte
     */
    public function estConnecte(){
        $estConnecte = false;
        if(isset($_SESSION['utilisateurConnecte'])){
            $id = $_SESSION['utilisateurConnecte']->getId();

            $ordreSQL = "SELECT * FROM utilisateurs WHERE id = :id";

            $reqPrepa = $this->prepare($ordreSQL);
            $reqPrepa->bindParam(':id', $id);
            $resultatDeLaRequete = $reqPrepa->execute();

            if($resultatDeLaRequete && mysqli_num_rows($resultatDeLaRequete) > 0){
                $estConnecte = true;
            }
        }else{
            $estConnecte = false;
        }
        return $estConnecte;
    }

    /**
     * ajoute un utilisateur à partir des informations fournies par le formualire v_signup.php
     * @param Utilisateur $unUtilisateur    objet utilisateur contenant les informations nécessaire pour l'ajout du tuple
     * @return $resultatDeLaRequete    retourne une valeur numérique indiquant si l'utilisateur' a bien été ajouté
     */
    public function addUtilisateur($unUtilisateur){
        $ordreSQL = "INSERT INTO utilisateurs (`nom`, `prenom`, `email`, `motDePasse`, `sel`) 
                     VALUES (:nom, :prenom, :email, :motDePasse, :sel)";
        
        $reqPrepa = $this->prepare($ordreSQL);
    
        $nom = $unUtilisateur->getNom();
        $prenom = $unUtilisateur->getPrenom();
        $email = $unUtilisateur->getEmail();
        $motDePasse = $unUtilisateur->getMotDePasse();

        $sel = bin2hex(random_bytes(16));   //génère un sel aléatoire de 16-byte
                                            //l'intérêt d'un sel aléatoire et qu'un seul brute force ne compromet pas tous les comptes

        $motDePasseSelEtPoivre = $sel.$motDePasse.$this->getPoivre(); //donne la chaîne de caractère à haser, composée du sel aléatoire, du mot de passe saisi et du poivre

        $motDePasseHashe = password_hash($motDePasseSelEtPoivre, PASSWORD_ARGON2ID, ['memory_cost' => 2048, 'time_cost' => 4, 'threads' => 3]); //fonction permettant de hasher le mot de passe avec l'algorithme argon2id, recommandé par OWASP

        $reqPrepa->bindParam(':nom', $nom);
        $reqPrepa->bindParam(':prenom', $prenom);
        $reqPrepa->bindParam(':email', $email);
        $reqPrepa->bindParam(':motDePasse', $motDePasseHashe);
        $reqPrepa->bindParam(':sel', $sel); //permettra de garder en mémoire le sel utilisé pour cet utilisateur pour pouvoir vérifier ses tentatives de connections

        $resultatDeLaRequete = $reqPrepa->execute();
    
        return $resultatDeLaRequete;
    }

    /**
     * récupère le sel associé à un utilisateur, trouvé par son email. Cela est nécessaire pour vérifier le mot de passe lors de la connection
     * @param $email    email associé au compte de l'utilisateur
     * @return $resultatDeLaRequete    retourne le sel associé à l'utilisateur
     */
    public function getSel($email){
        $ordreSQL = "SELECT sel FROM utilisateurs WHERE email = :email";

            $reqPrepa = $this->prepare($ordreSQL);
            $reqPrepa->bindParam(':email', $email);
            $resultatDeLaRequete = $reqPrepa->execute();

            return $resultatDeLaRequete;
    }

    /**
     * vérifie si l'email passé en paramètre existe déjà dans le SGBD
     * @param $email    email potentiellement déjà existant
     * @return $resultat    nombre de ligne où l'email est présent (en principe 0 ou 1)
     */
    public function existeDeja($email){
        $ordreSQL = "SELECT COUNT(email) AS existeDeja FROM utilisateurs WHERE email = :email";

        $reqPrepa = $this->prepare($ordreSQL);
        $reqPrepa->bindParam(':email', $email);
        $reqPrepa->execute();
        $resultatDeLaRequete = $reqPrepa->fetch(PDO::FETCH_ASSOC);

        return (int)$resultatDeLaRequete['existeDeja'];
    }
}