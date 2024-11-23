<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pic du Mid</title>
  <link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body>

  <nav>

    <li class="liPrincipale">
      <input type="checkbox" id="check">
      <label for="check" class="checkbtn">
        <!--<i class="fas fa-bars"></i> element for the hamburger icon-->
        <p id="btnGestion">Gestion ⯆ </p>
      </label>
      <div class="navMobile">
        <a class="navButton">Soirées</a>
        <a class="navButton">Matériels</a>
      </div>
    </li>

    <li class="liPrincipale"><a class="navButton" href="./index2.php?controleur=soiree">Gérer soirée</a></li>
    <li class="liPrincipale"><a class="navButton" href="./index2.php?controleur=materiel">Gérer matériels</a></li>
    <li class="liPrincipale"><a class="navButton" href="./index2.php?controleur=soiree&action=prochainesSoirees">Prochaines soirées</a></li>
    <li class="liPrincipale"><a class="navButton" href="./index2.php">Accueil</a></li>
  
  </nav>


  <div id="txtAccueil">
    <h1>LE PIC DU MIDI 2877M</h1>
    <h2>Le Balcon des Pyrénées</h2>
    <br>
    <p class="pAccueil">Venez vivre un moment hors du temps en contemplant la vue à couper le souffle qui s'offre à vous. Bienvenue au Pic du Midi…</p>
    <br>
    <button class="buttonBilleterie">Billeterie</button>
  </div>

</body>
</html>