<br><br><br><br><br><br><br><br>
<style>
    /* define styles here */
    * {text-align: center; overflow-y: auto;}
    p { font-size: 18px; color: #000; }
    h2 { font-size: 36px; color: #00698f; }
    .consultation{height: 100%;}
</style>
<div class="consultation">
<div id="description">

<h2>Voici la liste des prochaines soirées : </h2>
	<?php
		foreach ($lesSoirees as $Soiree) {
            
                    //Affichage des informations de la soirées
                    echo        "<p>Nom : ".$Soiree->getNom()."</p>".
                                "<p>Date : ".$Soiree->getDate()."</p>".
                                "<p>Lieu : ".$Soiree->getLieu()."</p>".
                                "<p>Description : ".$Soiree->getDescription()."</p>".
                                "<p>Nombre de places : ".$Soiree->getNbPlaces()."</p>";

                    //Ligne et alinéas pour séparer les soirées
                    echo " <p>------------------------------------</p> ";
        }
	?>
</div>
</div>