<?php
session_start();

$a =  '<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <link rel="shortcut icon" href="/evalPhp/img/logo_modif.png" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Anuphan">
    <title>Dormir Co</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>function redirect(page) {
        if(page===1) {
             window.location.replace("http://localhost/evalPhp/rechercheAnnonce.php");
        }
        else if(page===2) {
             window.location.replace("http://localhost/evalPhp/mesAnnonces.php");
        }
        else if(page===3) {
             window.location.replace("http://localhost/evalPhp/voirFavoris.php");
        }
        else if(page===4) {
             window.location.replace("http://localhost/evalPhp/profil.php");
        }
       else if(page===5) {
             window.location.replace("http://localhost/evalPhp/ajouterAnnonce.php");
        }
    }
    </script>
</script>
  </head>
  <body class="p-3 m-0 border-0 bd-example" style="background-color:#2A2A2A;font-family:Anuphan;">
  <nav class="navbar navbar-expand-lg bg-success rounded">
      <div class="collapse navbar-collapse" id="navbarNav">
            <div class="container-fluid">
                        <a class="navbar-brand" href="./index.php">
                              <img src="/evalPhp/img/logo_modif.png" alt="Bootstrap" height="81" width="288" class ="rounded-circle d-inline-block align-text-middle ">
                         </a>
            </div>
      </div>';

$connecte =  isset($_SESSION['email']) ?
      '<ul class="navbar-nav me-auto mb-2 mb-lg-0" >
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="/evalPhp/index.php">Accueil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="/evalPhp/profil.php">Profil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/evalPhp/MesAnnonces.php">Mes annonces</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/evalPhp/rechercheAnnonce.php">Rechercher une annonce</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/evalPhp/ajouterAnnonce.php">Ajouter une annonce</a>
            </li>  
            <li class="nav-item">
              <a class="nav-link" href="/evalPhp/VoirFavoris.php">Mes favoris</a>
            </li>  
            </ul>
                ': '<ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>';;


$button = isset($_SESSION['email']) ? '<a class="btn btn-danger m-3" href="/evalPhp/back-end/deconnexion.php">Deconnexion</a>' : '
      <a class="btn btn-outline-dark" href="http://localhost/evalPhp/inscription.php">Inscription</a>
      <a class="btn btn-dark m-3" href="http://localhost/evalPhp/login.php">Connexion</a>
    ';

$b = '    </ul>
         </div>
      </div>
    </nav>';
echo $a.$connecte.$button.$b

?>