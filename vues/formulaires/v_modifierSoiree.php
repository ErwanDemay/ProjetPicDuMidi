<link rel="stylesheet" href="css/formulaires.css">

<div class="formulaire">
  <h2>Modification d'une soirée</h2>
  <table>
      <form action='/index.php?controleur=soiree&action=soireeModifiee' method="POST">
        <input type="hidden" name="id" id="id" value='<?php echo $laSoiree->getId(); ?>'/>
      <tr>
        <div>
          <td><label for="nom">Nom :</label></td>
          <td><input name="nom" id="nom" value="<?php echo $laSoiree->getNom(); ?>"/></td>
        </div>
      </tr>
      <tr>
        <div>
        <?php
          $today = date('Y-m-d'); 
          $nextYear = date('Y-m-d', strtotime('+1 year'));
          ?>
          <td><label for="Calendar">Date :</label></td>
          <td><input type="date" name="date" value="<?php echo $laSoiree->getDate(); ?>"/></td>
        </div>
      </tr>
      <tr>
        <div>
          <td><label for="lieu">Lieu :</label></td>
          <td><input name="lieu" id="lieu" value="<?php echo $laSoiree->getLieu(); ?>"/></td>
        </div>
      </tr>
      <tr>
        <div>
          <td><label for="description">Description :</label></td>
          <td><input name="description" id="description" value="<?php echo $laSoiree->getDescription(); ?>"/></td>
        </div>
      </tr>
      <tr>
        <div>
          <td><label for="nbPlaces">Nombre de places :</label></td>
          <td><input name="nbPlaces" id="nbPlaces" value="<?php echo $laSoiree->getNbPlaces(); ?>"/></td>
        </div>
      </tr>
      <tr>
        <div>
          <td><label for="prix">Prix :</label></td>
          <td><input name="prix" id="prix" value="<?php echo $laSoiree->getPrix(); ?>"/></td>
        </div>
        </tr>
      <tr>
        <div>
          <td><label for="heureDebut">Heure de début : </label></td>
          <td><input name="heureDebut" id="heureDebut" value="<?php echo $laSoiree->getHeureDebut(); ?>"></td>
        </div>
      </tr>
  </table>
        <div>
          <button>Modifier</button>
        </div>
      </form>
</div>