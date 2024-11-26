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
            $utilisateurConnecte = unserialize($_SESSION['utilisateurConnecte']);

            $id = $utilisateurConnecte->getId();
            $nom = $utilisateurConnecte->getNom();
            $prenom = $utilisateurConnecte->getPrenom();
            $email = $utilisateurConnecte->getEmail();
            $motDePasse = $utilisateurConnecte->getMotDePasse();
            
            $ordreSQL = "SELECT * FROM utilisateurs WHERE id = :id AND nom = :nom AND prenom = :prenom AND email = :email AND motDePasse = :motDePasse";
            $reqPrepa = $this->prepare($ordreSQL);
            
            $reqPrepa->bindParam(':id', $id);
            $reqPrepa->bindParam(':nom', $nom);
            $reqPrepa->bindParam(':prenom', $prenom);
            $reqPrepa->bindParam(':email', $email);
            $reqPrepa->bindParam(':motDePasse', $motDePasse);
            
            $reqPrepa->execute();
            $resultatDeLaRequete = $reqPrepa->fetch();

            if($resultatDeLaRequete > 0){
                $estConnecte = true;
            }
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

        $motDePasseSelEtPoivre = $sel.$motDePasse.$this->getPoivre(); //donne la chaîne de caractère à hasher, composée du sel aléatoire, du mot de passe saisi et du poivre

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
            $reqPrepa->execute();
            $resultatDeLaRequete = $reqPrepa->fetch();

            return (string)$resultatDeLaRequete['sel'];
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

    /**
     * vérifie si les identifiant passés en paramètres sont valides
     * @param $email    adresse email du supposé compte
     * @param $motDePasse    mot de passe sans sel ni poivre ni ash du supposé compte
     * @return $unObjUtilisateur    objet utilisateur du compte trouvé
     * @return false    retourne false si identifiants incorrects
     */
    public function verifConnection($email, $motDePasse){
        if($this->existeDeja($email)){ //si l'email appartient bien à un utilisateur, alors on vérifie le mot de passe
            $sel = $this->getSel($email); //on récupère le sel utilisé pour cet email

            $motDePasseSelEtPoivre = $sel.$motDePasse.$this->getPoivre();

            $ordreSQL = "SELECT motDePasse FROM utilisateurs WHERE email = :email";

            $ordreSQL = "SELECT motDePasse FROM utilisateurs WHERE email = :email"; //récupération du hash de mot de passe stocké
            $reqPrepa = $this->prepare($ordreSQL);
            $reqPrepa->bindParam(':email', $email);
            $reqPrepa->execute();
            $resultatDeLaRequete = $reqPrepa->fetch();

            if ($resultatDeLaRequete) {
                $motDePasseStocke = $resultatDeLaRequete['motDePasse'];
    
                if (password_verify($motDePasseSelEtPoivre, $motDePasseStocke)) { //vérifie si le mot de passe est correct, alors on récupère les informations de l'utilisateur

                    $ordreSQL = "SELECT * FROM utilisateurs WHERE email = :email";
                    $reqPrepa = $this->prepare($ordreSQL);
                    $reqPrepa->bindParam(':email', $email);
                    $reqPrepa->execute();
                    $unUtilisateur = $reqPrepa->fetch();
    
                    $unObjUtilisateur = new Utilisateur(
                        $unUtilisateur['id'],
                        $unUtilisateur['nom'],
                        $unUtilisateur['prenom'],
                        $unUtilisateur['email'],
                        $unUtilisateur['motDePasse'],
                        $unUtilisateur['habilitation']
                    );
    
                    return $unObjUtilisateur;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }else{
            return false;
        }
    }

    /**
     * récupère tous les utilisateurs pour les retourner dans une collection
     * @param
     * @return $lesObjUtilisateurs    collection d'objets utilisateurs contenant tous les utilisateurs
     */
    public function getLesUtilisateurs(){
        $ordreSQL = "SELECT * FROM utilisateurs ORDER BY nom DESC;";
        
        $reqPrepa = $this->prepare($ordreSQL);
        $reqPrepa->execute();
    
        $tableauUtilisateurs = $reqPrepa->fetchAll();
        $lesObjUtilisateurs = array();

        foreach($tableauUtilisateurs as $uneLigneUnUtilisateur){
            $unUtilisateur = new Utilisateur(
                $uneLigneUnUtilisateur['id'],
                $uneLigneUnUtilisateur['nom'],
                $uneLigneUnUtilisateur['prenom'],
                $uneLigneUnUtilisateur['email'],
                $uneLigneUnUtilisateur['motDePasse'],
                $uneLigneUnUtilisateur['habilitation']
            );
            $lesObjUtilisateurs[] = $unUtilisateur;
        }
    
        return $lesObjUtilisateurs;
    }

    /**
     * Supprime du SGBD l'utilisateur dont l'id correspond à celui fourni en paramètre
     * @param $id    identifiant, sensé correspondre à un utilisateur
     * @return $resultatDeLaRequete    valeur numérique indiquant le nombre de lignes supprimées (0 ou 1)
     */
    public function deleteUtilisateur($id){
        $ordreSQL = "DELETE FROM utilisateurs WHERE id = :id";
        
        $reqPrepa = $this->prepare($ordreSQL);
        $reqPrepa->bindParam(':id', $id, PDO::PARAM_INT);
        $resultatDeLaRequete = $reqPrepa->execute();
    
        return $resultatDeLaRequete;
    }

    /**
     * Fonction qui modifie un utilisateur et le trouvant par son id et appliquant les informations fournies dans le paramètre utilisateur
     * @param $utilisateur    objet de la classe utilisateur contenant les nouvelles informations, avec l'ancien id
     * @return $resultatDeLaRequete    valeur numérique indiquant le nombre de lignes modifiées (0 ou 1)
     */
    public function editUtilisateur($utilisateur){
        $ordreSQL = "UPDATE utilisateurs 
                     SET nom = :nom, 
                         prenom = :prenom, 
                         email = :email, 
                         motDePasse = :motDePasse, 
                         habilitation = :habilitation
                     WHERE id = :id";
        
        $reqPrepa = $this->prepare($ordreSQL);
        
        $id = $utilisateur->getId();
        $nom = $utilisateur->getNom();
        $prenom =  $utilisateur->getPrenom();
        $email = $utilisateur->getEmail();
        $motDePasse = $utilisateur->getMotDePasse();
        $habilitation = $utilisateur->getHabilitation();

        $sel = $this->getSel($email); //lors d'un changement de mot de passe, le sel reste le même
        $motDePasseSelEtPoivre = $sel.$motDePasse.$this->getPoivre();
        $nouveauMotDePasseHashe = password_hash($motDePasseSelEtPoivre, PASSWORD_ARGON2ID, ['memory_cost' => 2048, 'time_cost' => 4, 'threads' => 3]);

        $reqPrepa->bindParam(':id', $id);
        $reqPrepa->bindParam(':nom', $nom);
        $reqPrepa->bindParam(':prenom', $prenom);
        $reqPrepa->bindParam(':email', $email);
        $reqPrepa->bindParam(':motDePasse', $nouveauMotDePasseHashe);
        $reqPrepa->bindParam(':habilitation', $habilitation);

        $resultatDeLaRequete = $reqPrepa->execute();
        
        return $resultatDeLaRequete;
    }

    /**
     * Récupère les informations d'un seul utilisateur
     * @param $id    identifiant de l'utilisateur' à récupérer
     * @return $unObjUtilisateur    objet utilisateur contenant toutes les informations de l'utilisateur correspondant à l'id fourni en paramètre
     */
    public function getUnUtilisateur($id){
        $ordreSQL = "SELECT * FROM utilisateurs WHERE id = :id;";

        $reqPrepa = $this->prepare($ordreSQL);

        $reqPrepa->bindValue(':id', $id);

        $reqPrepa->execute();

        $unUtilisateur = $reqPrepa->fetch();

        if ($unUtilisateur) {
            $unObjUtilisateur = new Utilisateur(
                $unUtilisateur["id"],
                $unUtilisateur["nom"],
                $unUtilisateur["prenom"],
                $unUtilisateur["email"],
                $unUtilisateur["motDePasse"],
                $unUtilisateur["habilitation"],
            );
            return $unObjUtilisateur;
        } else {
            return null; 
        }
    }
}