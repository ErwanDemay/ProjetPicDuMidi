<link rel="stylesheet" href="css/consultation.css">

<div class="consultation">
  <div class="tableau_header">
    <!-- Bouton pour ajouter une soirée -->
    <a href="index.php?controleur=soiree&action=ajouterSoiree" class="bouton">
      <i class="bi bi-plus-circle"></i> Créer une soirée
    </a>
    <!-- Titre -->
    <h2>Voici la liste des soirées enregistrées :</h2>
  </div>

  <!-- Conteneur scrollable -->
  <div class="tableau_scroll">
    <table>
      <thead>
        <tr>
          <th>Nom</th>
          <th>Date</th>
          <th>Lieu</th>
          <th>Description</th>
          <th>Nombre de places</th>
          <th>Nombre de places restantes</th>
          <th>Prix</th>
          <th>Heure de début</th>
          <th>Supprimer</th>
          <th>Modifier</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($lesSoirees as $Soiree) {
          echo "<tr>" .
            "<td><p>" . $Soiree->getNom() . "</p></td>" .
            "<td><p>" . $Soiree->getDate() . "</p></td>" .
            "<td><p>" . $Soiree->getLieu() . "</p></td>" .
            "<td><p>" . $Soiree->getDescription() . "</p></td>" .
            "<td><p>" . $Soiree->getNbPlaces() . "</p></td>" .
            "<td><p>" . $connexionBD->getNbPlacesRestantes($Soiree) . "</p></td>" .
            "<td><p>" . $Soiree->getPrix() . "</p></td>" .
            "<td><p>" . $Soiree->getHeureDebut() . "</p></td>" .
            "<td><button><a href='index.php?controleur=soiree&action=supprimerSoiree&id=" . $Soiree->getId() . "'><img src='Images/supprimer.png' width='25px' height='25px'></a></button></td>" .
            "<td><button><a href='index.php?controleur=soiree&action=modifierSoiree&id=" . $Soiree->getId() . "'><img src='Images/modifier.png' width='25px' height='25px'></a></button></td>" .
            "</tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
</div>
