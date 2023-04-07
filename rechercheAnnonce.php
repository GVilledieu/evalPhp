<?php
require('./class/database.php');
require('./composants/navbar.php');
require('composants/form.php');
$form = new Form();
$database = new Database();
// connexion bdd
$pdo = $database->connectDb();
// create select requete
$result = $database->select($pdo, '*', 'ad', []);
$resultVille= $database->selectWithNomVille($pdo,['ville_nom',"PIRAJOUX"]);
// formalisation du résultat
$result = $result->fetchAll();
$resultVille=$resultVille->fetchAll();

?>

<!--      <h3>Connecter : --><?php //= $_SESSION['email']; ?><!-- </h3>-->
<br/>
      <label for="exampleDataList" class="form-label "><h2 class="text-white">Rechercher une annonce par ville</h2></label>
      <form class="row"  action="back-end/rechercheAnnonce.php" method="post">
            <?php
            echo $form->Input("4", "rechercheVille", "", "text", "Saisir une ville, exemple : lParis ", $_GET['rechercheVille'] ?? '');
            ?>
            <div class="col-md-4">
                  <div class="mb-3">
            <label for="" class="form-label"></label>
            <input value="Rechercher" type="submit" name="Envoyer" class="form-control bg-primary text-white" id="" placeholder="" style="height:38px; width:20em; padding-top:3px;border: none;" >
                  </div>
            </div>
      </form>
      <?php
echo '
<div style="margin-top:5%">
<h2 class="text-white mt-10">Liste des annonces </h2>
</div>
<div class="container m-3">
            <div class="row">';
foreach ($result as $key => $value) {

    echo '<div class="col-sm-3 mb-3 mb-sm-0">
                <div class="card bg-success h-100 ">
                  <div class="card-body">
                    <h5 class="card-title">' . $value['title'] . '</h5>
                    <p class="card-text">' . $value['address'] . '</p>
                    <a href="#" class="btn text-white" style=background-color:#2A2A2A;">Voir l&#x2019;annonce</a>
                  </div>
                </div>
              </div>
            ';


}
?>

