<div id="description">
<h2> Les soirées enregistrées sont : </h2>
	<?php
		foreach ($lesSoirees as $Soiree) {
	            echo $Soiree->getNom()." ";
                    //echo "<button><a href='index.php?controleur='soiree'&action='supprimerSoiree'&id=".$Soiree->getId()."'>Supprimer</a></button> ";
                    echo "<button><a href='index.php?controleur='soiree'&action='supprimerSoiree'&id=".$Soiree->getId()."'><img src='../images/supprimer.png'></a></button>";
                    echo "<button><a href='index.php?controleur=soiree&action=modifierSoiree&id=".$Soiree->getId()."'><img src='../images/modifier.png'></a></button>";
                    //echo "<button><a href='index.php?controleur=soiree&action=modifierSoiree&id=".$Soiree->getId()."'>Modifier</a></button>";
                    //Pas d'envoi d'autre infos que l'id, on récupèrera tout dans le formulaire de modification
                    echo "<br><br>";
        }
	?>
</div><img src="" alt="">