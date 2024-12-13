<link rel="stylesheet" href="css/consultation.css">

<div class="consultation">
<table id="description">
<a href="index.php?controleur=soiree&action=ajouterSoiree" class="bouton">
    <i class="bi bi-plus-circle"></i> Créer une soirée
</a>

<h2>Voici la liste des soirées enregistrées : </h2>
<table>
    <tr> <th>Nom</th> <th>Date</th> <th>Lieu</th> <th>Description</th> <th>Nombre de places</th> <th>Nombre de places restantes</th> <th>Prix</th> <th>Heure de début</th> <th>Supprimer</th> <th>Modifier</th></tr>
	<?php

        if($lesSoirees == null){
            echo "<h3>Aucune soirée à venir</h3>";
        }else{

            foreach ($lesSoirees as $Soiree) {

                
                        //Affichage des informations de la soirées
                        echo        "<tr>".
                                    "<td><p>".$Soiree->getNom()."</p></td>".
                                    "<td><p>".$Soiree->getDate()."</p></td>".
                                    "<td><p>".$Soiree->getLieu()."</p></td>".
                                    "<td><p>".$Soiree->getDescription()."</p></td>".
                                    "<td><p>".$Soiree->getNbPlaces()."</p></td>".
                                    "<td><p>".$connexionBD->getNbPlacesRestantes($Soiree)."</p></td>".
                                    "<td><p>".$Soiree->getPrix()."</p></td>".
                                    "<td><p>".$Soiree->getHeureDebut()."</p></td>";

                                    

                        echo "<td><button><a href='index.php?controleur=soiree&action=supprimerSoiree&id=".$Soiree->getId()."'><img src='Images/supprimer.png' width='25px' height='25px'></a></button></td>";
                        echo "<td><button><a href='index.php?controleur=soiree&action=modifierSoiree&id=".$Soiree->getId()."'><img src='Images/modifier.png' width='25px' height='25px'></a></button></td>";
                        //Pas d'envoi d'autre infos que l'id, on récupèrera tout dans le formulaire de modification
                        echo "</tr>";
                        //Ligne et alinéas pour séparer les soirées
                        //echo "<br><br> ------------------------------------ <br><br>";
            }
        }
	?>
</table>
</table>
</div>
</div>