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
    th {color:black;}
</style>
<div class="consultation">
<table id="description">
<a href="index2.php?controleur=soiree&action=ajouterSoiree" class="bouton">
    <i class="bi bi-plus-circle"></i> Créer une soirée
</a>

<h2>Voici la liste des soirées enregistrées : </h2>
<table>
    <tr> <th>Nom</th> <th>Date</th> <th>Lieu</th> <th>Description</th> <th>Nombre de places</th> <th>Nombre de places restantes</th> <th>Prix</th> <th>Heure de début</th> <th>Supprimer</th> <th>Modifier</th></tr>
	<?php
		foreach ($lesSoirees as $Soiree) {

            $date_bdd = $Soiree->getDate(); // Format AAAA-MM-JJ
            $date_affichage = DateTime::createFromFormat('Y-m-d', $date_bdd)->format('d-m-Y'); // Format JJ-MM-AAAA
            
                    //Affichage des informations de la soirées
                    echo        "<tr>".
                                "<td><p>".$Soiree->getNom()."</p></td>".
                                "<td><p>".$date_affichage."</p></td>".
                                "<td><p>".$Soiree->getLieu()."</p></td>".
                                "<td><p>".$Soiree->getDescription()."</p></td>".
                                "<td><p>".$Soiree->getNbPlaces()."</p></td>".
                                "<td><p>".$connexionBD->getNbPlacesRestantes($Soiree)."</p></td>".
                                "<td><p>".$Soiree->getPrix()."</p></td>".
                                "<td><p>".$Soiree->getHeureDebut()."</p></td>";

                                

                    echo "<td><button><a href='index2.php?controleur=soiree&action=supprimerSoiree&id=".$Soiree->getId()."'><img src='Images/supprimer.png' width='25px' height='25px'></a></button></td>";
                    echo "<td><button><a href='index2.php?controleur=soiree&action=modifierSoiree&id=".$Soiree->getId()."'><img src='Images/modifier.png' width='25px' height='25px'></a></button></td>";
                    //Pas d'envoi d'autre infos que l'id, on récupèrera tout dans le formulaire de modification
                    echo "</tr>";
                    //Ligne et alinéas pour séparer les soirées
                    //echo "<br><br> ------------------------------------ <br><br>";
        }
	?>
</table>
    <br><br><br><br><br><br>
    </table>
</div>
</div>