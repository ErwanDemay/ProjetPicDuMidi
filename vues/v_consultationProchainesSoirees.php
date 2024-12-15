<link rel="stylesheet" href="css/consultation.css">

<div class="consultation">
<h2>Voici la liste des prochaines soirées : </h2>
<table>
    <thead>
    <tr> <th>Nom</th> <th>Date</th> <th>Lieu</th> <th>Description</th> <th>Nombre de places</th> <th>Nombre de places restantes</th> <th>Prix</th> <th>Heure de début</th> 
    
    <?php
    if(isset($_SESSION['utilisateurConnecte'])){ //Si personne n'est connecté, la colonne réserver ne s'affiche pas
        echo "<th>Réserver</th>";
    }
    ?>

    </tr>

    </thead>
    <tbody>
	<?php

        if($lesSoirees == null){
            echo "<h3>Aucune soirée à venir</h3>";
        }else{

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
                                        "<td><p>".$Soiree->getHeureDebut()."</p></td>".
                                        "<td><p>".$Soiree->getPrix()."</p></td>";
                        if(isset($_SESSION['utilisateurConnecte'])){ //Si personne n'est connecté, le bouton réserver ne s'affiche pas            
                            echo        "<td><a href='index.php?controleur=soiree&action=reserverSoiree&id=".$Soiree->getId()."'><button class='boutons'>Réserver</button></a></td>";
                        }
                        echo        "</tr>";

            }
        }
	?>
    </tbody>
    </table>
</div>