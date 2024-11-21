
<!DOCTYPE html>
<html lang="fr">

<script src="script.js"></script>
<link href="CSS" rel="stylesheet"/>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Le Pic du Midi</title>
    
</head>
<body>

<div class="navbar">
    <img src="./Images/PicduMidiLogo.webp" alt="Logo du Pic du Midi" class="logo">
    
    <div class="nav-buttons">
        <a class="nav-button" href="./index2.php?controleur=soiree">Gérer soirée</a>
        <button class="nav-button">Prochaine soirée</button>
        <button class="nav-button">Retour à l'acceuil</button>
        <button class="nav-button">À propos</button>
    </div>
</div>


<?php
            if (isset($_GET['controleur']))
				$controleur=filter_var($_GET['controleur'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
			else
				$controleur= "general";
                    
            switch ($controleur){
                    case 'soiree' : 
                            include("./controleurs/controleurSoirees.php"); 
                            break;
              }
              
?>


<div class="content">
    <h1>LE PIC DU MIDI 2877M</h1>
    <h2>Le Balcon des Pyrénées</h2>
    <p>Venez vivre un moment hors du temps en contemplant la vue à couper le souffle qui s'offre à vous.</p>

    <div class="button-container">
        <button class="button">
            <div class="button-text">
                <span>Visite Journée Hiver</span>
                <span class="button-price">Dès 34€</span>
            </div>
        </button>
        <button class="button">
            <div class="button-text">
                <span>Bons cadeaux</span>
                <span class="button-price">Dès 41€</span>
            </div>
        </button>
        <button class="button">
            <div class="button-text">
                <span>Pass Ski Freeride</span>
                <span class="button-price">Dès 48€</span>
            </div>
        </button>
    </div>

    <div class="footer">
        OUVERT de 9h à 17h30 (dernière montée à 16h)
    </div>
</div>





<script>

    const images = [
        'url("./Images/PicduMidi3.webp")',
        'url("./Images/PicduMidi6.png")',
        'url("./Images/PicduMidi45.png")'
    ];

    let currentImageIndex = 0;

    function changeBackgroundImage() {
        document.body.style.backgroundImage = images[currentImageIndex];
        currentImageIndex = (currentImageIndex + 1) % images.length;
    }

    changeBackgroundImage();
    setInterval(changeBackgroundImage, 5000);

</script>
</body>
</html>
