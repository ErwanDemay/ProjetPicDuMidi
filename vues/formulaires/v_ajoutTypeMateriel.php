<link rel="stylesheet" href="css/formulaires.css">

<div class="formulaire">
  <h2>Ajout d'un nouveau type de matériel :</h2>
  <table>
    <form action='/index.php?controleur=typeMateriel&action=TypeMaterielAjoutee' method="POST">
      <tr>
        <div>
          <td><label for="nom_typeMateriel">Nom : </label></td>
          <td><input name="nom" id="nom_typeMateriel" required ></td>
        </div>
      </tr>
      <tr>
      </tr>
  </table>
        <div>
          <button>Ajouter le type de matériel  </button>
        </div>
    </form>
</div>
