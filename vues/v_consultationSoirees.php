<div id="description">
<a href="index.php?controleur=soiree&action=ajouterSoiree" class="btn btn-success btn-lg rounded-pill shadow">
    <i class="bi bi-plus-circle"></i> Créer une soirée
</a>

<h2>Voici la liste des soirées enregistrées : </h2>
	<?php
		foreach ($lesSoirees as $Soiree) {
	            echo $Soiree->getNom()." ";
                    //echo "<button><a href='index.php?controleur='soiree'&action='supprimerSoiree'&id=".$Soiree->getId()."'>Supprimer</a></button> ";
                    echo "<button><a href='index.php?controleur=soiree&action=supprimerSoiree&id=".$Soiree->getId()."'><img src='Images/supprimer.png' width='25px' height='25px'></a></button>";
                    echo "<button><a href='index.php?controleur=soiree&action=modifierSoiree&id=".$Soiree->getId()."'><img src='Images/modifier.png' width='25px' height='25px'></a></button>";
                    //echo "<button><a href='index.php?controleur=soiree&action=modifierSoiree&id=".$Soiree->getId()."'>Modifier</a></button>";
                    //Pas d'envoi d'autre infos que l'id, on récupèrera tout dans le formulaire de modification
                    echo "<br><br>";
        }
	?>
</div><img src="" alt="">