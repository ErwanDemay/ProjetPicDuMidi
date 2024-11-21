<br><br><br><br><br><br><br><br>
<style>
    * {text-align: center; overflow-y: auto;}
    label, input { font-size: 18px; color: #000; }
</style>

<form action='/index2.php?controleur=soiree&action=soireeModifiee' method="POST">
  <div>
    <input type="hidden" name="id" id="id" value=' "<?php echo $laSoiree->getId(); ?>" '/>
  </div>
  <div>
    <label for="nom">Nom :</label>
    <input name="nom" id="nom" value="<?php echo $laSoiree->getNom(); ?>"/>
  </div>
  <div>
  <?php
    $today = date('Y-m-d'); 
    $nextYear = date('Y-m-d', strtotime('+1 year'));
    ?>
    <label for="Calendar">Date :</label>
    <input type="date" name="date" value="<?php echo $laSoiree->getDate(); ?>" min="<?php echo $today; ?>" max="<?php echo $nextYear; ?>" />
  </div>
  <div>
    <label for="lieu">Lieu :</label>
    <input name="lieu" id="lieu" value="<?php echo $laSoiree->getLieu(); ?>"/>
  </div>
  <div>
    <label for="description">Description :</label>
    <input name="description" id="description" value="<?php echo $laSoiree->getDescription(); ?>"/>
  </div>
  <div>
    <label for="nbPlaces">Nombre de places :</label>
    <input name="nbPlaces" id="nbPlaces" value="<?php echo $laSoiree->getNbPlaces(); ?>"/>
  </div>
  iv>
    <label for="prix">Prix :</label>
    <input type="prix" id="prix" value="<?php echo $laSoriee->getPrix();?>"/>
  </div>
  <div>
    <label for="date_debut">Date de début : </label>
    <input type="date" id="date_debut" value="<?php echo $laSoiree->getDateDebut();?>">
  </div>
  <div>
    <button>Modifier</button>
  </div>
</form>