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
            
        // Récupération et transformation de la date
        $date_bdd = $Soiree->getDate(); // Format AAAA-MM-JJ
        $date_affichage = DateTime::createFromFormat('Y-m-d', $date_bdd)->format('d-m-Y'); // Format JJ-MM-AAAA

                    //Affichage des informations de la soirées
                    echo        "<p>Nom : ".$Soiree->getNom()."</p>".
                                "<p>Date : ".$date_affichage."</p>".
                                "<p>Lieu : ".$Soiree->getLieu()."</p>".
                                "<p>Description : ".$Soiree->getDescription()."</p>".
                                "<p>Nombre de places restantes : ".$connexionBD->getNbPlacesRestantes($Soiree)."</p>".
                                "<p>Prix : ".$Soiree->getPrix()."</p>".
                                "<p>Date de début : ".$Soiree->getDateDebut()."</p>";

                    //Ligne et alinéas pour séparer les soirées
                    echo " <p>------------------------------------</p> ";
        }
	?>
</div>
</div>