<br><br><br><br><br><br><br><br>
<style>
    * {text-align: center; overflow-y: auto;}
    label, input { font-size: 18px; color: #000; }
</style>

<form action='/index.php?controleur=materiel&action=materielModifiee' method="POST">
  <div>
    <input type="hidden" name="id" id="id" value=' "<?php echo $leMateriel->getId(); ?>" '/>
  </div>
  <div>
    <label for="nom">Nom :</label>
    <input name="nom" id="nom" value="<?php echo $leMateriel->getNom(); ?>"/>
  </div>
  <div>
    <label for="etat">État :</label>
    <input name="etat" id="etat" value="<?php echo $leMateriel->getEtat(); ?>"/>
  </div>
  <div>
    <button>Modifier</button>
  </div>
</form>