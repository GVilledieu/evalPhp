<?php
require("../composants/navbar.php");
require('../class/database.php');
$database = new Database();
// connexion bdd
$pdo = $database->connectDb();
$resultVille= $database->selectWithNomVille($pdo,['ville_nom',$_POST['rechercheVille']]);
// formalisation du résultat
$resultVille=$resultVille->fetchAll();
$ville= strtolower($_POST['rechercheVille']);
$ville=ucwords($ville);
if (count($resultVille) < 1){
    echo('<h3 class="text-white m-5">Aucun résultat pour votre recherche</h3>');

}
else{
echo ' <h1 class="text-white">Résultat de votre recherche pour '.$ville.'</h1>
      <div class="container m-3">
            <div class="row">';
foreach ($resultVille as $key => $value) {

    echo '<div class="col-sm-3 mb-3 mb-sm-0">
                <div class="card bg-success">
                  <div class="card-body">
                    <h5 class="card-title">' . $value['title'] . '</h5>
                    <p class="card-text">' . $value['description'] . '</p>
                    <p> '.$value['price'] . '</p>
                    <p class="text"> '.$value['address'] . '</p>
                    <a href="#" class="btn text-white" style="background-color:#2A2A2A;">Voir l&#x2019;annonce</a>
                  </div>
                </div>
              </div>
            ';}}

echo ('<div class="container mt-3">
            <input class="btn btn-secondary" type="button" value="RETOUR" onClick="history.back();">
      </div>');
