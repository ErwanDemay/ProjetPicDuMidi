<link rel="stylesheet" href="css/formulaires.css">

<div class="formulaire">
  <h2>Modification d'un matériel :</h2>
  <table>
      <form action='/index.php?controleur=incident&action=incidentModifiee' method="POST">
          <input type="hidden" name="id" id="id" value='<?php echo $leIncident->getId(); ?>'/>
      <tr>
        <div>
          <label for="nom">Nom :</label>
          <input name="nom" id="nom" value="<?php echo $leIncident->getNom(); ?>"/>
        </div>
      </tr>
      <tr>
        <div>
          <label for="etat">État :</label>
          <input name="etat" id="etat" value="<?php echo $leIncident->getEtat(); ?>"/>
        </div>
      </tr>
  </table>
        <div>
          <button>Modifier</button>
        </div>
      </form>
</div>