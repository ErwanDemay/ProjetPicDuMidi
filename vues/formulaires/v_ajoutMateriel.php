<br><br><br><br><br><br><br><br>
<style>
    * {text-align: center; overflow-y: auto;}
    label, input { font-size: 18px; color: #000; }
</style>
<form action='/index2.php?controleur=materiel&action=materielAjoutee' method="POST">
  <div>
    <label for="nom">Nom :</label>
    <input name="nom" id="nom" >
  </div>
  <div>
    <label for="etat">État :</label>
    <input name="etat" id="etat">
  </div>
  <div>
    <button>Ajouter la soirée </button>
  </div>
</form>