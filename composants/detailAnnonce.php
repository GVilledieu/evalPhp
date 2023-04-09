<?php
require('../class/database.php');
require('../composants/navbar.php');

$database = new Database();
// connexion bdd
$pdo = $database->connectDb();
$annonce= $database->select($pdo, '*', 'ad', ['id_ad',$_POST['id_ad']]);
// formalisation du résultat
$annonce=$annonce->fetchAll();
echo '
<h1 class="text-white p-3 mt-5 mb-5 text-center">Détail de l&#x2019;annonce </h1>
<div class="container" >
            <div class="row justify-content-center">';
foreach ($annonce as $key => $value) {
    echo '<div class="col-sm-3 mb-3 mb-sm-0 center p-3 ">
                <div class="card bg-success h-100 -3">
                  <div class="card-body">
                    <h2 class="card-title">' . $value['title'] . '</h2>
                    <p class="card-text">' . $value['address'] . '</p>
                    <p class="card-text text-white">' . $value['description'] . '</p>
                    <p class="card-text text-warning"><strong>' . $value['price'] . '€</strong></p>
                  </div>
                </div>
              </div>
              <input class="btn btn-secondary" type="button" value="RETOUR" onClick="redirect(1)">
            ';}
?>