<link rel="stylesheet" href="css/formulaires.css">

<div class="formulaire">
  <h2>Ajout d'un nouveau matériel :</h2>
  <table>
    <form action='/index.php?controleur=materiel&action=materielAjoutee' method="POST">
      <tr>
        <div>
          <td><label for="nom">Nom :</label></td>
          <td><input name="nom" id="nom" ></td>
        </div>
      </tr>
      <tr>
        <div>
          <td><label for="etat">État :</label></td>
          <td><input name="etat" id="etat"></td>
        </div>
      </tr>
  </table>
        <div>
          <button>Ajouter la soirée </button>
        </div>
    </form>
</div>