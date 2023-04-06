<?php
session_start();
$a =  '<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <title>Bootstrap Example</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  </head>
  <body class="p-3 m-0 border-0 bd-example">
  <nav class="navbar navbar-expand-lg bg-light">
      <div class="collapse navbar-collapse" id="navbarNav">
            <div class="container-fluid">
                        <a class="navbar-brand" href="./index.php">
                              <img src="./img/couette.jpg" alt="Bootstrap" height="81" width="81" class ="rounded-circle d-inline-block align-text-middle"><span>EAU BNB </span> </img>
                         </a>
            </div>
      </div>';

$connecte =  isset($_SESSION['email']) ?
      '<ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="./index.php">Accueil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="">Profil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./MesAnnonces.php">Mes annonces</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./rechercheAnnonce.php">Rechercher une annonce</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./VoirFavoris.php">Mes favoris</a>
            </li>  
            </ul>
                ': '<ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>';;


$button = isset($_SESSION['email']) ? '<a class="btn btn-outline-danger" href="./back-end/deconnexion.php">Deconnexion</a>' : '
      <a class="btn btn-outline-success m-1" href="http://localhost/evalPhp/inscription.php">Inscription</a>
      <a class="btn btn-success m-1" href="http://localhost/evalPhp/login.php">Connexion</a>
    ';

$b = '    </ul>
         </div>
      </div>
    </nav>';
echo $a.$connecte.$button.$b

?>