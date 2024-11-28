<link rel="stylesheet" href="css/consultation.css">

<div class="consultation">
<div id="description">
<a href="index.php?controleur=typeMateriel&action=ajouterTypeMateriel" class="bouton">
    <i class="bi bi-plus-circle"></i> Créer un type de matériel</a>

<h2>Voici la liste des types de matériels </h2>
<table style="justify-content:center;">
    <tr> <th>Nom</th> <th>Suppimer</th></tr>
	<?php
		foreach ($lesTypesMateriels as $leTypeMateriel) {
                    echo        "<tr>".
                                "<td><p>".$leTypeMateriel->getNom()."</p></td>";
                                
                   echo "<td><button><a href='index.php?controleur=typeMateriel&action=supprimerTypeMateriel&id=".$leTypeMateriel->getId()."'><img src='Images/supprimer.png' width='25px' height='25px'></a></button></td>";                    
                    echo "</tr>";
        }
	?>
</table>
</div>
</div>  