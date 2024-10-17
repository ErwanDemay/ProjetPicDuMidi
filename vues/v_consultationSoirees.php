<div id="description">
<h2> Les soirées enregistrées sont : </h2>
	<?php
		foreach ($lesSoirees as $Soiree) {
			echo $Soiree->getNom()."<br />";
                    echo "<button><a href='index.php?CONTROLEURetACTION&id=".$Soiree->getId()."'>Supprimer</a></button>";
                    echo "<button><a href='index.php?CONTROLEURetACTION&id=".$Soiree->getId()"'>Modifier</a></button>";
                    //Pas d'envoi d'autre infos que l'id, on récupèrera tout dans le formulaire de modification
                    echo "<br><br>";
        }
	?>
</div>