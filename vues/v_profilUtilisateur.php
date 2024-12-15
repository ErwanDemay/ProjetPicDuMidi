<link rel="stylesheet" href="css/consultation.css">

<div class="consultation" style='color:black;'>
<table id="description">

<h2>Ici il sera possible de visualiser et modifier ses informations</h2>
<link rel="stylesheet" href="css/formulaires.css">

  <table>
      <tr>
        <div>
          <td><h3>Nom :</h3></td>
          <td><p><?php echo $utilisateurConnecte->getNom(); ?></p></td>
        </div>
      </tr>
      <tr>
        <div>
          <td><h3>Prenom :</h3></td>
          <td><p><?php echo $utilisateurConnecte->getPrenom(); ?></p></td>
        </div>
      </tr>
      <tr>
        <div>
          <td><h3>Email :</h3></td>
          <td><p><?php echo $utilisateurConnecte->getEmail(); ?></p></td>
        </div>
      </tr>
  </table>
  <p>Si vous souhaitez changer votre mot de passe ou supprimer votre compte formulez une demaine à l'adresse suivante : gestionnaire@picdumidi.fr</p>

</table>
</div>
</div>