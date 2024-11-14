<form action='/index.php?controleur=soiree&action=soireeAjoutee' method="POST">
  <div>
    <label for="nom">Nom :</label>
    <input name="nom" id="nom" >
  </div>
  <div>
    <label for="date">Date :</label>
    <input name="date" id="date">
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
    <button>Ajouter la soirée </button>
  </div>
</form>