<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<div id="description">
<h2> Les soirées enregistrées sont : </h2>
	<?php
                    echo "<a href='index.php?controleur=&action=ajouterSoiree' style='text-decoration:none; color: inherit;'>Ajouter une soirée: <i class='fas fa-plus'></i></a><br/><br/>";
                    
foreach ($lesSoirees as $Soiree) {
	            echo $Soiree->getNom()." ";
                    echo "<a href='index.php?controleur=&action=supprimerSoiree&id=".$Soiree->getId()."' style='text-decoration:none; color: inherit;'><i class='fas fa-trash'></i></a> ";
                    echo "<a href='index.php?controleur=&action=modifierSoiree&id=".$Soiree->getId()."' style='text-decoration:none; color: inherit;'><i class='fas fa-paint-brush'></i></a>";
                    //Pas d'envoi d'autre infos que l'id, on récupèrera tout dans le formulaire de modification
                    echo "<br><br>";
        }
	?>
</div>