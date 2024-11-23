<br><br><br><br><br><br><br><br>
<style>
    /* define styles here */
    * {text-align: center; overflow-y: auto;}
    p { font-size: 18px; color: #000; }
    h2 { font-size: 36px; color: #00698f; }
    .consultation{height: 100%;}

    .bouton {
	background:linear-gradient(to bottom, #4d4d4d 5%, #000000 100%);
	background-color:#4d4d4d;
	border-radius:28px;
	border:1px solid #000000;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:17px;
	padding:16px 31px;
	text-decoration:none;
	text-shadow:0px 1px 0px #2f6627;
}
    .bouton:hover {
        background:linear-gradient(to bottom, #000000 5%, #4d4d4d 100%);
        background-color:#000000;
    }
    .bouton:active {
        position:relative;
        top:1px;
    }
</style>
<div class="consultation">
<div id="description">
<a href="index2.php?controleur=materiel&action=ajouterMateriel" class="bouton">
    <i class="bi bi-plus-circle"></i> Créer un matériel</a>

<h2>Voici la liste des matériels enregistrées : </h2>
<table>
    <tr> <th>Nom</th> <th>État</th> <th>Suppimer</th> <th>Modifier</th></tr>
	<?php
		foreach ($lesMateriels as $Materiel) {
            
                    //Affichage des informations de la soirées
                    echo        "<tr>".
                                "<td><p>Nom : ".$Materiel->getNom()."</p></td>".
                                "<td><p>État : ".$Materiel->getEtat()."</p></td>";

                    echo "<td><button><a href='index2.php?controleur=materiel&action=supprimerMateriel&id=".$Materiel->getId()."'><img src='Images/supprimer.png' width='25px' height='25px'></a></button></td>";
                    echo "<td><button><a href='index2.php?controleur=materiel&action=modifierMateriel&id=".$Materiel->getId()."'><img src='Images/modifier.png' width='25px' height='25px'></a></button></td>";
                    //Pas d'envoi d'autre infos que l'id, on récupèrera tout dans le formulaire de modification

                    //Alinéas pour séparer les soirées
                    echo "</tr>";
        }
	?>
</table>
    <br><br><br><br><br><br>

</div>
</div>