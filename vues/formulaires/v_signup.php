<link rel="stylesheet" href="css/formulaires.css">

<div class="formulaire">
  <h2>Créez votre compte :</h2>
  <table>
    <form action='/index.php?controleur=utilisateurs&action=utilisateurCree' method="POST">
        <tr>
          <td><label for="nom">Nom :</label></td>
          <td><input name="nom" id="nom"></td>
        </tr>
        <tr>
            <td><label for="prenom">Prenom :</label></td>
            <td><input name="prenom" id="prenom"></td>
        </tr>
        <tr>
            <td><label for="email">Email :</label></td>
            <td><input name="email" id="email" ></td>
        </tr>
        <tr>
            <td><label for="motDePasse">Mot de passe :</label></td>
            <td><input name="motDePasse" id="motDePasse"></td>
        </tr>
  </table>
        <div>
          <button class="bouton">Créer son compte</button>
        </div>
    </form>
</div>