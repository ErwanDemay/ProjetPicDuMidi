<br><br><br><br><br><br><br><br>
<style>
    /* define styles here */
    * {text-align: center; overflow-y: auto;}
    p { font-size: 18px; color: #000; }
    h2 { font-size: 36px; color: #00698f; }
    .consultation{height: 100%;}
    th {color:black;}
</style>
<div class="consultation">
<div id="description">

<h2>Voici la liste des prochaines soirées : </h2>
<table>
    <tr> <th>Nom</th> <th>Date</th> <th>Lieu</th> <th>Description</th> <th>Nombre de places</th> <th>Nombre de places restantes</th> <th>Prix</th> <th>Heure de début</th></tr>
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

        }
	?>
    </table>
</div>
</div>