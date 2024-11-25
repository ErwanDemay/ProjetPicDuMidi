<link rel="stylesheet" href="css/consultation.css">

<div class="consultation">
<div id="description">
<a href="index.php?controleur=materiel&action=ajouterMateriel" class="bouton">
    <i class="bi bi-plus-circle"></i> Créer un utilisateur</a>

<h2>Voici la liste des utilisateurs : </h2>
<table style="justify-content:center;">
    <tr> <th>Id</th> <th>Nom</th> <th>Prenom</th> <th>Email</th> <th>Habilitation</th> </tr>
	<?php
		foreach ($lesUtilisateurs as $Utilisateur) {
            
                    //Affichage des informations de la soirées
                    echo        "<tr>".
                                "<td><p>".$Utilisateur->getId()."</p></td>".
                                "<td><p> ".$Utilisateur->getNom()."</p></td>".
                                "<td><p>".$Utilisateur->getPrenom()."</p></td>".
                                "<td><p>".$Utilisateur->getEmail()."</p></td>".
                                "<td><p>".$Utilisateur->getHabilitation()."</p></td>";

                    echo "<td><button><a href='index.php?controleur=utilisateurs&action=modifierUtilisateurGestionnaire&id=".$Utilisateur->getId()."'><img src='Images/modifier.png' width='25px' height='25px'></a></button></td>";
                    echo "<td><button><a href='index.php?controleur=utilisateurs&action=supprimerUtilisateurGestionnaire&id=".$Utilisateur->getId()."'><img src='Images/supprimer.png' width='25px' height='25px'></a></button></td>";
                    //Pas d'envoi d'autre infos que l'id, on récupèrera tout dans le formulaire de modification

                    //Alinéas pour séparer les soirées
                    echo "</tr>";
        }
	?>
</table>
</div>
</div>