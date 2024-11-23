<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pic du Midi</title>
  <link rel="stylesheet" href="css/index.css">
</head>
<body>

<div id="ombre">
<div class="diaporama">
  <div class="diaporamaContenu">
    <img class="diapo" src="../Images/PicduMidi1.png" alt="Image 1">
    <img class="diapo" src="../Images/PicduMidi2.png" alt="Image 2">
    <img class="diapo" src="../Images/PicduMidi3.png" alt="Image 3">
  </div>
</div>

  <nav>
    <ul>
      <li><a class="navBoutton" href="./index2.php">Accueil</a></li>
      <li><a class="navBoutton" href="./index2.php?controleur=soiree&action=prochainesSoirees">Prochaines soirées</a></li>
      <li class="sousMenu">
        <a class="navBoutton" href="#">Gestion</a>
        <ul class="sousMenuUl">
          <li><a class="" href="./index2.php?controleur=soiree">Soirées</a></li>
          <li><a class="" href="./index2.php?controleur=materiel">Matériels</a></li>
        </ul>
      </li>
    </ul>
  </nav>

  <div id="contenuIndex">
  <div id="txtAccueil">
    <h1>LE PIC DU MIDI 2877M</h1>
    <h2>Le Balcon des Pyrénées</h2>
    <p class="pAccueil">Venez vivre un moment hors du temps en contemplant la vue à couper le souffle qui s'offre à vous. Bienvenue au Pic du Midi…</p>
    <br>
    <button id="buttonBilleterie">Billeterie</button>
  </div>
</div>
</div>

</body>
</html>
