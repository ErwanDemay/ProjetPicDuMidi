<link rel="stylesheet" href="css/formulaires.css">

<div class="formulaire">
  <h2>Réservation d'une soirée</h2>

<div>
  <table>
    <tr>
        <td><h3>Nom : </h3></td>
        <td><p><?php echo $laSoiree->getNom(); ?></p></td>
    </tr>
    <tr>
        <td><h3>Date : </h3></td>
        <td><p><?php echo $laSoiree->getDate(); ?></p></td>
    </tr>
    <tr>
        <td><h3>Lieu : </h3></td>
        <td><p><?php echo $laSoiree->getLieu(); ?></p></td>
    </tr>
    <tr>
        <td><h3>Description : </h3></td>
        <td><p><?php echo $laSoiree->getDescription(); ?></p></td>
    </tr>
    <tr>
        <td><h3>Nombre de places restantes : </h3></td>
        <td><p><?php echo $connexionBD->getNbPlacesRestantes($laSoiree); ?></p></td>
    </tr>
    <tr>
        <td><h3>Heure de début : </h3></td>
        <td><p><?php echo $laSoiree->getHeureDebut(); ?></p></td>
    </tr>
    <tr>
        <td><h3>Prix : </h3></td>
        <td><p><?php echo $laSoiree->getPrix(); ?></p></td>
    </tr>
  </table>
</div>

  <table>
      <form action='/index.php?controleur=soiree&action=soireeReservee' method="POST">
        <input type="hidden" name="idSoiree" id="idSoiree" value='<?php echo $laSoiree->getId(); ?>'/>
        <?php
        $utilisateurConnecte = unserialize($_SESSION['utilisateurConnecte']);
        ?>
        <input type="hidden" name="idUtilisateur" id="idUtilisateur" value='<?php echo $utilisateurConnecte->getId(); ?>'/>
      <tr>
        <div>
          <td><label for="nbPlacesReservees">Nombre de places :</label></td>
          <td><input name="nbPlacesReservees" id="nbPlacesReservees"/></td>
        </div>
      </tr>
  </table>
  <br>
        <div>
          <button class="boutons">Réserver</button>
        </div>
      </form>
</div>