<link rel="stylesheet" href="css/formulaires.css">

<div class="formulaire">
  <h2>Connectez vous :</h2>
  <table>
    <form action='/index.php?controleur=utilisateurs&action=loginEncours' method="POST">
        <tr>
            <td><label for="email">Email :</label></td>
            <td><input name="email" id="email" ></td>
        </tr>
        <tr>
            <td><label for="motDePasse">Mot de passe :</label></td>
            <td><input name="motDePasse" id="motDePasse" type="password"></td>
        </tr>
  </table>
        <div>
          <button class="bouton">Se connecter</button>
        </div>
    </form>
    <h4><a href="/index.php?controleur=utilisateurs&action=signup">Vous n'avez pas encore de compte ?</a></h4>
</div>

<?php //permet d'éviter que github considère le fichier comme "hack" ?>