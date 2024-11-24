<link rel="stylesheet" href="css/formulaires.css">

<div class="formulaire">
  <h2>Informations de la nouvelle soirée :</h2>
  <table>
    <form action='/index.php?controleur=soiree&action=soireeAjoutee' method="POST">
        <tr>
          <td><label for="nom">Nom :</label></td>
          <td><input name="nom" id="nom"></td>
        </tr>
        <tr>
          <td>
            <?php
            $today = date('Y-m-d'); 
            $nextYear = date('Y-m-d', strtotime('+1 year'));
            ?>
            <label for="Calendar">Date :</label></td>
            <td><input type="date" name="date" value="<?php echo $today; ?>"/></td>
        </tr>
        <tr>
            <td><label for="lieu">Lieu :</label></td>
            <td><input name="lieu" id="lieu"></td>
        </tr>
        <tr>
            <td><label for="description">Description :</label></td>
            <td><input name="description" id="description" ></td>
        </tr>
        <tr>
            <td><label for="nbPlaces">Nombre de places :</label></td>
            <td><input name="nbPlaces" id="nbPlaces"></td>
        </tr>
        <tr>
            <td><label for="prix">Prix :</label></td>
            <td><input name="prix" id="prix"></td>
        </tr>
        <tr>
            <td><label for="heureDebut">Heure de début : </label></td>
            <td><input name="heureDebut" id="heureDebut"></td>
        </tr>
  </table>
        <div>
          <button class="bouton">Ajouter la soirée </button>
        </div>
    </form>
</div>