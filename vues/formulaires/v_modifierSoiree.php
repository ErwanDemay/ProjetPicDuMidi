<form action='/index.php?controleur=competences&action=competenceModifiee' method="POST">
  <div>
    <input type="hidden" name="id" id="id" value=' "<?php echo $laSoiree->getId(); ?>" '/>
  </div>
  <div>
    <label for="nom">Nom :</label>
    <input name="nom" id="nom" value="<?php echo $laSoiree->getNom(); ?>"/>
  </div>
  <div>
    <label for="date">Date :</label>
    <input name="date" id="date" value="<?php echo $laSoiree->getDate(); ?>"/>
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
  <div>
    <button>Modifier</button>
  </div>
</form>