<link rel="stylesheet" href="css/consultation.css">

<div class="consultation">
<table id="description">
<a href="index.php?controleur=soiree&action=ajouterSoiree" class="bouton">
    <i class="bi bi-plus-circle"></i> Créer une soirée
</a>

<h2>Voici la liste des parkings : </h2>
<table>
    <tr> <th>id</th> <th>Places à mobi réduites</th> <th>Places Classiques</th> <th>nombre de places</th></tr>
	<?php
		foreach ($lesParkings as $Parking) {

            //Je laisse ça au cas où mais ça empêchait d'afficher si la date était null (grosse erreur pas belle), à la place dans le tableau j'ai juste appelé getDate()
            /*$date_bdd = $Soiree->getDate(); // Format AAAA-MM-JJ
            $date_affichage = DateTime::createFromFormat('Y-m-d', $date_bdd)->format('d-m-Y');*/ // Format JJ-MM-AAAA

                    //Affichage des informations de la soirées
                    echo        "<tr>".
                                "<td><p>".$Parking->getId()."</p></td>".
                                "<td><p>".$Parking->getPlaceMBR()."</p></td>".
                                "<td><p>".$Parking->getPlaceC()."</p></td>".
                                "<td><p>".$Parking->getNbPlaces()."</p></td>";
                                

                                

                    
        }
	?>
</table>
</table>
</div>
</div>