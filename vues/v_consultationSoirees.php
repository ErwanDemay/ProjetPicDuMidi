<div id="description">
<h2> Les soirées enregistrées sont : </h2>
	<?php
		foreach ($lesSoirees as $Soiree) {
                    //Affichage des informations de la soirées
                    echo        "<p>Nom : ".$Soiree->getNom()."</p>".
                                "<p>Date : ".$Soiree->getDate()."</p>".
                                "<p>Lieu : ".$Soiree->getLieu()."</p>".
                                "<p>Description : ".$Soiree->getDescription()."</p>".
                                "<p>Nombre de places : ".$Soiree->getNbPlaces()."</p>";

                    echo "<button><a href='index.php?controleur=soiree&action=supprimerSoiree&id=".$Soiree->getId()."'><img src='Images/supprimer.png' width='25px' height='25px'></a></button>";
                    echo "<button><a href='index.php?controleur=soiree&action=modifierSoiree&id=".$Soiree->getId()."'><img src='Images/modifier.png' width='25px' height='25px'></a></button>";
                    //Pas d'envoi d'autre infos que l'id, on récupèrera tout dans le formulaire de modification

                    //Ligne et alinéas pour séparer les soirées
                    echo "<br><br> ------------------------------------ <br><br>";
        }
	?>
</div><img src="" alt="">