<br><br><br><br><br><br><br><br>
<style>
    * {text-align: center; overflow-y: auto;}
    label, input { font-size: 18px; color: #000; }
</style>
<form action='/index2.php?controleur=soiree&action=soireeAjoutee' method="POST">
  <div>
    <label for="nom">Nom :</label>
    <input name="nom" id="nom" >
  </div>
  <div>
    <?php
    $today = date('Y-m-d'); 
    $nextYear = date('Y-m-d', strtotime('+1 year'));
    ?>
    <label for="Calendar">Date :</label>
    <input type="date" name="date" value="<?php echo $today; ?>" min="<?php echo $today; ?>" max="<?php echo $nextYear; ?>" />
  </div>
  <div>
    <label for="lieu">Lieu :</label>
    <input name="lieu" id="lieu">
  </div>
  <div>
    <label for="description">Description :</label>
    <input name="description" id="description" >
  </div>
  <div>
    <label for="nbPlaces">Nombre de places :</label>
    <input name="nbPlaces" id="nbPlaces">
  </div>
  <div>
    <label for="prix">Prix :</label>
    <input name="prix" id="prix">
  </div>
  <div>
  <label for="heureDebut">Heure de début : </label>
  <input name="heureDebut" id="heureDebut">
  </div>
  <div>
    <button>Ajouter la soirée </button>
  </div>
</form>