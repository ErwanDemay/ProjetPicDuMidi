<link rel="stylesheet" href="css/formulaires.css">

<div class="formulaire">
  <h2>Connectez vous :</h2>
  <table>
    <form action='/index.php?controleur=utilisateurs&action=utilisateurConnecte' method="POST">
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
          <button class="bouton">Se connecter</button>
        </div>
    </form>
</div>