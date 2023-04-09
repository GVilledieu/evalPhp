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
    echo('<h3 class="text-white m-5">Aucun résultat pour votre recherche</h3>
<input class="btn btn-secondary" type="button" value="RETOUR" onClick="redirect()">
');

}
else{
echo ' <h1 class="text-white">Résultat de votre recherche pour '.$ville.'</h1>
      <div class="container m-3">
            <div class="row">';
    foreach ($resultVille as $key => $value) {

        echo '<div class="col-sm-3 mb-3 mb-sm-0">
                <div class="card bg-success h-100 ">
                  <div class="card-body">
                    <h5 class="card-title">' . $value['title'] . '</h5>
                    <p class="card-text">' . $value['address'] . '</p>
                    <form action="http://localhost/evalPhp/composants/detailAnnonce.php" method="post">
                        <input type="hidden" name="id_ad" value="' .$value["id_ad"] . ' ">
                            <input type="submit" class="btn text-white" value="Voir l&#x2019;annonce" style="background-color:#2A2A2A;">
                           </form>';
        $mysqli = new mysqli("localhost", "root", "", "evalPhp");
        $id_user=$_SESSION['id_user'];
        $id_ad=$value["id_ad"];
        $verify = mysqli_query($mysqli,"SELECT `id_user`, `id_ad` FROM `favorite` WHERE id_user=$id_user AND `id_ad` =$id_ad");
        $rownum = mysqli_num_rows($verify);
        if ($rownum < 1) {
            echo '
                        <form action="http://localhost/evalPhp/back-end/ajouterFavoris.php" method="post">
                        <input type="hidden" name="id_ad" value="' .$value["id_ad"] . ' ">
                            <input type="submit" class="btn btn-warning mt-3" value="Ajouter aux favoris">
                           </form>';
        } echo '
                  </div>
                </div>
              </div>
            ;';


    }

echo ('<div class="container mt-3">
            <input class="btn btn-secondary" type="button" value="RETOUR" onClick="history.back();">
      </div>');}
