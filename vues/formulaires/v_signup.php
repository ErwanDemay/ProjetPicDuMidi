<link rel="stylesheet" href="css/formulaires.css">

<div class="formulaire">
  <h2>Créez votre compte :</h2>
  <table>
    <form action='/index.php?controleur=utilisateurs&action=signupEncours' method="POST">
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
            <td><input type="email" name="email" id="email" ></td>
        </tr>
        <tr>
            <td><label for="motDePasse">Mot de passe :</label></td>
            <td><input name="motDePasse" id="motDePasse" type="password"></td>
        </tr>
  </table>
        <div>
          <button class="bouton">Créer son compte</button>
        </div>
    </form>
    <h4><a href="/index.php?controleur=utilisateurs&action=login">Vous avez déjà un compte ?</a></h4>
</div>