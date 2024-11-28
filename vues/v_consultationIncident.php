<link rel="stylesheet" href="css/consultation.css">

<div class="consultation">
<div id="description">
<a href="index.php?controleur=incident&action=ajouterIncident" class="bouton">
    <i class="bi bi-plus-circle"></i> Créer un matériel</a>

<h2>Voici la liste des matériels : </h2>
<table style="justify-content:center;">
    <tr> <th>Nom</th> <th>État</th> <th>Suppimer</th> <th>Modifier</th></tr>
	<?php
		foreach ($lesIncidents as $Incident) {
            
                    //Affichage des informations de la soirées
                    echo        "<tr>".
                                "<td><p>".$Incident->getNom()."</p></td>".
                                "<td><p> ".$Incident->getEtat()."</p></td>";

                    echo "<td><button><a href='index.php?controleur=incident&action=supprimerIncident&id=".$Incident->getId()."'><img src='Images/supprimer.png' width='25px' height='25px'></a></button></td>";
                    echo "<td><button><a href='index.php?controleur=incident&action=modifierIncident&id=".$Incident->getId()."'><img src='Images/modifier.png' width='25px' height='25px'></a></button></td>";
                    //Pas d'envoi d'autre infos que l'id, on récupèrera tout dans le formulaire de modification

                    //Alinéas pour séparer les soirées
                    echo "</tr>";
        }
	?>
</table>
</div>
</div>