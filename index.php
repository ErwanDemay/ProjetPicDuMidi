<?php
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Pic du midi application</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="./main.css" rel="stylesheet"/>
    
</head>
<body>
<!--Création de colonne-->
 <main class="text-center border border-primary   " >

   <div class="row align-items-stretch "> 

   <div class="col-12 p_colonne_gauche "> <!-- Colonne principale  -->
   
   <div id="ImagePic">
   <img src="./Image/PicduMidi.png" class="rounded-circle mx-auto d-block" width="20%" alt="image Pic">
   </div>
   
   <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark"   >
  <div class="container-fluid">
    <a class="navbar-brand col-3">Barre de navigation : </a>
    
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
    
    <div class="col-3">
    <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Option1</a>
        </li>
      </ul>
      </div>

      <div class="col-3">
    <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Option2</a>
        </li>
      </ul>
      </div>

      <div class="col-3">
    <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Option3</a>
        </li>
      </ul>
      </div>

      <div class="col-3">
    <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./index.php?controleur=soiree">Gerer Soirée</a>
        </li>
      </ul>
      </div>



    </div>
  </div>
</nav>

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



</main>
</body>
</html>