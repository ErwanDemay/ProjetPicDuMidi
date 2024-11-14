<br><br><br><br><br><br><br><br>
<style>
    /* define styles here */
    * {text-align: center; overflow-y: auto;}
    p { font-size: 18px; color: #000; }
    h2 { font-size: 36px; color: #00698f; }
    .consultation{height: 100%;}

    .myButton {
	background:linear-gradient(to bottom, #4d4d4d 5%, #000000 100%);
	background-color:#4d4d4d;
	border-radius:28px;
	border:1px solid #000000;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:17px;
	padding:16px 31px;
	text-decoration:none;
	text-shadow:0px 1px 0px #2f6627;
}
.myButton:hover {
	background:linear-gradient(to bottom, #000000 5%, #4d4d4d 100%);
	background-color:#000000;
}
.myButton:active {
	position:relative;
	top:1px;
}
</style>
<div class="consultation">
<div id="description">
<a href="index.php?controleur=soiree&action=ajouterSoiree" class="myButton">
    <i class="bi bi-plus-circle"></i> Créer une soirée
</a>

<h2>Voici la liste des soirées enregistrées : </h2>
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
</div>
</div>