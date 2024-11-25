<link rel="stylesheet" href="css/formulaires.css">

<div class="formulaire">
  <h2>Modification d'un utilisateur :</h2>
  <table>
      <form action='/index.php?controleur=utilisateurs&action=modifierUtilisateurGestionnaireEncours' method="POST">
          <input type="hidden" name="id" id="id" value='<?php echo (int)$lUtilisateur->getId(); ?>'/>
      <tr>
        <div>
          <label for="nom">Nom :</label>
          <input name="nom" id="nom" value="<?php echo $lUtilisateur->getNom(); ?>"/>
        </div>
      </tr>
      <tr>
        <div>
          <label for="prenom">Prénom :</label>
          <input name="prenom" id="prenom" value="<?php echo $lUtilisateur->getPrenom(); ?>"/>
        </div>
      </tr>
      <tr>
        <div>
          <label for="email">Email :</label>
          <input name="email" id="email" value="<?php echo $lUtilisateur->getEmail(); ?>"/>
        </div>
      </tr>
      <tr>
        <div>
          <label for="motDePasse">Mot de passe :</label>
          <input name="motDePasse" id="motDePasse" value="<?php echo $lUtilisateur->getMotDePasse(); ?>"/>
        </div>
      </tr>
      <tr>
        <div>
          <label for="habilitation">Habilitation :</label>
          <input name="habilitation" id="habilitation" value="<?php echo $lUtilisateur->getHabilitation(); ?>"/>
        </div>
      </tr>
  </table>
        <div>
          <button>Modifier</button>
        </div>
      </form>
</div>