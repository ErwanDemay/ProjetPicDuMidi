<link rel="stylesheet" href="css/formulaires.css">
<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

<div class="formulaire">
  <h2>Connectez vous :</h2>
  <table>
    <form action='/index.php?controleur=utilisateurs&action=loginEncours' method="POST">
        <tr>
            <td><i class='bx bxs-envelope' ></i><label for="email"> Email :  </label></td>
            <td><input name="email" id="email" ></td>
        </tr>
        <tr>
            <td><i class='bx bxs-lock-alt'></i><label for="motDePasse"> Mot de passe :</label></td>
            <td><input name="motDePasse" id="motDePasse" type="password"></td>
        </tr>
  </table>
        <div>
          <button class="bouton">Se connecter</button>
        </div>
    </form>
    <p>Vous n'avez pas encore de compte ? <a href="/index.php?controleur=utilisateurs&action=signup">S'inscrire</a></p>
</div>

<?php //permet d'éviter que github considère le fichier comme "hack" ?>